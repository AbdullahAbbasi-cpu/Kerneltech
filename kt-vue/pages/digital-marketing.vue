<template>
  <div>
     <div class="lg:py-0 py-14 bg-first-bg-color-var">
        <LeftImageCard
           :leftImageCardData="leftImageCardData[0]"
           />
        <RightImageCard 
           :rightImageCardData="rightImageCardData[0]"
           />
     </div>
     <WorkingProcess :processToShow="['goals-and-objectives', 'target-audience', 'competitive-analysis', 'strategies-and-tactics', 'target-audiences']"/>
     <Industries/>
     <Technologies :technologiesToShow="['ahrefs', 'semrush', 'ubersuggest', 'drip', 'mailchimp', 'google-trends', 'google-keyword-planner', 'serpstat', 'sproutsocail']"/>
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
          title: 'Digital Marketing',
          description: 'With the help of our services, you will not have to visit in any street, any area, any city or any country with you can easily introduce your products and services just sitting on a relaxing chair.',
          bgImage: 'digital-marketing-bg',
          customClass: 'is-dm',
        };
        await store.dispatch('setHeaderData', headerData);
        return {
          leftImageCardData: [
          { 
              title: 'Professional Digital Marketing Services',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging, attracting and retaining buyers globally. Kernel Tech gets you the Best digital business.',
              desktopImage: 'digital-web-img-1',
              mobileImage: 'responsive-digital-web-img-1'
          }
        ],
        rightImageCardData: [
          { 
              title: 'Kernel Tech Internet Marketing Solutions',
              description1: 'Kernel Tech gets you the Best digital exposure that your business demand in today’s competitive environment. We strive to provide a full suite of reliable digital marketing services that aids you in reaching the right customers, on right time and on right devices',
              description2: 'Kernel Tech has successfully work with various clients and manag multiple business domains. We take pride in delivering authentic online marketing solutions that help your business in engaging.',
              desktopImage: 'digital-web-img-2',
              mobileImage: 'responsive-digital-web-img-2'
          },
        ]
        };
      },
    head() {
      return {
        title: 'Digital Marketing Services | Kerneltech',
      };
    },
    name: 'IndexPage',
  };
</script>