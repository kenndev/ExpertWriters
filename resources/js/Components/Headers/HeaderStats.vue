<template>
    <!-- Header -->

    <div class="relative bg-emerald-600 pb-32 pt-12 md:pt-32">
        <BreezeValidationError />
        <div class="mx-auto w-full px-4 md:px-10">
            <div>
                <!-- Card stats -->
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
                        <card-stats
                            statSubtitle="Orders"
                            :statTitle="orders.orders_total"
                            :statArrow="orders.increase ? 'up' : 'down'"
                            :statPercent="orders.change"
                            :statPercentColor="
                                orders.increase
                                    ? 'text-emerald-500'
                                    : 'text-red-500'
                            "
                            statDescripiron="Since last week"
                            statIconName="far fa-chart-bar"
                            statIconColor="bg-red-500"
                        />
                    </div>
                    <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
                        <card-stats
                            statSubtitle="Writers"
                            :statTitle="writers"
                            statDescripiron="In Total"
                            statIconName="fas fa-users"
                            statIconColor="bg-pink-500"
                        />
                    </div>
                    <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
                        <card-stats
                            statSubtitle="Earnings"
                            :statTitle="earnings.earnings"
                            :statArrow="earnings.increase ? 'up' : 'down'"
                            :statPercent="earnings.change"
                            :statPercentColor="
                                earnings.increase
                                    ? 'text-emerald-500'
                                    : 'text-red-500'
                            "
                            statDescripiron="Since last week"
                            statIconName="fas fa-chart-pie"
                            statIconColor="bg-orange-500"
                        />
                    </div>

                    <!-- <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
                        <card-stats
                            statSubtitle="PERFORMANCE"
                            statTitle="49,65%"
                            statArrow="up"
                            statPercent="12"
                            statPercentColor="text-emerald-500"
                            statDescripiron="Since last month"
                            statIconName="fas fa-percent"
                            statIconColor="bg-emerald-500"
                        />
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import CardStats from "@/components/Cards/CardStats.vue";
import BreezeValidationError from "@/Components/ValidationError.vue";
import useResources from "@/Composables/resources";
import { ref, onMounted } from "vue";

const { stats, getStats } = useResources();
const orders = ref([]);
const earnings = ref([]);
const writers = ref();

const getStatistics = async () => {
    await getStats();
    orders.value = stats.value.orders;
    earnings.value = stats.value.earnings;
    writers.value = stats.value.writers;
};

onMounted(() => {
    getStatistics();
});
</script>
