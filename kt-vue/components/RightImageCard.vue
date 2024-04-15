<template>
    <section class="second-banner-gradient px-4 xl:px-0">
        <div class="first-container-var lg:py-0 sm:py-10 py-8">
        <div class="row flex justify-center lg:flex-row flex-col-reverse">
            <div
            class="lg:w-[49.7%] bg-first-bg-color-var flex justify-center lg:text-start flex-col professional-marketing-center pt-10 lg:pt-0">
            <div>
                <h3 class="sm:text-f-30 text-f-25 text-second-color-var font-fw-600 leading-lh-normal ps-0"> {{ rightImageCardData.title }} </h3>
                <p class="pt-3 sm:text-f-18 text-f-16 text-sixth-color-var sm:leading-lh-35 leading-lh-26 font-fw-400">{{ rightImageCardData.description1 }}</p>
                <p class="pt-3 sm:text-f-18 text-f-16 text-sixth-color-var sm:leading-lh-35 leading-lh-26 font-fw-400">{{ rightImageCardData.description2 }}</p>
            </div>
            </div>
            <div class="lg:w-[595px] lg:h-[528px] flex lg:items-center items-center justify-center lg:justify-start">
            <img :src="getImageSource(rightImageCardData.desktopImage)" class="lg:block hidden lg:me-[5px]" alt=""/>
            <img :src="getImageSource(rightImageCardData.mobileImage)" class="lg:hidden block" alt=""/>
            </div>
        </div>
        </div>
    </section>
</template>

<script>
export default {
  props: {
    rightImageCardData: {
      type: Object,
      required: true,
    },
  },
  methods: {
    getImageSource(imageName) {
      return require(`~/assets/images/${imageName}.png`);
    },
  }
};
</script>