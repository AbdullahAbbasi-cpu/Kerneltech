<template>
    <section id="ready-to-get-started" class="py-[53px]">
        <div class="first-container-var">
            <div class="row flex md:items-center md:justify-between px-4 xl:px-0 md:flex-row flex-col">
                <div class="md:w-[50%]">
                <h2 class="text-white md:text-f-35 text-f-30 font-fw-700 leading-lh-normal ">Ready to get started? <br> Talk
                    to us today </h2>
                </div>
                <div class="md:w-[50%] md:text-end md:mt-0 mt-10">
                <button
                    class="md:py-[15px] modal-open md:px-[30px] p-[14px] border-[2px] border-white text-white md:text-f-18 text-f-14 leading-lg-21 font-semibold hover:bg-white hover:text-[#0C7DD7] duration-300" @click="openModal">Let’s
                    Start Your Projects With Us</button>
                </div>
            </div>
        </div>
        <Modal ref="modal"></Modal>
    </section>
</template>
<script>
import Modal from "@/components/Modal";
export default {
    components: {
      Modal
    },
    methods: {
        openModal() {
            this.$refs.modal.openModal();
        },
    }
}
</script>