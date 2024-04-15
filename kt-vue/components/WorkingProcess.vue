<template>
    <section id="working-process" class="sm:mt-20 mt-12 mb-[60px]">
    <div class="first-container-var">
      <div class="working-process-heading px-4 xl:px-0">
        <h1 class="sm:text-f-45 text-f-35 text-second-color-var font-bold sm:leading-lh-normal leading-lh-normal mb-4">
          Working Process </h1>
        <p class="text-center text-f-18 text-fouth-color-var leading-lh-28 font-fw-400 pt-2">Our professional web
          development team will support you with everything from creating the initial specification through to
          architecture <br class="lg:block hidden"> planning, development, testing and project launch. </p>
      </div>
      <div class="px-4 xl:px-0 working-cards flex justify-center flex-wrap gap-[25px] mt-8 pb-4">
        <div v-if="processToShow.includes('requirements')" class="mb-0" id="card-1">
          <div class="front first-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Requirements</h1>
          </div>
          <div
            class="back first-back-background bg-center flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Requirements</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <!-- ecommerce -->
        <div v-if="processToShow.includes('research-and-analysis')" class="mb-0" id="card-11">
          <div class="front first-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Research & Analysis</h1>
          </div>
          <div
            class="back first-back-background bg-center flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Research & Analysis</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <!-- ecommerce ends here-->
        <div v-if="processToShow.includes('ui-ux-design')" class="mb-0" id="card-2">
          <div class="front sixth-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">UI/UX Design</h1>
          </div>
          <div
            class="back second-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">UI/UX Design</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <div v-if="processToShow.includes('development')" class="mb-0" id="card-3">
          <div class="front seventh-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Development</h1>
          </div>
          <div
            class="back third-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Development</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <div v-if="processToShow.includes('testing-and-qa')" class="mb-0" id="card-4">
          <div class="front eighth-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Testing & QA</h1>
          </div>
          <div
            class="back fourth-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Testing & QA </h2>
            <p class="text-f-16 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the development of your
              future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <!-- ecommerce -->
        <div v-if="processToShow.includes('deployment')" class="mb-0" id="card-12">
          <div class="front first-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Deployment</h1>
          </div>
          <div
            class="back fifth-back-background bg-center flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Deployment</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <!-- ecommerce ends here-->
        <div v-if="processToShow.includes('maintenance-and-support')" class="mb-0" id="card-5">
          <div class="front nineth-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Maintenance & Support</h1>
          </div>
          <div
            class="back fifth-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Maintenance & Support</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <!-- digital marketing cards starts from here -->
        <div v-if="processToShow.includes('goals-and-objectives')" class="mb-0" id="card-1">
          <div class="front goals-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Goals & Objectives</h1>
          </div>
          <div
            class="back first-back-background bg-center flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Goals & Objectives</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <div v-if="processToShow.includes('target-audience')" class="mb-0" id="card-6">
          <div class="front tenth-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Target Audience</h1>
          </div>
          <div
            class="back second-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Target Audience</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <div v-if="processToShow.includes('competitive-analysis')" class="mb-0" id="card-7">
          <div class="front eleventh-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Competitive Analysis</h1>
          </div>
          <div
            class="back third-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Competitive Analysis</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <div v-if="processToShow.includes('strategies-and-tactics')" class="mb-0" id="card-8">
          <div class="front twelvth-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Strategies And Tactics</h1>
          </div>
          <div
            class="back fourth-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Strategies And Tactics</h2>
            <p class="text-f-16 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the development of your
              future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <div v-if="processToShow.includes('target-audiences')" class="mb-0" id="card-9">
          <div class="front thirteenth-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Target Audiences</h1>
          </div>
          <div
            class="back fifth-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Target Audiences</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <!-- digital marketing cards ends here -->
        <!-- graphic designing cards starts from here -->
        <div v-if="processToShow.includes('defining')" class="mb-0" id="card-1">
          <div class="front fourteenth-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Defining</h1>
          </div>
          <div
            class="back first-back-background bg-center flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Defining</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <div v-if="processToShow.includes('research')" class="mb-0" id="card-6">
          <div class="front fifteenth-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Research</h1>
          </div>
          <div
            class="back second-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Research</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <div v-if="processToShow.includes('sketch')" class="mb-0" id="card-7">
          <div class="front sixteenth-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Sketch</h1>
          </div>
          <div
            class="back third-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Sketch</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <div v-if="processToShow.includes('concept-of-development')" class="mb-0" id="card-8">
          <div class="front seventeenth-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal text-center concept-of-development">Concept of development</h1>
          </div>
          <div
            class="back fourth-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10 concept-of-development">Concept of development</h2>
            <p class="text-f-16 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the development of your
              future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <div v-if="processToShow.includes('revision')" class="mb-0" id="card-9">
          <div class="front eighteenth-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Revision</h1>
          </div>
          <div
            class="back fifth-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Revision</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <div v-if="processToShow.includes('completion')" class="mb-0" id="card-10">
          <div class="front nineteenth-front-background flex justify-center items-center rounded-first-radius-var">
            <h1 class="sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal">Completion</h1>
          </div>
          <div
            class="back sixth-back-background flex justify-center items-center flex-col rounded-first-radius-var text-center">
            <h2 class="text-second-color-var sm:text-f-25 text-f-18 font-fw-600 leading-lh-normal pt-10">Completion</h2>
            <p class="sm:text-f-16 text-f-14 text-twelvth-color-var pt-2 leading-lh-24">A starting point in the
              development of your future product. It helps define a clear vision of the product.</p>
          </div>
        </div>
        <!-- graphic designing cards ends here -->
        
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'WorkingProcess',
  data() {
    return {};
  },
  mounted() {
    console.log('hi and how are you');
    $("#card-1").flip({
      axis: 'x',
      trigger: 'hover'
    });
    $("#card-2").flip({
      axis: 'x',
      trigger: 'hover'
    });
    $("#card-3").flip({
      axis: 'x',
      trigger: 'hover'
    });
    $("#card-4").flip({
      axis: 'x',
      trigger: 'hover'
    });
    $("#card-5").flip({
      axis: 'x',
      trigger: 'hover'
    });
    $("#card-6").flip({
      axis: 'x',
      trigger: 'hover'
    });
    $("#card-7").flip({
      axis: 'x',
      trigger: 'hover'
    });
    $("#card-8").flip({
      axis: 'x',
      trigger: 'hover'
    });
    $("#card-9").flip({
      axis: 'x',
      trigger: 'hover'
    });
    $("#card-10").flip({
      axis: 'x',
      trigger: 'hover'
    });
    $("#card-11").flip({
      axis: 'x',
      trigger: 'hover'
    });
    $("#card-12").flip({
      axis: 'x',
      trigger: 'hover'
    });
  },
  methods: {},
  props: {
    processToShow: {
      type: Array,
      default: () => [],
    },
  },
};
</script>