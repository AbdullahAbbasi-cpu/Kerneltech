@extends('admin.layouts.app')

@section('content')
<section id="number-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Working Process <i class="feather icon-edit"></i></h4>
                    <button class="btn btn-primary mr-1 mb-1 waves-effect waves-light"><a href="{{ route('admin.working-process.index') }}" class="text-white">Manage Working Process</a></button>
                </div>
                <div class="card-content">
                    <div class="card-body pt-0">
                        <form method="POST" action="{{ route('admin.working-process.store') }}" id="WorkingProcessCreateForm" class="number-tab-steps wizard-circle" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <!-- main heading and main description fields -->

                            <!-- no of steps holder -->
                            <input type="hidden" name="no_of_steps" value="" id="noOfSteps">

                            <fieldset>
                                <div class="row flex-column">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-1">
                                            <label>Section Title</label>
                                            <input type="text" name="heading" placeholder="Add Title" class="form-control title-holder">
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
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-2">
                                            <label for="description">Section Description</label>
                                            <textarea class="form-control description-holder" name="description" placeholder="Add Description" rows="4">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <!-- empty step to clone from here -->
                            <div class="step cloning-step d-none">
                                <fieldset>
                                    <div class="row flex-column">
                                        <div class="col-sm-6">
                                            <div class="mt-1 pt-1 first-wrapper d-flex align-items-center justify-content-between">
                                                <h3 class="pt-1">Step 1</h3>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light remove-step" disabled="diabled"><i class="feather icon-x"></i></button>
                                            </div>
                                            <div class="form-group mb-1">
                                                <label for="image">Front Image</label>
                                                <input type="file" name="image" class="image-holder form-control p-6">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mb-1">
                                                <label>Title</label>
                                                <input type="text" name="title" placeholder="Add Title" class="form-control title-holder">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-2">
                                                <label for="description">Description</label>
                                                <textarea class="form-control description-holder" name="description" placeholder="Add Description" rows="4">{{old('description')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <!-- ends here -->




                            <div class="steps-wrapper" id="sortable">
                                <div class="step">
                                    <fieldset>
                                        <div class="row flex-column">
                                            <div class="col-sm-6">
                                                <div class="mt-1 pt-1 first-wrapper d-flex align-items-center justify-content-between">
                                                    <h3 class="pt-1">Step 1</h3>
                                                    {{-- <button type="submit" class="btn btn-primary waves-effect waves-light remove-step" disabled="diabled">Remove Step</button> --}}
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label for="image">Front Image</label>
                                                    <input type="file" name="image_1" class="form-control p-6">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group mb-1">
                                                    <label>Title</label>
                                                    <input type="text" name="title_1" placeholder="Add Title" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group mb-2">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" name="description_1" placeholder="Add Description" rows="4">{{old('description')}}</textarea>
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
                                </div>
                            </div>
                            <div class="col-md-12 pl-0 pr-0">
                                <div class="col-sm-6 pl-0 pr-0 d-flex align-items-center justify-content-between">
                                    {{-- <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light remove-step" disabled="diabled">Remove Step</button> --}}
                                    <button class="add-another-step btn btn-primary mr-1 mb-1 waves-effect waves-light">Add Step</button>
                                </div>
                                <div class="col-sm-6 pl-0 pr-0 d-flex align-items-center justify-content-between">
                                    <button type="submit" class="mt-3 btn btn-primary mr-1 mb-1 waves-effect waves-light">Add Working Process</button>
                                </div>
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


        $(document).on('click', '.add-another-step', function(e){
            e.preventDefault();
            $('.cloning-step').clone().appendTo('#WorkingProcessCreateForm .steps-wrapper');
            if($('.steps-wrapper .step').length == 6) {
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
            $('.steps-wrapper .cloning-step h3').html('Step ' + stepCounter);
            $('.steps-wrapper .cloning-step .image-holder').attr('name',  'image_' + stepCounter);
            $('.steps-wrapper .cloning-step .title-holder').attr('name',  'title_' + stepCounter);
            $('.steps-wrapper .cloning-step .description-holder').attr('name',  'description_' + stepCounter);
            $('.steps-wrapper .cloning-step').removeClass('cloning-step');
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
                $(this).find('h3').text('Step ' + (index + 1));
                $(this).find('.image-holder').attr('name', 'image_' + (index + 1));
                $(this).find('.title-holder').attr('name', 'title_' + (index + 1));
                $(this).find('.description-holder').attr('name', 'description_' + (index + 1));
            });
        });


        function generateValidationRules() {
            let rules = {};
            let messages = {};

            rules[`heading`] = { required: true };
            messages[`heading`] = { required: "Please Enter Section Heading" };

            rules[`is_active`] = { required: true };
            messages[`is_active`] = { required: "This is the required field" };

            rules[`description`] = { required: true };
            messages[`description`] = { required: "Please Enter Section Description" };

            for (let i = 1; i <= 6; i++) {
                rules[`image_${i}`] = { required: true };
                messages[`image_${i}`] = { required: "Please Select Front Image" };

                rules[`title_${i}`] = { required: true };
                messages[`title_${i}`] = { required: "Please Enter the Title" };

                rules[`description_${i}`] = { required: true };
                messages[`description_${i}`] = { required: "Please Enter Description" };
            }

            return { rules, messages };
        }
        const { rules, messages } = generateValidationRules();

        $('#WorkingProcessCreateForm').validate({
            rules: rules,
            messages: messages,
            errorElement: 'span',
            errorClass: 'error-message',
            highlight: function (element) {
                $(element).addClass('error');
            },
            unhighlight: function (element) {
                $(element).removeClass('error');
            },
            errorPlacement: function (error, element) {
                error.addClass('text-danger position-relative');
                error.insertAfter(element);
            },
            submitHandler: function (form) {
                console.log('Form Submitted');
                $(".step.cloning-step").find(":input").prop("disabled", true);
                $('#noOfSteps').val($('#WorkingProcessCreateForm .steps-wrapper .step').length);
                form.submit();
            },
        });
    });

    $(function() {
        $("#sortable").sortable({
            cursor: "move",
            update: function(event, ui) {
                $('.steps-wrapper .step').each(function(index) {
                    $(this).find('h3').text('Step ' + (index + 1));
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
</script>
@endsection