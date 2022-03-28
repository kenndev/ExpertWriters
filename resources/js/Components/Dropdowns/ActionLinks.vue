<template>
    <div>
        <a
            @click="openModal"
            class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-blueGray-700"
        >
            Assign order to writer
        </a>
        <a
            href="javascript:void(0);"
            class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-blueGray-700"
        >
            Mark as ready for client
        </a>
        <a
            href="javascript:void(0);"
            class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-blueGray-700"
        >
            Display job to writers
        </a>
        <a
            href="javascript:void(0);"
            class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-blueGray-700"
        >
            Order Details
        </a>
    </div>

    <!-- Modal toggle -->
    <button
        @click="modal"
        class="block rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button"
        data-modal-toggle="default-modal"
    >
        Toggle modal
    </button>

    <!-- Main modal -->
    <div
        id="default-modal"
        aria-hidden="true"
        class="absolute right-0 left-0 top-4 z-50 hidden h-modal items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full"
    >
        <div class="relative h-full w-full max-w-2xl px-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-start justify-between rounded-t border-b p-5 dark:border-gray-600"
                >
                    <h3
                        class="text-xl font-semibold text-gray-900 dark:text-white lg:text-2xl"
                    >
                        Terms of Service
                    </h3>
                    <button
                        type="button"
                        class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="default-modal"
                    >
                        <svg
                            class="h-5 w-5"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="space-y-6 p-6">
                    <p
                        class="text-base leading-relaxed text-gray-500 dark:text-gray-400"
                    >
                        With less than a month to go before the European Union
                        enacts new consumer privacy laws for its citizens,
                        companies around the world are updating their terms of
                        service agreements to comply.
                    </p>
                    <p
                        class="text-base leading-relaxed text-gray-500 dark:text-gray-400"
                    >
                        The European Union’s General Data Protection Regulation
                        (G.D.P.R.) goes into effect on May 25 and is meant to
                        ensure a common set of data rights in the European
                        Union. It requires organizations to notify users as soon
                        as possible of high-risk data breaches that could
                        personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center space-x-2 rounded-b border-t border-gray-200 p-6 dark:border-gray-600"
                >
                    <button
                        data-modal-toggle="default-modal"
                        type="button"
                        class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        I accept
                    </button>
                    <button
                        data-modal-toggle="default-modal"
                        type="button"
                        class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-300 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    >
                        Decline
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center">
        <ModalLayout @close="closeModal" :isOpen="statusModal" :title="title">
            <form @submit.prevent="submit">
                <div class="space-y-6 p-6">
                    <div class="col-span-6 sm:col-span-3">
                        <BreezeLabel for="writer" value="Choose a writer" />
                        <Multiselect
                            v-model="form.writer_id"
                            :label="'name'"
                            :track-by="'name'"
                            :valueProp="'id'"
                            :searchable="true"
                            :options="writers"
                            :maxHeight="500"
                            placeholder="Select a writer"
                            :class="[
                                color === 'light'
                                    ? 'border-blueGray-100 bg-blueGray-50 text-blueGray-500'
                                    : 'border-emerald-700 bg-emerald-800 text-gray-900',
                            ]"
                        />
                    </div>
                    <div class="mt-4">
                        <BreezeInput
                            id="order_id"
                            type="text"
                            class="mt-1 block w-full disabled:border-slate-200 disabled:bg-slate-50 disabled:text-slate-500 disabled:shadow-none"
                            v-model="form.order_id"
                            name="order_id"
                            :class="[
                                color === 'light'
                                    ? 'text-blueGray-500'
                                    : 'text-gray-900',
                            ]"
                        />
                    </div>
                </div>
                <div
                    class="mt-4 flex justify-between space-x-2 rounded-b border-t border-gray-200 p-6 dark:border-gray-600"
                >
                    <button
                        @click="closeModal()"
                        type="button"
                        class="rounded border border-blue-600 px-6 py-2 text-blue-800"
                    >
                        Cancel
                    </button>
                    <button
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        type="submit"
                        class="ml-2 rounded bg-blue-600 px-6 py-2 text-blue-100"
                    >
                        Save
                    </button>
                </div>
            </form>
        </ModalLayout>
    </div>
</template>

<script setup>
import ModalLayout from "@/Components/Modal.vue";
import Multiselect from "@vueform/multiselect";
import { ref, reactive, defineEmits } from "vue";
import useResources from "@/Composables/resources";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";


const emit = defineEmits(["modal-open"]);

const props = defineProps({
    writers: Array,
    order_id: Number,
    color: {
        default: "light",
        validator: function (value) {
            // The value must match one of these strings
            return ["light", "dark"].indexOf(value) !== -1;
        },
    },
});
const title = ref("");
const form = reactive({
    writer_id: "",
    order_id: props.order_id,
});

const openModal = () => {
    emit("modal-open", props.order_id);
};
</script>

<style></style>
<style src="@vueform/multiselect/themes/default.css"></style>
