<template>
  <!-- blogs -->
  <section id="blogs" class="lg:mt-[160px] mb-[90px] px-4">
    <div class="first-container-var">
      <div class="blogs">
        <h1
          class="md:text-f-45 text-f-30 text-second-color-var leading-lh-normal font-fw-700 pb-0 mb-[40px] md:mt-10 mt-[55px] ">
          Blogs</h1>
        <!-- cards -->
        <div class="main-blogs xl:flex hidden flex-wrap gap-[30px] justify-center">
          <a href="javascript:void(0)">
            <div class="blog-card w-[380px] xl:h-[500px] h-auto md:mt-0 lg:me-0">
              <img src="~/assets/images/blog-seo.png" class="blog-card-img" alt=""/>
              <div class="lg:px-6 px-3 shadow-second-boxshadow-var">
                <div class="flex pt-5 pb-3">
                  <div class="flex items-center">
                    <img src="~/assets/images/profile-icon.svg" class="h-[16px]" alt=""/>
                    <p class="text-f-14 text-fouth-color-var ps-1 font-medium">John Mark</p>
                  </div>
                  <div class="flex items-center ps-16">
                    <img src="~/assets/images/calendar.svg" class="h-[16px]" alt=""/>
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
          <a href="javascript:void(0)">
            <div class="blog-card w-[380px] h-[500px] ">
              <img src="~/assets/images/blog-2.png" class="blog-card-img" alt=""/>
              <div class="lg:px-6 px-3 shadow-second-boxshadow-var">
                <div class="flex pt-5 pb-3">
                  <div class="flex items-center">
                    <img src="~/assets/images/profile-icon.svg" class="h-[16px]" alt=""/>
                    <p class="text-f-14 text-fouth-color-var ps-1 font-medium">Philip Joe</p>
                  </div>
                  <div class="flex items-center ps-16">
                    <img src="~/assets/images/calendar.svg" class="h-[16px]" alt=""/>
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
          <a href="javascript:void(0)">
            <div class="blog-card w-[380px] h-[500px] ">
              <img src="~/assets/images/blog-post-2.png" class="blog-card-img" alt=""/>
              <div class="lg:px-6 px-3  shadow-second-boxshadow-var">
                <div class="flex pt-5 pb-3">
                  <div class="flex items-center">
                    <img src="~/assets/images/profile-icon.svg" class="h-[16px]" alt=""/>
                    <p class="text-f-14 text-fouth-color-var ps-1 font-medium">Ben Ducket</p>
                  </div>
                  <div class="flex sm:ps-16 ps-14 items-center">
                    <img src="~/assets/images/calendar.svg" class="h-[16px]" alt=""/>
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

        <!-- responsive slider -->
        <div class="main-blogs xl:hidden gap-[30px] mb-[-50px]">
          <carousel :loop="true" :nav="false" :dots="false" :responsive="{0:{items:1, margin:8 },370:{items:1.1},441:{items:1.4},615:{items:2},820:{items:2.4},1000:{items:3}}">
            <div class="item flex justify-center lg:pb-8 pb-5">
              <a href="javascript:void(0)">
                <div class="blog-card  h-[525px]  md:mt-0 lg:me-0  ">
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
                <div class="blog-card  h-[525px] ">
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
                <div class="blog-card  h-[525px] ">
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