<template>
    <Modal :showModal="showModal" @toggleModal="toggleModal">
        <template #title>
            <h3 class="text-lg font-semibold"> Assign Order To Writer {{ord}}</h3>
        </template>

        <div class="space-y-3 p-1">
            <form @submit.prevent="assignOrder">
                <div class="col-span-6 sm:col-span-3">
                    <BreezeLabel for="writer" value="Choose a writer" />
                    <Multiselect
                        v-model="form.writer_id"
                        :label="'name'"
                        :track-by="'name'"
                        :valueProp="'id'"
                        :searchable="true"
                        :options="usePage().props.value.writers"
                        :maxHeight="500"
                        placeholder="Select a writer"
                        :class="[
                            color === 'light'
                                ? 'border-blueGray-100 bg-blueGray-50 text-blueGray-500'
                                : 'border-emerald-700 bg-emerald-800 text-gray-900',
                        ]"
                    />
                </div>
                <div class="mt-2">
                    <BreezeInput
                        id="order_id"
                        disabled
                        type="hidden"
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
                <button
                    :disabled="form.processing"
                    class="mr-1 mb-1 rounded bg-emerald-500 px-6 py-3 text-sm font-bold uppercase text-white shadow outline-none transition-all duration-150 ease-linear hover:shadow-lg focus:outline-none active:bg-emerald-600"
                    type="submit"
                >
                    Assign Order
                </button>
            </form>
        </div>
    </Modal>
</template>

<script setup>
import Modal from "@/Components/ModalForm.vue";
import Multiselect from "@vueform/multiselect";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import { useForm, usePage } from "@inertiajs/inertia-vue3";
import { defineEmits, computed, ref } from "vue";

const writers = ref([]);

let props = defineProps({
    showModal: Boolean,
    color: {
        default: "light",
        validator: function (value) {
            // The value must match one of these strings
            return ["light", "dark"].indexOf(value) !== -1;
        },
    },
    orderId: Number,
});

const emits = defineEmits(["toggleModal"]);

const form = useForm({
    writer_id: "",
    order_id: "",
});

const assignOrder = async () => {
    form.post(route("assign.orders"), {
        onFinish: () => {
            form.reset("writer_id", "order_id");
            emits("toggleModal");
        },
    });
};

const toggleModal = () => {
    emits("toggleModal");
};

let ord = computed(() => {
    form.order_id =  props.orderId;
});
</script>

<style></style>
<style src="@vueform/multiselect/themes/default.css"></style>
