<template>
    <table class="w-full border-collapse items-center bg-transparent">
        <thead>
            <tr>
                <th
                    class=" border border-l-0 border-r-0 border-solid px-6 py-3 text-left align-middle text-xs font-semibold uppercase"
                    :class="[
                        color === 'light'
                            ? 'border-blueGray-100 bg-blueGray-50 text-blueGray-500'
                            : 'border-emerald-700 bg-emerald-800 text-emerald-300',
                    ]"
                >
                    Title
                </th>
                 
                <th
                    @click="updateSortColumn('total_price')"
                    class="whitespace-nowrap border border-l-0 border-r-0 border-solid px-6 py-3 text-left align-middle text-xs font-semibold uppercase"
                    :class="[
                        color === 'light'
                            ? 'border-blueGray-100 bg-blueGray-50 text-blueGray-500'
                            : 'border-emerald-700 bg-emerald-800 text-emerald-300',
                    ]"
                >
                    Budget
                    <span>
                        <i
                            v-if="sortOrder === 'asc'"
                            class="fa fa-arrow-up fa-1x"
                        ></i>
                        <i v-else class="fa fa-arrow-down fa-1x"></i>
                    </span>
                </th>
                <th
                    @click="updateSortColumn('created_at')"
                    class="whitespace-nowrap border border-l-0 border-r-0 border-solid px-6 py-3 text-left align-middle text-xs font-semibold uppercase"
                    :class="[
                        color === 'light'
                            ? 'border-blueGray-100 bg-blueGray-50 text-blueGray-500'
                            : 'border-emerald-700 bg-emerald-800 text-emerald-300',
                    ]"
                >
                    Date Ordered
                    <span>
                        <i
                            v-if="sortOrder === 'asc'"
                            class="fa fa-arrow-up fa-1x"
                        ></i>
                        <i v-else class="fa fa-arrow-down fa-1x"></i>
                    </span>
                </th>
                <th
                    class="whitespace-nowrap border border-l-0 border-r-0 border-solid px-6 py-3 text-left align-middle text-xs font-semibold uppercase"
                    :class="[
                        color === 'light'
                            ? 'border-blueGray-100 bg-blueGray-50 text-blueGray-500'
                            : 'border-emerald-700 bg-emerald-800 text-emerald-300',
                    ]"
                >
                    Status
                </th>
                <th
                    class="whitespace-nowrap border border-l-0 border-r-0 border-solid px-6 py-3 text-left align-middle text-xs font-semibold uppercase"
                    :class="[
                        color === 'light'
                            ? 'border-blueGray-100 bg-blueGray-50 text-blueGray-500'
                            : 'border-emerald-700 bg-emerald-800 text-emerald-300',
                    ]"
                >
                    Time Left
                </th>
                <th
                    class="whitespace-nowrap border border-l-0 border-r-0 border-solid px-6 py-3 text-left align-middle text-xs font-semibold uppercase"
                    :class="[
                        color === 'light'
                            ? 'border-blueGray-100 bg-blueGray-50 text-blueGray-500'
                            : 'border-emerald-700 bg-emerald-800 text-emerald-300',
                    ]"
                ></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="order in tableData" :key="order.id">
                <td
                    class="border-t-0 border-l-0 border-r-0 p-4 text-left text-xs"
                >
                    <span
                        class="font-bold"
                        :class="[
                            color === 'light'
                                ? 'text-blueGray-600'
                                : 'text-white',
                        ]"
                    >
                        {{ order.topic }}
                    </span>
                </td>
                <td
                    class="whitespace-nowrap border-t-0 border-l-0 border-r-0 p-4 px-6 align-middle text-xs"
                >
                    ${{ order.total_price }}
                </td>
                <td
                    class="whitespace-nowrap border-t-0 border-l-0 border-r-0 p-4 px-6 align-middle text-xs"
                >
                    {{ humanReadableDate(order.created_at) }}
                </td>
                <td
                    class="whitespace-nowrap border-t-0 border-l-0 border-r-0 p-4 px-6 align-middle text-xs"
                >
                    <i class="fas fa-circle mr-2" :class="order.color"></i>
                    {{ order.paper_status }}
                </td>
                <td
                    class="whitespace-nowrap border-t-0 border-l-0 border-r-0 p-4 px-6 align-middle text-xs"
                >
                    <div class="flex items-center">
                        <span class="mr-2"
                            >{{ calculateTimeLeft(order) }}%
                        </span>
                        <div class="relative w-full">
                            <div
                                class="flex h-2 overflow-hidden rounded bg-red-200 text-xs"
                            >
                                <div
                                    :style="
                                        'width:' +
                                        calculateTimeLeft(order) +
                                        '%'
                                    "
                                    class="flex flex-col justify-center whitespace-nowrap bg-red-500 text-center text-white shadow-none"
                                ></div>
                            </div>
                        </div>
                    </div>
                </td>
                <td
                    class="whitespace-nowrap border-t-0 border-l-0 border-r-0 p-4 px-6 text-right align-middle text-xs"
                >
                    <Dropdown :order="order" @open-modal="toggleModal" />
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script setup>
import { defineEmits } from "vue";
import Dropdown from "@/Components/Dropdowns/Dropdown.vue";

defineProps({
    tableData: {
        type: Array,
    },
    sortOrder: {
        type: String,
    },
    color: {
        default: "light",
        validator: function (value) {
            // The value must match one of these strings
            return ["light", "dark"].indexOf(value) !== -1;
        },
    },
});
const emits = defineEmits(["open-model", "sort-column"]);

const toggleModal = (event) => {
    emits("open-model", event);
};

const humanReadableDate = (date) => {
    var ts = new Date(date);
    return ts.toLocaleString();
};

const calculateTimeLeft = (order) => {
    const deadline = order.deadline.replace(/\D/g, "");

    let end_date = new Date(order.created_at);
    end_date.setDate(end_date.getDate() + deadline);

    let now = new Date();
    let created_at = new Date(order.created_at);

    let time_remaining = (end_date - now) / 3600000;

    let over_all_time = (end_date - created_at) / 3600000;

    let remaining_percentage = 0;

    if (time_remaining < 0) {
        remaining_percentage = 100;
    } else {
        remaining_percentage = 100 - (time_remaining / over_all_time) * 100;
    }
    return remaining_percentage.toFixed(2);
};

const updateSortColumn = (table) => {
    emits("sort-column", table);
};
</script>

<style></style>
