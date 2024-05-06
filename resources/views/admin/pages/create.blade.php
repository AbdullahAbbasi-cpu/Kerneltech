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
                            <form method="POST" action="{{ route('admin.pages.store') }}"
                                class="number-tab-steps wizard-circle" enctype="multipart/form-data" id="pageForm">
                                @csrf
                                @method('POST')
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="meta_title" style="margin-bottom:4px !important;">Select Page
                                                    Template</label>
                                                <div class="custom-control custom-switch custom-switch-success mb-1">
                                                    <select class="form-control" id="page_template" name="page_template">
                                                        <option value="">Select template</option>
                                                        <option value="home">Home</option>
                                                        <option value="services">Services</option>
                                                    </select>
                                                    {{-- <input type="checkbox" class="custom-control-input" name="is_system_page" value="1" onchange="toggleFields()">
                                    <label class="custom-control-label" for="customSwitch4"></label> --}}

                                                    <div class="form-group ">
                                                        <label>Meta Title</label>
                                                        <input type="text" name="meta_title" placeholder="Add Title"
                                                            class="form-control title-holder">
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>Meta description</label>
                                                        <textarea type="text" name="meta_description" placeholder="Add description" class="form-control title-holder"></textarea>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div id="servicesFields">
                                    <fieldset>
                                        <div class="row flex-column">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="title">Page Title *</label>
                                                    <input type="text" id="page_title" name="title" maxlength="190"
                                                        value="{{ old('title') }}" class="form-control page_title">
                                                    <input type="hidden" name="slug" id="slug">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row flex-column">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="icon">Page Icon *</label>
                                                    <input type="file" name="icon"
                                                        class="image-holder form-control p-6">
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
                                                    <textarea class="form-control page-description" name="description" placeholder="Add Description" rows="4">{{ old('description') }}</textarea>
                                                    <span class="rchars"><span id="rchars">123</span> Character(s)
                                                        Remaining</span>
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
                                                        <div
                                                            class="mt-1 pt-0 first-wrapper d-flex align-items-center justify-content-between">
                                                            <h4 class="card-title pt-1">Card 1</h4>
                                                            <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light remove-step"
                                                                disabled="diabled"><i class="feather icon-x"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="image">Card Image</label>
                                                        <input type="file" name="image"
                                                            class="image-holder form-control p-6">
                                                    </div>
                                                </div>
                                                {{-- <div class="col-sm-6">
                                                    <div class="form-group mb-1">
                                                        <label>Title</label>
                                                        <input type="text" name="title" placeholder="Add Title"
                                                            class="form-control title-holder">
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control description-holder" name="description" placeholder="Add Description" rows="4">{{ old('description') }}</textarea>
                                                    </div>
                                                </div> --}}
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
                                                        <input type="file" name="image_1"
                                                            class="image-holder form-control p-6">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-1">
                                                        <label>Title</label>
                                                        <input type="text" name="title_1" placeholder="Add Title"
                                                            class="title-holder form-control title-holder">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group mb-2">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control description-holder" name="description_1" placeholder="Add Description" id="editor"
                                                            rows="4">{{ old('description') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <!-- services hero cards ends here -->
                                    <!-- Add other conditional fields here -->
                                    <div class="col-sm-6 pl-0 pr-0 d-flex align-items-center justify-content-between">
                                        <button
                                            class="add-another-step btn btn-primary mr-1 mb-1 waves-effect waves-light">Add
                                            Card</button>
                                    </div>
                                    <!-- working process -->
                                    <fieldset class="mt-1">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="working_process_to_show">Which Working Process record do
                                                        you want to show?</label>
                                                    <select class="form-control" id="working_process_to_show"
                                                        name="working_process_to_show">
                                                        <option value="">Select Working Process</option>
                                                        @foreach ($headings as $heading)
                                                            <option value="{{ $heading }}">{{ $heading }}
                                                            </option>
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
                                                    <label for="industries_to_show">Select Industries</label>
                                                    <select class="form-control" name="industries_to_show[]"
                                                        id="industries_to_show" multiple>
                                                        @foreach ($industries as $industry)
                                                            <option value="{{ $industry }}">{{ $industry }}
                                                            </option>
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
                                                    <label for="technologies_to_show">Select Technologies</label>
                                                    <select class="form-control" multiple id="technologies_to_show"
                                                        name="technologies_to_show[]">
                                                        @foreach ($technologies as $technology)
                                                            <option value="{{ $technology }}">{{ $technology }}
                                                            </option>
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
                                                    <label for="st_testimonials_to_show">Select Testimonials</label>
                                                    <select class="form-control" multiple id="st_testimonials_to_show"
                                                        name="st_testimonials_to_show[]">
                                                        @foreach ($testimonials as $testimonial)
                                                            <option value="{{ $testimonial }}">{{ $testimonial }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="homeFields">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="meta_title" style="margin-bottom:4px !important;">Select
                                                        Services</label>
                                                    <div class="custom-control custom-switch custom-switch-success mb-1">
                                                        <select class="form-control" multiple id="services_to_show"
                                                            name="services_to_show[]">
                                                            @foreach ($services as $service)
                                                                <option value="{{ $service }}">{{ $service }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="meta_title" style="margin-bottom:4px !important;">Select
                                                        Achievements</label>
                                                    <div class="custom-control custom-switch custom-switch-success mb-1">
                                                        <select class="form-control" multiple id="achievements_to_show"
                                                            name="achievements_to_show[]">
                                                            @foreach ($achievements as $achievement)
                                                                <option value="{{ $achievement }}">{{ $achievement }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="meta_title" style="margin-bottom:4px !important;">Select
                                                        Testimonials</label>
                                                    <div class="custom-control custom-switch custom-switch-success mb-1">
                                                        <select class="form-control" multiple id="ht_testimonials_to_show"
                                                            name="ht_testimonials_to_show[]">
                                                            @foreach ($testimonials as $testimonial)
                                                                <option value="{{ $testimonial }}">{{ $testimonial }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-sm-6 pl-0 pr-0 d-flex align-items-center justify-content-between">
                                    <button type="submit"
                                        class="mt-3 btn btn-primary mr-1 mb-1 waves-effect waves-light">Add
                                        Page</button>
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
        // adding ck editior functionality to the cloned textareas
        function initCKEditor(textareaId) {
            ClassicEditor
                .create(document.getElementById(textareaId))
                .then(editor => {
                    console.log(editor);
                    $(document).on('mousedown', '.ck-editor__editable', function(event) {
                        const closestEditor = $(this).closest('.ck-editor');
                        if (closestEditor.length) {
                            editor.editing.view.focus();
                        }
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        }



        $(document).ready(function() {


            $(document).on('click', '.add-another-step', function(e) {
                e.preventDefault();
                var clonedStep = $('.cloning-step').clone();
                clonedStep.appendTo('#pageForm .steps-wrapper');

                if ($('.steps-wrapper .step').length == 4) {
                    $(this).attr('disabled', true);
                } else {
                    $(this).attr('disabled', false);
                }

                if ($('.steps-wrapper .step').length <= 1) {
                    $('.remove-step').attr('disabled', true);
                } else {
                    $('.remove-step').attr('disabled', false);
                }

                clonedStep.removeClass('d-none');
                let stepCounter = $('.steps-wrapper .step').length;
                clonedStep.find('h4').html('Card ' + stepCounter);
                clonedStep.find('.image-holder').attr('name', 'image_' + stepCounter);
                clonedStep.find('.title-holder').attr('name', 'title_' + stepCounter);
                clonedStep.find('.description-holder').attr('name', 'description_' + stepCounter);
                $('.steps-wrapper .cloning-step').removeClass('cloning-step');

                var ckTextarea = clonedStep.find('textarea');
                var originalId = ckTextarea.attr('id');
                var newId = originalId + '_' + Date.now();
                ckTextarea.attr('id', newId);

                initCKEditor(newId);

            });

            $(document).on('click', '.remove-step', function(e) {
                e.preventDefault();
                if ($('.steps-wrapper .step').length == 2) {
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

            function slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/\-\-+/g, '-')
                    .replace(/^-+/, '')
                    .replace(/-+$/, '');
            }
            $("#page_title").blur(function() {
                var value = $(this).val();
                $('#slug').val(slugify(value));
            }).blur();


            function generateValidationRules(pageTemplate) {
                let rules = {};
                let messages = {};

                rules[`title`] = {
                    required: true
                };
                messages[`title`] = {
                    required: "Please Enter Page Heading"
                };

                rules[`is_active`] = {
                    required: true
                };
                messages[`is_active`] = {
                    required: "This is the required field"
                };

                rules[`icon`] = {
                    required: true
                };
                messages[`icon`] = {
                    required: "Please Select Page Icon"
                };

                rules[`description`] = {
                    required: true
                };
                messages[`description`] = {
                    required: "Please Enter Page Description"
                };

                if (pageTemplate === 'services') {
                    for (let i = 1; i <= 4; i++) {
                        rules[`image_${i}`] = {
                            required: true
                        };
                        messages[`image_${i}`] = {
                            required: "Please Select Front Image"
                        };

                        rules[`title_${i}`] = {
                            required: true
                        };
                        messages[`title_${i}`] = {
                            required: "Please Enter the Title"
                        };

                        rules[`description_${i}`] = {
                            required: true
                        };
                        messages[`description_${i}`] = {
                            required: "Textarea description"
                        };
                    }
                }

                return {
                    rules,
                    messages
                };
            }

            // Attach change event listener to the select dropdown
            $('#page_template').on('change', function() {
                $('#servicesFields').hide();
                $('#homeFields').hide();

                if ($(this).val() === 'services') {
                    $('#servicesFields').show();
                    const {
                        rules,
                        messages
                    } = generateValidationRules('services');
                    // Apply validation rules for 'services' page template
                    $('#pageForm').validate({
                        rules: rules,
                        messages: messages
                    });
                } else if ($(this).val() === 'home') {
                    $('#homeFields').show();
                    // Remove validation rules for 'services' page template
                    $('#pageForm').validate().resetForm();
                }
            });

            // Trigger change event initially
            $('#page_template').change();






            // function generateValidationRules() {
            //      let rules = {};
            //      let messages = {};

            //      rules[`title`] = { required: true };
            //      messages[`title`] = { required: "Please Enter Page Heading" };

            //      rules[`is_active`] = { required: true };
            //      messages[`is_active`] = { required: "This is the required field" };

            //      rules[`icon`] = { required: true };
            //      messages[`icon`] = { required: "Please Select Page Icon" };

            //      rules[`description`] = { required: true };
            //      messages[`description`] = { required: "Please Enter Page Description" };

            //      for (let i = 1; i <= 4; i++) {
            //          rules[`image_${i}`] = { required: true };
            //          messages[`image_${i}`] = { required: "Please Select Front Image" };

            //          rules[`title_${i}`] = { required: true };
            //          messages[`title_${i}`] = { required: "Please Enter the Title" };

            //          rules[`description_${i}`] = { required: true };
            //          messages[`description_${i}`] = { required: "Please Enter Description" };
            //      }

            //      return { rules, messages };
            //  }

            //  const { rules, messages } = generateValidationRules();

            //  $('#pageForm').validate({
            //       ignore: [],
            //       rules: rules,
            //       messages: messages,
            //       errorElement: 'span',
            //       errorClass: 'error-message',
            //       highlight: function (element) {
            //             $(element).addClass('error');
            //       },
            //       unhighlight: function (element) {
            //             $(element).removeClass('error');
            //       },
            //       errorPlacement: function (error, element) {
            //             // if (element.is('textarea') && element.hasClass('description-holder')) {
            //             //    error.addClass('text-danger');
            //             //    error.insertAfter(element.siblings('.ck-editor'));
            //             // } else {
            //                error.addClass('text-danger position-relative');
            //                error.insertAfter(element);
            //             // }
            //       },
            //       submitHandler: function (form) {
            //             console.log('Form Submitted');
            //             $(".step.cloning-step").find(":input").prop("disabled", true);
            //             $('#noOfSteps').val($('#pageForm .steps-wrapper .step').length);
            //             form.submit();
            //       },
            //    });

            // Attach change event listener to the select dropdown
            //   $('#page_template').on('change', function(){
            //       $('#servicesFields').hide();
            //       $('#homeFields').hide();

            //       if($(this).val() === 'services') {
            //          $('#servicesFields').show();
            //       } else if($(this).val() === 'home'){
            //           $('#homeFields').show();
            //       }
            //   });
            //   $('#page_template').change();



        });





        // for validating cards 
    </script>
@endsection
