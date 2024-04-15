<template>
    <section id="testimonial" class="sm:py-[55px] py-[50px]">
       <div class="first-container-var">
          <div class="row px-4 xl:px-0">
             <h2 class="sm:text-f-45 text-f-35 font-bold sm:leading-lh-54 leading-lh-40 mb-4">Testimonials</h2>
             <h3 class="md:text-f-30 sm:text-f-24 text-f-20 font-bold sm:leading-[40px] leading-lh-27 pt-1">Here What
                They Have To
                Say <br class="lg:block hidden"> About Us! 
             </h3>
             <div class="sm:mt-[44px] mt-[30px] mb-[18px] relative z-0">
                <!-- if condition -->
                <carousel v-if="hasApiData" :key="index" :autoplay="true" :loop="true" :nav="false" :dots="false" :margin="8"
                   :responsive="{ 0: { items: 1, margin: 8 }, 576: { items: 2 }, 1280: { items: 3 } }">
                   <div class="item" v-for="(testimonials, index) in testimonials" :key="index">
                        <div class="bg-fifth-bg-color-var duration-500 xl:min-h-[435px] sm:min-h-[486px] min-h-[435px] shadow-first-boxshadow-var rounded-first-radius-var hover:bg-second-bg-color-var sm:px-[37px] sm:pt-[30px] px-[24px] pt-[24px] sm:pb-[30px] pb-[30px] testimonial-card xl:flex flex items-center justify-between flex-col">
                            <div>
                                <img class="h-5 w-5 quote-hover" src="~assets/images/quote.svg" alt="" />
                                <p class="text-center sm:text-f-16 text-f-14 font-normal sm:leading-[32px] leading-[28px] pt-[25px] text-sixth-color-var px-2">
                                    {{ testimonials.description }}
                                </p>
                            </div>
                            <div>
                                <div class="testimonial-profile-picture sm:pt-[32px] pt-[24px]">
                                <img class="sm:w-24 w-20 sm:h-24 h-20 rounded-full" :src="testimonials.testimonial_image_url" alt="" />
                                </div>
                                <p class="text-center text-f-16 mt-[-10px] font-semibold text-seventh-color-var sm:leading-lh-23 leading-lh-23">{{ testimonials.name }}</p>
                                <p class="text-center text-f-12 font-normal text-sixth-color-var leading-lh-14 mb-[10px]">
                                    {{ testimonials.designation }}
                                </p>
                            </div>
                        </div>
                   </div>
                </carousel>

                <!-- else condition -->
                <carousel v-if="this.testimonials.length == undefined" :autoplay="true" :loop="true" :nav="false" :dots="false"
                   :margin="8" :responsive="{ 0: { items: 1, margin: 8 }, 576: { items: 2 }, 1280: { items: 3 } }">
                   <div class="item">
                      <div
                         class="bg-fifth-bg-color-var duration-500 xl:min-h-[435px] sm:min-h-[486px] min-h-[435px] shadow-first-boxshadow-var rounded-first-radius-var hover:bg-second-bg-color-var sm:px-[37px] sm:pt-[30px] px-[24px] pt-[24px] sm:pb-[30px] pb-[30px] testimonial-card xl:block flex justify-center flex-col">
                         <img class="h-5 w-5 quote-hover" src="~assets/images/quote.svg" alt="" />
                         <p
                            class="text-center sm:text-f-16 text-f-14 font-normal sm:leading-[32px] leading-[28px] pt-[25px] text-sixth-color-var">
                            “I
                            loved working with Kernel Tech. I was <br class="xl:inline hidden"> surprised by
                            their swift response and <br class="xl:inline hidden"> efforts they made our
                            experience <br class="xl:inline hidden"> superlative and their team excelled our <br
                               class="xl:inline hidden"> expectations.”
                         </p>
                         <div class="sm:pt-[44px] pt-[24px]">
                            <img class=" sm:w-24 w-20 sm:h-24 h-20 rounded-full"
                               src="~assets/images/testimonial-person-1.svg" alt="" />
                         </div>
                         <p
                            class="text-center text-f-16 mt-[-10px] font-semibold text-seventh-color-var sm:leading-lh-23 leading-lh-23">
                            Smith Williams
                         </p>
                         <p class="text-center text-f-12 font-normal text-sixth-color-var leading-lh-14">Manager,
                            R & B Group
                         </p>
                      </div>
                   </div>
                   <div class="item">
                      <div
                         class="bg-fifth-bg-color-var duration-500 xl:min-h-[435px] sm:min-h-[486px] min-h-[435px] shadow-first-boxshadow-var rounded-first-radius-var hover:bg-second-bg-color-var sm:px-[37px] sm:pt-[30px] px-[24px] pt-[24px] sm:pb-[30px] pb-[30px] testimonial-card xl:block flex justify-center flex-col ">
                         <img class="h-5 w-5 quote-hover" src="~assets/images/quote.svg" alt="" />
                         <p
                            class="text-center sm:text-f-16 text-f-14 font-normal sm:leading-[32px] leading-[28px] pt-[25px] text-sixth-color-var">
                            “Our
                            company worked with Kernel Tech <br class="xl:inline hidden"> for developing a
                            website to support <br class="xl:inline hidden"> business functions. Our experience
                            was <br class="xl:inline hidden"> superlative and their team excelled our <br
                               class="xl:inline hidden"> expectations.”
                         </p>
                         <div class="sm:pt-[44px] pt-[24px]">
                            <img class=" sm:w-24 w-20 sm:h-24 h-20 rounded-full"
                               src="~assets/images/testimonial-person-2.svg" alt="" />
                         </div>
                         <p
                            class="text-center text-f-16 mt-[-10px] font-semibold text-third-color-var sm:leading-lh-23 leading-lh-23">
                            Maria Swartzki
                         </p>
                         <p class="text-center text-f-12 font-normal text-[#4A4A4A] leading-lh-14">Manager, R & B
                            Group
                         </p>
                      </div>
                   </div>
                   <div class="item">
                      <div
                         class="bg-[#FFFFFFD9] duration-500 xl:min-h-[435px] sm:min-h-[486px] min-h-[435px] shadow-first-boxshadow-var rounded-first-radius-var hover:bg-[#0094F4] sm:px-[37px] sm:pt-[30px] px-[24px] pt-[24px] sm:pb-[30px] pb-[30px] testimonial-card xl:block flex justify-center flex-col ">
                         <img class="h-5 w-5 quote-hover" src="~assets/images/quote.svg" alt="" />
                         <p
                            class="text-center sm:text-f-16 text-f-14 font-normal sm:leading-[32px] leading-[28px] pt-[25px] text-sixth-color-var">
                            “Our
                            company worked with Kernel Tech <br class="xl:inline hidden"> for developing a
                            website to support <br class="xl:inline hidden"> business functions. Our experience
                            was <br class="xl:inline hidden"> superlative and their team excelled our <br
                               class="xl:inline hidden"> expectations.”
                         </p>
                         <div class="sm:pt-[44px] pt-[24px]">
                            <img class=" sm:w-24 w-20 sm:h-24 h-20 rounded-full"
                               src="~assets/images/testimonial-person-3.svg" alt="" />
                         </div>
                         <p
                            class="text-center text-f-16 mt-[-10px] font-semibold text-[#0C7DD7] sm:leading-[23px] leading-[23px]">
                            Maria Swartzki
                         </p>
                         <p class="text-center text-[12px] font-normal text-[#4A4A4A] leading-[14.4px]">Manager,
                            R & B Group
                         </p>
                      </div>
                   </div>
                </carousel>
             </div>
          </div>
       </div>
    </section>
 </template>
 <script lang="">
    import axios from 'axios';
    export default {
        data() {
            return {
                testimonials: [],
                hasApiData: false,
            }
        },
        mounted() {
            this.TestimonialData();
        },
        methods: {
            async TestimonialData() {
                try {
                    const response = await axios.post(`${process.env.API_BASE_URL}api/testimonial-data`);
                    this.testimonials = response.data;
                     if (this.testimonials.length !== undefined && !this.isRenderingComplete) {
                        this.isRenderingComplete = true;
                        this.$nextTick(() => {
                           this.hasApiData = true;
                        });
                     } else {
                        this.hasApiData = false;    
                     }
                } catch {
                    this.hasApiData = false;
                    console.log('Error fetching testimonials data');
                }
            },
        },
    }
 </script>