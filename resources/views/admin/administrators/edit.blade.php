@extends('admin.layouts.app')

@section('content')
<section id="number-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Administrator <i class="feather icon-user"></i></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.administrators.update', $data->id) }}" class="number-tab-steps wizard-circle" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name *</label>
                                            <input type="text" name="first_name" value="{{ old('first_name', $data->first_name) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" value="{{ old('last_name', $data->last_name) }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Contact Number</label>
                                            <input type="number" name="phone" value="{{ old('phone', $data->phone) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="{{ old('email', $data->email) }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="image">Profile Picture</label>
                                            <input id="file" type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="is_active">Is Active</label>
                                            <select class="form-control" name="is_active" {!! auth()->id() == $data->id ? 'disabled' : '' !!}>
                                                <option value="0" {!! ($data->is_active = 0) ? 'selected' : '' !!}>No</option>
                                                <option value="1" {!! ($data->is_active = 1) ? 'selected' : '' !!}>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    
                                    <div class="col-sm-6">
                                        {{-- <div class="form-group">
                                             @if ($data->image != '' && file_exists(uploadsDir('admin') . $data->image))
                                                <input type="hidden" name="previous_image" value="{!! $data->image !!}" class="form-control">
                                                <img src="{!! asset(uploadsDir('admin') . $data->image) !!}" height="150" width="150">
                                            @endif
                                        </div> --}}
                                        <div class="cross-container d-flex mb-3">
                                            @if ($data->image != '' && file_exists(uploadsDir('admin') . $data->image))
                                                <img id="preview" src="{!! asset(uploadsDir('admin') . $data->image) !!}" alt="Background Picture Preview" class="d-inline-flex rounded-lg" height="80" width="80">
                                            @else
                                                <img id="preview" src="{{ asset('assets/images/placeholder-image.png') }}" alt="Background Picture Preview" class="d-inline-flex rounded-lg" height="80" width="80">
                                            @endif
                                            <button type="button" id="clearImageButton" class="d-flex align-items-start p-0 border-0 bg-transparent">
                                                <img class="rounded-sm" src="{{ asset('assets/admin/images/cross-arrow-blue.svg') }}" width="13" height="13">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="col-md-12 pl-0">
                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer-js')
    <script type="text/javascript">
    $(document).ready(function() {
        $("#clearImageButton").click(function() {
            $("#file").val("");
            $("#preview").attr("src", "");
            $('.cross-container').hide();
            $('.cross-container').removeClass('d-flex');
            $('#image_input').val('');
        });
        $('#file').on('change', function(e){
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e){
                $('.cross-container').show();
                $('.cross-container').addClass('d-flex');
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        });
    });
    </script>
@endsection