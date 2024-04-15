<template>
  <section class="gradient px-4 xl:px-0 mt-0 xl:pt-0">
    <div class="first-container-var lg:py-0 sm:py-10 py-8">
      <div class="row flex justify-center lg:flex-row flex-col">
        <div class="lg:w-[595px] lg:h-[533px] flex lg:items-center items-center justify-center lg:justify-start">
          <img :src="getImageSource(leftImageCardData.desktopImage)" class="lg:block hidden" alt=""/>
          <img :src="getImageSource(leftImageCardData.mobileImage)" class="lg:hidden block" alt=""/>
        </div>
        <div
          class="lg:w-[49.7%] bg-first-bg-color-var lg:text-start professional-marketing-center flex justify-center flex-col   pt-10 lg:pt-0">
          <div class="lg:my-10 my-0">
            <h3 class="sm:text-f-30 text-f-25 text-second-color-var font-fw-600 leading-lh-normal ps-0 ">{{ leftImageCardData.title }}</h3>
            <p class="pt-3 sm:text-f-18 text-f-16 text-sixth-color-var sm:leading-lh-35 leading-lh-26 font-fw-400">{{ leftImageCardData.description1 }}</p>
            <p class="pt-3 sm:text-f-18 text-f-16 text-sixth-color-var sm:leading-lh-35 leading-lh-26 font-fw-400">{{ leftImageCardData.description2 }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    leftImageCardData: {
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
