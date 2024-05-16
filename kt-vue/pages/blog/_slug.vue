<template>
  <div class="md:mx-auto min-h-screen mt-2">
    <div v-if="post">
      <!-- main blog single page content starts from here -->
      <div class="row pt-12 pb-20 lg:px-0 px-4 flex flex-col items-center">
        <h3
          class="max-w-[880px] lg:text-f-40 md:text-f-35 sm:text-f-30 text-f-25 text-second-color-var font-fw-700 leading-lh-normal text-center md:mt-0 mt-20 blog-single-page-title capitalize">{{ post.title }}</h3>
        <div class="lg:w-[880px] sm:w-[600px] w-full sm:flex justify-between py-[23px] author-div">
          <div class="flex sm:gap-5 gap-2 flex-row justify-between sm:justify-start">
            <div class="flex gap-2 items-center">
              <img class="h-[24px] w-[24px]" src="~/assets/images/profile-icon.svg" alt="">
              <p class="capitalize lg:text-f-22 md:text-f-18 text-f-14 font-fw-500 leading-lh-26 text-fouth-color-var">
                {{ post.author.name }}
              </p>
            </div>
            <div class="flex gap-2 items-center">
              <img class="h-[24px] w-[24px]" src="~/assets/images/calendar.svg" alt="">
              <p class="capitalize lg:text-f-22 md:text-f-18 text-f-14 font-fw-500 leading-lh-26 text-fouth-color-var">
                {{ post.published_date }}
              </p>
            </div>
          </div>
          <div class="flex gap-2 sm:mt-0 mt-4">
            <a href="#"><img class="sm:h-[30px] h-[30px]" src="~/assets/images/facebook-icon.svg" alt=""></a>
            <a href="#"><img class="sm:h-[30px] h-[30px]" src="~/assets/images/twitter-icon.svg" alt=""></a>
            <a href="#"><img class="sm:h-[30px] h-[30px]" src="~/assets/images/linkedin-icon.svg" alt=""></a>
            <a href="#"><img class="sm:h-[30px] h-[30px]" src="~/assets/images/copylink-icon.svg" alt=""></a>
          </div>
        </div>
        <img class="lg:w-[880px] sm:w-[600px] w-full mt-[4px] xl:h-[496px]" :src="post.img" alt="">
        <div class="lg:w-[880px] mb-[26px] mt-[30px]">
          <p class="sm:text-f-20 text-f-16 font-fw-400 sm:leading-lh-40 leading-lh-35 mt-[15px] text-sixth-color-var" v-html="post.description"></p>
        </div>
        <div class="lg:w-[880px] flex flex-col items-center mt-[20px]">
          <img :src="post.author.image" alt="" class="min-h-20 min-w-20 max-h-20 max-w-20 rounded-full">
          <p class="capitalize text-center text-f-18 mt-[6px] font-bold text-third-color-var sm:leading-lh-32 leading-lh-28">
            {{ post.author.name }}</p>
          <p
            class="sm:text-f-18 text-f-14 font-fw-400 sm:leading-lh-35 leading-lh-30 mt-[15px] text-sixth-color-var text-center" v-html="post.author.bio"></p>
        </div>
      </div>
    </div>
    <MoreToRead/>
  </div>
</template>

<script>
import MoreToRead from "@/components/MoreToRead";
export default {
  layout:'SecondaryLayout',
  data() {
    return {
      post: null,
    };
  },
  async fetch() {
    this.isLoading = true;
    this.post = (
      await this.$content("articles")
        .where({ slug: this.$route.params.slug })
        .limit(1)
        .fetch()
    )?.[0];
    this.isLoading = false;
  },
  head() {
    return {
      title: this.post?.title,
      meta: [
        {
          hid: "description",
          name: this.post?.title,
          content: this.post?.description,
        },
      ],
    };
  },
};
</script>