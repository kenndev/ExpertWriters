<template>
    <div
        class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded bg-white shadow-lg"
    >
        <div class="mb-0 rounded-t bg-transparent px-4 py-3">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full max-w-full flex-1 flex-grow">
                    <h6
                        class="mb-1 text-xs font-semibold uppercase text-blueGray-400"
                    >
                        Performance
                    </h6>
                    <h2 class="text-xl font-semibold text-blueGray-700">
                        Total orders
                    </h2>
                </div>
            </div>
        </div>
        <div class="flex-auto p-4">
            <div class="relative h-350-px">
                <canvas id="bar-chart"></canvas>
            </div>
        </div>
    </div>
</template>
<script setup>
import Chart from "chart.js";
import { usePage } from "@inertiajs/inertia-vue3";
import { onMounted, ref } from "vue";
import moment from "moment";

const chartData = ref([]);
const last_7_days = ref([]);
let total = ref([]);

const getChart = () => {
    chartData.value = usePage().props.value.chart_count;
    for (var i = 1; i <= 7; i++) {
        last_7_days.value.push(
            moment().subtract(i, "days").format("YYYY-MM-DD")
        );
    }

    last_7_days.value.forEach((n) => {
        let filteredObject = chartData.value.filter((a) => {
            return a.date == n;
        });
        if (filteredObject.length > 0) {
            for (var i = 0; i < filteredObject.length; i++) {
                total.value.push(filteredObject[i].total);
            }
        } else {
            total.value.push(0);
        }
    });

    console.table(total.value);
};

onMounted(() => {
    getChart();
    barChart();
});

const barChart = () => {
    let config = {
        type: "bar",
        data: {
            labels: last_7_days.value,
            datasets: [
                {
                    label: "Total Orders",
                    backgroundColor: "#ed64a6",
                    borderColor: "#ed64a6",
                    data: total.value,
                    fill: false,
                    barThickness: 8,
                },
                // {
                //     label: new Date().getFullYear() - 1,
                //     fill: false,
                //     backgroundColor: "#4c51bf",
                //     borderColor: "#4c51bf",
                //     data: price_last_14_days.value,
                //     barThickness: 8,
                // },
            ],
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            title: {
                display: false,
                text: "Orders Chart",
            },
            tooltips: {
                mode: "index",
                intersect: false,
            },
            hover: {
                mode: "nearest",
                intersect: true,
            },
            legend: {
                labels: {
                    fontColor: "rgba(0,0,0,.4)",
                },
                align: "end",
                position: "bottom",
            },
            scales: {
                xAxes: [
                    {
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: "Date",
                        },
                        gridLines: {
                            borderDash: [2],
                            borderDashOffset: [2],
                            color: "rgba(33, 37, 41, 0.3)",
                            zeroLineColor: "rgba(33, 37, 41, 0.3)",
                            zeroLineBorderDash: [2],
                            zeroLineBorderDashOffset: [2],
                        },
                    },
                ],
                yAxes: [
                    {
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: "Value",
                        },
                        gridLines: {
                            borderDash: [2],
                            drawBorder: false,
                            borderDashOffset: [2],
                            color: "rgba(33, 37, 41, 0.2)",
                            zeroLineColor: "rgba(33, 37, 41, 0.15)",
                            zeroLineBorderDash: [2],
                            zeroLineBorderDashOffset: [2],
                        },
                    },
                ],
            },
        },
    };
    let ctx = document.getElementById("bar-chart").getContext("2d");
    window.myBar = new Chart(ctx, config);
};
</script>
