<template>
    <!-- blogs -->
    <section id="blogs" class="lg:mt-[10px] md:pt-12 md:pb-[80px] py-[50px]  xl:px-0 px-4 bg-[#f7f7f7]">
      <div class="first-container-var">
        <div class="more-read">
          <h1
            class="md:text-f-45 text-f-30 text-second-color-var leading-lh-normal font-fw-700 pb-0 mb-[40px] md:mt-6 mt-[10px]">
            There’s More To Read</h1>
          <!-- cards -->
          <div class="main-blogs flex flex-wrap gap-[30px] justify-center" id="article-container"></div>
          <div v-for="(article, index) in allArticles" :key="index">
            <a :href="article.name">
              <div class="blog-card w-[380px]  md:mt-0 lg:me-0 bg-[#FFF]">
                <img :src="article.image" class="blog-card-img" :alt="article.name"/>
                <div class="lg:px-6 px-3 shadow-second-boxshadow-var">
                  <div class="flex pt-5 pb-3">
                    <div class="flex items-center">
                      <img :src="article.profileIcon" class="h-[16px]" :alt="article.profileAlt"/>
                      <p class="text-f-14 text-fouth-color-var ps-1 font-medium">{{ article.author }}</p>
                    </div>
                    <div class="flex items-center ps-16">
                      <img src="~/assets/images/calendar.svg" class="h-[16px]" alt=""/>
                      <p class="text-f-14 text-fouth-color-var ps-1 font-medium">{{ article.published_date }}</p>
                    </div>
                  </div>
                  <h3 class="text-f-18 text-second-color-var font-fw-700 leading-lh-26 pt-1">{{ article.title }}</h3>
                  <p class="text-f-16 leading-[27px] font-fw-400 text-sixth-color-var pt-2">{{ article.description }}</p>
                  <div class="flex justify-center items-center mt-7 pb-8">
                    <button
                      class="bg-third-color-var read-more-btn text-white hover:bg-white border-transparent border-2 hover:text-seventh-color-var px-[25px] text-f-14 py-[13px] font-fw-500 leading-lh-normal rounded-second-radius-var">Read More</button>
                  </div>
                </div>
              </div>
            </a>
          </div>
  
          <!-- responsive slider -->
          <div class="main-blogs hidden gap-[30px] ">
            <carousel :loop="true" :nav="false" :dots="false" :responsive="{0:{items:1, margin:8 },370:{items:1.1},441:{items:1.4},615:{items:2},820:{items:2.4},1000:{items:3}}">
              <div class="item flex justify-center lg:pb-8 pb-5">
                <a href="javascript:void(0)">
                  <div class="blog-card md:mt-0 lg:me-0 bg-[#FFF] h-[100%]">
                    <img src="~/assets/images/blog-seo.png" class="blog-card-img" alt="">
                    <div class="lg:px-6 px-3 shadow-second-boxshadow-var">
                      <div class="flex pt-5 pb-3">
                        <div class="flex items-center">
                          <img src="~/assets/images/profile-icon.svg" class="h-[16px] w-[16px] blog-icon" alt="">
                          <p class="text-f-14 text-fouth-color-var ps-1 font-medium">John Mark</p>
                        </div>
                        <div class="flex items-center sm:ps-16 ps-14">
                          <img src="~/assets/images/calendar.svg" class="h-[16px] w-[16px] blog-icon" alt="">
                          <p class="text-f-14 text-fouth-color-var ps-1 font-medium">Aug 30, 2022 </p>
                        </div>
                      </div>
                      <h3 class="text-f-18 text-second-color-var font-fw-700 leading-lh-26 pt-1">How to hire offshore staff
                        for your software company?</h3>
                      <p class="text-f-16 leading-[27px] font-fw-400 text-sixth-color-var pt-2">Recruitment process might be the trickiest
                        things for any organization to attempt head scratch, as you aren’t fully aware of.......</p>
                      <div class="flex justify-center items-center mt-7 pb-8">
                        <button
                          class="bg-third-color-var read-more-btn text-white hover:bg-white border-transparent border-2 hover:text-seventh-color-var px-[25px] text-f-14 py-[13px] font-fw-500 leading-lh-normal rounded-second-radius-var">Read
                          More</button>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="item flex justify-center lg:pb-8 pb-5">
                <a href="javascript:void(0)">
                  <div class="blog-card  bg-[#FFF] h-[100%]">
                    <img src="~/assets/images/blog-2.png" class="blog-card-img " alt="">
                    <div class="lg:px-6 px-3 shadow-second-boxshadow-var">
                      <div class="flex pt-5 pb-3">
                        <div class="flex items-center">
                          <img src="~/assets/images/profile-icon.svg" class="h-[16px] w-[16px] blog-icon" alt="">
                          <p class="text-f-14 text-fouth-color-var ps-1 font-medium">Philip Joe</p>
                        </div>
                        <div class="flex items-center ps-16">
                          <img src="~/assets/images/calendar.svg" class="h-[16px] w-[16px] blog-icon" alt="">
                          <p class="text-f-14 text-fouth-color-var ps-1 font-medium">Sep 01, 2022</p>
                        </div>
                      </div>
                      <h3 class="text-f-18 text-second-color-var font-fw-700 leading-lh-26 pt-1">How to hire offshore staff
                        for your software company?</h3>
                      <p class="text-f-16 leading-[27px] text-sixth-color-var pt-2">Recruitment process might be the trickiest
                        things for any organization to attempt head scratch, as you aren’t fully aware of.......</p>
                      <div class="flex justify-center items-center mt-7 pb-8">
                        <button
                          class="bg-third-color-var text-white px-[25px] read-more-btn hover:bg-white border-transparent border-2 hover:text-seventh-color-var text-f-14 py-[13px] font-fw-500 leading-lh-normal rounded-second-radius-var">Read
                          More</button>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="item flex justify-center lg:pb-8 pb-5">
                <a href="javascript:void(0)">
                  <div class="blog-card bg-[#FFF] h-[100%]">
                    <img src="~/assets/images/blog-post-2.png" class="blog-card-img" alt="">
                    <div class="lg:px-6 px-3  shadow-second-boxshadow-var">
                      <div class="flex pt-5 pb-3">
                        <div class="flex items-center">
                          <img src="~/assets/images/profile-icon.svg" class="h-[16px] w-[16px] blog-icon" alt="">
                          <p class="text-f-14 text-fouth-color-var ps-1 font-medium">Ben Ducket</p>
                        </div>
                        <div class="flex sm:ps-16 ps-14 items-center">
                          <img src="~/assets/images/calendar.svg" class="h-[16px] w-[16px] blog-icon" alt="">
                          <p class="text-f-14 text-fouth-color-var ps-1 font-medium">Sep 03, 2022</p>
                        </div>
                      </div>
                      <h3 class="text-f-18 text-second-color-var font-fw-700 leading-lh-26 pt-1">How to hire offshore staff
                        for your software company?</h3>
                      <p class="text-f-16 leading-[27px] text-sixth-color-var pt-2">Recruitment process might be the trickiest
                        things for any organization to attempt head scratch, as you aren’t fully aware of.......</p>
                      <div class="flex justify-center items-center mt-7 pb-8">
                        <button
                          class="bg-third-color-var text-white px-[25px] hover:text-seventh-color-var border-transparent border-2 hover:bg-white read-more-btn text-f-14 py-[13px] font-fw-500 leading-lh-normal rounded-second-radius-var">Read
                          More</button>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </carousel>
          </div>
        </div>
      </div>
    </section>
  </template>

  <script>
    import { fetchAllArticles } from '@/services/apiService';
    export default {
      mounted() {
        let currentURL = window.location.pathname;
        this.blogContent(currentURL);
      },
      methods: {
      async blogContent(currentPath) {
        if (currentPath.includes('blog')) {
          fetchAllArticles()
          .then(articles => {
            // Show only the first three articles
            const firstThreeArticles = articles.slice(0, 3);

            if (firstThreeArticles.length > 0) {
              function getImageSource(imageName) {
                return require(`~/assets/images/${imageName}.svg`);
              }
              function sanitizeHTML(html) {
                  const div = document.createElement('div');
                  div.innerHTML = html;
                  return div.textContent || div.innerText || '';
              }
              function truncateString(str, maxLength) {
                if (str.length > maxLength) {
                  return str.substring(0, maxLength - 3) + '...';
                } else {
                  return str;
                }
              }
              const articleContainer = $('#article-container');
              articleContainer.empty(); // Clear existing articles

              firstThreeArticles.forEach(article => {
                const sanitizedDescription = sanitizeHTML(article.description); // Remove HTML tags
                const truncatedDescription = truncateString(sanitizedDescription, 124); // Truncate description

                // Code for generating and appending article cards...
                const articleCard = $('<div>').addClass('blog-card w-[380px]  md:mt-0 lg:me-0 bg-[#FFF]');
                
                const articleLink = $('<a>').attr('href', article.link);

                console.log(article);
                const articleImage = $('<img>').attr({
                  'src': article.featured_image_url,
                  'class': 'blog-card-img max-h-[194px]',
                  'alt': article.alt
                });
                const articleContent = $('<div>').addClass('flex flex-col relative lg:px-6 px-3 shadow-second-boxshadow-var min-h-[283px]');
                const authorDateWrapper = $('<div>').addClass('flex pt-5 pb-3');

                const authorInfo = $('<div>').addClass('flex');
                const authorIcon = $('<img>').attr('src', getImageSource('profile-icon')).addClass('h-[16px]');
                const authorName = $('<p>').addClass('capitalize text-f-14 text-fouth-color-var ps-1 font-medium').text(article.author_name);

                const dateInfo = $('<div>').addClass('flex items-center ps-16');
                const dateIcon = $('<img>').attr('src', getImageSource('calendar')).addClass('h-[16px]');
                const articleDate = $('<p>').addClass('text-f-14 text-fouth-color-var ps-1 font-medium').text(article.more_to_read_date);

                authorInfo.append(authorIcon, authorName);
                dateInfo.append(dateIcon, articleDate);
                authorDateWrapper.append(authorInfo, dateInfo);

                const articleTitle = $('<h3>').addClass('capitalize text-f-18 text-second-color-var font-fw-700 leading-lh-26 pt-1').text(article.title);
                const articleDescription = $('<p>').addClass('text-f-16 leading-[27px] font-fw-400 text-sixth-color-var pt-1').text(truncatedDescription);

                const readMoreButton = $('<button>').addClass('absolute bottom-[25px] bg-third-color-var read-more-btn text-white hover:bg-white border-transparent border-2 hover:text-seventh-color-var px-[25px] text-f-14 py-[13px] font-fw-500 leading-lh-normal rounded-second-radius-var self-center').text('Read More');

                articleContent.append(authorDateWrapper, articleTitle, articleDescription, readMoreButton);
                articleLink.append(articleImage, articleContent);
                articleCard.append(articleLink);
                articleContainer.append(articleCard);
              });
            } else {
              // If no articles fetched, keep the existing content as it is
              console.log('No articles found');
            }
          })
          .catch(error => {
            console.error('Error fetching articles:', error);
          });
        }
      },
    }
  }
  </script>