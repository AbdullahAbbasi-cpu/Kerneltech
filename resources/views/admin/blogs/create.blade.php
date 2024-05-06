@extends('admin.layouts.app')

@section('content')
    <section id="number-tabs">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Blog <i class="feather icon-airplay"></i></h4>
                        <button class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><a
                                href="{{ route('admin.blogs.index') }}" class="text-white">Manage Blogs</a></button>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.blogs.store') }}" id="BlogCreateForm"
                                class="number-tab-steps wizard-circle" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <fieldset>
                                    <div class="row flex-column">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-1">
                                                <label for="image">Featured Image</label>
                                                <input type="file" name="featured_image" class="form-control p-6">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-1">
                                                <label for="image">Author Pcture</label>
                                                <input type="file" name="author_picture" class="form-control p-6">
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <div class="form-group mb-1">
                                                <label for="is_active">Is Active</label>
                                                <select class="form-control" name="is_active">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="row flex-column">

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
                                {{-- <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-1">
                                                <label for="page_to_show_slider_on">Page to show slider on</label>
                                                <select class="form-control" name="page_to_show_slider_on">
                                                    {{-- <option value="Home">Home</option>
                                                <option value="About">About</option>
                                                <option value="Blog">Blog</option>
                                                <option value="Web Application Design">Web Application Design</option>
                                                <option value="Mob App Design Services">Mob App Design Services</option>
                                                <option value="Android Development Services">Android Development Services</option>
                                                <option value="Hybrid Development">Hybrid Development</option>
                                                <option value="iOS Development Services">iOS Development Services</option>
                                                <option value="Mobile App Development">Mobile App Development</option>
                                                <option value="Custom Web Development Services">Custom Web Development Services</option>
                                                <option value="WordPress Development Services">WordPress Development Services</option>
                                                <option value="Laravel Development Services">Laravel Development Services</option>
                                                <option value="E-commerce Solutions">E-commerce Solutions</option>
                                                <option value="WordPress Development Services">WordPress Development Services</option>
                                                <option value="Opencart Development Services">Opencart Development Services</option>
                                                <option value="Digital Marketing">Digital Marketing</option>
                                                <option value="Privacy Policy">Privacy Policy</option>
                                                <option value="Terms & Condition">Terms & Condition</option> --}}
                                {{-- @foreach ($options as $option)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                @endforeach
                                </select> --}}
                                {{-- </div>
                    </div>
                </div>
                </fieldset>  --}}

                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-1">
                                                <label>Author Name</label>
                                                <input type="text" name="author_name" value="{{ old('author_name') }}"
                                                    placeholder="Name..." class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-2">
                                                <label for="description">Author Description</label>
                                                <textarea class="form-control" id="author-editor" name="author_description" value="{{ old('author_description') }}"
                                                    placeholder="Add Description..." rows="4">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-2">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="editor" name="description" value="{{ old('description') }}"
                                                    placeholder="Add Description" rows="4">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-1">
                                                <label>Title</label>
                                                <input type="text" name="title" value="{{ old('title') }}"
                                                    placeholder="Add Title" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-1">
                                                <label>Category</label>
                                                <input type="text" name="category" value="{{ old('category') }}"
                                                    placeholder="Add category..." class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset id="image_container" class="d-none">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <img id="preview"
                                                    src="{{ asset('assets/admin/images/gallery-placeholder.png') }}"
                                                    alt="Background Picture Preview" class="d-inline-flex border"
                                                    height="300" width="300">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset id="photo_image_container" class="d-none">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <img id="thumbnailPreview"
                                                    src="{{ asset('assets/admin/images/shorts-placeholder.png') }}"
                                                    alt="Background Picture Preview" class="d-inline-flex border"
                                                    height="402" width="239">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset id="video_container" class="d-none">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <img id="videoThumbnailPreview"
                                                    src="{{ asset('assets/admin/images/video-placeholder.png') }}"
                                                    alt="Background Picture Preview" class="d-inline-flex border"
                                                    height="234" width="300">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-md-12 pl-0">
                                    <button type="submit"
                                        class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Add</button>
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
    <script>
        ClassicEditor.create(document.querySelector('#editor')).catch(error => console.log(error));
    </script>
    <script>
        ClassicEditor.create(document.querySelector('#author-editor')).catch(error => console.log(error));
    </script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.validator.addMethod("imageFileType", function(value, element) {
                // Get the file extension
                var extension = value.split('.').pop().toLowerCase();
                // Check if the extension is one of the allowed image types
                return ['jpg', 'jpeg', 'png', 'gif'].indexOf(extension) !== -1;
            }, "Please select a valid image file (jpg, jpeg, png, gif)");

            $('#BlogCreateForm').validate({
                rules: {
                    title: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    f_image: {
                        required: true,
                        imageFileType: true
                    },
                    author_picture: {
                        required: true,
                        imageFileType: true
                    },
                    author_name: {
                        required: true,

                    },
                    author_description: {
                        required: true,

                    },
                    description: {
                        required: true,

                    },
                    category: {
                        required: true,

                    },
                },
                messages: {
                    title: {
                        required: "Please enter your title",
                    },
                    description: {
                        required: "Please enter your description",
                    },
                    f_image: {
                        required: "Please select background image",

                    },
                    author_picture: {
                        required: "Please select author image",

                    },
                    author_name: {
                        required: "Please enter author name",

                    },
                    author_picture: {
                        required: "Please enter author description",

                    },
                    category: {
                        required: "Please select category",

                    },
                },


            });
        });
    </script>
@endsection
