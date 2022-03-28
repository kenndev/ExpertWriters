<template>
    <Admin>
        <div class="flex flex-wrap">
            <div class="mb-12 w-full px-4 xl:mb-0 xl:w-8/12">
                <card-line-chart />
            </div>
            <div class="w-full px-4 xl:w-4/12">
                <card-bar-chart />
            </div>
        </div>
        <div class="mt-4 flex flex-wrap">
            <div class="mb-12 w-full px-4 xl:mb-0 xl:w-8/12">
                <card-page-visits />
            </div>
            <div class="w-full px-4 xl:w-4/12">
                <card-social-traffic />
            </div>
        </div>
    </Admin>
</template>
<script>
import CardLineChart from "@/components/Cards/CardLineChart.vue";
import CardBarChart from "@/components/Cards/CardBarChart.vue";
import CardPageVisits from "@/components/Cards/CardPageVisits.vue";
import CardSocialTraffic from "@/components/Cards/CardSocialTraffic.vue";
import Admin from "@/Layouts/Admin.vue";
export default {
    name: "dashboard-page",
    components: {
        CardLineChart,
        CardBarChart,
        CardPageVisits,
        CardSocialTraffic,
        Admin,
    },
};
</script>
