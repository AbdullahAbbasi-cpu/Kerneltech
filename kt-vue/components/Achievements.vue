<template>
     <!-- Achievements -->
  <section id="achievements" class="mt-[75px] mb-8 ">
    <div class="first-container-var xl:px-0 px-4">
      <div id="achievements-section">
        <h1 class="md:text-f-45 text-f-30 text-second-color-var leading-lh-normal font-fw-700 pb-2 lg:mb-9 mb-5 mt-5">
          Achievements</h1>
      </div>
    </div>

    <div id="achievements-cards" class="achievements-feature-img flex md:h-[480px] xl:px-0 px-4" :style="{ background: `url(${getImageSource(achievementSectionData.bgImage)})` }">
    <div class="first-container-var main-cards md:w-auto w-full">
      <div class="cards flex flex-wrap justify-center flex-col md:flex-row md:pt-10 pt-0 gap-[25px]">
        <div
          class="ease-in duration-200 customer-card lg:w-[280px] md:w-[320px] mt-10 md:mt-0 px-8 bg-white hover:bg-second-bg-color-var    shadow-first-boxshadow-var text-center h-[185px] rounded-second-radius-var flex items-center justify-center flex-col">
          <div class="flex items-center md:leading-[54px] leading-[35px]">
            <h3 class="text-third-color-var text-f-45 font-fw-700 count" data-number="100">100</h3>
            <span class="text-third-color-var text-f-45 font-fw-700">+</span>
          </div>
          <div class="flex items-center pt-7">
            <img src="~/assets/images/happy-icon.svg" class="archievements-icon w-[25px] h-[25px]" alt=""/>
            <p class="text-sixth-color-var text-f-20 ps-1 font-fw-500">Happy Customers</p>
          </div>
        </div>
        <div
          class="customer-card ease-in duration-200 px-8  lg:w-[280px] w-[320px] bg-white hover:bg-second-bg-color-var   text-center  shadow-first-boxshadow-var h-[185px] rounded-second-radius-var flex items-center justify-center flex-col">
          <div class="flex items-center md:leading-[54px] leading-[35px]">
            <h3 class="text-third-color-var text-f-45 font-fw-700 count" data-number="50">50</h3>
            <span class="text-third-color-var text-f-45 font-fw-700">+</span>
          </div>
          <div class="flex items-center pt-7">
            <img src="~assets/images/worker-icon.svg" class="archievements-icon" alt=""/>
            <p class="text-sixth-color-var text-f-20 ps-2 font-fw-500">Workers employed</p>
          </div>
        </div>
        <div
          class="customer-card ease-in duration-200 px-8 lg:w-[280px] w-[320px] bg-white hover:bg-second-bg-color-var   text-center h-[185px]  rounded-second-radius-var flex items-center justify-center flex-col shadow-first-boxshadow-var">
          <div class="flex items-center md:leading-[54px] leading-[35px]">
            <h3 class="text-third-color-var text-f-45 font-fw-700 count" data-number="90">90</h3>
            <span class="text-third-color-var text-f-45 font-fw-700">+</span>
          </div>
          <div class="flex items-center pt-7">
            <img src="~/assets/images/project-completed-icon.svg" class="archievements-icon" alt=""/>
            <p class="text-sixth-color-var text-f-20 ps-1 font-fw-500">Projects completed</p>
          </div>
        </div>
        <div
          class="customer-card ease-in duration-200 px-8 lg:w-[280px] w-[320px] bg-white hover:bg-second-bg-color-var   hover:text-white text-center h-[185px] rounded-second-radius-var flex items-center justify-center flex-col shadow-first-boxshadow-var">
          <div class="flex items-center md:leading-[54px] leading-[35px]">
            <h3 class="text-third-color-var text-f-45 font-fw-700 count" data-number="85">85</h3>
            <span class="text-third-color-var text-f-45 font-fw-700">+</span>
          </div>
          <div class="flex items-center pt-7">
            <img src="~/assets/images/worker-icon.svg" class="archievements-icon" alt=""/>
            <p class="text-sixth-color-var text-f-20 ps-2 font-fw-500">Sites are working</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
</template>
<script>
export default {
  props: {
    achievementSectionData: {
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