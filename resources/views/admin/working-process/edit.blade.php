@extends('admin.layouts.app')

@section('content')
<section id="number-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Testimonial <i class="feather icon-message-circle"></i></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" id="WorkingProcessCreateForm" action="{{ route('admin.working-process.update', $data->id) }}" class="number-tab-steps wizard-circle" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <input type="hidden" name="no_of_steps" value="" id="noOfSteps">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="page_title">Name</label>
                                            <input required type="text" name="heading" value="{{$data->heading}}" placeholder="Add Name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    {{-- <div class="col-sm-6">
                                        <div class="form-group mb-0 d-flex flex-column-reverse align-items-start justify-content-center">
                                            <input type="hidden" name="image_input" id="image_input" value="{{$data->image}}">
                                            <input type="file" name="image" class="d-none" accept="image/*">
                                            <button type="button" onclick="document.getElementById('file').click()" class="btn btn-primary my-1" id="uploadButton">Change Profile Photo</button>
                                            <div class="cross-container d-flex">
                                                @if(isset($data->image)  && $data->image !== '' )
                                                    <img id="preview" src="{{ asset(uploadsDir('working-process') . $data->image) }}" alt="Background Picture Preview" class="d-inline-flex rounded-lg" height="80" width="80">
                                                @else
                                                    <img id="preview" src="{{ asset('assets/images/placeholder-image.png') }}" alt="Background Picture Preview" class="d-inline-flex rounded-lg" height="80" width="80">
                                                @endif
                                                <button type="button" id="clearImageButton" class="d-flex align-items-start p-0 border-0 bg-transparent">
                                                    <img class="rounded-sm" src="{{ asset('assets/admin/images/cross-arrow-blue.svg') }}" width="13" height="13">
                                                </button>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-sm-6 pl-0">
                                    <div class="form-group mb-1">
                                        <label for="is_active">Is Active</label>
                                        <select class="form-control" name="is_active">
                                            <option value="1" {{ $data->is_active == 1 ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ $data->is_active == 0 ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-2">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" placeholder="Add Description" rows="4">{{$data->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- empty step to clone from here -->
                            <div class="step  cloning-step d-none">
                                <fieldset>
                                    <div class="row flex-column">
                                        <div class="col-sm-6">
                                            <div class="mt-1 pt-1 first-wrapper d-flex align-items-center justify-content-between">
                                                <h3 class="pb-1">Step 1</h3>
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
                            
                            <fieldset>
                                <div class="row steps-wrapper d-flex flex-column">
                                <div class="col-12" id="sortable">
                                @if (isset($data->no_of_steps) && $data->no_of_steps > 0)
                                    @for ($i = 1; $i <= $data->no_of_steps; $i++)
                                        @php
                                            $imageName = 'image_' . $i;
                                            $titleName = 'title_' . $i;
                                            $descriptionName = 'description_' . $i;
                                        @endphp

                                        <div class="step">
                                            <fieldset>
                                                <div class="row flex-column">
                                                    <div class="col-sm-6">
                                                        <div class="mt-1 pt-1 first-wrapper d-flex align-items-center justify-content-between">
                                                            <h3 style="margin-bottom:10px !important;">Step {{ $i }}</h3>
                                                            @if ($i !== 1)
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light remove-step" disabled="diabled"><i class="feather icon-x"></i></button>
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb-0 d-flex flex-column-reverse align-items-start justify-content-center">
                                                            <input type="hidden" name="image_{{ $i }}" id="image_{{ $i }}" value="{{ $data->$imageName ?? '' }}">
                                                            <input type="file" name="image_{{ $i }}" id="file_{{ $i }}" class="d-none" accept="image/*">
                                                            <button type="button" onclick="document.getElementById('file_{{ $i }}').click()" class="btn btn-primary my-1" id="uploadButton_{{ $i }}">Change Photo</button>
                                                            <div class="cross-container d-flex">
                                                                @if(isset($data->$imageName) && $data->$imageName !== '')
                                                                    <img src="{{ asset(uploadsDir('working-process') . $data->$imageName) }}" alt="Step Picture Preview" class="d-inline-flex rounded-lg" height="80" width="80" id="preview_{{ $i }}">
                                                                @else
                                                                    <img src="{{ asset('assets/images/placeholder-image.png') }}" alt="Placeholder Picture Preview" class="preview d-inline-flex rounded-lg" height="80" width="80" id="preview_{{ $i }}">
                                                                @endif
                                                                <button type="button" id="clearImageButton_{{ $i }}" class="d-flex align-items-start p-0 border-0 bg-transparent">
                                                                    <img class="rounded-sm" src="{{ asset('assets/admin/images/cross-arrow-blue.svg') }}" width="13" height="13">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group mb-1">
                                                            <label>Title</label>
                                                            <input type="text" name="title_{{ $i }}" placeholder="Add Title" class="title-holder form-control" value="{{ $data->$titleName ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group mb-2">
                                                            <label for="description">Description</label>
                                                            <textarea class="description-holder form-control" name="description_{{ $i }}" placeholder="Add Description" rows="4">{{ $data->$descriptionName ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endfor
                                @endif
                                </div>

                                </div>
                                <div class="col-md-12 pl-0 pr-0">
                                    <div class="col-sm-6 pl-0 pr-0 d-flex align-items-center justify-content-between">
                                        {{-- <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light remove-step" disabled="diabled">Remove Step</button> --}}
                                        <button class="add-another-step btn btn-primary mr-1 mb-1 waves-effect waves-light">Add  Step</button>
                                    </div>
                                    {{--  <div class="col-sm-6 pl-0 pr-0 d-flex align-items-center justify-content-between">
                                        <button type="submit" class="mt-3 btn btn-primary mr-1 mb-1 waves-effect waves-light">Add Working Process</button>
                                    </div> --}}
                                    <div class="col-md-12 pl-0">
                                        <button type="submit" class="mt-3 btn btn-primary mr-1 mb-1 waves-effect waves-light">Update Working Process</button>
                                    </div>
                                </div>
                            </fieldset>
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
        if($('.steps-wrapper .step').length <= 1) {
            $('.remove-step').attr('disabled', true);
        } else {
            $('.remove-step').attr('disabled', false);
        }
        $(document).on('click', '.add-another-step', function(e){
            e.preventDefault();
            $('.cloning-step').clone().appendTo('#WorkingProcessCreateForm .steps-wrapper .col-12');
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
            $('.steps-wrapper .cloning-step .image-holder').attr('id',  'file_' + stepCounter);
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
        });


        $("[id^='clearImageButton_']").click(function() {
            var num = this.id.match(/\d+/)[0];
            $("#file_" + num).val("");
            $("#preview_" + num).attr("src", "");
            $(this).closest('.cross-container').hide();
            $(this).closest('.cross-container').removeClass('d-flex');
            // $("#image_" + num).val('');
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

        // $('#file').on('change', function(e){
        //     var file = e.target.files[0];
        //     var reader = new FileReader();
        //     reader.onload = function(e){
        //         $('.cross-container').show();
        //         $('.cross-container').addClass('d-flex');
        //         $('#preview').attr('src', e.target.result);
        //     }
        //     reader.readAsDataURL(file);
        // });

        // $('.file').on('change', function(e) {
        //     var input = $(this);
        //     if (e.target.files && e.target.files[0]) {
        //         var file = e.target.files[0];
        //         var reader = new FileReader();
        //         reader.onload = function(event) {
        //             input.parent().parent().find('.cross-container').addClass('d-flex');
        //             input.parent().parent().find('.preview').attr('src', event.target.result);
        //         }
        //         reader.readAsDataURL(file);
        //     }
        // });

        $("[id^='file']").on('change', function(e) {
            var input = $(this);
            var num = this.id.match(/\d+/)[0];
            if (e.target.files && e.target.files[0]) {
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function(event) {
                    input.closest('.step').find('.cross-container').addClass('d-flex');
                    $("#preview_" + num).attr('src', event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        $(function() {
            $("#sortable").sortable({
                cursor: "move",
                update: function(event, ui) {
                    $('.steps-wrapper .col-12 .step').each(function(index) {
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


    });

    
</script>
@endsection
