<template class="hello">
  <div id="something">
     <Service/>
     <Achievements :achievementSectionData="achievementSectionData"/>
     <Blog/>
     <Testimonial/>
  </div>
</template>
<script>
  import Blog from "@/components/Blog";
  import Service from "@/components/Service";
  import Achievements from "@/components/Achievements";
  import Testimonial from "@/components/Testimonial";
  export default {
    layout: 'MainFrontLayout',
    props: {
      uniqueParameter: {
        type: String,
        default: 'YourDefaultValue'
      }
    },
    async asyncData({ store }) {
      const headerData = {
        title: 'Kernel Tech Invites You To Build Your Next Site',
        description: 'With the help of our services, you will not have to visit any street, any area, any city, or any country; you can easily introduce your products and services just sitting on a relaxing chair.',
        bgImage: 'main-banner-image',
        customClass: 'is-homepage',
      };
      await store.dispatch('setHeaderData', headerData);
      return {
        achievementSectionData: {
          bgImage: 'achievements-banner',
        },
      };
    },
    head() {
      return {
        title: 'Homepage | Kerneltech',
      };
    },
    name: 'IndexPage',
    data() {
    return {
      pageId: '#hello'
    };  
  },
  mounted() {
    // Generate a random ID
    this.pageId = Math.random().toString(36).substring(2);
  }
  };
  
</script>