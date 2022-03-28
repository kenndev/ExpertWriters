<template>
    <div
        class="relative mb-6 mt-16 flex w-full min-w-0 flex-col break-words rounded-lg bg-white shadow-xl"
    >
        <div class="px-6">
            <div class="flex flex-wrap justify-center">
                <div class="flex w-full justify-center px-4">
                    <div class="relative">
                        <img
                            alt="..."
                            :src="team2"
                            class="absolute -m-16 -ml-20 h-auto max-w-150-px rounded-full border-none align-middle shadow-xl lg:-ml-16"
                        />
                    </div>
                </div>

                <div class="mt-20 w-auto px-4 text-center">
                    <div
                        class="relative mx-auto mt-2 flex rounded-lg border border-teal-400 bg-teal-100 px-2 py-1 dark:bg-teal-200"
                        role="alert"
                    >
                        <span class="ml-4 block sm:inline">
                            This order has been assigned to
                        </span>
                    </div>
                </div>
            </div>
            <div class="mt-6 text-center">
                <h3
                    class="mb-2 mb-2 text-xl font-semibold leading-normal text-blueGray-700"
                >
                    Name: {{ usePage().props.value.assigned.name }}
                </h3>
                <div
                    class="mt-0 mb-2 text-sm font-bold leading-normal text-blueGray-400"
                >
                    <i
                        class="fas fa-address-card mr-2 text-lg text-blueGray-400"
                    ></i>
                    Email: {{ usePage().props.value.assigned.email }}
                </div>
                <div
                    class="mt-0 mb-2 text-sm font-bold leading-normal text-blueGray-400"
                    v-if="usePage().props.value.assigned.phone"
                >
                    <i class="fas fa-phone mr-2 text-lg text-blueGray-400"></i>
                    Phonenumber: {{ usePage().props.value.assigned.phone }}
                </div>
                <div
                    class="mt-0 mb-2 text-sm font-bold leading-normal text-blueGray-400"
                    v-if="usePage().props.value.assigned.address"
                >
                    <i
                        class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"
                    ></i>
                    Address: {{ usePage().props.value.assigned.address }}
                </div>
                <div
                    class="mt-0 mb-2 text-sm font-bold leading-normal text-blueGray-400"
                >
                    writer rating
                    <star-rating
                        class="flex flex-row justify-center"
                        v-model:rating="
                            usePage().props.value.assigned.total_rate
                        "
                        :increment="0.01"
                        :read-only="true"
                        :star-size="20"
                    />
                </div>
                <button
                    class="mr-1 mb-4 rounded bg-emerald-500 px-4 py-2 text-xs font-bold uppercase text-white shadow outline-none transition-all duration-150 ease-linear hover:shadow-md focus:outline-none active:bg-emerald-600"
                    type="button"
                    @click="rateWriter"
                >
                    Rate writer on this job
                </button>
            </div>
        </div>
    </div>
    <RateWriter
        :showModal="showModal"
        :order_id="order_id"
        :asigned="asigned"
        @toggleModal="rateWriter"
    />
</template>
<script setup>
import team2 from "@/assets/img/team-2-800x800.jpg";
import { usePage } from "@inertiajs/inertia-vue3";
import StarRating from "vue-star-rating";
import RateWriter from "@/Components/Modals/RateWriter.vue";
import { ref, computed } from "vue";

const showModal = ref(false);
const order_id = computed(() => usePage().props.value.orderDetails.id);
const asigned = computed(() => usePage().props.value.assigned);

const rateWriter = () => {
    showModal.value = !showModal.value;
};
</script>
