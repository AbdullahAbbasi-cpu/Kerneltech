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
     
      </div>
      <WorkingProcess :processToShow="['research-and-analysis', 'ui-ux-design', 'development', 'testing-and-qa', 'deployment']"/>
      <Industries/>
      <Technologies :technologiesToShow="['php', 'mysql', 'html', 'css', 'js', 'node', 'bootstrap']"/>
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
        title: 'Opencart Development Services',
        description: 'With the help of our services, you will not have to visit in any street, any area, any city or any country with you can easily introduce your products and services just sitting on a relaxing chair.',
        bgImage: 'opencart-banner-bg',
        customClass: 'is-opencart',
      };
      await store.dispatch('setHeaderData', headerData);
      return {
        leftImageCardData: [
          { 
              title: 'Professional Opencart Development Services ',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'opencart-web-img-1',
              mobileImage: 'responsive-opencart-web-img-1',
          },
          { 
              title: 'Kernel Tech’s Opencart Development Services',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'opencart-web-img-3',
              mobileImage: 'responsive-opencart-web-img-3'
          },
        ],
        rightImageCardData: [
          { 
              title: 'Result-Oriented E-Commerce Opencart Development Services',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'opencart-web-img-2',
              mobileImage: 'responsive-opencart-web-img-2'
          },
        ]
      };
    },
    head() {
      return {
        title: 'Opencart Development Services | Kerneltech',
      };
    },
    name: 'IndexPage',
  };
  </script>
  
  