
<template>
  <section class="py-[80px]">
    <div class="first-container-var">
        <div class="row flex justify-start lg:px-0 px-4 md:flex-row flex-col-reverse md:gap-[57px] gap-[30px]">
          <div class="md:w-[75%]">
              <h3 class="xl:text-f-45 md:text-f-30 text-f-26 font-fw-700 leading-lh-54 letest-news-h3 text-second-color-var">
                Latest News
              </h3>

              <div id="default-tab-content">
                <div v-if="posts.length === 0" class="text-f-20 font-fw-700 text-second-color-var mt-4">
                  No Posts Found
                </div>
                <article v-for="post of paginatedPosts" :key="post.slug" class="sm:p-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="bg-first-color-var shadow-second-boxshadow-var mt-6 lg:w-[800px]">
                      <nuxt-link :to="`/blog/${post.slug}`">
                          <img :src="getImageSource(post.img)" class="lg:min-h-[458px] lg:max-h-[458px] blog-featured-image lg:min-w-[800px] lg:w-[800px] w-[100%] max-w-[100%] min-w-[100%]" alt="">
                          <div class="sm:px-[30px] px-[16px] pt-[17px]">
                            <div class="flex items-center mt-[12px] sm:gap-12 gap-8">
                                <div class="flex items-center gap-2">
                                  <img src="~/assets/images/profile-icon.svg" alt="" class="w-[20px] h-[20px]">
                                  <p class="sm:text-f-18 text-f-14 font-fw-500 leading-lh-21 text-[#9E9E9E] mb-0">
                                    {{ post.author.name }}
                                  </p>
                                </div>
                                <div class="flex items-center gap-2">
                                  <img src="~/assets/images/calendar.svg" alt="" class="w-[20px] h-[20px]">
                                  <p class="sm:text-f-18 text-f-14 font-fw-500 leading-lh-21 text-[#9E9E9E] mb-0">{{ post.published_date }}</p>
                                </div>
                            </div>
                            <h4 class="sm:text-f-24 text-f-20 font-fw-700 leading-lh-28 pt-4 text-second-color-var">
                              <nuxt-link :to="`/blog/${post.slug}`">
                                {{ post.title }}
                              </nuxt-link>
                            </h4>
                          </div>
                      </nuxt-link>
                      <div class="sm:px-[30px] px-[16px] pb-[30px]">
                          <p class="max-w-[661px] sm:text-f-18 text-f-14 font-fw-400 sm:leading-lh-30 leading-lh-26 mt-[5px] text-[#4A4A4A]">
                            {{ post.description }}
                          </p>
                          <nuxt-link :to="`/blog/${post.slug}`">
                            <button class="blog-read-more text-f-16 bg-second-bg-color-var text-first-color-var py-[13px] px-[25px] rounded-second-radius-var mt-6 mb-2 hover:bg-transparent hover:border-[#0094F4] hover:text-third-color-var border-0 font-fw-500 leading-lh-19 transition-all duration-300">
                              Read More
                            </button>
                          </nuxt-link>
                      </div>
                    </div>
                  </article>
                  <!-- pagination code starts from here -->
                  <div class="pagination-container flex justify-center  gap-2 mt-[80px]" v-if="totalPages > 1">
                    <button
                        v-if="currentPage > 1"
                        @click="changePage(currentPage - 1)"
                        class="pagination-button "
                        >
                    <img src="~/assets/images/previous-blog.svg" class="w-[30px]" alt="">
                    </button>
                    <button
                        v-for="page in totalPages"
                        :key="page"
                        @click="changePage(page)"
                        :class="{ active: page === currentPage }"
                        id="pagination-content" class="pagination-button flex items-center justify-center sm:px-4 px-3.5 leading-tight text-white sm:h-[40px] h-[33px] sm:w-[38px] w-[33px] bg-second-bg-color-var hover:border hover:border-[#efefef] hover:bg-[#efefef] duration-75 rounded-full hover:text-gray-700 sm:text-f-18 text-f-16 font-fw-600 sm:leading-lh-21 leading-26"
                        >
                    {{ page }}
                    </button>
                    <button
                        v-if="currentPage < totalPages"
                        @click="changePage(currentPage + 1)"
                        class="pagination-button"
                        >
                    <img src="~/assets/images/next-blog.svg" class="w-[30px]" alt="">
                    </button>
                  </div>
                  <!-- pagination code ends here -->
              </div>
          </div>

          <!-- categories links starts from here -->
          <div class="md:w-[25%]">
            <h3 class="xl:text-f-45 md:text-f-30 text-f-26 font-fw-700 leading-lh-54 catagories-h3 text-second-color-var">
              Catagories</h3>
            <ul class="-mb-px text-sm font-medium md:mt-9 mt-5" id="default-tab" data-tabs-toggle="#default-tab-content"
              role="tablist">
              <li class="me-2" role="presentation">
                <NuxtLink to="/blog/category/graphic-design">
                  <button
                  class="inline-block py-[8px] border-b-2 border-fouth-border-color-var w-full text-start text-f-16 font-fw-400 leading-lh-19 text-sixth-color-var focus:text-sixth-color-var"
                  id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                  aria-selected="false">Graphic Design</button>
                </NuxtLink>
              </li>
              <li class="me-2" role="presentation">
                <NuxtLink to="/blog/category/web-development">
                  <button
                    class="inline-block py-[8px] border-b-2 border-fouth-border-color-var w-full text-start text-f-16 font-fw-400 leading-lh-19 text-sixth-color-var focus:text-sixth-color-var focus:border-[#d9d9d9]"
                    id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings"
                    aria-selected="false">Web Development</button>
                </NuxtLink>
              </li>
              <li role="presentation">
                <NuxtLink to="/blog/category/e-commerce">
                  <button
                    class="inline-block py-[8px] border-b-2 border-fouth-border-color-var w-full text-start text-f-16 font-fw-400 leading-lh-19 text-sixth-color-var focus:text-sixth-color-var focus:border-[#d9d9d9]"
                    id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts"
                  aria-selected="false">E-Commerce</button>
                </NuxtLink>
              </li>
              <li role="presentation">
                <NuxtLink to="/blog/category/digital-marketing">
                <button
                  class="inline-block py-[8px] border-b-2 border-fouth-border-color-var w-full text-start text-f-16 font-fw-400 leading-lh-19 text-sixth-color-var focus:text-sixth-color-var focus:border-[#d9d9d9]"
                  id="contacts-tab-1" data-tabs-target="#contacts-1" type="button" role="tab" aria-controls="contacts-1"
                  aria-selected="false">Digital Marketing</button>
                </NuxtLink>

              </li>
              <li class="me-2" role="presentation">
                <NuxtLink to="/blog/category/mobile-app-development">
                <button
                  class="inline-block py-[8px]  w-full text-start text-f-16 font-fw-400 leading-lh-19 text-sixth-color-var focus:text-sixth-color-var focus:border-[#d9d9d9]"
                  id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                  aria-selected="false">Mobile App Development</button>
                </NuxtLink>
              </li>
            </ul>
          </div>
          <!-- categories links ends here -->
        </div>
    </div>
  </section>
