<template>
    <div class="break-words rounded-lg border-0 bg-blueGray-100 shadow-lg">
        <div class="mb-0 rounded-t bg-white px-6 py-3">
            <div class="flex justify-between text-center">
                <button
                    @click="newSocial"
                    class="mr-1 rounded bg-emerald-500 px-4 py-2 text-xs font-bold uppercase text-white shadow outline-none transition-all duration-150 ease-linear hover:shadow-md focus:outline-none active:bg-emerald-600"
                    type="submit"
                >
                    Add Social
                </button>
            </div>
        </div>
        <table class="items-center bg-transparent">
            
            <tbody>
                <tr v-for="item in socials" :key="item.id">
                    <td
                        class="whitespace-nowrap border-t-0 border-l-0 border-r-0 p-4 px-6 align-middle text-xs"
                    >
                        {{ item.social_name }}
                    </td>

                    <td
                        class="whitespace-nowrap border-t-0 border-l-0 border-r-0 p-4 px-6 text-right align-middle text-xs"
                    >
                        <i
                            @click="updateSocial(item)"
                            class="fas fa-edit inline-flex items-center rounded bg-emerald-500 py-2 px-3 font-bold text-gray-800 hover:bg-emerald-400"
                        >
                            Edit</i
                        >
                        <i
                            @click="deleteSocial(item)"
                            class="fas fa-trash-alt ml-2 inline-flex items-center rounded bg-red-500 py-2 px-3 font-bold text-gray-800 hover:bg-red-400"
                            >Delete</i
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <AddSocial
        :updating="updating"
        :social="social"
        :showModal="showModal"
        @toggleModal="toggleModal"
    />
</template>

<script setup>
import AddSocial from "@/components/Modals/AddSocial.vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { ref, computed } from "vue";
defineProps({
    color: {
        default: "light",
        validator: function (value) {
            // The value must match one of these strings
            return ["light", "dark"].indexOf(value) !== -1;
        },
    },
});

const showModal = ref(false);
const updating = ref(false);
const social = ref([]);
const socials = computed(() => usePage().props.value.social);

const toggleModal = () => {
    showModal.value = !showModal.value;
    social.value = [];
};

const newSocial = () => {
    updating.value = false;
    toggleModal();
};

const updateSocial = (data) => {
    updating.value = true;
    showModal.value = !showModal.value;
    social.value = data;
};

const deleteSocial = (data) => {
    Inertia.delete(window.location.origin + "/admin/social/" + data.id, {
        onBefore: () => confirm("Are you sure you want to delete this record?"),
    });
};
</script>

<style></style>
