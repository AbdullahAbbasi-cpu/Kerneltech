<template>
  <div>
      <transition name="fade" mode="in-out">
          <div v-if="isLoading" key="loader" class="loading-wrapper">
            <div class="loading"></div>
          </div>
      </transition>
      <!-- modal -->
      <Modal ref="modal"></Modal>
      <!-- modal end -->
      <section class="main-background-holder h-auto px-4 xl:px-0" style="background-repeat:no-repeat !important; background-size:cover !important; background-position:center !important;">
        <input type="hidden" class="bg-image-holder" name="bg_image_holder" :value="getImageSource(this.$store.getters.getHeaderData.bgImage)">
          <Navbar/>
          <!-- Banner section starts from here -->
          <div class="first-container-var main-banner-wrapper flex h-[100%]">
            <div id="main-banner"
                class="lg: mt-[-156px] h-auto flex flex-col justify-center text-start lg:pt-[0px] lg:pb-[0px] pb-[80px] pt-[80px] text-first-color-var">
                <div class="banner-content-wrapper">
                  <h1 class="banner-heading md:text-f-40 text-f-30 font-bold leading-lh-normal sm:mt-0 mt-5">
                    {{ this.bannerTitle }}{{ uniqueParameter }}
                  </h1>
                  <div class="banner-description first-description md:text-f-18 text-f-16 leading-lh-28 font-fw-500 pt-[10px] max-w-[890px]">
                      <p>{{ this.bannerDescription }}</p>
                  </div>
                  <!-- <p class="banner-description md:text-f-18 text-f-16 leading-lh-28 font-fw-500 pt-[10px] max-w-[890px]">
                      {{ headerData.description1 }}
                  </p> -->
                  <div class="banner-button">
                      <button
                        class="bg-second-bg-color-var modal-open rounded-first-radius-var px-6 py-[17px] mt-5 text-f-14 font-fw-700" @click="openModal">Let’s Start Your Projects</button>
                  </div>
                </div>
            </div>
          </div>
      </section>
     <Nuxt />
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
  import Navbar from "@/components/Navbar";
  import Modal from "@/components/Modal";
  import Footer from "@/components/Footer";
  import { fetchAllArticles } from '@/services/apiService';
    export default {
      props: {
        uniqueParameter: {
          type: String,
        }
      },
      data() {
        return {
          bannerTitle: '',
          bannerDescription: '',
          isLoading: true,
        };
      },
      mounted() {
      this.$router.beforeEach((to, from, next) => {
        this.isLoading = true;
        next();
      });
      let currentURL = window.location.pathname;
      this.bannerData(currentURL);
      this.initScrollHandler();
      this.responsiveNavbar();
      this.navTrigger();
      this.termsContent(currentURL);
      this.privacyContent(currentURL);
      this.aboutContent(currentURL);
      this.blogContent(currentURL);
      this.$router.afterEach((to) => {
          this.bannerData(to.path)
          this.termsContent(to.path)
          this.privacyContent(to.path)
          this.aboutContent(to.path);
          this.blogContent(to.path);
      });
    },
    components: {
      Modal,
    },
    methods: {
      async blogContent(currentPath) 
      {
        if (currentPath == '/blog') {
          const allArticles = await fetchAllArticles();
          return { allArticles };
        }
      },
      async termsContent(currentPath) 
      {
        if (currentPath == '/terms-and-condition') {
          const response = await axios.post(`${process.env.API_BASE_URL}api/terms-data`, { pathname: currentPath });
          const responseData = response.data;  
          if (responseData.banner_title) {
              $('.banner-heading').html(responseData.banner_title);
          }
          if (responseData.banner_description) {
              $('.banner-description').html(responseData.banner_description);
          }
          if (responseData.image_path) {
              $('.main-background-holder').attr('style', 'background-image: url("' + responseData.image_path + '") !important;');
          }
          if (responseData.content) {
            $('.main-terms-content-holder').html(responseData.content);
          }
        } else {
          console.log('not terms and condition page');
        } 
      },
      async privacyContent(currentPath) 
      {
        if (currentPath == '/privacy-policy') {
          const response = await axios.post(`${process.env.API_BASE_URL}api/privacy-data`, { pathname: currentPath });
          const responseData = response.data;  
          if (responseData.banner_title) {
              $('.banner-heading').html(responseData.banner_title);
          }
          if (responseData.banner_description) {
              $('.banner-description').html(responseData.banner_description);
          }
          if (responseData.image_path) {
              $('.main-background-holder').attr('style', 'background-image: url("' + responseData.image_path + '") !important;');
          }
          if (responseData.content) {
            $('.main-privacy-content-holder').html(responseData.content);
          }
        } else {
          console.log('not terms and condition page');
        } 
      },
      async aboutContent(currentPath) 
      {
        if (currentPath == '/about') {
          const response = await axios.post(`${process.env.API_BASE_URL}api/about-data`, { pathname: currentPath });
          const responseData = response.data;  
          if (responseData.banner_title) {
              $('.banner-heading').html(responseData.banner_title);
          }
          if (responseData.banner_description) {
              $('.banner-description').html(responseData.banner_description);
          }
          if (responseData.image_path) {
              $('.main-background-holder').attr('style', 'background-image: url("' + responseData.image_path + '") !important;');
          }
          if (responseData.about_image_1) {
              $('.about-1').attr('src', responseData.about_image_1);
          }
          if (responseData.about_image_2) {
              $('.about-2').attr('src', responseData.about_image_2);
          }
          if (responseData.about_content_1) {
              $('.about-content-1').html(responseData.about_content_1);
          }
          if (responseData.about_content_2) {
              $('.about-content-2').html(responseData.about_content_2);
          }
        } else {
          console.log('not terms and condition page');
        } 
      },
      async blogContent(currentPath) 
      {
        if (currentPath == '/blog') {
          const response = await axios.post(`${process.env.API_BASE_URL}api/blog-data`, { pathname: currentPath });
          const responseData = response.data;  
          if (responseData.banner_title) {
              $('.banner-heading').html(responseData.banner_title);
          }
          if (responseData.banner_description) {
              $('.banner-description').html(responseData.banner_description);
          }
          if (responseData.image_path) {
              $('.main-background-holder').attr('style', 'background-image: url("' + responseData.image_path + '") !important;');
          }
          if (responseData.content) {
            $('.main-privacy-content-holder').html(responseData.content);
          }
        } else {
          // alert('you are not inside blog page');
        } 
      },
      async bannerData(currentPath) {
        this.isLoading = true;
        try {
          const response = await axios.post(`${process.env.API_BASE_URL}api/banner-data`, { pathname: currentPath });
          const responseData = response.data;
          let jsonData = '';
          if (window.location.pathname === '/') {
              jsonData = responseData;
          } else {
              const jsonString = responseData.substring(responseData.indexOf('{'));
              jsonData = JSON.parse(jsonString);
          }
          if (jsonData.bannerData.title) {
              $('.banner-heading').html(jsonData.bannerData.title);
          }
          if (jsonData.bannerData.description) {
              $('.banner-description').html(jsonData.bannerData.description);
          }
          if (jsonData.bannerData.banner_image_url) {
              $('.main-background-holder').attr('style', 'background-image: url("' + jsonData.bannerData.banner_image_url + '") !important;');
              $('.banner-description').html(jsonData.bannerData.description);
          }
        } catch (error) {
            console.error('Error Getting Banner Data:', error);
            $('.banner-heading').html(this.$store.getters.getHeaderData.title);
            $('.banner-description').html(this.$store.getters.getHeaderData.description);
            let imageHolder = $('.bg-image-holder').val();
            $('.main-background-holder').attr('style', `background-image: url('${imageHolder}'`);
            let currentURL = window.location.href;
            if(window.location.pathname == '/privacy-policy' || window.location.pathname == '/terms-and-condition' || window.location.pathname == '/about' || window.location.pathname == '/blog' || currentURL.indexOf('blog/category/') !== -1)
            {
              $('.banner-description').html('');
              $('.banner-description').append('<p></p>');
              $('.banner-description p').html(this.$store.getters.getHeaderData.description);
              $('.banner-description p').clone().appendTo('.banner-description');
              $('.banner-description p:nth-child(2)').html('Icing croissant croissant jelly gummi bears cotton candy jujubes apple pie caramels. Dragée soufflé bonbon powder. Sesame snaps sugar plum chupa chups tart wafer caramels toffee.')
            }
        } finally {
          $('#__layout').removeClass(function (index, css) {
            return (css.match (/\bis-\S+/g) || []).join(' ');
          });
          $('#__layout').addClass(this.$store.getters.getHeaderData.customClass);
          setTimeout(() => {
            this.isLoading = false;
          }, 500);
        }
      },
      openModal() {
        this.$refs.modal.openModal();
      },
      getImageSource(imageName) {
        return require(`~/assets/images/${imageName}.png`);
      },
      initScrollHandler() {
        if ($(window).width() > 768) {
          $(document).on('scroll', $(window), () => {
            if($(window).scrollTop() < 100) {
              $('nav.nav-fixed').css('top', parseInt('-' + $(window).scrollTop()));
              $('nav.nav-fixed').removeClass('top-0');
              $('nav.nav-fixed').removeClass('fixed');
              $('.main-banner-wrapper').removeClass('navbar-scroll-handler');
              $('#logoImage').removeClass('hidden');
              $('#blackLogoImage').addClass('hidden');
              $('#navbar-default #multiLevelDropdownButton').addClass('text-white')
              $('#navbar-default #multiLevelDropdownButton').removeClass('text-[#0a0a0a]')
              $('#navbar-default .main-dropdown').removeClass('text-[#0a0a0a]');
              $('#navbar-default .main-dropdown').addClass('text-white')
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
      },
      navTrigger(){
        $('.multi-toggle').on('click', function() {
            $('body').trigger('click');
            $('#navbar-default').addClass('hidden');
        });
      },
    },
  };
</script>
<style scoped>
  .loading-wrapper{position:fixed;top:0;right:0;z-index:1000;height:100vh!important;width:100vw!important;background:#000!important;padding:1rem;text-align:center;font-size:3rem;font-family:sans-serif;display:flex;flex-direction:column;align-items:center;justify-content:center}nav{display:none!important}.loading{display:inline-block;width:2.5rem;height:2.5rem;border:5px solid rgba(9,133,81,.705);border-radius:50%;border-top-color:#158876;animation:1s ease-in-out infinite spin}@keyframes spin{to{-webkit-transform:rotate(360deg)}}.fade-enter-active,.fade-leave-active{transition:opacity .5s}.fade-enter,.fade-leave-to{opacity:0};
</style>