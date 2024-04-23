@extends('admin.layouts.app')

@section('content')
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pages <i class="feather icon-book-open"></i></h4>
                    <button class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><a href="{{ route('admin.pages.create') }}" class="text-white">Add Page</a></button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                        <th>Icon</th>
                                        <th>Template</th>
                                        <th>Title</th>
                                        <th>Is Active</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @if(count($data) > 0)
                                        @foreach ($data as $key => $page)
                                            <tr>
                                                <td>
                                                    @if(!empty($page->icon) && $page->icon !== '')
                                                        <img src="{{ asset('uploads/pages/' . $page->icon) }}" alt="Page Icon" height="40" width="40" class="rounded-circle">
                                                    @else
                                                        <img src="{{ asset('/assets/images/placeholder-image.png') }}" alt="Page Icon" height="40" width="40" class="rounded-circle">
                                                    @endif
                                                </td>
                                                <td>{!! $page->page_template !!}</td>
                                                <td>{!! $page->title !!}</td>
                                                <td style="min-width:7rem !important;">
                                                    <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                        <input type="checkbox" data-id="{{ $page->id }}" class="custom-control-input is_active" id="customSwitch_{{ $counter }}" name="customSwitch_{{ $counter }}" value="" {{ $page->is_active == 1 ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="customSwitch_{{ $counter }}"></label>
                                                    </div>
                                                </td>   
                                                <td>
                                                    <a href="{!! route('admin.pages.show', $page->id) !!}" class="btn btn-info btn-sm waves-effect waves-light">
                                                        <i class="feather icon-search"></i>
                                                    </a>

                                                    <a href="{!! route('admin.pages.edit', $page->id) !!}" class="btn btn-primary btn-sm waves-effect waves-light">
                                                        <i class="feather icon-edit"></i>
                                                    </a>

                                                    <button type="button" onclick="deleteConfirmation({!! $page->id !!})" class="btn btn-danger btn-sm waves-effect waves-light">
                                                        <i class="feather icon-trash"></i>
                                                    </button>

                                                    <form action="{!! URL::route('admin.pages.destroy', $page->id) !!}" method="POST" id="deleteForm{!! $page->id !!}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @php
                                                $counter++;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan=6>
                                                <p class="text-center my-2">
                                                    No Data to Display
                                                </p>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                       	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Column selectors with Export Options and print table -->
@endsection

@section('footer-js')
<script type="text/javascript">
    $(function() {
    $('.is_active').on('change', function() {
        var idHolder = $(this).data('id');
        var isChecked = $(this).is(':checked') ? 1 : 0;
        $.ajax({
            type: 'POST',
            url: '{{ route('admin.pages.front') }}',
            data: { id: idHolder, isChecked: isChecked }, 
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
            }
        });
    });
});
</script>
@endsection