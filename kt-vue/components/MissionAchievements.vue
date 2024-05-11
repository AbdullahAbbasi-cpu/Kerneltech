<template>
    <section class="bg-[#F7F7F7] sm:pt-[80px] sm:pb-[80px] py-[50px]">
      <div class="first-container-var">
        <div class="row xl:px-0 px-4">
          <div class="flex items-center xl:flex-row flex-col" id="first">
            <div class="xl:w-[50%]">
              <img class="w-full about-1" :src="getImageSource(MissionAchievementsData.firstCardImage)" alt="" width="600" height="400"/>
            </div>
            <div class="xl:ps-[40px] xl:w-[50%] xl:mt-0 mt-8 xl:text-start text-center about-content-1">
              <h3 class="sm:text-f-35 text-f-26 sm:leading-lh-42 leading-lh-35 font-fw-600 text-eleventh-color-var">{{ MissionAchievementsData.firstTitle }}</h3>
              <p class="sm:text-f-18 text-f-16 sm:leading-lh-28 leading-lh-28 font-fw-400 mt-[20px] text-sixth-color-var">{{ MissionAchievementsData.firstContent1 }}</p>
              <p class="sm:text-f-18 text-f-16 sm:leading-lh-28 leading-lh-28 font-fw-400 mt-[10px] text-sixth-color-var" >{{ MissionAchievementsData.secondContent1 }} </p>
            </div>
          </div>
          <div id="second" class="flex items-center xl:flex-row flex-col-reverse xl:mt-0 mt-16">
            <div class="xl:pe-[35px] xl:w-[50%] xl:mt-0 mt-8 xl:text-start text-center about-content-2">
              <h3 class="sm:text-f-35 text-f-26 sm:leading-lh-42 leading-lh-35 font-fw-600 text-eleventh-color-var">{{ MissionAchievementsData.secondTitle }}</h3>
              <p class="sm:text-f-18 text-f-16 sm:leading-lh-28 leading-lh-28 font-fw-400  mt-[20px] text-sixth-color-var">{{ MissionAchievementsData.firstContent2 }}</p>
              <p class="sm:text-f-18 text-f-16 sm:leading-lh-28 leading-lh-28 font-fw-400  mt-[10px] text-sixth-color-var">{{ MissionAchievementsData.secondContent2 }}</p>
            </div>
            <div class="xl:w-[50%]">
              <img class="about-2 w-full" :src="getImageSource(MissionAchievementsData.secondCardImage)" alt="" width="600" height="400">
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
  <script>
  export default {
    props: {
      MissionAchievementsData: {
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