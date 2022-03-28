<template>
    <Modal :showModal="showModal" @toggleModal="toggleModal">
        <template #title>
            <h3 class="text-lg font-semibold">Add Social</h3>
        </template>

        <div class="space-y-3 p-1">
            <form @submit.prevent="submitSocial">
                <div class="col-span-6 py-3 sm:col-span-3">
                    <BreezeLabel for="social_name" value="Name" />
                    <BreezeInput
                        id="social_name"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        v-model="newForm.social_name"
                        name="social_name"
                        :class="[
                            color === 'light'
                                ? 'text-blueGray-500'
                                : 'text-gray-900',
                        ]"
                    />
                </div>
                <div class="col-span-6 py-3 sm:col-span-3">
                    <BreezeLabel for="social_url" value="Url" />
                    <BreezeInput
                        id="social_url"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="newForm.social_url"
                        name="social_url"
                        required
                        :class="[
                            color === 'light'
                                ? 'text-blueGray-500'
                                : 'text-gray-900',
                        ]"
                    />
                </div>
                <div class="col-span-6 py-3 sm:col-span-3">
                    <BreezeLabel for="social_icon" value="Social Icon" />
                    <BreezeInput
                        id="social_icon"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="newForm.social_icon"
                        name="social_icon"
                        required
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
                    Submit
                </button>
            </form>
        </div>
    </Modal>
</template>

<script setup>
import Modal from "@/Components/ModalForm.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import { Inertia } from "@inertiajs/inertia";
import { defineEmits, computed, ref, reactive } from "vue";

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
    social: Object,
    updating: Boolean,
});

const emits = defineEmits(["toggleModal"]);

const form = reactive({
    social_url: "",
    social_icon: "",
    social_name: "",
    id: "",
});

const newForm = computed(() => {
    return {
        social_url: props.social.social_url,
        social_icon: props.social.social_icon,
        social_name: props.social.social_name,
    };
});

const submitSocial = async () => {
    if (props.updating) {
        form.id = props.social.id;
        form.social_url = newForm.value.social_url;
        form.social_icon = newForm.value.social_icon;
        form.social_name = newForm.value.social_name;
        toggleModal();
        Inertia.put(window.location.origin + "/admin/social/" + form.id, form);
    } else {
        form.social_url = newForm.value.social_url;
        form.social_icon = newForm.value.social_icon;
        form.social_name = newForm.value.social_name;
        toggleModal();
        Inertia.post(window.location.origin + "/admin/social", form);
    }
};

const toggleModal = () => {
    emits("toggleModal");
};
</script>

<style></style>
