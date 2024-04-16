@extends('admin.layouts.app')

@section('content')
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Achievements <i class="feather icon-sliders"></i></h4>
                    <button class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><a href="{{ route('admin.achievements.create') }}" class="text-white">Add Achievement</a></button>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                        <th>Icon</th>
                                        <th>Title</th>
                                        <th>Heading</th>
                                        <th>Is Active</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @if(count($data) > 0)
                                        @foreach ($data as $key => $Achievement)
                                            <tr>
                                                <td>
                                                    @if(!empty($Achievement->images) && $Achievement->images !== '')
                                                        <img src="{{ asset('uploads/achievements/' . $Achievement->images) }}" alt="Achievement Image" height="40" width="40" class="rounded-circle">
                                                    @else
                                                        <img src="{{ asset('/assets/images/placeholder-image.png') }}" alt="Industry Image" height="40" width="40" class="rounded-circle">
                                                    @endif
                                                </td>
                                                <td>{!! $Achievement->title !!}</td>
                                                <td>{!! $Achievement->heading !!}</td>
                                                <td style="min-width:7rem !important;">{{ $Achievement->is_active == 1 ? 'Yes' : 'No' }}</td>
                                                <td style="min-width:16rem !important;">
                                                    <a href="{!! route('admin.achievements.edit', $Achievement->id) !!}" class="btn btn-primary btn-sm waves-effect waves-light news-edit-btn"><i class="feather icon-edit"></i></a>
                                                    <a href="{!! route('admin.achievements.show', $Achievement->id) !!}" class="btn btn-info show-btn btn-sm waves-effect waves-light"><i class="feather icon-search"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm waves-effect waves-light" onclick="deleteConfirmation({!! $Achievement->id !!})"><i class="feather icon-trash"></i></button>
                                                    <form action="{!! URL::route('admin.achievements.destroy', $Achievement->id) !!}" method="POST" id="deleteForm{!! $Achievement->id !!}">
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
@endsection

@section('footer-js')

<script type="text/javascript">
    $(function() {
    $('.front_page_checkbox, .home_page_checkbox').on('change', function() {
        var checkboxValue = $(this).data('id');
        var isChecked = $(this).is(':checked') ? 1 : 0;

        var checkboxType = $(this).hasClass('front_page_checkbox') ? 'front' : 'home';
        $.ajax({
            type: 'POST',
            url: '{{ route('admin.news.front') }}',
            data: { id: checkboxValue, isChecked: isChecked, type: checkboxType }, 
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