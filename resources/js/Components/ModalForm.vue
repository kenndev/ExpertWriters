<template>
    <TransitionRoot as="div" :show="isOpen">
        
            <TransitionChild
                as="div"
                enter="ease-out duration-300"
                enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                enter-to="opacity-100 translate-y-0 sm:scale-100"
                leave="ease-in duration-200"
                leave-from="opacity-100 translate-y-0 sm:scale-100"
                leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
                <div
                    class="fixed inset-0 z-50 flex transform items-center justify-center overflow-y-auto overflow-x-hidden outline-none transition-all focus:outline-none"
                >
                    <div class="relative my-6 mx-auto w-full max-w-lg px-4">
                        <!--content-->
                        <div
                            class="relative flex w-full flex-col rounded-lg border-0 bg-white shadow-lg outline-none focus:outline-none"
                        >
                            <!--header-->
                            <div
                                class="flex items-start justify-between rounded-t border-b border-solid border-blueGray-200 p-5"
                            >
                                <slot name="title" />
                                <button
                                    class="float-right ml-auto border-0 bg-transparent p-1 text-3xl font-semibold leading-none text-black opacity-5 outline-none focus:outline-none"
                                    v-on:click="toggleModal()"
                                >
                                    <span
                                        class="block h-6 w-6 bg-transparent text-2xl text-black opacity-5 outline-none focus:outline-none"
                                    >
                                        ×
                                    </span>
                                </button>
                            </div>
                            <!--body-->
                            <div class="relative flex-auto p-6">
                                <slot />
                            </div>
                            <!--footer-->
                            <div
                                class="flex items-center justify-end rounded-b border-t border-solid border-blueGray-200 p-6"
                            >
                                <button
                                    class="background-transparent mr-1 mb-1 px-6 py-2 text-sm font-bold uppercase text-red-500 outline-none transition-all duration-150 ease-linear focus:outline-none"
                                    type="button"
                                    v-on:click="toggleModal()"
                                >
                                    Close
                                </button>
                                <slot name="button" />
                            </div>
                        </div>
                    </div>
                </div>
            </TransitionChild>

            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
                v-if="isOpen"
            >
                <div class="fixed inset-0 z-40 bg-gray-500 bg-opacity-75"></div>
            </TransitionChild>
        
    </TransitionRoot>
</template>

<script setup>
import { computed, defineEmits, ref } from "vue";
import { TransitionChild, TransitionRoot } from "@headlessui/vue";
let props = defineProps({
    showModal: {
        type: Boolean,
    },
    writers: {
        type: Array,
    },
});

const emit = defineEmits(["toggleModal"]);

const open = ref(true);

let isOpen = computed(() => {
    return props.showModal;
});

const toggleModal = (event) => {
    emit("toggleModal");
};
</script>

<style></style>