</template>
<script>
  export default {
    layout:'MainFrontLayout',
    data() {
      return {
        posts: [],
        itemsPerPage: 2,
        currentPage: 1,
      };
    },
    computed: {
      paginatedPosts() {
        const startIndex = (this.currentPage - 1) * this.itemsPerPage;
        const endIndex = startIndex + this.itemsPerPage;
        return this.posts.slice(startIndex, endIndex);
      },
      totalPages() {
        return Math.ceil(this.posts.length / this.itemsPerPage);
      },
    },
    methods: {
      getImageSource(imageName) {
        return require(`~/assets/images/${imageName}.png`);
      },
      changePage(page) {
        this.currentPage = page;
      },
    },
    async fetch() {
      this.posts = await this.$content("articles").fetch();
      console.log(this.posts, "post");
    },
    async asyncData({ params, $content }) {
      const page = parseInt(params.page) || 1;
      const limit = 5; // Adjust the number of posts per page as needed
      const { pages } = await $content("articles").only(['slug']).fetch();

      return {
        page,
        pages: Math.ceil(pages / limit),
      };
    },
    async asyncData({ store }) {
      const headerData = {
        title: 'Blog',
        description: 'We started our journey in 2012. And looking back it has been an awesome ride with lots of ups and downs. But whatever be the situation, we were always trying to move forward.',
        description1: 'Icing croissant croissant jelly gummi bears cotton candy jujubes apple pie caramels. Dragée soufflé bonbon powder. Sesame snaps sugar plum chupa chups tart wafer caramels toffee.',
        bgImage: 'blog-banner-image',
        customClass: 'is-blogpage ',
      };
      await store.dispatch('setHeaderData', headerData);
      return {
      };
    },
    head() {
      return {
        title: 'Blog | Kerneltech',
      };
    },
    name: 'Blog',
  };
</script>