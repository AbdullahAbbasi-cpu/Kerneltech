<template>
   <!-- Previous classes of <section> tag { lg:mt-[80px] mt-[60px] lg:mb-[80px] mb-[20px] }-->
    <section class="lg:mt-[80px] mt-[60px] lg:mb-[80px] mb-[20px]"> 
      <div class="first-container-var px-4 xl:px-0">
        <div class="technologies">
          <h1 class="sm:text-f-45 text-f-35 font-fw-700 text-second-color-var leading-lh-normal">Our Technologies</h1>
          <p class="text-center text-f-18 text-fouth-color-var leading-lh-28 font-fw-500 pt-5 ">Our software engineers
            have expertise in all the technologies needed to deliver comprehensive web developments services for <br
              class="xl:flex hidden"> companies across industries. </p>
        </div>
        <div class="row lg:flex justify-center gap-[35px] items-baseline pt-5 flex-wrap hidden">
          <div v-if="technologiesToShow.includes('ahrefs')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/ahrefs-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">ahrefs</p>
          </div>
          <div v-if="technologiesToShow.includes('semrush')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/semrush-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">semrush</p>
          </div>
          <div v-if="technologiesToShow.includes('ubersuggest')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/ubersuggest-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Ubersuggest</p>
          </div>
          <div v-if="technologiesToShow.includes('drip')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/drip-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Drip</p>
          </div>
          <div v-if="technologiesToShow.includes('mailchimp')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/mailchimp-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Mailchimp</p>
          </div>
          <div v-if="technologiesToShow.includes('google-trends')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/google-trends-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Google trends</p>
          </div>
          <div v-if="technologiesToShow.includes('google-keyword-planner')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/google-keyword-planner-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Google Keyword <br>Planner</p>
          </div>
          <div v-if="technologiesToShow.includes('serpstat')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/serpstat-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">SERPSTAT</p>
          </div>
          <div v-if="technologiesToShow.includes('sproutsocail')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/sproutsocail-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">SproutSocail</p>
          </div>
          <div v-if="technologiesToShow.includes('php')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/php-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">PHP</p>
          </div>
          <div v-if="technologiesToShow.includes('symfony')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/symfony-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Symfony</p>
          </div>
          <div v-if="technologiesToShow.includes('ruby')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/ruby-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Ruby</p>
          </div>
          <div v-if="technologiesToShow.includes('vue')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/vue-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Vue.js</p>
          </div>
          <div v-if="technologiesToShow.includes('mvc')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/mvc-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">MVC</p>
          </div>
          <div v-if="technologiesToShow.includes('wordpress')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/wordpress-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">WordPress</p>
          </div>
          <div v-if="technologiesToShow.includes('woocommerce')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/woocommerce-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Woocommerce</p>
          </div>
          <div v-if="technologiesToShow.includes('mysql')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/mysql-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">MySQL</p>
          </div>
          <div v-if="technologiesToShow.includes('html')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/html-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">HTML</p>
          </div>
          <div v-if="technologiesToShow.includes('kotlin')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/kotlin-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Kotlin</p>
          </div>
          <div v-if="technologiesToShow.includes('css')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/css-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">CSS</p>
          </div>
          <div v-if="technologiesToShow.includes('bootstrap')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/bootstrap-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Bootsrtap</p>
          </div>
          <div v-if="technologiesToShow.includes('python')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/python-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Phython</p>
          </div>
          <div v-if="technologiesToShow.includes('js')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/javascript-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Javascript</p>
          </div>
          <div v-if="technologiesToShow.includes('angular')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/angular-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">Angular js</p>
          </div>
          <div v-if="technologiesToShow.includes('react')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/react-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">React</p>
          </div>
          <div v-if="technologiesToShow.includes('node')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/node-js-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">node js</p>
          </div>
          <div v-if="technologiesToShow.includes('jquery')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/jquery-icon.svg" alt=""/>
            <p class="text-f-13 text-fouth-color-var pt-1">jQuery</p>
          </div>
          <div v-if="technologiesToShow.includes('figma')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/figma-icon.svg" alt="">
            <p class="text-f-13 text-fouth-color-var pt-1">figma</p>
          </div>
          <div v-if="technologiesToShow.includes('adobe-photoshop')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/adobe-photoshop-icon.svg" alt="">
            <p class="text-f-13 text-fouth-color-var pt-1">Adobe <br class="xl:block hidden"> Photoshop</p>
          </div>
          <div v-if="technologiesToShow.includes('adobe-illustrator')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/adobe-illustrator-icon.svg" alt="">
            <p class="text-f-13 text-fouth-color-var pt-1">Adobe <br class="xl:block hidden"> Ilustrator</p>
          </div>
          <div v-if="technologiesToShow.includes('sketch')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/sketch-icon.svg" alt="">
            <p class="text-f-13 text-fouth-color-var pt-1">Sketch</p>
          </div>
          <div v-if="technologiesToShow.includes('adobe-xd')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/adobe-xd-icon.svg" alt="">
            <p class="text-f-13 text-fouth-color-var pt-1">Adobe XD</p>
          </div>  
          <div v-if="technologiesToShow.includes('wix')" class="text-center flex items-center justify-center flex-col">
            <img src="~assets/images/wix-icon.svg" alt="">
            <p class="text-f-13 text-fouth-color-var pt-1">Wix</p>
          </div>  
        </div>
        <!-- responsive slider -->
        <div class="lg:hidden mt-10 technologies-carousel">
            <carousel :autoplay="true" :loop="true" :nav="true" :dots="false" :margin="10" :responsive="{300:{items:2},500:{items:3},750:{items:5}}">
              <div v-if="technologiesToShow.includes('ahrefs')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/ahrefs-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">ahrefs</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('semrush')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/semrush-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">semrush</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('ubersuggest')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/ubersuggest-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">Ubersuggest</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('drip')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/drip-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">Drip</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('mailchimp')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/mailchimp-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">Mailchimp</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('google-trends')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/google-trends-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1 whitespace-nowrap">Google trends</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('google-keyword-planner')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/google-keyword-planner-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1 whitespace-nowrap">Google Keyword Planner</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('serpstat')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/serpstat-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">SERPSTAT</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('sproutsocail')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/sproutsocail-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">SproutSocail</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('php')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/php-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">PHP</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('symfony')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/symfony-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">Symfony</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('ruby')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/ruby-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">Ruby</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('vue')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/vue-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">Vue.js</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('mvc')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/mvc-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">MVC</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('wordpress')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/wordpress-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">WordPress</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('woocommerce')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/woocommerce-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">Wooocommerce</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('mysql')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/mysql-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">MySQL</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('html')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/html-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">HTML</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('kotlin')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/kotlin-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">Kotlin</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('css')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/css-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">CSS</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('bootstrap')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/bootstrap-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">Bootsrtap</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('python')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/python-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">Phython</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('js')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/javascript-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">Javascript</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('angular')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/angular-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">Angular js</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('react')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/react-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">React</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('node')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/node-js-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">node js</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('jquery')" class="item flex justify-center items-center">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                  <img src="~assets/images/jquery-icon.svg" alt=""/>
                  <p class="text-f-13 text-fouth-color-var pt-1">jQuery </p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('figma')" class="text-center flex items-center justify-center flex-col">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                    <img src="~assets/images/figma-icon.svg" alt="">
                    <p class="text-f-13 text-fouth-color-var pt-1">figma</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('adobe-photoshop')" class="text-center flex items-center justify-center flex-col">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                    <img src="~assets/images/adobe-photoshop-icon.svg" alt="">
                    <p class="text-f-13 text-fouth-color-var pt-1 whitespace-nowrap">Adobe Photoshop</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('adobe-illustrator')" class="text-center flex items-center justify-center flex-col">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                    <img src="~assets/images/adobe-illustrator-icon.svg" alt="">
                    <p class="text-f-13 text-fouth-color-var pt-1 whitespace-nowrap">Adobe Illustrator</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('sketch')" class="text-center flex items-center justify-center flex-col">
                <div  class="text-center flex items-center justify-center flex-col w-[70px]">
                    <img src="~assets/images/sketch-icon.svg" alt="">
                    <p class="text-f-13 text-fouth-color-var pt-1">Sketch</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('adobe-xd')" class="text-center flex items-center justify-center flex-col">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                    <img src="~assets/images/adobe-xd-icon.svg" alt="">
                    <p class="text-f-13 text-fouth-color-var pt-1">Adobe XD</p>
                </div>
              </div>
              <div v-if="technologiesToShow.includes('wix')" class="text-center flex items-center justify-center flex-col">
                <div class="text-center flex items-center justify-center flex-col w-[70px]">
                    <img src="~assets/images/wix-icon.svg" alt="">
                    <p class="text-f-13 text-fouth-color-var pt-1">Wix</p>
                </div>
              </div>
          </carousel>
        </div>
      </div>
  </section>
</template>
<script>
export default {
  props: {
    technologiesToShow: {
      type: Array,
      default: () => [],
    },
  },
}
</script>