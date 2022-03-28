<template>
    <div
        class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded-lg border-0 bg-blueGray-100 shadow-lg"
    >
        <div class="mb-0 rounded-t border-0 px-4 py-3">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full max-w-full flex-1 flex-grow px-4">
                    <h3 class="text-lg font-semibold text-blueGray-700">
                        Card Tables
                    </h3>
                </div>
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <BreezeValidationError class="mb-5"/>
            <BreezeValidationErrors class="mb-5"/>
            <PricingLayout
                :academic_levels="academic_levels"
                :deadlines="deadlines"
            />
        </div>
    </div>
</template>
<script setup>
import BreezeValidationError from "@/Components/ValidationError.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import PricingLayout from "@/Components/Pricing.vue";
const props = defineProps({
    academic_levels: Array,
    deadlines: Array,
});
</script>
