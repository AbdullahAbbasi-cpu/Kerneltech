<script setup>
import { onMounted } from 'vue'
import { initDropdowns } from 'flowbite'

onMounted(() => {
    initDropdowns();
})
</script>

<template>
    <div class="first-container-var mx-auto">
    <nav class="dark:bg-gray-900 nav-fixed top-0 px-0 transition-all">
      <div class="flex flex-wrap items-center justify-between mx-auto pb-4 pt-[13px] scroll-container-width">
        <NuxtLink to="/" class="flex items-center space-x-3 rtl:space-x-reverse" id="logoContainer">
          <img src="~assets/images/ktech-logo.svg" alt="" id="logoImage"/>
          <img src="~assets/images/ktech-black-logo.svg" alt="" id="blackLogoImage" class="hidden !ms-0"/>
        </NuxtLink>
        <button data-collapse-toggle="navbar-default" type="button"
          class="nav-toggler inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 bg-[#0093F3] md:hidden focus:bg-[#0093F3] hover:bg-[#0093F3]"
          aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-[50px] h-[38px] transition-transform duration-300 transform-gpu icon-open" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto md:overflow-y-visible overflow-y-auto max-h-[460px]"
          id="navbar-default">
          <ul
            class="fade-in flex flex-col lg:p-4 p-0 mt-4 text-white md:flex-row md:space-x-9 lg:gap-8 gap-4 rtl:space-x-reverse md:mt-0 md:border-0 ms-auto">
            <li>
              <NuxtLink to="/"
                class="main-dropdown block py-2 px-3 hover:text-[#B3B3B3] md:p-0 text-f-14 font-fw-400 active:font-fw-500 multi-toggle"
                aria-current="page">HOME</NuxtLink>
            </li>
            <div class="w-full block " id="navbar-default">
              <ul
                class=" flex flex-col text-white md:flex-row md:space-x-8 lg:gap-8 gap-4 rtl:space-x-reverse md:border-0 ms-auto">

                <button id="multiLevelDropdownButton" data-dropdown-toggle="multi-dropdown"
                  class="services-dropdown flex text-first-color-var items-center justify-between w-full  py-2 px-3 hover:text-[#B3B3B3] md:p-0 text-f-14 font-fw-400 active:font-fw-500"
                  type="button">SERVICES<svg class="w-3 h-3 ms-2" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 4 4 4-4" />
                  </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="multi-dropdown"
                  class="fade-in z-10 hidden bg-[#f4f4f4] divide-y md:shadow md:w-52 w-[100%] dark:bg-gray-700">
                  <ul class="py-3 px-1 text-sm text-gray-700" aria-labelledby="multiLevelDropdownButton">
                    <!-- first -->
                    <li>
                      <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown"
                        data-dropdown-placement="right-start" type="button"
                        class="flex items-center justify-between w-full px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] focus:bg-[#fafafa]">Graphic
                        Designing<svg class="w-2.5 h-2.5 ms-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                          fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linescap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                        </svg></button>
                      <div id="doubleDropdown"
                        class="fade-in z-10 hidden bg-[#f4f4f4] divide-y divide-gray-100 shadow md:w-52 w-[90%] dark:bg-gray-700">
                        <ul class="py-3 px-1 text-sm text-gray-700 dark:text-gray-200"
                          aria-labelledby="doubleDropdownButton">
                          <li>
                            <NuxtLink to="/web-application-design"
                              class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] multi-toggle">Web-Application-Designing</NuxtLink>
                          </li>
                          <li>
                            <NuxtLink to="/mobile-app-design-services"
                              class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] multi-toggle">Mob
                              App Design services</NuxtLink>
                          </li>
                        </ul>
                      </div>
                    </li>

                    <!-- second -->
                    <li>
                      <button id="doubleDropdownButton1" data-dropdown-toggle="doubleDropdown1"
                        data-dropdown-placement="right-start" type="button"
                        class="flex items-center justify-between w-full px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] focus:bg-[#fafafa]">Mob
                        App Design<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                          fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                        </svg></button>
                      <div id="doubleDropdown1"
                        class="fade-in z-10 hidden bg-[#f4f4f4] divide-y divide-gray-100 shadow w-52 dark:bg-gray-700">
                        <ul class="py-3 px-1 text-sm text-gray-700 dark:text-gray-200"
                          aria-labelledby="doubleDropdownButton1">
                          <li>
                            <NuxtLink to="/android-development"
                              class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] multi-toggle">Android
                              Development Services</NuxtLink>
                          </li>
                          <li>
                            <NuxtLink to="/hybrid-development"
                              class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] multi-toggle">Hybrid
                              Development</NuxtLink>
                          </li>
                          <li>
                            <NuxtLink to="/ios-development"
                              class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] multi-toggle">IOS
                              Development Services</NuxtLink>
                          </li>
                          <li>
                            <NuxtLink to="/mobile-app-development"
                              class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] multi-toggle">Mobile
                              App Development</NuxtLink>
                          </li>
                        </ul>
                      </div>
                    </li>

                    <!-- third -->
                    <li>
                      <button id="doubleDropdownButton2" data-dropdown-toggle="doubleDropdown2"
                        data-dropdown-placement="right-start" type="button"
                        class="flex items-center justify-between w-full px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] focus:bg-[#fafafa]">Web
                        Development<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                          fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                        </svg></button>
                      <div id="doubleDropdown2"
                        class="fade-in z-10 hidden bg-[#f4f4f4] divide-y divide-gray-100 shadow w-52 dark:bg-gray-700">
                        <ul class="py-3 px-1 text-sm text-gray-700 dark:text-gray-200"
                          aria-labelledby="doubleDropdownButton2">
                          <li>
                            <NuxtLink to="/custom-web-development-services"
                              class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] multi-toggle">Custom
                              Web Development Services</NuxtLink>
                          </li>
                          <li>
                            <NuxtLink to="/wordpress-development-services"
                              class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] multi-toggle">WordPress
                              Development Services</NuxtLink>
                          </li>
                          <li>
                            <NuxtLink to="/laravel-development-services"
                              class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] multi-toggle">Laravel
                              Development Services</NuxtLink>
                          </li>
                        </ul>
                      </div>
                    </li>

                    <!-- fourth -->
                    <li>
                      <button id="doubleDropdownButton3" data-dropdown-toggle="doubleDropdown3"
                        data-dropdown-placement="right-start" type="button"
                        class="flex items-center justify-between w-full px-4 py-3 text-f-14 font-fw-500 hover:bg-[#fafafa] focus:bg-[#fafafa]">E-commerce<svg
                          class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                        </svg></button>
                      <div id="doubleDropdown3"
                        class="fade-in z-10 hidden bg-[#f4f4f4] divide-y divide-gray-100 shadow w-52 dark:bg-gray-700">
                        <ul class="py-3 px-1 text-sm text-gray-700 dark:text-gray-200"
                          aria-labelledby="doubleDropdownButton3">
                          <li>
                            <NuxtLink to="/e-commerce-solutions"
                              class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] multi-toggle">E-commerce
                              Solutions</NuxtLink>
                          </li>
                          <li>
                            <NuxtLink to="/woocommerce-development-services"
                              class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] multi-toggle">Woocommerce
                              Development Services</NuxtLink>
                          </li>
                          <li>
                            <NuxtLink to="/opencart-development-services"
                              class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] multi-toggle">Opencart
                              Development Services</NuxtLink>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li>
                      <NuxtLink to="/digital-marketing"
                        class="block px-4 py-3 text-f-14 font-fw-400 active:font-fw-500 hover:bg-[#fafafa] focus:bg-[#fafafa] multi-toggle">Digital-marketing</NuxtLink>
                    </li>
                  </ul>
                </div>

              </ul>
            </div>
            <li>
              <NuxtLink to="/blog"
                class="main-dropdown block py-2 px-3 hover:text-[#B3B3B3] md:p-0 text-f-14 font-fw-400 active:font-fw-500 multi-toggle"
                aria-current="page">BLOG</NuxtLink>
            </li>
            <li>
              <NuxtLink to="/about"
                class="main-dropdown block py-2 px-3 hover:text-[#B3B3B3] md:p-0 text-f-14 font-fw-400 active:font-fw-500 multi-toggle"
                aria-current="page">ABOUT</NuxtLink>
            </li>
            <li>
              <NuxtLink to="/contact" class="main-dropdown block py-2 px-3 hover:text-[#B3B3B3] md:p-0 text-f-14 font-fw-400 active:font-fw-500 multi-toggle"
                aria-current="page">CONTACT</NuxtLink>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>