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
      <WorkingProcess :processToShow="['defining', 'research', 'sketch', 'concept-of-development', 'revision', 'completion']"/>
      <Industries/>
      <Technologies :technologiesToShow="['figma', 'adobe-photoshop', 'adobe-illustrator', 'sketch', 'adobe-xd', 'wix']"/>
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
        title: 'Mobile Application Design',
        description: 'With the help of our services, you will not have to visit in any street, any area, any city or any country with you can easily introduce your products and services just sitting on a relaxing chair.',
        bgImage: 'mobile-application-design-bg',
        customClass: 'is-mad',
      };
      await store.dispatch('setHeaderData', headerData);
      return {
        leftImageCardData: [
          { 
              title: 'Mobile Application Designing KernelTech',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'mobile-application-web-img-1',
              mobileImage: 'responsive-mobile-application-web-img-1',
          },
          { 
            title: 'Multi-Platform Mobile App Design Services',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging attracting and retaining buyers globally. Kernel Tech gets you the Best digital business.',
              desktopImage: 'mobile-application-web-img-3',
              mobileImage: 'responsive-mobile-application-web-img-3'
          },
        ],
        rightImageCardData: [
          { 
              title: 'The Best Online Mobile App Design Services',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'mobile-application-web-img-2',
              mobileImage: 'responsive-mobile-application-web-img-2'
          },
        ]
      };
    },
    head() {
      return {
        title: 'Mobile Application Design | Kerneltech',
      };
    },
    name: 'IndexPage',
    data() {
      return {
        headerData: {
            bgImage: 'mobile-application-design-bg',
            title: 'Mobile Application Design',
            description: 'With the help of our services, you will not have to visit in any street, any area, any city or any country with you can easily introduce your products and services just sitting on a relaxing chair.',
        },
        leftImageCardData: [
          { 
              title: 'Responsive Web Application Design Services',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'mobile-application-card-1-desktop',
              mobileImage: 'mobile-application-card-1-responsive',
          },
          { 
              title: 'Custom Web Design Services ',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging attracting and retaining buyers globally. Kernel Tech gets you the Best digital business.',
              desktopImage: 'mobile-application-card-2-desktop',
              mobileImage: 'mobile-application-card-2-responsive'
          },
        ],
        rightImageCardData: [
          { 
              title: 'Why Kernel Tech Is the Best Laravel Development Company ',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'mobile-application-card-3-desktop',
              mobileImage: 'mobile-application-card-3-responsive'
          },

        ]
      };
    },
  };
  </script>
  
  