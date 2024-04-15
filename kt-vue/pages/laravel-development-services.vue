<template>
  <div>
     <div class="lg:py-0 py-14 bg-first-bg-color-var">
        <LeftImageCard
           :leftImageCardData="leftImageCardData[0]"
           />
        <RightImageCard 
           :rightImageCardData="rightImageCardData[0]"
           />
        <LeftImageCard
           :leftImageCardData="leftImageCardData[1]"
           />
        <RightImageCard 
           :rightImageCardData="rightImageCardData[1]"
           />
     </div>
     <WorkingProcess :processToShow="['requirements', 'ui-ux-design', 'development', 'testing-and-qa', 'maintenance-and-support']"/>
     <Industries/>
     <Technologies :technologiesToShow="['php', 'symfony', 'vue', 'mvc', 'bootstrap', 'html', 'css', 'js', 'jquery']"/>
     <Testimonial/>
  </div>
</template>
<script>
  import 'flip';
  import Industries from "@/components/Industries";
  import Testimonial from "@/components/Testimonial";
  import Technologies from "@/components/Technologies";
  import WorkingProcess from "@/components/WorkingProcess";
  import LeftImageCard from "@/components/LeftImageCard";
  import RightImageCard from "@/components/RightImageCard";
  export default {
    layout: 'MainFrontLayout',
    async asyncData({ store }) {
      const headerData = {
        title: 'Laravel Development Services',
        description: 'With the help of our services, you will not have to visit in any street, any area, any city or any country with you can easily introduce your products and services just sitting on a relaxing chair.',
        bgImage: 'laravel-development-services-bg',
        customClass: 'is-lds',
      };
      await store.dispatch('setHeaderData', headerData);
      return {
        leftImageCardData: [
          { 
              title: 'The Leading Laravel Web Development Company',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'laravel-web-img-1',
              mobileImage: 'responsive-laravel-web-img-1'
          },
          { 
              title: 'Kernel Tech’s Laravel Development Services- A Complete Suite ',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'laravel-web-img-3',
              mobileImage: 'responsive-laravel-web-img-3'
          },
        ],
        rightImageCardData: [
          { 
              title: 'Why Kernel Tech Is the Best Laravel Development Company ',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'laravel-web-img-2',
              mobileImage: 'responsive-laravel-web-img-2'
          },
          { 
              title: 'Why Laravel Development Services Is The Need of the Hour?',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'laravel-web-img-4',
              mobileImage: 'responsive-laravel-web-img-4'
          },
        ],
      };
    },
    head() {
      return {
        title: 'Laravel Development Services | Kerneltech',
      };
    },
    name: 'IndexPage',
  };
</script>