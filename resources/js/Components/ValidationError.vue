<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
const closeBox = () => {
    usePage().props.value.flash.success = false;
};
const closeBoxError = () => {
    usePage().props.value.flash.error = false;
};
</script>

<template>
    <div class="">
        <div v-if="usePage().props.value.flash.error">
            <div
                class="mx-auto relative mb-4 rounded border  border-red-400 bg-red-100 px-4 py-3 text-red-700 sm:max-w-full sm:px-6 md:max-w-[75%] lg:max-w-[75%] lg:px-8"
                role="alert"
            >
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">
                    {{ usePage().props.value.flash.error }}</span
                >
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg
                        class="h-6 w-6 fill-current text-red-500"
                        role="button"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        @click="closeBoxError()"
                    >
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
                        />
                    </svg>
                </span>
            </div>
        </div>

        <div
            v-if="usePage().props.value.flash.success"
            class="relative mx-auto mb-4 flex rounded-lg border border-teal-400 bg-teal-100 p-4 px-4 py-3 dark:bg-teal-200 sm:max-w-full sm:px-6 md:max-w-[75%] lg:max-w-[75%] lg:px-8"
            role="alert"
        >
            <svg
                class="h-5 w-5 text-teal-700 dark:text-teal-800"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"
                ></path>
            </svg>

            <strong class="ml-4 font-bold">Success!</strong>
            <span class="ml-4 block sm:inline">
                {{ usePage().props.value.flash.success }}
            </span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg
                    class="h-6 w-6 fill-current text-teal-500"
                    role="button"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    @click="closeBox()"
                >
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
                    />
                </svg>
            </span>
        </div>
    </div>
</template>
