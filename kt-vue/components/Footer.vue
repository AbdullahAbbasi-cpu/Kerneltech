<template>
   <footer id="footer" class="pt-[64px] pb-[32px]">
      <div class="first-container-var">
         <div class="row flex justify-start px-4 xl:px-0">
            <div class="flex lg:justify-between w-full md:flex-row flex-col flex-wrap">
               <div class="lg:w-[36%] md:w-[50%]">
                  <h4 class="text-f-22 font-semibold leading-lh-26 text-second-color-var">About Us</h4>
                  <p class="text-f-16 font-normal leading-lh-28 lg:mt-[22px] mt-[12px] text-sixth-color-var">Kernel Tech is an award
                     winning custom app development <br class="xl:inline hidden"> agency helping SMEs with
                     product design, development <br class="xl:inline hidden"> and technological enhancements. Recruitment
                     process might be the trickiest things for any scratch.
                  </p>
                  <form @submit.prevent="submitForm" id="subscribe_form">
                     <div class="form-child-1 flex items-start mt-[12px] md:w-full w-[50%] sm:flex-row flex-col">
                        <div class="md:w-[42%] w-[100%]">
                           <input v-model="formData.email" type="email" id="footer-email"
                           class="footer-input w-100 py-[4px] bg-transparent border-second-border-color-var  text-f-16 font-normal leading-lh-19"
                           placeholder="Enter your Email:" name="email">
                        </div>
                        <button
                           class="bg-[#0097F4] md:ms-[-3px] md:w-[105px] sm:w-[200px] sm:mt-0 mt-3 text-white px-[18px] py-[9px] text-f-14 leading-lh-16 font-semibold">Subscribe</button>
                     </div>
                  </form>
               </div>
               <div class="md:mt-0 mt-9 md:relative lg:w-auto md:w-[40%] lg:left-0 md:left-[86px]">
                  <h4 class="text-f-22 font-semibold leading-lh-26 text-second-color-var">Useful Links</h4>
                  <div class="flex flex-col lg:mt-[22px] mt-[14px]">
                     <NuxtLink to="/"
                        class="text-f-16 font-normal leading-lh-19 text-sixth-color-var hover:text-seventh-color-var">Home</NuxtLink>
                     <NuxtLink to="/web-application-design"
                        class="text-f-16 font-normal leading-lh-19 mt-[14px] text-sixth-color-var hover:text-seventh-color-var">Services</NuxtLink>
                     <NuxtLink to="/blog"
                        class="text-f-16 font-normal leading-lh-19 mt-[14px] text-sixth-color-var hover:text-seventh-color-var">Blog</NuxtLink>
                     <NuxtLink to="/about"
                        class="text-f-16 font-normal leading-lh-19 mt-[14px] text-sixth-color-var hover:text-seventh-color-var">About</NuxtLink>
                     <NuxtLink to="/contact"
                        class="text-f-16 font-normal leading-lh-19 mt-[14px] text-sixth-color-var hover:text-seventh-color-var">Contact</NuxtLink>
                  </div>
               </div>
               <div class="lg:w-[35%] lg:ps-1 ps-0 lg:mt-0 md:mt-12 mt-9" id="contact-information">
                  <h4 class="text-f-22 font-semibold leading-lh-26 text-second-color-var">Contact Information</h4>
                  <h5 class="text-f-18 font-semibold leading-lh-21 lg:mt-[22px] mt-[14px] text-[#4b4b4b]">Pakistan</h5>
                  <p v-if="siteSettings.pakistan_address !== undefined && siteSettings.pakistan_address !== ''" class="pakistan-address text-f-16 font-normal leading-lh-19 mt-1 mb-0 text-sixth-color-var">
                     {{ siteSettings.pakistan_address }}
                  </p>
                  <p v-else class="pakistan-address text-f-16 font-normal leading-lh-19 mt-1 mb-0 text-sixth-color-var">
                     Nazimabad no 3, Karachi, Pakistan
                  </p>
                  <a v-if="siteSettings.pakistan_contact_number !== undefined && siteSettings.pakistan_contact_number !== ''" :href="`tel:${siteSettings.pakistan_contact_number}`" class="w-fit flex pakistan-contact-number">
                     <p class="text-f-16 font-normal leading-lh-19 mt-1 text-sixth-color-var hover:text-seventh-color-var">
                        {{ siteSettings.pakistan_contact_number }}
                     </p>
                  </a>
                  <a v-else href="tel:+44 7500 978602" class="w-fit flex pakistan-contact-number">
                     <p class="text-f-16 font-normal leading-lh-19 mt-1 text-sixth-color-var hover:text-seventh-color-var">
                        +92 313 2686223
                     </p>
                  </a>
                  <h5 class="text-f-18 font-semibold leading-lh-21 mt-3 text-[#4b4b4b]">United Kingdom</h5>
                  <p v-if="siteSettings.london_address !== undefined && siteSettings.london_address !== ''" class="london-address text-f-16 font-normal leading-lh-19 mt-1 mb-0 text-sixth-color-var">
                     {{ siteSettings.london_address }}
                  </p>
                  <p v-else class="london-address text-f-16 font-normal leading-lh-19 mt-1 mb-0 text-sixth-color-var">
                     29 Oldchurch Road, Romford, London RM7 0BG
                  </p>
                  <a v-if="siteSettings.london_contact_number !== undefined && siteSettings.london_contact_number !== ''" :href="`tel:${siteSettings.london_contact_number}`" class="w-fit flex pakistan-contact-number">
                     <p class="text-f-16 font-normal leading-lh-19 mt-1 text-sixth-color-var hover:text-seventh-color-var">
                        {{ siteSettings.london_contact_number }}
                     </p>
                  </a>
                  <a v-else href="tel:+44 7500 978602" class="w-fit flex london-contact-number">
                     <p class="text-f-16 font-normal leading-lh-19 mt-1 text-sixth-color-var hover:text-seventh-color-var">
                        +44 7500 978602
                     </p>
                  </a>
               </div>
            </div>
         </div>
         <div class="row lg:mt-[74px] mt-[60px] px-4 xl:px-0">
            <div class="flex lg:justify-end justify-around md:flex-row flex-col-reverse md:text-left  md:items-start items-center">
               <div class="md:w-[25%] lg:inline hidden"></div>
               <div :class="{
                  'copyright-text': siteSettings.show_privacy_policy !== 0 && siteSettings.show_terms_and_condition !== 0, 'lg:w-[60%] md:w-[75%] flex md:flex-row flex-col-reverse items-center md:justify-center justify-start': true }">
                  <p class="xl:text-f-16 md:text-f-14 text-f-14 font-normal leading-lh-19 pe-[3px] md:text-left text-center text-sixth-color-var">
                     <span v-if="siteSettings.site_title !== undefined && siteSettings.site_title !== ''">
                        Copyright © <span id="year">2024</span> {{ siteSettings.site_title }} All Rights Reserved.
                     </span>
                     <span v-else>
                        Copyright © <span id="year">2024</span> Kernel Tech All Rights Reserved.
                     </span>
                  </p>
                  <div class="md:mb-0 mb-2">

                     <!-- conditional statement for privacy policy -->
                     <NuxtLink to="/privacy-policy"
                        class="md:border-l-[1px] pl-[5px] md:border-l-[#AAA] h-[12px] pe-[3px] xl:text-f-16 md:text-f-14 text-f-14 font-normal leading-lh-19 md:text-left text-center text-sixth-color-var hover:text-seventh-color-var">Privacy
                     Policy</NuxtLink>
                     <!-- <NuxtLink v-if="siteSettings.show_privacy_policy !== 0" to="/privacy-policy"
                        class="md:border-l-[1px] pl-[5px] md:border-l-[#AAA] h-[12px] pe-[3px] xl:text-f-16 md:text-f-14 text-f-14 font-normal leading-lh-19 md:text-left text-center text-sixth-color-var hover:text-seventh-color-var">Privacy
                     Policy</NuxtLink>
                     <NuxtLink v-else to="/privacy-policy"
                        class="hidden md:border-l-[1px] pl-[5px] md:border-l-[#AAA] h-[12px] pe-[3px] xl:text-f-16 md:text-f-14 text-f-14 font-normal leading-lh-19 md:text-left text-center text-sixth-color-var hover:text-seventh-color-var">Privacy
                     Policy</NuxtLink> -->

                     <!-- conditional statement for terms and condition -->
                     <NuxtLink to="/terms-and-condition"
                        class="border-l-[1px] pl-[5px] border-l-[#AAA] h-[12px] xl:text-f-16 md:text-f-14 text-f-14 font-normal  leading-lh-19 md:text-left text-center text-sixth-color-var hover:text-seventh-color-var">Terms
                     & Condition</NuxtLink>
                     <!-- <NuxtLink v-if="siteSettings.show_terms_and_condition !== 0" to="/terms-and-condition"
                        class="border-l-[1px] pl-[5px] border-l-[#AAA] h-[12px] xl:text-f-16 md:text-f-14 text-f-14 font-normal  leading-lh-19 md:text-left text-center text-sixth-color-var hover:text-seventh-color-var">Terms
                     & Condition</NuxtLink>
                     <NuxtLink v-else to="/terms-and-condition"
                        class="hidden border-l-[1px] pl-[5px] border-l-[#AAA] h-[12px] xl:text-f-16 md:text-f-14 text-f-14 font-normal leading-lh-19 md:text-left text-center text-sixth-color-var hover:text-seventh-color-var">Terms
                     & Condition</NuxtLink> -->
                  </div>
               </div>
               <div class="lg:w-[25%] md:w-[30%] flex md:flex-row flex-col items-center gap-2 justify-end mt-0 md:mb-0 mb-3">
                  <p class="text-f-14 font-medium leading-lh-16 text-sixth-color-var follow-us-on">Follow us on</p>
                  <div class="flex items-center gap-1">

                     <!-- for facebook social link -->
                     <a v-if="siteSettings.facebook !== undefined && siteSettings.facebook !== ''" :href="`${siteSettings.facebook}`" class="mx-[1px]">
                        <img src="~assets/images/facebook-icon.svg" alt=""/>
                     </a>
                     <a v-else href="javascript:void(0)" class="mx-[1px]">
                        <img src="~assets/images/facebook-icon.svg" alt=""/>
                     </a>

                     <!-- for twitter social link -->
                     <a v-if="siteSettings.twitter !== undefined && siteSettings.twitter !== ''" :href="`${siteSettings.twitter}`" class="mx-[1px]">
                        <img src="~assets/images/twitter-icon.svg" alt=""/>
                     </a>
                     <a v-else href="javascript:void(0)" class="mx-[1px]">
                        <img src="~assets/images/twitter-icon.svg" alt=""/>
                     </a>

                     <!-- for linkedin social link -->
                     <a v-if="siteSettings.linkedin !== undefined && siteSettings.linkedin !== ''" :href="`${siteSettings.linkedin}`" class="mx-[1px]">
                        <img src="~assets/images/linkedin-icon.svg" alt=""/>
                     </a>
                     <a v-else href="javascript:void(0)" class="mx-[1px]">
                        <img src="~assets/images/linkedin-icon.svg" alt=""/>
                     </a>

                     <!-- for google social link -->
                     <a v-if="siteSettings.google !== undefined && siteSettings.google !== ''" :href="`${siteSettings.google}`"  class="mx-[1px]">
                        <img src="~assets/images/gmail-icon.svg" alt=""/>
                     </a>
                     <a v-else href="javascript:void(0)" class="mx-[1px]">
                        <img src="~assets/images/gmail-icon.svg" alt=""/>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
