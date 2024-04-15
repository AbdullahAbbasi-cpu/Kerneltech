<template>
    <section class="industries-bg xl:px-0">
       <div class="first-container-var">
          <div class="px-4 xl:px-0 row flex justify-between sm:py-16 pt-10 pb-16 lg:items-center lg:flex-row flex-col">
             <div class="text-white">
                <div id="industries-we-serve">
                   <h3 class="sm:text-f-45 text-f-35 lg:pe-6 pe-0 font-fw-700 text-white leading-lh-normal">Industries <br
                      class="lg:block hidden"> we serve </h3>
                </div>
             </div>
             <div class=" flex-col lg:block hidden">
                <div class="text-white flex justify-center gap-12">
                   <div class=" text-center flex flex-col justify-center items-center min-w-[80px] max-w-[80px]">
                      <div class="industries-icon">
                         <img src="~assets/images/healthcare-icon.svg" alt=""/>
                      </div>
                      <p class="pt-1 text-f-16 font-fw-500">Healthcare</p>
                   </div>
                   <div class=" text-center flex flex-col justify-center items-center min-w-[80px] max-w-[80px]">
                      <div class="industries-icon">
                         <img src="~assets/images/education-icon.svg" alt=""/>
                      </div>
                      <p class="pt-1 text-f-16 font-fw-500">Education</p>
                   </div>
                   <div class=" text-center flex flex-col justify-center items-center min-w-[80px] max-w-[80px]">
                      <div class="industries-icon">
                         <img src="~assets/images/logistics-icon.svg" class="w-[70px]" alt=""/>
                      </div>
                      <p class="pt-1 text-f-16 font-fw-500">Logistics</p>
                   </div>
                   <div class=" text-center flex flex-col justify-center items-center min-w-[80px] max-w-[80px]">
                      <div class="industries-icon">
                         <img src="~assets/images/retail-icon.svg" alt=""/>
                      </div>
                      <p class="pt-1 text-f-16 font-fw-500">Retail</p>
                   </div>
                   <div class=" text-center flex flex-col justify-center items-center min-w-[80px] max-w-[80px]">
                      <div class="industries-icon">
                         <img src="~assets/images/finance-icon.svg" alt=""/>
                      </div>
                      <p class="pt-1 text-f-16 font-fw-500">Finance</p>
                   </div>
                   <div class=" text-center flex flex-col justify-center items-center min-w-[80px] max-w-[80px]">
                      <div class="industries-icon">
                         <img src="~assets/images/government-icon.svg" alt=""/>
                      </div>
                      <p class="pt-1 text-f-16 font-fw-500">Government</p>
                   </div>
                </div>
                <div class="text-white flex justify-center mt-7 gap-12">
                   <div class=" text-center flex flex-col justify-center items-center min-w-[80px] max-w-[80px]">
                      <div class="industries-icon">
                         <img src="~assets/images/fitness-icon.svg" alt=""/>
                      </div>
                      <p class="pt-1 text-f-16 font-fw-500">Fitness</p>
                   </div>
                   <div class=" text-center flex flex-col justify-center items-center min-w-[80px] max-w-[80px]">
                      <div class="industries-icon">
                         <img src="~assets/images/oil-&-gas-icon.svg" alt=""/>
                      </div>
                      <p class="pt-1 text-f-16 font-fw-500">Oil & Gas</p>
                   </div>
                   <div class=" text-center flex flex-col justify-center items-center min-w-[80px] max-w-[80px]">
                      <div class="industries-icon">
                         <img src="~assets/images/travel-icon.svg" alt=""/>
                      </div>
                      <p class="pt-1 text-f-16 font-fw-500">Travel</p>
                   </div>
                   <div class=" text-center flex flex-col justify-center items-center min-w-[80px] max-w-[80px]">
                      <div class="industries-icon">
                         <img src="~assets/images/media-icon.svg" alt=""/>
                      </div>
                      <p class="pt-1 text-f-16 font-fw-500">Media</p>
                   </div>
                   <div class=" text-center flex flex-col justify-center items-center min-w-[80px] max-w-[80px]">
                      <div class="industries-icon">
                         <img src="~assets/images/automobile-icon.svg" alt=""/>
                      </div>
                      <p class="pt-1 text-f-16 font-fw-500">Automobile</p>
                   </div>
                   <div class=" text-center flex flex-col justify-center items-center min-w-[80px] max-w-[80px]">
                      <div class="industries-icon">
                         <img src="~assets/images/food-icon.svg" alt=""/>
                      </div>
                      <p class="pt-1 text-f-16 font-fw-500">Food</p>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <!-- responsive-slider -->
       <div class="lg:hidden industries-carousel">
        <carousel :autoplay="true" :loop="true" :nav="true" :dots="false" :margin="0" :responsive="{300:{items:2},500:{items:3},750:{items:5}}">
             <div class="item">
                <div class=" text-center flex flex-col justify-center items-center text-white">
                   <div class="industries-icon">
                      <img src="~assets/images/healthcare-icon.svg" alt=""/>
                   </div>
                   <p class="pt-1 sm:text-f-16 text-f-13 font-fw-500 text-white">Healthcare</p>
                </div>
             </div>
             <div class="item">
                <div class="text-center flex flex-col justify-center items-center">
                   <div class="industries-icon">
                      <img src="~assets/images/education-icon.svg" alt=""/>
                   </div>
                   <p class="pt-1 sm:text-f-16 text-f-13 font-fw-500 text-white">Education</p>
                </div>
             </div>
             <div class="item">
                <div class="text-center flex flex-col justify-center items-center">
                   <div class="industries-icon">
                      <img src="~assets/images/logistics-icon.svg" class="w-[70px]" alt=""/>
                   </div>
                   <p class="pt-1 sm:text-f-16 text-f-13 font-fw-500 text-white">Logistics</p>
                </div>
             </div>
             <div class="item">
                <div class="text-center flex flex-col justify-center items-center">
                   <div class="industries-icon">
                      <img src="~assets/images/retail-icon.svg" alt=""/>
                   </div>
                   <p class="pt-1 sm:text-f-16 text-f-13 font-fw-500 text-white">Retail</p>
                </div>
             </div>
             <div class="item">
                <div class="text-center flex flex-col justify-center items-center">
                   <div class="industries-icon">
                      <img src="~assets/images/finance-icon.svg" alt=""/>
                   </div>
                   <p class="pt-1 sm:text-f-16 text-f-13 font-fw-500 text-white">Finance</p>
                </div>
             </div>
             <div class="item">
                <div class="text-center flex flex-col justify-center items-center ">
                   <div class="industries-icon">
                      <img src="~assets/images/government-icon.svg" alt=""/>
                   </div>
                   <p class="pt-1 sm:text-f-16 text-f-13 font-fw-500 text-white">Government</p>
                </div>
             </div>
             <div class="item">
                <div class="text-center flex flex-col justify-center items-center ">
                   <div class="industries-icon">
                      <img src="~assets/images/fitness-icon.svg" alt=""/>
                   </div>
                   <p class="pt-1 sm:text-f-16 text-f-13 font-fw-500 text-white">Fitness</p>
                </div>
             </div>
             <div class="item">
                <div class="text-center flex flex-col justify-center items-center">
                   <div class="industries-icon">
                      <img src="~assets/images/oil-&-gas-icon.svg" alt=""/>
                   </div>
                   <p class="pt-1 sm:text-f-16 text-f-13 font-fw-500 text-white">Oil & Gas</p>
                </div>
             </div>
             <div class="item">
                <div class="text-center flex flex-col justify-center items-center">
                   <div class="industries-icon">
                      <img src="~assets/images/travel-icon.svg" alt=""/>
                   </div>
                   <p class="pt-1 sm:text-f-16 text-f-13 font-fw-500 text-white">Travel</p>
                </div>
             </div>
             <div class="item">
                <div class="text-center flex flex-col justify-center items-center">
                   <div class="industries-icon">
                      <img src="~assets/images/media-icon.svg" alt=""/>
                   </div>
                   <p class="pt-1 sm:text-f-16 text-f-13 font-fw-500 text-white">Media</p>
                </div>
             </div>
             <div class="item">
                <div class="text-center flex flex-col justify-center items-center">
                   <div class="industries-icon">
                      <img src="~assets/images/automobile-icon.svg" alt=""/>
                   </div>
                   <p class="pt-1 sm:text-f-16 text-f-13 font-fw-500 text-white">Automobile</p>
                </div>
             </div>
             <div class="item">
                <div class="text-center flex flex-col justify-center items-center ">
                   <div class="industries-icon">
                      <img src="~assets/images/food-icon.svg" alt=""/>
                   </div>
                   <p class="pt-1 sm:text-f-16 text-f-13 font-fw-500 text-white">Food</p>
                </div>
             </div>
        </carousel>
       </div>
    </section>
 </template>