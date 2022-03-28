<template>
    <div class="flex flex-row flex-wrap md:justify-center">
        <div
            class="w-full md:w-8/12 lg:w-6/12 xl:w-3/12 px-4 rounded-2xl border bg-white shadow-lg mx-4 mb-10"
            v-for="academic_level in academic_levels"
            :key="academic_level.id"
        >
            <div class="p-4">
                <h1
                    class="border-b pb-4 text-center text-lg font-medium capitalize text-gray-700 dark:border-gray-600 dark:text-white lg:text-xl"
                >
                    {{ academic_level.academic_level }}
                </h1>
                <div class="mt-8 space-y-4">
                    <div class="flex items-center">
                        <ul
                            class="mt-6 mb-6 w-full text-sm text-gray-600 dark:text-gray-100"
                        >
                            <li
                                class="mb-3 flex justify-between"
                                v-for="(item, index) in academic_level.pricing"
                                :key="index"
                            >
                                <div class="flex">
                                    {{ item.deadline }}
                                </div>
                                <div class="flex">
                                    ${{ item.price }}
                                    <div class="ml-4 flex justify-end">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="mr-1 h-5 w-5 transition delay-150 duration-150 ease-in-out hover:border-transparent hover:text-blue-600 motion-safe:hover:scale-110"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                            @click="
                                                editPricing(
                                                    item,
                                                    academic_level.academic_level
                                                )
                                            "
                                        >
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"
                                            />
                                            <path
                                                fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd"
                                            /></svg
                                        >/
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="ml-1 h-5 w-5 transition delay-150 duration-150 ease-in-out hover:border-transparent hover:text-red-500 motion-safe:hover:scale-110"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                            @click="deletePricing(item.id)"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button
                        @click="addNewPrice(academic_level)"
                        class="w-full rounded border border-blue-500 bg-transparent px-4 text-center align-middle font-semibold text-blue-700 shadow-md transition duration-200 ease-in hover:border-transparent hover:bg-blue-500 hover:text-white"
                    >
                        Add price
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
                        <BreezeLabel for="pricing" value="Deadline" />
                        <select
                            id="deadline"
                            v-model="deadlin_e"
                            name="deadline"
                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        >
                            <option value="" selected disabled hidden>
                                Select a deadline
                            </option>
                            <option
                                v-for="deadlin in deadlines"
                                :key="deadlin.id"
                                v-bind:value="deadlin.id"
                            >
                                {{ deadlin.deadline }}
                            </option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <BreezeLabel for="pricing" value="Pricing" />
                        <BreezeInput
                            id="pricing"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="pricin_g"
                            name="pricing"
                            required
                            autofocus
                            autocomplete="pricing"
                        />
                        <BreezeInput
                            id="academic_level"
                            type="hidden"
                            class="mt-1 block w-full disabled:border-slate-200 disabled:bg-slate-50 disabled:text-slate-500 disabled:shadow-none"
                            v-model="level_of_academic"
                            name="academic_level"
                        />
                        <BreezeInput
                            id="identifier"
                            type="hidden"
                            class="mt-1 block w-full disabled:border-slate-200 disabled:bg-slate-50 disabled:text-slate-500 disabled:shadow-none"
                            v-model="tableId"
                            name="identifier"
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
import { ref } from "vue";
import ModalLayout from "@/Components/Modal.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeButton from "@/Components/Button.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";

defineProps({
    academic_levels: Array,
    deadlines: Array,
});

const statusModal = ref(false);
const statusModalEdit = ref(false);
const title = ref("");
const tableId = ref("");

const level_of_academic = ref("");
const deadlin_e = ref("");
const pricin_g = ref("");

const form = useForm({
    academic_level: level_of_academic,
    deadline: deadlin_e,
    pricing: pricin_g,
    identifier: tableId,
});

const closeModal = () => {
    statusModal.value = false;
    form.reset("deadlin_e", "pricin_g", "level_of_academic", "tableId");
};

const closeModalEdit = () => {
    statusModal.value = false;
    form.reset("deadlin_e", "pricin_g", "level_of_academic", "tableId");
};

const addNewPrice = (academicLevel) => {
    statusModal.value = true;

    level_of_academic.value = academicLevel.id;
    deadlin_e.value = "";
    pricin_g.value = "";
    tableId.value = "";

    title.value = academicLevel.academic_level;
};

const submit = () => {
    if (Boolean(tableId.value)) {
        form.put(route("update.pricing"), {
            onFinish: () => {
                //level_of_academic.value = 1;
            },
        });
    } else {
        console.log(tableId.value + "Posting");
        form.post(route("store.pricing"), {
            onFinish: () => {
                //level_of_academic.value = 1;
            },
        });
    }

    form.reset("deadlin_e", "pricin_g", "level_of_academic");
    statusModal.value = false;
};

const deletePricing = (id) => {
    if (confirm("are you sure you want to delete this?")) {
        Inertia.delete("/admin/pricing/" + id);
    }
};

const editPricing = (item, titl) => {
    title.value = titl;

    level_of_academic.value = item.academic_level;
    deadlin_e.value = item.deadline_id;
    pricin_g.value = item.price;
    tableId.value = item.id;

    statusModal.value = true;
};
</script>

<style></style>
