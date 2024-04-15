<template>
    <div class="modal z-50" :class="{ 'is-active': isActive}">
      <div class="modal-overlay" @click="closeModal"></div>
      <div class="modal-container max-h-[100%] bg-white w-[550px] mx-auto rounded shadow-lg z-50 overflow-y-auto">
          <div class="modal-wrapper modal-content py-4 text-left px-0" @click="handleClickInside">
            <div class="pb-3 pe-4">
                <div class="flex justify-end">
                  <div class="modal-close cursor-pointer z-50 modal-cross" @click="closeModal">
                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" class="fill-current text-black cross-svg">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                      </svg>
                  </div>
                </div>
            </div>
            <div class="px-6 pb-4">
                <!-- Modal content -->
                <div class="box w-full h-full top-0 left-0 flex items-center justify-center flex-col" id="myModal">
                  <div class="main-modal w-full">
                      <h3 class="mt-[30px] font-fw-700 text-center sm:text-f-28 text-[25px] text-second-color-var">Let's start a project together</h3>
                      <p class="text-second-color-var text-center text-f-17">We make all your dreams come true in a successful
                        project.
                      </p>
                      <div class="pt-4">
                        <form action="#" id="popup_form">
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
                              <input type="submit" value='Submit' class="bg-second-bg-color-var text-white w-[100%] rounded-first-radius-var py-[10px] modal-accept cursor-pointer" @click="submitForm"/>
                            </div>
                        </form>
                      </div>
                  </div>
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
      // let's start your project form client-side validation
      const self = this;
      $('#popup_form').validate({
        rules: {
            popupName: {
                required: true,
            },
            popupEmail: {
                required: true,
                email: true,
            },
            // popupPhone: {
            //   required: true,
            //   minlength:11,
            //   maxlength:11
            // },
        },
        messages: {
            popupName: {
                required: "Please enter your name",
            },
            popupEmail: {
                required: "Please enter your email address",
                email: "Please enter a valid email address",
            },
            // popupPhone: {
            //   required: "Please enter your phone number",
            // },
            message: {
                required: "Please enter your message",
            },
        },
        errorElement: 'span',
        errorClass: 'error-message',
        highlight: function (element) {
            $(element).addClass('error');
        },
        unhighlight: function (element) {
            $(element).removeClass('error');
        },
        errorPlacement: function (error, element) {
            error.addClass('text-red-500');
            error.insertAfter(element);
        },
        submitHandler: function () {
            console.log('Form Submitted');
            self.submitToServer();
        },
      });


      // cross button funcitonality for toastr
      $(document).on('click', '.main-cross-icon', function(){
        $(this).parent().remove();
      });
    },
    methods: {
      async submitToServer() {
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
          let phoneMessage = error.response.data.error.phone ? error.response.data.error.phone + ' <i class="main-cross-icon fas fa-close"></i>': null;
          
          if (emailMessage) {
              this.$toast.error(emailMessage);
          }
          if (nameMessage) {
              this.$toast.error(nameMessage);
          }
          if (phoneMessage) {
              this.$toast.error(phoneMessage);
          }
          console.error('Error submitting form:', error);
        }
      },
      openModal() {
        this.isActive = true;
      },
      closeModal() {
        this.isActive = false;
      },
      handleClickInside(event) {
        event.stopPropagation();
      },
      submitForm() {
        // Handle form submission logic here
      }
    },
    data() {
      return {
        isActive: false,
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
<style scoped>
  .modal,.modal.is-active{display:flex;transition:opacity .5s}.modal{pointer-events:none;opacity:0;position:absolute;left:-999999rem}.modal-overlay,.modal.is-active{left:0;top:0;width:100%;height:100%}.modal.is-active{align-items:center;justify-content:center;position:fixed;opacity:1;pointer-events:all!important}.modal-overlay{position:absolute;background-color:rgba(0,0,0,.5)}.modal-wrapper{position:relative}.modal-content{background-color:#fff;border-radius:5px;padding-right:0!important;padding-left:0!important}.modal-close{position:absolute;right:16px;top:16px;cursor:pointer;border:none;font-size:24px;color:#333}
</style>