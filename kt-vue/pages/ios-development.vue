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
      <WorkingProcess :processToShow="['requirements', 'ui-ux-design', 'development', 'testing-and-qa', 'deployment']"/>
      <Industries/>
      <Technologies :technologiesToShow="['html', 'css', 'ruby', 'python', 'angular', 'react', 'js', 'node', 'jquery']"/>
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
        title: 'IOS Development',
        description: 'With the help of our services, you will not have to visit in any street, any area, any city or any country with you can easily introduce your products and services just sitting on a relaxing chair.',
        bgImage: 'ios-development-banner',
        customClass: 'is-ios',
      };
      await store.dispatch('setHeaderData', headerData);
      return {
        leftImageCardData: [
          { 
              title: 'Finest IPhone App Development Company',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'ios-web-img-1',
              mobileImage: 'responsive-ios-web-img-1',
          },
          { 
            title: 'Why Choose Kernel Tech IOS App Development Services',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'ios-web-img-3',
              mobileImage: 'responsive-ios-web-img-3'
          },
        ],
        rightImageCardData: [
          { 
              title: 'Custom IOS App Development Services',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging attracting and retaining buyers globally. Kernel Tech gets you the Best digital business.',
              desktopImage: 'ios-web-img-2',
              mobileImage: 'responsive-ios-web-img-2'
          },
        ]
      };
    },
    head() {
      return {
        title: 'iOS Development | Kerneltech',
      };
    },
    name: 'IndexPage',
  };
  </script>
  
  