<template>
    <div class="flex flex-col items-center">
        <!-- Help text -->
        <span class="text-sm text-gray-700 dark:text-gray-400">
             
            <span class="font-semibold text-gray-900 dark:text-white">{{ totalItems }}</span>
            of
            <span class="font-semibold text-gray-900 dark:text-white">{{ pagination.total }} </span>
            Entries
        </span>
        <div class="xs:mt-0 mt-2 inline-flex">
            <!-- Buttons -->
            <button
                :class="{ disabled: pagination.current_page === 1 }"
                @click.prevent="changePage(pagination.current_page - 1)"
                class="inline-flex items-center rounded-l bg-gray-800 py-2 px-4 text-sm font-medium text-white hover:bg-gray-900 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            >
                <svg
                    class="mr-2 h-5 w-5"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
                Prev
            </button>
            <ul class="inline-flex items-center">
                <li
                    v-for="pageNumber in pages"
                    :key="pageNumber"
                    :class="{ active: pageNumber == pagination.current_page }"
                >
                    <a
                        href="#"
                        @click.prevent="changePage(pageNumber)"
                        class="border border-gray-300 bg-gray-800 py-2 px-3 font-medium leading-tight text-white hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                        >{{ pageNumber }}</a
                    >
                </li>
            </ul>
            <button
                :class="{
                    disabled: pagination.current_page === pagination.last_page,
                }"
                @click.prevent="changePage(pagination.current_page + 1)"
                class="inline-flex items-center rounded-r border-0 border-l border-gray-700 bg-gray-800 py-2 px-4 text-sm font-medium text-white hover:bg-gray-900 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            >
                Next
                <svg
                    class="ml-2 h-5 w-5"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, defineEmits } from "vue";

let props = defineProps({
    pagination: {
        type: Object,
        required: true,
    },
    totalItems: {
        type: Number,
        required: true,
    },
});

const emit = defineEmits(["pageChanged"]);

const offset = 4;

const pages = ref([]);

const { last_page, current_page, from, to } = props.pagination;

const pagesNumbers = () => {
    if (!to) return [];

    let fromPage = current_page - offset;

    if (fromPage < 1) fromPage = 1;

    let toPage = fromPage + offset * 2;

    if (toPage >= last_page) {
        toPage = last_page;
    }

    for (let page = fromPage; page <= toPage; page++) {
        pages.value.push(page);
    }

    return pages;
};

const changePage = (pageNumber) => {
    emit("pageChanged", pageNumber);
};

onMounted(() => {
    pagesNumbers();
});
</script>

<style></style>
