@extends('admin.layouts.app')

@section('content')
<style>
    .clearImageButton {
        display:none !important;
    }
</style>
<section id="number-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Terms & Condition</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" id="terms-and-condition" action="{{ route('admin.content-pages.termsUpdate', $record->id) }}" class="number-tab-steps wizard-circle" enctype="multipart/form-data">
                            <input type="hidden" name="page_identifier" value="terms-and-condition">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- container to show the Main Logo -->
                                        <div class="cross-container d-flex mb-1 mt-3">
                                            @if ($record->banner_image != '')
                                                <img src="{{ asset(uploadsDir('content-pages') . $record->banner_image) }}" alt="Banner Picture Preview" class="preview d-inline-flex rounded-lg border p-1" height="80" width="200">
                                            @else
                                                <img src="{{ asset('assets/images/preview-placeholder.png') }}" alt="Background Picture Preview" class="d-inline-flex rounded-lg preview border p-1" height="80" width="200">
                                            @endif
                                            <button type="button" class="clearImageButton d-flex align-items-start p-0 border-0 bg-transparent">
                                                <img class="rounded-sm" src="{{ asset('assets/admin/images/cross-arrow-blue.svg') }}" width="13" height="13">
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <label for="jobtitle">Banner Image</label>
                                            <input type="file" id="file" name="banner_image" class="file form-control">
                                        </div>
                                    </div>
                                </div>



                                <!-- meta title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="meta_title">Meta Title</label>
                                            <input type="text" required name="meta_title" maxlength="190" value="{{ old('meta_title', $record->meta_title) }}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <!-- meta description -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_email">Meta Description</label>
                                            <textarea class="form-control ckeditor-textarea" name="meta_description" rows="5" required>{{ $record->meta_description }}</textarea>
                                        </div>
                                    </div>
                                </div>



                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="site_title">Banner Title</label>
                                            <input type="text" required name="banner_title" maxlength="190" value="{{ old('banner_title', $record->banner_title) }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_email">Banner Description</label>
                                            <textarea class="form-control ckeditor-textarea editor" name="banner_description" rows="5" required>{{ $record->banner_description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_phone">Content</label>
                                            <textarea class="form-control editor ckeditor-textarea" name="content" rows="5" required>{{ $record->content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            {{-- <fieldset>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="copyright">Copyright Line</label>
                                            <textarea name="copyright" maxlength="65000" rows="5" class="form-control">{{ old('footer_sentence', $record->copyright) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset> --}}
                            <div class="col-md-12 pl-0">
                                <button type="submit" class="mt-2 btn btn-primary mr-1 mb-1 waves-effect waves-light">Save Changes</button>
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
        $('#terms-and-condition').validate({
            ignore:[],
            rules: {
                banner_title: {
                    required: true,
                },
                banner_description: {
                    required: true,
                },
                content: {
                    required: true,
                },
            },
            messages: {
                banner_title: {
                    required: "Please Enter Banner Title",
                },
                banner_description: {
                    required: "Please Enter Banner Description",
                },
                content: {
                    required: "Please Enter Page Content",
                },
            },
            errorPlacement: function (error, element) {
                  if (element.is('textarea') && element.hasClass('ckeditor-textarea')) {
                     error.addClass('text-danger');
                     error.insertAfter(element.siblings('.ck-editor'));
                  } else {
                     error.addClass('text-danger position-relative');
                     error.insertAfter(element);
                  }
            },
        });
        $('#file').on('change', function(e){
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e){
                $('.preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        });
    });
    
    </script>
@endsection