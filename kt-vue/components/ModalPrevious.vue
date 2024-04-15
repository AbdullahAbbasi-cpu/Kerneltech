<template>
    <div id="myModal"
        class="modal max-w-[100%] remove-testing fixed w-full bg-transparent h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50 "></div>
        <div class="modal-container  max-h-[100%] bg-white w-[550px] mx-auto rounded shadow-lg z-50 overflow-y-auto">
          <!-- Add margin if you want to see some of the overlay behind the modal-->
          <div class="modal-content py-4 text-left ">
            <!--Title-->
            <div class=" pb-3 pe-4">
              <div class="flex justify-end">
                <div class="modal-close cursor-pointer z-50 modal-cross">
                  <svg class="fill-current text-black cross-svg" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                      d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                  </svg>
                </div>
              </div>
            </div>
            <div class="main-modal px-6 pb-4">
              <h3 class=" font-fw-700 text-center sm:text-f-28 text-[25px] text-second-color-var">Let's start a project together</h3>
              <p class="text-second-color-var text-center text-f-17">We make all your dreams come true in a successful
                project.</p>
              <div class="pt-4">
                <form action="#" id="popup_form" @submit.prevent="inquiryForm">
                  <input v-model="formData.name" class="modal-input rounded w-full py-3 px-3 text-fouth-color-var leading-tight text-[15px]" id="name"
                    type="text" placeholder="Name" name="popupName">
                  <div class="flex sm:flex-row flex-col pt-4 gap-[13px]">
                    <div class="w-full">
                      <input v-model="formData.email" class="modal-input   rounded w-full py-3 px-3 text-fouth-color-var leading-tight text-[15px]" id="email"
                      type="email" placeholder="Email" name="popupEmail">
                    </div>
                    <div class="w-full">
                      <input v-model="formData.phone" class="modal-input rounded w-full py-3 px-3  text-fouth-color-var leading-tight text-[15px]" id="phone"
                      type="text" placeholder="Phone" name="popupPhone">
                    </div>
                  </div>
                  <div class="pt-4">
                    <textarea v-model="formData.message" id="message" rows="4"
                      class="block  p-2.5 w-full text-[15px] text-fourth-color-var rounded modal-input "
                      placeholder="Message"></textarea>
                  </div>
                  <div class="pt-5">
                    <input type="submit" value='Submit' class="bg-second-bg-color-var text-white w-[100%] rounded-first-radius-var py-[10px] modal-accept"/>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';
  export default {
    mounted() {
      var body = $("body");
      var modal = $(".modal");

      body.on("click", ".modal-open", function (event) {
        // event.preventDefault();
        modal.addClass("testing").removeClass("remove-testing");
        body.toggleClass("modal-active");
      });

      // Stop propagation of click events on the modal content
      modal.on("click", function(event) {
        event.stopPropagation();
      });

      // Condition to prevent modal from closing when typing in input fields
      modal.find("input, textarea").on("keydown keypress keyup", function(event) {
        // event.preventDefault();
        event.stopPropagation();
      });
    },
    methods: {
      async inquiryForm() {
        try {
          const response = await axios.post(`${process.env.API_BASE_URL}api/inquiry-form`, this.formData);
          console.log(response.data.message);
          let successMessage = response.data.message + ' <i class="main-cross-icon fas fa-close"></i>';
          this.$toast.success(successMessage)
          this.formData = {
            name: '',
            email: '',
            phone: '',
            message: ''
          };

        } catch (error) {
          let emailMessage = error.response.data.error.email ? error.response.data.error.email + ' <i class="main-cross-icon fas fa-close"></i>': null;
          let nameMessage = error.response.data.error.name ? error.response.data.error.name + ' <i class="main-cross-icon fas fa-close"></i>' : null;
          
          if (emailMessage) {
              this.$toast.error(emailMessage);
          }
          if (nameMessage) {
              this.$toast.error(nameMessage);
          }
          console.error('Error submitting form:', error);
        }
      },
    },
    data() {
      return {
        formData: {
          name: '',
          email: '',
          phone: '',
          message: ''
        }
      };
    },
  };
</script>