
<template>
  <div>
    <div class="xl:px-0 px-4">
      <!-- modal -->
      <Modal ref="modal"></Modal>
      <!-- modal end -->
      <Navbar/>
      <div class="bg-404 text-center mx-auto flex flex-col items-center justify-end pt-[60px] md:mb-[164px] mb-[120px] md:mt-[60px] mt-[120px]">
          <h2 class="sm:text-f-40 text-f-30 text-[#202020] leading-lh-normal font-fw-700">Sorry We Can’t Find That Page!</h2>
          <div class="">
          <NuxtLink to="/">
              <button class="bg-second-bg-color-var modal-open font-[600] px-[34px] py-[13px] sm:mt-[85px] sm:mb-[-14px] mt-14 text-f-18  text-white">Get back to home</button>
          </NuxtLink>
          </div>
      </div>
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
import Navbar from '@/components/Navbar';
import Footer from '@/components/Footer';
export default {
  mounted() {
    this.initScrollHandler();
    this.responsiveNavbar();
  },
  methods : {
    openModal() {
      this.$refs.modal.openModal();
    },
    initScrollHandler() {
      $('#blackLogoImage').removeClass('hidden')
      $('#logoImage').addClass('hidden')
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
            $('#navbar-default #multiLevelDropdownButton').addClass('text-[#262626]')
            $('#navbar-default #multiLevelDropdownButton').removeClass('text-[#0a0a0a]')
            $('#navbar-default .main-dropdown').removeClass('text-[#0a0a0a]');
            $('#navbar-default .main-dropdown').addClass('text-[#262626]')
          } else {
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
    }
  },
  head() {
    return {
      title: '404 Page | Kerneltech',
    };
  },
}
</script>
<style scoped>
</style>
