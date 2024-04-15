<template>
    <div>
      <PrivacyPolicyContent/>
    </div>
  </template>
  <script>
    import PrivacyPolicyContent from "@/components/PrivacyPolicyContent";
    export default {
      layout: 'MainFrontLayout',
      async asyncData({ store }) {
        const headerData = {
          title: 'Privacy Policy',
          description: 'We started our journey in 2012. And looking back it has been an awesome ride with lots of ups and downs. But whatever be the situation, we were always trying to move forward.',
          description1: 'Icing croissant croissant jelly gummi bears cotton candy jujubes apple pie caramels. Dragée soufflé bonbon powder. Sesame snaps sugar plum chupa chups tart wafer caramels toffee.',
          bgImage: 'privacy-policy-banner',
          customClass: 'is-privacy-page',
        };
        await store.dispatch('setHeaderData', headerData);
        return {
      
        };
      },
      head() {
        return {
          title: 'Privacy Policy | Kerneltech',
        };
      },
      name: 'PrivacyPolicy',
    };
  </script>