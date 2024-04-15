@extends('admin.layouts.app')

@section('content')
<section id="number-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Page <i class="feather icon-book-open"></i></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.pages.store') }}" class="number-tab-steps wizard-circle" enctype="multipart/form-data" id="pageForm">
                            @csrf
                            @method('POST')
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="meta_title" style="margin-bottom:4px !important;">Is Services Page ?</label>
                                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch4" name="is_system_page" value="1" onchange="toggleFields()">
                                                <label class="custom-control-label" for="customSwitch4"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div id="conditionalFields">
                                <fieldset>
                                    <div class="row flex-column">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="page_title">Page Title *</label>
                                                <input type="text" id="page_title" name="page_title" maxlength="190" value="{{ old('page_title') }}" class="form-control">
                                                <input type="hidden" name="pageSlug" id="pageSlug">
                                            </div>
                                        </div>
                                    </div>
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
                                        <div class="col-sm-6">
                                            <div class="form-group mb-2">
                                                <label for="description">Page Description</label>
                                                <textarea class="form-control page-description" name="description" placeholder="Add Description" rows="4">{{old('description')}}</textarea>
                                                <span class="rchars"><span id="rchars">123</span> Character(s) Remaining</span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>


                                <fieldset>
                                    <div class="row flex-column">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <h4 class="card-title pt-2">Services Cards</h4>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>


                                <!-- step to clone -->
                                <div class="step cloning-step d-none">
                                    <fieldset class="steps">
                                        <div class="row flex-column">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-0 w-100">
                                                    <div class="mt-1 pt-0 first-wrapper d-flex align-items-center justify-content-between">
                                                        <h4 class="card-title pt-1">Card 1</h4>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light remove-step" disabled="diabled"><i class="feather icon-x"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="image">Card Image</label>
                                                    <input type="file" name="image" class="image-holder form-control p-6">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-1">
                                                    <label>Title</label>
                                                    <input type="text" name="title" placeholder="Add Title" class="form-control title-holder">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-2">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control description-holder" name="description" placeholder="Add Description" rows="4">{{old('description')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>



                                <!-- services hero cards starts from here -->
                                <div class="steps-wrapper" id="sortable">
                                    <fieldset class="step">
                                        <div class="row flex-column">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-0">
                                                    <h4 class="card-title">Card 1</h4>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="image">Card Image</label>
                                                    <input type="file" name="image_1" class="image-holder form-control p-6">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-1">
                                                    <label>Title</label>
                                                    <input type="text" name="title_1" placeholder="Add Title" class="title-holder form-control title-holder">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-2">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control description-holder" name="description_1" placeholder="Add Description" id="editor" rows="4">{{old('description')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <!-- services hero cards ends here -->


                                <!-- Add other conditional fields here -->
                                <div class="col-sm-6 pl-0 pr-0 d-flex align-items-center justify-content-between">
                                    <button class="add-another-step btn btn-primary mr-1 mb-1 waves-effect waves-light">Add Card</button>
                                </div>

                                <!-- working process -->
                            <fieldset class="mt-1">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="which_working_process">Which Working Process record do you want to show?</label>
                                            <select class="form-control" id="working-process" name="which_working_process" multiple>
                                                <option value="">Select Working Process</option>
                                                @foreach($headings as $heading)
                                                    <option value="{{ $heading }}">{{ $heading }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <!-- industries we serve -->
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-1">
                                            <label for="industry">Select Industries</label>
                                            <select class="form-control" name="industry" id="industry" multiple> 
                                                <option value="">Select Industry</option>
                                                @foreach($industries as $industry)
                                                    <option value="{{ $industry }}">{{ $industry }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <!-- our technologies -->
                            <fieldset class="mt-1">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="technology">Select Technologies</label>
                                            <select class="form-control" multiple id="technology" name="technology">
                                                <option value="">Select Technology</option>
                                                @foreach($technologies as $technology)
                                                    <option value="{{ $technology }}">{{ $technology }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                                <fieldset class="mt-1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="technology">Select Testimonials</label>
                                                <select class="form-control" multiple id="testimonials" name="testimonials">
                                                    <option value="">Select Testimonials</option>
                                                    @foreach($testimonials as $testimonial)
                                                        <option value="{{ $testimonial }}">{{ $testimonial }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            

                            <div class="col-sm-6 pl-0 pr-0 d-flex align-items-center justify-content-between">
                                <button type="submit" class="mt-3 btn btn-primary mr-1 mb-1 waves-effect waves-light">Add Page</button>
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
        $(document).on('click', '.add-another-step', function(e){
            e.preventDefault();
            $('.cloning-step').clone().appendTo('#pageForm .steps-wrapper');
            if($('.steps-wrapper .step').length == 4) {
                $(this).attr('disabled', true);
            } else {
                $(this).attr('disabled', false);
            }
            if($('.steps-wrapper .step').length <= 1) {
                $('.remove-step').attr('disabled', true);
            } else {
                $('.remove-step').attr('disabled', false);
            }
            $('.steps-wrapper .cloning-step').removeClass('d-none');
            let stepCounter = $('.steps-wrapper .step').length;
            $('.steps-wrapper .cloning-step h4').html('Card ' + stepCounter);
            $('.steps-wrapper .cloning-step .image-holder').attr('name',  'image_' + stepCounter);
            $('.steps-wrapper .cloning-step .title-holder').attr('name',  'title_' + stepCounter);
            $('.steps-wrapper .cloning-step .description-holder').attr('name',  'description_' + stepCounter);
            $('.steps-wrapper .cloning-step').removeClass('cloning-step');


            // var clonedStep = $('.step:last');
            // var ckTextarea = clonedStep.find('textarea');

            // // Generate a unique ID for the CKEditor textarea by appending a timestamp
            // var originalId = ckTextarea.attr('id');
            // var newId = originalId + '_' + Date.now();
            // ckTextarea.attr('id', newId);            
            // CKEDITOR.replace(newId);
            // $('.steps-wrapper').append(clonedStep);
        });

        $(document).on('click', '.remove-step', function(e){
            e.preventDefault();
            if($('.steps-wrapper .step').length == 2) {
                $(this).attr('disabled', true);
            } else {
                $(this).attr('disabled', false);
            }
            $('.add-another-step').attr('disabled', false);
            $(this).closest('.step').remove();
            $('.steps-wrapper .step').each(function(index) {
                $(this).find('h4').text('Card ' + (index + 1));
                $(this).find('.image-holder').attr('name', 'image_' + (index + 1));
                $(this).find('.title-holder').attr('name', 'title_' + (index + 1));
                $(this).find('.description-holder').attr('name', 'description_' + (index + 1));
            });
        });


        $(function() {
            $("#sortable").sortable({
                cursor: "move",
                update: function(event, ui) {
                    $('.steps-wrapper .step').each(function(index) {
                        $(this).find('h4').text('Card ' + (index + 1));
                        $(this).find('.image-holder').attr('name', 'image_' + (index + 1));
                        $(this).find('.title-holder').attr('name', 'title_' + (index + 1));
                        $(this).find('.description-holder').attr('name', 'description_' + (index + 1));
                    });

                    $('#sortable .step').each(function(index) {
                        if (index !== 0) {
                            if ($(this).find('.remove-step').length === 0) {
                                $(this).find('.first-wrapper').append('<button type="submit" class="btn btn-primary waves-effect waves-light remove-step"><i class="feather icon-x"></i></button>');
                            }
                        } else {
                            $(this).find('.remove-step').remove();
                        }
                    });
                }
            });
        });


    $('.page-description').on('keypress keyup', function() {
        maxLength = 123;
        var text = $(this).val();
        var textlen = maxLength - $(this).val().length;
        $('#rchars').text(textlen);
        if (text.length > maxLength) {
            $(this).val(text.substring(0, maxLength));
            return false;
        }
    });
    $( "#page_title" ).blur(function() {
        var value = $( this ).val();
        $('#pageSlug').val(slugify(value));
    }).blur();

    function slugify(text)
    {
      return text.toString().toLowerCase()
        .replace(/\s+/g, '-')
        .replace(/[^\w\-]+/g, '')
        .replace(/\-\-+/g, '-')
        .replace(/^-+/, '') 
        .replace(/-+$/, '');
    }

    $(document).ready(function() {
        $('#customSwitch4').change(function() {
            $('#conditionalFields').toggle(this.checked);
        });
    });
</script>
@endsection