@extends('admin.layouts.app')

@section('content')
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Administrators <i class="feather icon-user"></i></h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $admin)
                                        <tr>
                                            <td>
                                                    @if(!empty($admin->image))
                                                        <img src="{{ asset('uploads/admin/' . $admin->image) }}" alt="Admin Profile Image" height="40" width="40" class="rounded-circle">
                                                    @else
                                                        <img src="{{ asset('/assets/images/placeholder-image.png') }}" alt="Admin Profile Image Placeholder" height="40" width="40" class="rounded-circle">
                                                    @endif
                                            </td>
                                            <td>{!! $admin->first_name !!} {!! $admin->last_name !!}</td>
                                            <td>{!! $admin->phone !!}</td>
                                            <td>{!! $admin->email !!}</td>
                                            {{-- <td>{!! ($admin->is_active > 0) ? 'Yes' : 'No' !!}</td> --}}
                                            <td>
                                                <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                    <input type="checkbox" data-id="{{ $admin->id }}" class="custom-control-input is_active" id="customSwitch_{{ $key }}" name="customSwitch_{{ $key }}" value="" {{ $admin->is_active == 1 ? 'checked' : '' }} {!! auth()->id() == $admin->id ? 'disabled' : '' !!}>
                                                    <label class="custom-control-label" for="customSwitch_{{ $key }}"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{!! route('admin.administrators.show', $admin->id) !!}" class="btn btn-info btn-sm waves-effect waves-light admin-view-btn"><i class="feather icon-search"></i></a>

                                            @if(auth()->user()->is_system_admin == 1 || auth()->user()->id == $admin->id)
                                                <a href="{!! route('admin.administrators.edit', $admin->id) !!}" class="btn btn-primary btn-sm waves-effect admin-edit-btn waves-light"><i class="feather icon-edit"></i></a>
                                            @else
                                                <a href="{!! route('admin.administrators.edit', $admin->id) !!}" class="btn btn-primary btn-sm waves-effect admin-edit-btn waves-light disabled"><i class="feather icon-edit"></i></a>
                                            @endif

                                            @if(auth()->user()->is_system_admin != 1)
                                                <button type="button" class="btn btn-danger btn-sm waves-effect waves-light disabled"><i class="feather icon-trash"></i></button>
                                            @elseif (auth()->user()->is_system_admin == 1 && auth()->id() != $admin->id)
                                                <button type="button" class="admin-trash-btn btn btn-danger btn-sm waves-effect waves-light" onclick="deleteConfirmation({!! $admin->id !!})"><i class="feather icon-trash"></i></button>
                                            @endif

                                                <form action="{!! URL::route('admin.administrators.destroy', $admin->id) !!}" method="POST" id="deleteForm{!! $admin->id !!}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
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
    $('.is_active').on('change', function() {
        var idHolder = $(this).data('id');
        var isChecked = $(this).is(':checked') ? 1 : 0;
        $.ajax({
            type: 'POST',
            url: '{{ route('admin.administrators.front') }}',
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