<template>
    <div
        v-show="isOpen"
        class="fixed inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50"
    >
        <div class="mx-4 max-w-2xl rounded-md bg-white p-6 shadow-xl">
        
            <div
                class="flex items-start justify-between rounded-t border-b p-5 dark:border-gray-600"
            >
                <h3
                    class="text-xl font-semibold text-gray-900 dark:text-white lg:text-2xl"
                >
                    {{ title }}
                </h3>
                
            </div>

            <slot></slot>
        </div>
    </div>
</template>

<script setup>
import { defineEmits } from "vue";
const emit = defineEmits(["close"]);
defineProps({
    isOpen: {
        type: Boolean,
        required: true,
    },
    title: {
        type: String,
    },
});
const closeModal = () => {
    emit("close");
};
</script>

<style></style>
