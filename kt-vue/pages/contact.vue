<template>
    <div>
        <transition name="fade" mode="in-out">
          <div v-if="isLoading" key="loader" class="loading-wrapper">
            <div class="loading"></div>
          </div>  
        </transition>
       <ContactUs/>
    </div>
  </template>
  <script>
    import axios from 'axios';
    import ContactUs from "@/components/ContactUs";
    export default {
      data() {
        return {
          isLoading: true,
        };
      },
      mounted() {
        this.$router.beforeEach((to, from, next) => {
          this.isLoading = true;
          next();
        });
        this.siteSettingsData();
        this.$router.afterEach((to) => {
          this.siteSettingsData();
      });
      },
      methods: {
        async siteSettingsData() {
          this.isLoading = true;
          try {
            const response = await axios.post(`${process.env.API_BASE_URL}api/site-settings-data`);
            this.siteSettings = response.data;
            if(this.siteSettings !== undefined && this.siteSettings !== null && this.siteSettings !== '')
            {
              let emailContainer = this.siteSettings.contact_email;
              let pakistanContactNumber = this.siteSettings.pakistan_contact_number;
              let pakistanAddress = this.siteSettings.pakistan_address;
              let londonContactNumber = this.siteSettings.london_contact_number;
              let londonAddress = this.siteSettings.london_address;
              let stickyLogo = this.siteSettings.sticky_logo_url;

              // for logo
              if(stickyLogo !== undefined)
              {
                $('#contact-logo').attr('src', stickyLogo);
              }

              // for email
              if(emailContainer !== undefined)
              {
                $('.contact-email p').html(emailContainer);
                $('.contact-email').attr('href', "mailto:" + emailContainer);
              }

              // for contact number (pakistan) 
              if(pakistanContactNumber !== undefined)
              {
                $('.pakistan-contact-number p').html(pakistanContactNumber);
                $('.pakistan-contact-number').attr('href', "tel:" + pakistanContactNumber);
              }

              // for address (pakistan)
              if(pakistanAddress !== undefined)
              {
                $('.pakistan-address').html(pakistanAddress);
              }

              // for contact number (london)
              if(londonContactNumber !== undefined)
              {
                $('.london-contact-number p').html(londonContactNumber);
                $('.london-contact-number').attr('href', "tel:" + londonContactNumber);
              }

              // for address (london)
              if(londonAddress !== undefined)
              {
                $('.london-address').html(londonAddress);
              }

            }
          } catch {
              console.log('inside the catch condition');
          } finally {
              this.isLoading = false;
          }
        },
      },
      async asyncData({ store }) {
      },
      head() {
        return {
          title: 'Contact Us | Kerneltech',
        };
      },
      name: 'Contact',
      computed: {
        headerData() {
          const headerData = this.$store.getters.getHeaderData;
          return headerData;
        },
      },
    };
  </script>

<style scoped>
.loading-wrapper{position:fixed;top:0;right:0;z-index:1000;height:100vh!important;width:100vw!important;background:#000!important;padding:1rem;text-align:center;font-size:3rem;font-family:sans-serif;display:flex;flex-direction:column;align-items:center;justify-content:center}nav{display:none!important}.loading{display:inline-block;width:2.5rem;height:2.5rem;border:5px solid rgba(9,133,81,.705);border-radius:50%;border-top-color:#158876;animation:1s ease-in-out infinite spin}@keyframes spin{to{-webkit-transform:rotate(360deg)}}.fade-enter-active,.fade-leave-active{transition:opacity .5s}.fade-enter,.fade-leave-to{opacity:0}
</style>
