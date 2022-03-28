<template>
    <div
        class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded bg-blueGray-700 shadow-lg"
    >
        <div class="mb-0 rounded-t bg-transparent px-4 py-3">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full max-w-full flex-1 flex-grow">
                    <h6
                        class="mb-1 text-xs font-semibold uppercase text-blueGray-100"
                    >
                        Overview
                    </h6>
                    <h2 class="text-xl font-semibold text-white">
                        Earnings value
                    </h2>
                </div>
            </div>
        </div>
        <div class="flex-auto p-4">
            <!-- Chart -->
            <div class="relative h-350-px">
                <canvas id="line-chart"></canvas>
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
let price = ref([]);

const getChart = () => {
    chartData.value = usePage().props.value.chart;
    for (var i = 1; i <= 7; i++) {
        last_7_days.value.push(
            moment().subtract(i, "days").format("YYYY-MM-DD")
        );
    }
    last_7_days.value.forEach((n) => {
        let pr = chartData.value.filter((a) => {
            return a.date == n;
        });
        if (pr.length > 0) {
            for (var i = 0; i < pr.length; i++) {
                price.value.push(pr[i].price);
            }
        } else {
            price.value.push(0);
        }
    });
};

onMounted(() => {
    getChart();
    graphs();
});

const graphs = () => {
    var config = {
        type: "line",
        data: {
            labels: last_7_days.value,
            datasets: [
                {
                    label: "Earnings",
                    fill: false,
                    backgroundColor: "#fff",
                    borderColor: "#fff",
                    data: price.value,
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            title: {
                display: false,
                text: "Sales Charts",
                fontColor: "white",
            },
            legend: {
                labels: {
                    fontColor: "white",
                },
                align: "end",
                position: "bottom",
            },
            tooltips: {
                mode: "index",
                intersect: false,
            },
            hover: {
                mode: "nearest",
                intersect: true,
            },
            scales: {
                xAxes: [
                    {
                        ticks: {
                            fontColor: "rgba(255,255,255,.7)",
                        },
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: "Date",
                            fontColor: "white",
                        },
                        gridLines: {
                            display: false,
                            borderDash: [2],
                            borderDashOffset: [2],
                            color: "rgba(33, 37, 41, 0.3)",
                            zeroLineColor: "rgba(0, 0, 0, 0)",
                            zeroLineBorderDash: [2],
                            zeroLineBorderDashOffset: [2],
                        },
                    },
                ],
                yAxes: [
                    {
                        ticks: {
                            fontColor: "rgba(255,255,255,.7)",
                        },
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: "Value",
                            fontColor: "white",
                        },
                        gridLines: {
                            borderDash: [3],
                            borderDashOffset: [3],
                            drawBorder: true,
                            color: "rgba(255, 255, 255, 0.15)",
                            zeroLineColor: "rgba(33, 37, 41, 0)",
                            zeroLineBorderDash: [2],
                            zeroLineBorderDashOffset: [2],
                        },
                    },
                ],
            },
        },
    };
    var ctx = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(ctx, config);
};
</script>
