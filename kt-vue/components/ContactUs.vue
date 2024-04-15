<template>
    <section class="">
      <div class="">
          <div class="lg:flex lg:flex-row flex-col">
              <div class="lg:pt-0 pt-10 lg:w-[50%] md:px-[80px] contact-sett lg:h-screen flex flex-col justify-center">
                  <div class="absolute top-2 lg:pt-4 pt-6">
                      <NuxtLink to="/" class="flex w-fit">
                          <img src="~/assets/images/ktech-black-logo.svg" alt="" id="contact-logo">
                      </NuxtLink>
                  </div>
                  <div class="text-center mt-16">
                      <h2 class="text-f-30 font-fw-700 text-[#2E2E2E] sm:leading-lh-[45px] leading-[35px]">Let's start a project together</h2>
                      <p class="text-ninth-color-var font-fw-400 text-f-18 leading-lh-normal sm:pb-[10px] sm:pt-[10px] sm:py-0 py-5">We make all
                          your dreams come true in a successful project.</p>
                  </div>
                  <div class="flex justify-end items-end">
                      <img src="~/assets/images/email-icon.svg" alt="">
                      <a class="contact-email" href="mailto:someone@example.com">
                          <p
                              class="ps-1 text-ninth-color-var mt-4 underline  font-fw-400 text-f-18 leading-lh-normal">
                              info@kerneltech.net</p>
                      </a>
                  </div>
                    <form id="contact_form">
                      <div>
                          <input
                              v-model="formData.name" class="contact-input appearance-none rounded-first-radius-var w-full py-3 px-3 text-fouth-color-var leading-tight mt-4"
                              id="name" type="text" placeholder="Name:" required name="name">
                          <input
                              v-model="formData.email" class="contact-input appearance-none rounded-first-radius-var w-full py-3 px-3 text-fouth-color-var leading-tight mt-4"
                              id="email" type="email" placeholder="Email:" required name="email">
                          <input
                              v-model="formData.company" class="contact-input appearance-none rounded-first-radius-var w-full py-3 px-3 text-fouth-color-var leading-tight mt-4" 
                              id="company" type="text" placeholder="Company:" required name="company">
                          <div class="mt-4">
                              <textarea v-model="formData.message" id="message" rows="6"
                                  class="contact-input block p-2.5 w-full text-sm text-fourth-color-var rounded-first-radius-var modal-input focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Message" name="message"></textarea>
                          </div>
                          <div>
                              <button
                                  class="bg-second-bg-color-var text-f-18 font-fw-600 leading-lh-normal rounded-first-radius-var w-[100%] text-white py-4 mt-4">Submit</button>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="lg:w-[50%] lg:pt-0 pt-12">
                  <div class="contact-bg text-white xl:pt-16 pt-10 xl:pb-16 pb-10 lg:h-full h-auto flex flex-col justify-center items-center">
                      <div
                          class="flex md:flex-row flex-col-reverse md:justify-start md:items-center items-start justify-start md:px-14 contact-sett pb-16 md:max-w-[50rem] md:w-auto w-full">
                          <div class="lg:pt-0 pt-3 md:w-1/2 pe-4">
                              <h1 class="xl:text-f-45 lg:text-f-35 md:text-f-35 text-f-35 font-fw-600 leading-lh-normal karachi">Karachi</h1>
                              <p class="pakistan-address lg:text-f-24 md:text-f-18 text-f-18 font-fw-400 leading-lh-normal pt-4 w-fit">18/2,
                                  Nazimabad Block3<br class="lg:inline hidden">, Karachi, Sindh, Pakistan.</p>
                              <a href="tel:+92 313 2686223" class="pakistan-contact-number">
                                  <p class="lg:text-f-24 md:text-f-18 text-f-18 font-fw-400 leading-lh-normal pt-2 w-fit"> +92 313 2686223</p>
                              </a>
                          </div>
                          <div class="lg:w-1/2 w-[280px]">
                              <img src="~/assets/images/karachi-image.png" class="min-w-100 2xl:min-w-[334px]" alt="">
                          </div>
                      </div>
                      <div class="flex md:flex-row flex-col md:justify-center md:items-center items-start justify-start md:px-14 contact-sett md:max-w-[50rem] md:w-auto w-full">
                          <div class="lg:w-1/2 w-[280px]">
                              <img src="~/assets/images/london-img.png" alt="">
                          </div>
                          <div class="md:ps-6 md:pt-0 pt-3">
                              <h1 class="lg:text-f-45 text-f-35 font-fw-600 leading-lh-normal london">London</h1>
                              <p class="lg:text-f-24 text-f-18 font-fw-400 leading-lh-normal pt-4 london-address">29 Oldchurch Road,
                                  Romford, <br class="lg:inline hidden"> London RM7 0BG.</p>
                              <a href="tel:+44 7500 978602" class="london-contact-number">
                                  <p class="lg:text-f-24 text-f-18 font-fw-400 leading-lh-normal pt-2">+44 7500 978602</p>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</template>
<script>
import axios from 'axios';
export default {
    data() {
      return {
        formData: {
          name: '',
          email: '',
          company: '',
          message: ''
        },
        isFormValid: false
      };
    },
    methods: {
        async submitToServer() {
            try {
                const response = await axios.post(`${process.env.API_BASE_URL}api/submit-form`, this.formData);
                console.log(response.data.message);
                let successMessage = response.data.message + ' <i class="main-cross-icon fas fa-close"></i>';
                this.$toast.success(successMessage)
                this.formData = {
                    name: '',
                    email: '',
                    company: '',
                    message: ''
                };
            } catch (error) {
                let emailMessage = error.response.data.error.email ? error.response.data.error.email + ' <i class="main-cross-icon fas fa-close"></i>': null;
                let nameMessage = error.response.data.error.name ? error.response.data.error.name + ' <i class="main-cross-icon fas fa-close"></i>' : null;
                let companyMessage = error.response.data.error.company ? error.response.data.error.company + ' <i class="main-cross-icon fas fa-close"></i>' : null;
                
                if (emailMessage) {
                    this.$toast.error(emailMessage);
                }
                if (nameMessage) {
                    this.$toast.error(nameMessage);
                }
                if (companyMessage) {
                    this.$toast.error(companyMessage);
                }
                console.error('Error submitting form:', error);
            }
        }
    },
    mounted() {
        const self = this;
        $('#contact_form').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                company: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Please enter your name",
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address",
                },
                company: {
                    required: "Please enter your company name",
                },
            },
            errorElement: 'span',
            errorClass: 'error-message',
            highlight: function (element) {
                $(element).addClass('error');
            },
            unhighlight: function (element) {
                $(element).removeClass('error');
            },
            errorPlacement: function (error, element) {
                error.addClass('text-red-500');
                error.insertAfter(element);
            },
            submitHandler: function (form) {
                self.submitToServer();
            },
        });
    },
};
</script>