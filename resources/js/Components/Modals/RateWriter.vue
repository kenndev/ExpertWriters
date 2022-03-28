<template>
    <Modal :showModal="showModal" @toggleModal="toggleModal">
        <template #title>
            <h3 class="text-lg font-semibold">Rate Writer</h3>
        </template>

        <div class="space-y-3 p-1">
            <star-rating
                class="flex flex-row justify-center"
                v-model:rating="asigned.total_rate"
                :increment="0.01"
                :star-size="40"
                @update:rating="setRating"
            />
        </div>
    </Modal>
</template>

<script setup>
import Modal from "@/Components/ModalForm.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import StarRating from "vue-star-rating";

const writers = ref([]);

let props = defineProps({
    showModal: Boolean,
    order_id: Number,
    asigned: Object,
});

const emits = defineEmits(["toggleModal"]);

const toggleModal = () => {
    emits("toggleModal");
};

const setRating = (rating) => {
    const formData = new FormData();
    formData.append("writer_id", props.asigned.id);
    formData.append("order_id", props.order_id);
    formData.append("rate", rating);
    Inertia.post(window.location.origin + "/admin/rate-writer", formData, {
        onBefore: () => confirm("Proceed to rate this writer " + rating),
    });
    emits("toggleModal");
};
</script>

<style></style>
<style src="@vueform/multiselect/themes/default.css"></style>
