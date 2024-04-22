@extends('admin.layouts.app')

@section('content')
<section id="number-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Technology <i class="feather icon-move"></i></h4>
                    <button class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><a href="{{ route('admin.technologies.index') }}" class="text-white">Manage Technology</a></button>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.technologies.store') }}" id="technologiesCreateForm" class="number-tab-steps wizard-circle" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <fieldset>
                                <div class="row flex-column">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-1">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control p-6">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-1">
                                            <label for="is_active">Is Active</label>
                                            <select class="form-control" name="is_active">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-1">
                                            <label>Title</label>
                                            <input type="text" required name="title" placeholder="Add title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset id="image_container" class="d-none">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <img id="preview" src="{{asset(
                                            'assets/admin/images/gallery-placeholder.png')}}" alt="Background Picture Preview" class="d-inline-flex border" height="300" width="300">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset id="photo_image_container" class="d-none">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <img id="thumbnailPreview" src="{{asset(
                                            'assets/admin/images/shorts-placeholder.png')}}" alt="Background Picture Preview" class="d-inline-flex border" height="402" width="239">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset id="video_container" class="d-none">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <img id="videoThumbnailPreview" src="{{asset(
                                            'assets/admin/images/video-placeholder.png')}}" alt="Background Picture Preview" class="d-inline-flex border" height="234" width="300">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="col-md-12 pl-0">
                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Add</button>
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
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.validator.addMethod("imageFileType", function(value, element) {
            // Get the file extension
            var extension = value.split('.').pop().toLowerCase();
            // Check if the extension is one of the allowed image types
            return ['jpg', 'jpeg', 'png', 'gif'].indexOf(extension) !== -1;
        }, "Please select a valid image file (jpg, jpeg, png, gif)");

        $('#technologiesCreateForm').validate({
            rules: {
                title: {
                    required: true,
                },
                image: {
                    required: true,
                    imageFileType: true
                },
            },
            messages: {
                title: {
                    required: "Please enter your title",
                },
                image: {
                    required: "Please select image",

                },
            },
        });
    });

</script>
@endsection