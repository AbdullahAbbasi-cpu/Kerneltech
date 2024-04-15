/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./components/**/*.{js,vue,ts}",
    "./layouts/**/*.vue",
    "./pages/**/*.vue",
    "./plugins/**/*.{js,ts}",
    "./app.vue",
    "./error.vue",
    "./node_modules/flowbite/**/*.{js,ts}"
  ],
  theme: {
    extend: {
      screens: {
        'mdxl': '940px',  // You can customize the pixel value as per your requirement
      },
      colors: {
        'first-color-var': '#FFF',
        'second-color-var': '#383838',
        'third-color-var': '#0094F4',
        'fouth-color-var': '#9E9E9E',
        'fifth-color-var': '#000000',
        'sixth-color-var': '#4A4A4A',
        'seventh-color-var': '#0C7DD7',
        'eight-color-var': '#0C7DD7',
        'ninth-color-var': '#8D8D8D',
        'tenth-color-var': '#9F9F9F',
        'eleventh-color-var': '#414141',
        'twelvth-color-var': '#848484',
        'thirteenth-color-var': '#202020',
        'fourteenth-color-var': '#262626',
        'fiftheeth-color-var': '#4B4B4B',
      },
      fontSize:{
        'f-40': '40px',
        'f-45': '45px',
        'f-25': '25px',
        'f-30': '30px',
        'f-35': '35px',
        'f-22': '22px',
        'f-26': '26px',
        'f-14': '14px',
        'f-18': '18px',
        'f-20': '20px',
        'f-16': '16px',
        'f-17': '17px',
        'f-24': '24px',
        'f-28': '28px',
        'f-12': '12px',
        'f-13': '13px',

      },
      backgroundColor: {
        'first-bg-color-var': '#F7F7F7',
        'second-bg-color-var': '#0094F4',
        'third-bg-color-var': '#FFFFFF',
        'fouth-bg-color-var': '#D9D9D9',
        'fifth-bg-color-var': '#FFFFFFD9',
      },
      boxShadow: {
        'first-boxshadow-var': ' 0px 4px 14px 0px rgba(0, 0, 0, 0.10)',
        'second-boxshadow-var': '0px 0px 30px 2px rgba(0, 0, 0, 0.05)',
        'third-boxshadow-var': '0px 4px 30px 3px rgba(0, 0, 0, 0.25)',
        'fourth-boxshadow-var': '0px 8px 33px 0px rgba(0, 0, 0, 0.20)',
      },
      borderRadius: {
        'first-radius-var': '4px',
        'second-radius-var': '2px',
        'third-radius-var': '25px',
        'fouth-radius-var': '30px',
        'fifth-radius-var': '35px',
        'sixth-radius-var': '22px',
        'seventh-radius-var': '26px',
      },
      borderColor: {
        'first-border-color-var': '#FFFFFF',
        'second-border-color-var': '#555555',
        'third-border-color-var': '#8D8D8D',
        'fouth-border-color-var': '#D9D9D9',
      },
      borderWidth: {
        'first-border-width-var': '1.5px solid ',
        'second-border-width-var': '1px solid',
        'third-border-width-var': '2px solid',
        'fouth-border-width-var': '#D9D9D9',
      },
      container: {
        'first-container-var': 'width:1200px',
      },
      lineHeight: {
        'lh-28':'28px',
        'lh-normal':'normal',
        'lh-30':'30px',
        'lh-26':'26px',
        'lh-32':'32px',
        'lh-35':'35px',
        'lh-42':'42px',
        'lh-16':'16px',
        'lh-19':'19px',
        'lh-21':'21px',
        'lh-40':'40px',
        'lh-54':'54px',
        'lh-14':'14px',
        'lh-45':'45px',
      },
      fontWeight: {
        'fw-100':'100',
        'fw-200':'200',
        'fw-300':'300',
        'fw-400':'400',
        'fw-500':'500',
        'fw-600':'600',
        'fw-700':'700',
      },
      height: {
        'h-480':'480px',
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}