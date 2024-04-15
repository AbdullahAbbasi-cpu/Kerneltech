
<template>
    <div>
      <!-- xl:px-0 px-4 -->
      <transition name="fade" mode="out">
        <div v-if="isLoading" key="loader" class="loading-wrapper">
          <div class="loading"></div>
        </div>  
      </transition>
      <!-- modal -->
      <Modal ref="modal"></Modal>
      <!-- modal end -->
      <button id="open-btn">get a Quote</button>
      <div id="sidebar">
          <div class="main-wrapper">
            <div class="blue-slip">
            <a href="javscript:void(0);" onclick="closeSidebar()" id="close-btn">&#10005;</a>
          </div>
          <!-- main form content -->
          <div action="" id="sidebar-form-wrapper">
            <p>Get a Free Quote</p>
            <form action="" id="sidebar_form">
              <div class="flex items-center justify-center flex-col">
                <input type="text" v-model="formData.name" name="sidebarName" id="sidebarName" class="max-h-[37px] custom-form-fields border-2 border-[#d6d6d6] rounded-[3px] font-normal text-[15px] pl-[12px] bg-[#ffffff] text-[#9e9e9e] pt-[7px] pb-[7px] w-full" placeholder="Name">

                <input type="email" v-model="formData.email" name="sidebarEmail" id="sidebarEmail" class="max-h-[37px] custom-form-fields border-2 border-[#d6d6d6] rounded-[3px] font-normal text-[15px] pl-[12px] bg-[#ffffff] text-[#9e9e9e] mt-[10px] pt-[7px] pb-[7px] w-full" placeholder="Email">

                <input type="text" name="sidebarPhone" v-model="formData.phone" id="sidebarPhone" class="max-h-[37px] custom-form-fields border-2 border-[#d6d6d6] rounded-[3px] font-normal text-[15px] pl-[12px] bg-[#ffffff] text-[#9e9e9e] mt-[10px] pt-[7px] pb-[7px] w-full" placeholder="Phone">

                <textarea name="sidebarMessage" v-model="formData.message" id="sidebarMessage" rows="6" class="mb-[10px] custom-form-fields border-2 border-[#d6d6d6] rounded-[3px] font-normal text-[15px] pl-[12px] bg-[#ffffff] text-[#9e9e9e] mt-[10px] pt-[7px] pb-[7px] w-full min-h-[140px]" placeholder="Message"></textarea>    
                <input type="submit" value="Submit" class="cursor-pointer submit-button mb-2 font-semibold tracking-wide py-2 px-4 border-none w-full text-white bg-blue-500 rounded-[3px] font-syne text-[15px] pl-3">
              </div>          
            </form>
          </div>
        </div>
      </div>
      <div>
        <div class="xl:px-0 px-4">
          <Navbar/>
        </div>
        <Nuxt/>
      </div>
      <!-- newsletter starts from here -->
      <section id="ready-to-get-started" class="py-[53px]">
        <div class="first-container-var">
            <div class="row flex md:items-center md:justify-between px-4 xl:px-0 md:flex-row flex-col">
                <div class="md:w-[50%]">
                <h2 class="text-white md:text-f-35 text-f-30 font-fw-700 leading-lh-normal ">Ready to get started? <br> Talk
                    to us today </h2>
                </div>
                <div class="md:w-[50%] md:text-end md:mt-0 mt-10">
                <button
                    class="md:py-[15px] modal-open md:px-[30px] p-[14px] border-[2px] border-white text-white md:text-f-18 text-f-14 leading-lg-21 font-semibold hover:bg-white hover:text-[#0C7DD7] duration-300" @click="openModal">Let’s
                    Start Your Projects With Us</button>
                </div>
            </div>
        </div>
      </section>
      <!-- newsletter ends here -->
      <Footer/>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import Navbar from '@/components/Navbar';
  import Footer from '@/components/Footer';
  export default {
    data() {
      return {
        formData: {
          name: '',
          email: '',
          phone: '',
          message: ''
        },
        isFormValid: false,
        isLoading: true,
      };
    },
    mounted() {
      const self = this;
      // 'Get a Quote' Form Client-Side Validation
      $('#sidebar_form').validate({
          rules: {
              sidebarName: {
                  required: true,
              },
              sidebarEmail: {
                  required: true,
                  email: true,
              },
              sidebarPhone: {
                required: true,
                minlength:11,
                maxlength:11
              },
          },
          messages: {
              sidebarName: {
                  required: "Please enter your name",
              },
              sidebarEmail: {
                  required: "Please enter your email address",
                  email: "Please enter a valid email address",
              },
              sidebarPhone: {
                required: "Please enter your phone number",
              },
              message: {
                  required: "Please enter your message",
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
              error.addClass('w-full');
              error.addClass('text-start');
              error.addClass('text-[12px]');
              error.insertAfter(element);
          },
          submitHandler: function (form) {
              console.log('Form Submitted');
              self.submitToServer();
          },
      });

      this.initScrollHandler();
      this.responsiveNavbar();
      this.defaultStyling();
      this.$router.beforeEach((to, from, next) => {
        this.isLoading = true;
        next();
      });
      this.isLoading = false;
      // Toggling condition for 'Get a Quote' Side Modal Form
      function openSidebar() {
        $("#sidebar").css("right", "0px");
        $(this).hide();
      }
      function closeSidebar() {
        $("#sidebar").css("right", "-400px");
        $('#open-btn').show();
      }
      $(document).ready(function() {
        $("#sidebar").css("right", "-400px");
        $("#close-btn").click(closeSidebar);
        $("#open-btn").click(function() {
          $(this).hide();
          openSidebar();
          $(document).on('click', function(e) {
            if (!$(e.target).closest('#sidebar, #open-btn').length) {
              closeSidebar();
            }
          });
        });
      });
    },
    methods : {
      openModal() {
        this.$refs.modal.openModal();
      },
      async submitToServer() {
        try {
          const response = await axios.post(`${process.env.API_BASE_URL}api/free-quote-form`, this.formData);
          console.log(response.data.message);
          let successMessage = response.data.message + ' <i class="main-cross-icon fas fa-close"></i>';
          this.$toast.success(successMessage);
          this.formData = {
            name: '',
            email: '',
            phone: '',
            message: ''
          };
        } catch (error) {
          let emailMessage = error.response.data.error.email ? error.response.data.error.email + ' <i class="main-cross-icon fas fa-close"></i>': null;
          let nameMessage = error.response.data.error.name ? error.response.data.error.name + ' <i class="main-cross-icon fas fa-close"></i>' : null;
          let phoneMessage = error.response.data.error.phone ? error.response.data.error.phone + ' <i class="main-cross-icon fas fa-close"></i>' : null;
          
          if (emailMessage) {
              this.$toast.error(emailMessage);
          }
          if (nameMessage) {
              this.$toast.error(nameMessage);
          }
          if (phoneMessage) {
              this.$toast.error(phoneMessage);
          }
          console.error('Error submitting form:', error);
        }
      },
      defaultStyling(){
        setTimeout(() => {
            $('#navbar-default ul li a, .services-dropdown').removeClass('text-white');
        }, 100);
      },
      initScrollHandler() {
        $('#blackLogoImage').removeClass('hidden')
        $('#logoImage').addClass('hidden')
        $('a.main-dropdown').removeClass('text-white');
        $('#navbar-default ul li a').addClass('text-[#262626]');
        $('.services-dropdown').removeClass('text-first-color-var');
        $('.services-dropdown').addClass('text-[#262626]');
        if ($(window).width() > 768) {
          $(document).on('scroll', $(window), () => {
            if($(window).scrollTop() < 100) {
              $('nav.nav-fixed').css('top', parseInt('-' + $(window).scrollTop()));
              $('nav.nav-fixed').removeClass('top-0');
              $('#navbar-default ul li a').addClass('text-[#262626]');
              $('nav.nav-fixed').removeClass('fixed');
              $('.main-banner-wrapper').removeClass('navbar-scroll-handler');
              $('#logoImage').addClass('hidden');
              $('#blackLogoImage').removeClass('hidden');
              $('#navbar-default ul li a, .services-dropdown').removeClass('text-white');
              $('#navbar-default #multiLevelDropdownButton').addClass('text-[#262626]')
              $('#navbar-default #multiLevelDropdownButton').removeClass('text-[#0a0a0a]')
              $('#navbar-default .main-dropdown').removeClass('text-[#0a0a0a]');
              $('#navbar-default .main-dropdown').addClass('text-[#262626]')
              $('.blog-single-page-title').css('padding-top', '0px');
            } else {
                $('.blog-single-page-title').css('padding-top', '82px');
                $('#navbar-default .main-dropdown').removeClass('text-white');
                $('#navbar-default .main-dropdown').addClass('text-[#0a0a0a]');
                $('#logoImage').addClass('hidden');
                $('#blackLogoImage').removeClass('hidden');
                $('.services-dropdown').removeClass('text-white');
                $('.services-dropdown').removeClass('text-first-color-var');
                $('.services-dropdown').addClass('text-[#0a0a0a]');
                if (!$('nav.nav-fixed').hasClass('fixed')) {
                  console.log('inside the condition')
                  $('nav.nav-fixed').hide().fadeIn();
                  $('nav.nav-fixed').addClass('fixed');
                  $('.main-banner-wrapper').addClass('navbar-scroll-handler');
                  $('nav.nav-fixed').css('top', '0px');
                }
            }
          });
        } else {
            $('.services-dropdown').removeClass('text-white');
            $('.services-dropdown').removeClass('text-first-color-var');
            $('.services-dropdown').addClass('text-[#0a0a0a]');
        }
      },
      responsiveNavbar() {
        if ($(window).width() < 768) {
          $('#navbar-default .main-dropdown').removeClass('text-white');
            $('#navbar-default .main-dropdown').addClass('text-[#0a0a0a]');
            $('#logoImage').addClass('hidden');
            $('#blackLogoImage').removeClass('hidden');
            $('.services-dropdown').addClass('text-[#0a0a0a]');
            if (!$('nav.nav-fixed').hasClass('fixed')) {
              console.log('inside the condition')
              $('nav.nav-fixed').hide().fadeIn();
              $('nav.nav-fixed').addClass('fixed');
              $('.main-banner-wrapper').addClass('navbar-scroll-handler');
              $('nav.nav-fixed').css('top', '0px');
          }
        } 
      },
    },
    head() {
      return {
        title: '404 Page | Kerneltech',
      };
    },
    computed: {
      headerData() {
        const headerData = this.$store.getters.getHeaderData;
        return headerData;
      },
    },
  }
  </script>

  <style scoped>

  /* loader css */
  .loading-wrapper{position:fixed;top:0;right:0;z-index:1000;height:100vh!important;width:100vw!important;background:#000!important;padding:1rem;text-align:center;font-size:3rem;font-family:sans-serif;display:flex;flex-direction:column;align-items:center;justify-content:center}nav{display:none!important}.loading{display:inline-block;width:2.5rem;height:2.5rem;border:5px solid rgba(9,133,81,.705);border-radius:50%;border-top-color:#158876;animation:1s ease-in-out infinite spin}@keyframes spin{to{-webkit-transform:rotate(360deg)}}.fade-enter-active,.fade-leave-active{transition:opacity .5s}.fade-enter,.fade-leave-to{opacity:0}
  /* loader css ends here */

  /* get a quote form css starts from here */
  #open-btn,#sidebar{box-shadow:0 0 10px #d6d6d6;position:fixed;color:#fff}#open-btn{background:#0094f4!important;padding:14px 10px;writing-mode:vertical-rl;text-orientation:mixed;line-height:1.4;top:60vh;font-size:14px!important;text-transform:uppercase;right:0;left:auto;border-radius:5px 0 0 5px;text-align:center;transition:.3s;z-index:999999;cursor:pointer;min-width:30px;min-height:30px;display:flex;align-items:center;justify-content:center;letter-spacing:.5px!important}#sidebar div.blue-slip{background:#0094f4!important;width:100%!important;display:block!important;display:flex!important;align-items:center;justify-content:start!important;padding:6px 10px!important}#sidebar-form-wrapper p{text-align:center;font-size:17px!important;color:#4a4a4a;font-weight:600;letter-spacing:.3px!important;margin-top:-2px!important;margin-bottom:5px!important}#sidebar{height:auto;z-index:999999999999!important;min-width:290px;top:26vh;right:-400px;background-color:#fff;overflow-x:hidden;transition:.5s;border:0 solid red!important}#sidebar-form-wrapper{background-color:#fff;padding:20px 20px 16px!important}
  /* get a quote form css ends here */

  </style>
  