</template>

<script>
import axios from 'axios';
export default {
   data() {
      return {
         formData: {
            email: '',
         },
         siteSettings: [],
         isLoading: true,
      };
   },
   mounted() {
      this.siteSettingsData();
      this.$router.afterEach((to) => {
         this.formData.email = '';
          this.siteSettingsData();
      });
     $('#subscribe_form').validate({
         rules: {
             email: {
                 required: true,
                 email: true,
             },
         },
         messages: {
             email: {
                 required: "Please enter your email address",
                 email: "Please enter a valid email address",
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
             console.log('Form Submitted');
         },
     });
   },
   methods: { 
      async siteSettingsData() {
         this.isloading = true;
        try {
          const response = await axios.post(`${process.env.API_BASE_URL}api/site-settings-data`);
          this.siteSettings = response.data;
          if(this.siteSettings !== undefined && this.siteSettings !== null && this.siteSettings !== '')
          {
            let year = new Date().getFullYear();
            $('#year').html(year);

            let mainLogo = this.siteSettings.main_logo_url;
            let stickyLogo = this.siteSettings.sticky_logo_url;
            if(mainLogo) { $('#logoImage').attr('src', mainLogo); }
            if(stickyLogo) { $('#blackLogoImage').attr('src', stickyLogo); }
          }
        } catch {
            console.log('inside the catch condition');
        } finally {
            this.isloading = false;
        }
      },
      async submitForm() {
         try {
            console.log('inside the submit form try condition');
            const response = await axios.post(`${process.env.API_BASE_URL}api/subscribe-form`, this.formData);
            let successMessage = response.data.message + ' <i class="main-cross-icon fas fa-close"></i>';
            this.$toast.success(successMessage)
            this.formData = {
               name: '',
               email: '',
               phone: '',
               message: ''
            };
         } catch (error) {
            let emailMessage = error.response.data.error.email ? error.response.data.error.email + ' <i class="main-cross-icon fas fa-close"></i>': null;
            if (emailMessage) {
               this.$toast.error(emailMessage);
            }
            console.error('Error submitting form:', error);
         }
      }
   },
};
</script>
