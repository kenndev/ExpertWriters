<template>
    <div
        class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded-lg border-0 bg-blueGray-100 shadow-lg"
    >
        <div class="mb-0 rounded-t bg-blueGray-100 px-6 py-6">
            <div class="flex justify-between text-center">
                <h6 class="text-xl font-bold text-blueGray-700">
                    {{ order_details.topic }}
                </h6>

                <button
                    class="mr-1 rounded bg-emerald-500 px-4 py-2 text-xs font-bold uppercase text-white shadow outline-none transition-all duration-150 ease-linear hover:shadow-md focus:outline-none active:bg-emerald-600"
                    type="button"
                    @click="openModal()"
                    v-if="!order_details.order_asigned"
                >
                    Assign job to a writer
                </button>
            </div>
        </div>
        <div class="flex flex-col overflow-x-auto px-4 py-10 pt-0 lg:px-10">
            <table
                class="w-full min-w-0 border-collapse items-center divide-y divide-gray-300 break-words rounded-lg"
            >
                <tbody class="divide-y divide-gray-300 bg-white">
                    <tr class="whitespace-nowrap">
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                <h3
                                    class="text-l font-semibold leading-normal text-blueGray-700"
                                >
                                    Order Id
                                </h3>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                {{ order_details.order_id }}
                            </div>
                        </td>
                    </tr>
                    <tr class="whitespace-nowrap">
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                <h3
                                    class="text-l font-semibold leading-normal text-blueGray-700"
                                >
                                    Paper Instructions
                                </h3>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                {{ order_details.paper_instruction }}
                            </div>
                        </td>
                    </tr>
                    <tr class="whitespace-nowrap">
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                <h3
                                    class="text-l font-semibold leading-normal text-blueGray-700"
                                >
                                    Paper Type
                                </h3>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                {{ order_details.paper_type }}
                            </div>
                        </td>
                    </tr>
                    <tr class="whitespace-nowrap">
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                <h3
                                    class="text-l font-semibold leading-normal text-blueGray-700"
                                >
                                    Academic Level
                                </h3>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                {{ order_details.academic_level }}
                            </div>
                        </td>
                    </tr>
                    <tr
                        class="whitespace-nowrap"
                        v-if="order_details.discipline"
                    >
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                <h3
                                    class="text-l font-semibold leading-normal text-blueGray-700"
                                >
                                    Discipline
                                </h3>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                {{ order_details.discipline }}
                            </div>
                        </td>
                    </tr>
                    <tr class="whitespace-nowrap">
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                <h3
                                    class="text-l font-semibold leading-normal text-blueGray-700"
                                >
                                    Deadline
                                </h3>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                {{ order_details.deadline }}
                            </div>
                        </td>
                    </tr>
                    <tr class="whitespace-nowrap">
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                <h3
                                    class="text-l font-semibold leading-normal text-blueGray-700"
                                >
                                    Number of pages
                                </h3>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                {{ order_details.no_of_pages }}
                            </div>
                        </td>
                    </tr>
                    <tr
                        class="whitespace-nowrap"
                        v-if="order_details.no_of_charts"
                    >
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                <h3
                                    class="text-l font-semibold leading-normal text-blueGray-700"
                                >
                                    Number of charts
                                </h3>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                {{ order_details.no_of_charts }}
                            </div>
                        </td>
                    </tr>
                    <tr
                        class="whitespace-nowrap"
                        v-if="order_details.no_of_sources"
                    >
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                <h3
                                    class="text-l font-semibold leading-normal text-blueGray-700"
                                >
                                    Number of sources
                                </h3>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                {{ order_details.no_of_sources }}
                            </div>
                        </td>
                    </tr>
                    <tr
                        class="whitespace-nowrap"
                        v-if="usePage().props.value.files.length > 0"
                    >
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">
                                <h3
                                    class="text-l font-semibold leading-normal text-blueGray-700"
                                >
                                    Files
                                </h3>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div
                                class="text-gray-500"
                                v-for="files in usePage().props.value.files"
                                :key="files.id"
                            >
                                <a @click="downLoad(files.file_url)">
                                    <i
                                        class="fas fa-file-pdf mr-2 text-3xl text-blueGray-300"
                                    ></i>
                                    {{ files.file_name }}
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <AssignOrderModal
        :showModal="showModal"
        :orderId="order_details.id"
        @toggleModal="closeModal"
    />
</template>
<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { onMounted, ref } from "vue";
import AssignOrderModal from "@/Components/Modals/AssignOrder.vue";

const order_details = ref([]);

let showModal = ref(false);

const closeModal = () => {
    showModal.value = !showModal.value;
};

const openModal = () => {
    showModal.value = !showModal.value;
};

const downLoad = (url) => {
    window.open(url);
};

onMounted(() => {
    order_details.value = usePage().props.value.orderDetails;
});
</script>
