<template>
    <Admin>
        <div class="mt-4 flex flex-wrap">
            <div class="w-full px-4 lg:w-8/12">
                <CardOrderDetails />
            </div>
            <div
                class="w-full px-4 lg:w-4/12"
                v-if="usePage().props.value.assigned"
            >
                <CardWriterProfile />
            </div>
        </div>
    </Admin>
</template>
<script setup>
import Admin from "@/Layouts/Admin.vue";
import CardOrderDetails from "@/Components/Cards/CardOrderDetails.vue";
import CardWriterProfile from "@/components/Cards/CardWriterProfile.vue";
import { usePage } from "@inertiajs/inertia-vue3";
</script>
