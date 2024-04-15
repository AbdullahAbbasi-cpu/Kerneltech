<template>
    <section :class="{ 'is-homepage': isHomePage, 'is-dm': isDM, 'is-aboutpage': isAboutPage, 'is-wpds': isWPDS, 'is-lds': isLDS, 'is-wad': isWAD,}" class="main-background-holder h-auto px-4 xl:px-0" :style="{ background: `url(${getImageSource(headerData.bgImage)})` }">
        <Navbar/>
        <!-- Banner section starts from here -->
        <div class="first-container-var main-banner-wrapper flex h-[100%]">
            <div id="main-banner"
            class="lg: mt-[-156px] h-auto flex flex-col justify-center text-start lg:pt-[0px] lg:pb-[0px] pb-[80px] pt-[80px] text-first-color-var">
                <div class="banner-content-wrapper">
                    <h1 class="banner-heading md:text-f-40 text-f-30 font-bold leading-lh-normal sm:mt-0 mt-5"> {{ headerData.title }} </h1>
                    <p class="banner-description md:text-f-18 text-f-16 leading-lh-28 font-fw-500 pt-[10px] max-w-[890px]"> {{ headerData.description }} </p>
                    <p v-if="headerData.description1" class="second-description md:text-f-18 text-f-16 leading-lh-28 font-fw-500 pt-[10px] max-w-[890px]"> {{ headerData.description1 }} </p>
                    <div class="banner-button">
                    <button
                        class="bg-second-bg-color-var modal-open rounded-first-radius-var px-6 py-[17px] mt-5 text-f-14 font-fw-700">Let’s Start Your Projects</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>


<script>
import Navbar from "@/components/Navbar";
export default {
  components: {
    Navbar,
  },
  props: {
    isHomePage: Boolean,
    isAboutPage: Boolean,
    isDM: Boolean,
    isWPDS: Boolean,
    isLDS: Boolean,
    isWAD: Boolean,
    headerData: {
      type: Object,
      required: true,
    },
  },
  methods: {
    getImageSource(imageName) {
      return require(`~/assets/images/${imageName}.png`);
    },
  },
};
</script>