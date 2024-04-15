<template>
  <div>
     <Team/>
     <MissionAchievements 
        :MissionAchievementsData="MissionAchievementsData"
        />
     <Testimonial/>
  </div>
</template>
<script>
  import Testimonial from "@/components/Testimonial";
  import Team from "@/components/Team";
  import MissionAchievements from "@/components/MissionAchievements";
  export default {
    layout: 'MainFrontLayout',
    async asyncData({ store }) {
      const headerData = {
        title: 'About Us',
        description: 'We started our journey in 2012. And looking back it has been an awesome ride with lots of ups and downs. But whatever be the situation, we were always trying to move forward.',
        description1: 'Icing croissant croissant jelly gummi bears cotton candy jujubes apple pie caramels. Dragée soufflé bonbon powder. Sesame snaps sugar plum chupa chups tart wafer caramels toffee.',
        bgImage: 'about-banner-image',
        customClass: 'is-aboutpage',
      };
      await store.dispatch('setHeaderData', headerData);
      return {
        MissionAchievementsData: {
          firstCardImage: "about-1",
          secondCardImage: "about-2",
          firstTitle: "Our Mission",
          firstContent1:"Our Mission is to enhance the growth of our clients’ business by transforms their needs into innovative & worthwhile solutions. We aim to establish a unique satisfactory work culture to provide unmatched IT services.",
          secondContent1:"We started our journey in 2012. And looking back it has been an awesome ride with lots of ups and downs. But whatever be the situation, we were always trying to move forward.",
          secondTitle:"Our Commitment",
          firstContent2:"Our Commitment is to enhance the growth of our clients’ business by transforms their needs into innovative & worthwhile solutions. We aim to establish a unique satisfactory work culture to provide unmatched IT services.",
          secondContent2:"We started our journey in 2012. And looking back it has been an awesome ride with lots of ups and downs. But whatever be the situation, we were always trying to move forward.",
        }
      };
    },
    head() {
      return {
        title: 'About Us | Kerneltech',
      };
    },
    name: 'About',
  };
</script>