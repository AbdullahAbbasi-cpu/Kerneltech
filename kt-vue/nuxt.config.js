require('dotenv').config();
export default {
  error: {
    layout: '~/layouts/error.vue',
  },
  // modules: ['@nuxt/ui'],
  // Target: https://go.nuxtjs.dev/config-target
  target: 'static',
  router: {
      middleware: 'loadingMiddleware',
      base: '/',
  },
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'Kerneltech | Homepage',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'stylesheet', href: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' },
      { rel: 'preconnect', href: 'https://fonts.googleapis.com' },
      { rel: 'preconnect', href: 'https://fonts.gstatic.com' },
      { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&display=swap' },
      { rel: 'stylesheet', href: 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css' },
    ],
    script: [
      { src: "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" },
    ],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    "../assets/css/flowbite.min.css",
    "../assets/css/tailwind.css",
    "../assets/css/custom.css",
    '@fortawesome/fontawesome-free/css/all.css'
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    { src: '~/plugins/owl.js', ssr: false},
    { src: "~/plugins/jquery", mode: "client" },
    { src: "~/plugins/jquery.flip.min.js", mode: "client" },
    { src: '~/plugins/jquery-validation.js', ssr: false },
    { src: '~/plugins/clearEmailField.js'},
  ],
  layouts: {
    // Default layout is applied to all pages
    // default: '~/layouts/FrontLayout.vue',
  },
  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,
  // loading: '@/components/LoadingBar.vue',
  
  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    "@nuxt/content",
    '@nuxtjs/axios',
    '@nuxtjs/toast',
  ],
  
  axios: {
    baseURL: 'http://kerneltech.test/api'
  },
  toast: {
      position: 'top-right',
      containerClass: 'toastr-wrapper',	
      className: 'toastr-custom-handler', 
      duration: 4000,
      onClick : (e, toastObject) => {
          toastObject.goAway(0);
      }
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  },

  env: {
    API_BASE_URL: process.env.API_BASE_URL || 'http://localhost:3000', // fallback URL if the environment variable is not set
  },
}
