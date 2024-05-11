@extends('admin.layouts.app')

@section('content')
<section id="number-tabs">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Site Settings</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" id="site-setting" action="{{ route('admin.site-settings.update', $records->id) }}" class="number-tab-steps wizard-circle" enctype="multipart/form-data">
                            <input type="hidden" id="placeholder_image" name="placeholder_image" value="{{ asset('assets/images/preview-placeholder.png') }}">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- container to show the Main Logo -->
                                        <div class="cross-container d-flex mb-1 mt-3">
                                            @if ($records->main_logo != '' && file_exists(uploadsDir('site-settings') . $records->main_logo))
                                                <img src="{{ asset(uploadsDir('site-settings') . $records->main_logo) }}" alt="Background Picture Preview" class="preview d-inline-flex rounded-lg border p-1" height="80" width="200">
                                            @else
                                                <img src="{{ asset('assets/images/preview-placeholder.png') }}" alt="Background Picture Preview" class="d-inline-flex rounded-lg preview border p-1" height="80" width="200">
                                            @endif
                                            <button type="button" class="clearImageButton d-flex align-items-start p-0 border-0 bg-transparent">
                                                <img class="rounded-sm" src="{{ asset('assets/admin/images/cross-arrow-blue.svg') }}" width="13" height="13">
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <label for="jobtitle">Main Logo</label>
                                            <input type="file" name="main_logo" class="file form-control">
                                            <input type="hidden" name="previous_main_logo" value="{{ $records->main_logo }}" />
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- container to show the Sticky Logo -->
                                        <div class="cross-container d-flex mb-1 mt-3">
                                            @if ($records->sticky_logo != '' && file_exists(uploadsDir('site-settings') . $records->sticky_logo))
                                                <img src="{{ asset(uploadsDir('site-settings') . $records->sticky_logo) }}" alt="Background Picture Preview" class="preview d-inline-flex rounded-lg border p-1" height="80" width="200">
                                            @else
                                                <img src="{{ asset('assets/images/preview-placeholder.png') }}" alt="Background Picture Preview" class="preview d-inline-flex rounded-lg border p-1" height="80" width="200">
                                            @endif
                                            <button type="button" class="clearImageButton d-flex align-items-start p-0 border-0 bg-transparent">
                                                <img class="rounded-sm" src="{{ asset('assets/admin/images/cross-arrow-blue.svg') }}" width="13" height="13">
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <label for="jobtitle">Sticky Logo</label>
                                            <input type="file" name="sticky_logo" class="file form-control">
                                            <input type="hidden" name="previous_sticky_logo" value="{{ $records->sticky_logo }}" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="site_title">Site Title *</label>
                                            <input type="text" required name="site_title" maxlength="190" value="{{ old('site_title', $records->site_title) }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_email">Contact Email *</label>
                                            <input type="email" required name="contact_email" maxlength="190" value="{{ old('contact_email', $records->contact_email) }}"  class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <!-- Pakistani Address + Phone -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_phone">Contact Number (Pakistan)</label>
                                            <input type="number" name="pakistan_contact_number" maxlength="190" value="{{ old('pakistan_contact_number', $records->pakistan_contact_number) }}"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Address (Pakistan)</label>
                                            <input type="text" name="pakistan_address" maxlength="190" value="{{ old('pakistan_address', $records->pakistan_address) }}"  class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <!-- London Address + Phone -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_phone">Contact Number (London)</label>
                                            <input type="number" name="london_contact_number" maxlength="190" value="{{ old('london_contact_number', $records->london_contact_number) }}"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Address (London)</label>
                                            <input type="text" name="london_address" maxlength="190" value="{{ old('london_address', $records->london_address) }}"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="facebook">Facebook URL</label>
                                            <input type="text" name="facebook" maxlength="190" value="{{ old('facebook', $records->facebook) }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="twitter">Twitter URL</label>
                                            <input type="text" name="twitter" maxlength="190" value="{{ old('twitter', $records->twitter) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="linkedin">linkedin URL</label>
                                            <input type="text" name="linkedin" maxlength="190" value="{{ old('linkedin', $records->linkedin) }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="google">google URL</label>
                                            <input type="text" name="google" maxlength="190" value="{{ old('google', $records->google) }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <!-- <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch custom-switch-success mr-2">
                                                <span class="mr-2">Show Privacy Policy</span>
                                                <input type="checkbox" class="custom-control-input home_page_checkbox" id="privacyPolicy" name="show_privacy_policy" value="1" {{ $records->show_privacy_policy == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="privacyPolicy"></label>
                                            </div>
                                        </div>
                                    </div> -->
                                    

                                    {{-- <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch custom-switch-success mr-2">
                                                <span class="mr-2">Show Privacy Policy</span>
                                                <input type="checkbox" class="custom-control-input home_page_checkbox" id="privacyPolicy" name="show_privacy_policy" value="1" {{ $records->show_privacy_policy == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="privacyPolicy"></label>
                                            </div>
                                        </div>
                                        <div id="privacyPolicyTextArea" class=" mt-2" style="display: none;">
                                            <textarea class="form-control editor" id="privacypolicyeditor" name="privacy_policy_content" rows="5">{{ $records->privacy_policy_content }}</textarea>
                                        </div>
                                    </div> --}}



                                    {{-- <div class="col-sm-6 mt-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch custom-switch-success mr-2">
                                                <span class="mr-2">Show Terms & Condition</span>
                                                <input type="checkbox" class="custom-control-input home_page_checkbox" id="termsAndCondition" name="show_terms_and_condition" value="1" {{ $records->show_terms_and_condition == 1 ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="termsAndCondition"></label>
                                            </div>
                                        </div>
                                        <div id="termsConditionsTextArea" class=" mt-2" style="display: none;">
                                            <textarea class="form-control editor" id="termsAndConditionEditor" name="terms_and_condition_content" rows="5">{{ $records->terms_and_condition_content }}</textarea>
                                        </div>
                                    </div> --}}
                                </div>
                            </fieldset>
                            {{-- <fieldset>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="copyright">Copyright Line</label>
                                            <textarea name="copyright" maxlength="65000" rows="5" class="form-control">{{ old('footer_sentence', $records->copyright) }}</textarea>
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
        $(".clearImageButton").click(function() {
            $(this).parent().find(".file").val("");
            $(this).parent().find(".preview").attr("src", $('#placeholder_image').val());
        });
        $('.file').on('change', function(e) {
            var input = $(this);
            if (e.target.files && e.target.files[0]) {
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function(event) {
                    input.parent().parent().find('.cross-container').addClass('d-flex');
                    input.parent().parent().find('.preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        // $('#privacyPolicy').change(function() {
        //     if ($(this).is(':checked')) {
        //         $('#privacyPolicyTextArea').show();
        //     } else {
        //         $('#privacyPolicyTextArea').hide();
        //     }
        // });

        // / Check initial state
        if ($('#privacyPolicy').is(':checked')) {
            $('#privacyPolicyTextArea').show();
        } else {
            $('#privacyPolicyTextArea').hide();
        }

        // Attach change event handler
        $('#privacyPolicy').change(function() {
            if ($(this).is(':checked')) {
                $('#privacyPolicyTextArea').show();
            } else {
                $('#privacyPolicyTextArea').hide();
            }
        });
        // Check initial state for terms and conditions
        if ($('#termsAndCondition').is(':checked')) {
            $('#termsConditionsTextArea').show();
        } else {
            $('#termsConditionsTextArea').hide();
        }

        // Attach change event handler for terms and conditions
        $('#termsAndCondition').change(function() {
            if ($(this).is(':checked')) {
                $('#termsConditionsTextArea').show();
            } else {
                $('#termsConditionsTextArea').hide();
            }
        });


        $.validator.addMethod("imageFileType", function(value, element) {
            // Get the file extension
            var extension = value.split('.').pop().toLowerCase();
            // Check if the extension is one of the allowed image types
            return ['jpg', 'jpeg', 'png', 'gif'].indexOf(extension) !== -1;
        }, "Please select a valid image file (jpg, jpeg, png, gif)");

        $('#site-setting').validate({
            rules: {
                site_title: {
                    required: true,
                },
                contact_email: {
                    required: true,
                    email:true,
                },
                pakistan_contact_number: {
                    required: true,
                },
                pakistan_address: {
                    required: true,
                },
                pakistan_contact_number: {
                    required: true,
                },
                london_contact_number: {
                    required: true,
                },
                london_address: {
                    required: true,
                },
                facebook: {
                    required: true,
                },
                linkedin: {
                    required: true,
                },
                twitter: {
                    required: true,
                },
                google: {
                    required: true,
                },
                image: {
                    required: true,
                    imageFileType: true
                },
            },
            messages: {
                site_title: {
                    required: "Please enter your site title",
                },
                contact_email: {
                    required: "Please enter your contact email",
                    email: "Please enter a valid email address",

                },
                pakistan_contact_number: {
                    required: "Please enter your pakistan contact number",
                },
                pakistan_address: {
                    required: "Please enter your pakistan address",
                },
                london_contact_number: {
                    required: "Please enter your london contact number",
                },
                london_address: {
                    required: "Please enter your london address",
                },
                facebook: {
                    required: "Please enter your facebook url",
                },
                linkedin: {
                    required: "Please enter your linkedin url ",
                },
                twitter: {
                    required: "Please enter your twitter url",
                },
                google: {
                    required: "Please enter your google url",
                },
                image: {
                    required: "Please select profile image",

                },
            },
        });

    });
    
    </script>
@endsection