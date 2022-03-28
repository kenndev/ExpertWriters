<script setup>
import { computed, ref } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const errors = computed(() => usePage().props.value.errors);

let hasErrors = computed(() => Object.keys(errors.value).length > 0);

</script>

<template>
    <div v-if="hasErrors">
        <div
            id="alert-2"
            class="relative mx-auto mt-4 flex rounded-lg border border-red-400 bg-red-100 p-4 px-4 py-3 dark:bg-red-200 sm:max-w-full sm:px-6 md:max-w-[75%] lg:max-w-[75%] lg:px-8"
            role="alert"
        >
            <svg
                class="h-5 w-5 flex-shrink-0 text-red-700 dark:text-red-800"
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
            <div
                class="ml-3 text-sm font-medium text-red-700 dark:text-red-800"
            >
                Whoops! Something went wrong.
                <ul class="mt-3 list-inside list-disc text-sm text-red-600">
                    <li v-for="(error, key) in errors" :key="key">
                        {{ error }}
                    </li>
                </ul>
            </div>
            <button
                type="button"
                class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 rounded-lg bg-red-100 p-1.5 text-red-500 hover:bg-red-200 focus:ring-2 focus:ring-red-400 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300"
                data-collapse-toggle="alert-2"
                aria-label="Close"
            >
               
            </button>
        </div>
    </div>
</template>
