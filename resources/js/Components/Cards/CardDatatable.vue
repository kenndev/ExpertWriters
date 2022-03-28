<template>
    <div
        class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded shadow-lg"
        :class="[color === 'light' ? 'bg-white' : 'bg-emerald-900 text-white']"
    >
        <div class="mb-0 rounded-t border-0 px-4 py-3">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full max-w-full flex-1 flex-grow px-4">
                    <div class="flex flex-row justify-between">
                        <div class="inline-block">
                            <label for="pageOption" class="mt-2 mr-2"
                                >Per page</label
                            >
                            <select
                                class="focus:shadow-outline block w-full appearance-none rounded border border-gray-400 px-4 py-2 pr-8 leading-tight shadow hover:border-gray-500 focus:outline-none"
                                :class="[
                                    color === 'light'
                                        ? 'border-blueGray-100 bg-blueGray-50 text-blueGray-500'
                                        : 'border-emerald-700 bg-emerald-800 text-emerald-300',
                                ]"
                                v-model="perPage"
                                @change="handlePerPage"
                                id="pageOption"
                            >
                                <option
                                    v-for="page in pageOptions"
                                    :key="page"
                                    :value="page"
                                >
                                    {{ page }}
                                </option>
                            </select>
                            <div
                                class="pointer-events-none inset-y-0 right-0 flex items-center px-2 text-gray-700"
                            >
                                <svg
                                    class="h-4 w-4 fill-current"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                    />
                                </svg>
                            </div>
                        </div>
                        <div class="w-25 inline-block">
                            <input
                                @input="handleSearch"
                                :on-change="handleSearch"
                                v-model="search"
                                type="text"
                                class="w-full rounded border-0 bg-white px-3 py-3 text-sm text-blueGray-600 placeholder-blueGray-300 shadow transition-all duration-150 ease-linear focus:outline-none focus:ring"
                                placeholder="Type to search"
                            />
                            <div
                                class="pointer-events-none inset-y-0 right-0 flex items-center px-2 text-gray-700"
                            >
                                <svg
                                    class="h-4 w-4 fill-current"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <!-- Projects table -->
            <Datatable
                color="dark"
                :sortOrder="sortOrder"
                :tableData="tableData"
                @open-model="toggleModal"
                @sort-column="updateSortColumn"
            />
        </div>
    </div>
    <AssignOrderModal
        :showModal="showModal"
        :orderId="order_id"
        @toggleModal="closeModal"
    />
    <Paginator
        v-if="tableData.length > 0"
        :pagination="pagination"
        :totalItems="tableData.length"
        @pageChanged="handlePageChange"
        :key="pagination_reload"
    />
</template>
<script setup>
import Paginator from "../Paginator.vue";
import { onMounted, ref } from "vue";
import axios from "axios";
import Datatable from "@/Components/Datatable.vue";
import { Inertia } from "@inertiajs/inertia";
import useResource from "@/Composables/resources";
import AssignOrderModal from "@/Components/Modals/AssignOrder.vue";

const tableData = ref([]);
const sortField = ref();
const sortOrder = ref("desc");
const search = ref("");
const pageOptions = [5, 10, 20, 50];
const perPage = ref(10);
const pagination = ref({ to: 1, from: 1 });
const page = ref(1);

const pagination_reload = ref(0);

const percentageTime = ref("");

const { assignOrderToWriter } = useResource();

const order_id = ref(0);

let props = defineProps({
    color: {
        default: "light",
        validator: function (value) {
            // The value must match one of these strings
            return ["light", "dark"].indexOf(value) !== -1;
        },
    },
});

let showModal = ref(false);

const toggleModal = (event) => {
    showModal.value = !showModal.value;
    order_id.value = event;
    // console.log(order_id.value);
    // if (!showModal.value) {
    //     form.reset("writer_id", "order_id");
    // }
};

const closeModal = () => {
    showModal.value = !showModal.value;
};

const fetchData = async () => {
    const params = {
        sort_field: sortField.value,
        sort_order: sortOrder.value,
        per_page: perPage.value,
        search: search.value,
        page: page.value,
    };


    let response = await axios.get("/admin/get-orders", { params });
    tableData.value = response.data.data;
    pagination.value = response.data.meta;
    pagination_reload.value++;
};

const updateSortColumn = (column) => {
    if (column === sortField.value) {
        sortOrder.value = sortOrder.value === "asc" ? "desc" : "asc";
    } else {
        sortField.value = column;
        sortOrder.value = "desc";
    }
    fetchData();
};

const handleSearch = () => {
    page.value = 1;
    sortOrder.value = "desc";
    fetchData();
};

const handlePerPage = ($event) => {
    perPage.value = $event.target.value;
    page.value = 1;
    fetchData();
};

const handlePageChange = (pageNumber) => {
    page.value = pageNumber;
    fetchData();
};

Inertia.on("success", (event) => {
    //call fetch Data
    fetchData();
});

onMounted(() => {
    fetchData();
});
</script>
