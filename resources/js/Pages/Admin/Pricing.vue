<template>
    <Head title="Pricing" />

    <Admin>
        <div class="mt-4 flex flex-wrap">
            <div class="mb-12 w-full px-4">
                <CardPricing
                    :academic_levels="academic_levels"
                    :deadlines="deadlines"
                    color="dark"
                />
            </div>
        </div>
    </Admin>
</template>

<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import Admin from "@/Layouts/Admin.vue";
import CardPricing from "@/components/Cards/CardPricingTable.vue";
const props = defineProps({
    academic_levels: Array,
    deadlines: Array,
});
</script>

<style></style>
