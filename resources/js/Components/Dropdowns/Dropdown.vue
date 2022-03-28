<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <Menu as="div" class="inline-block text-left">
        <div>
            <MenuButton
                class="inline-flex w-full justify-center rounded-md px-4 py-2 text-sm font-medium shadow-sm focus:outline-none focus:ring-2"
            >
                <i class="fas fa-ellipsis-v"></i>
            </MenuButton>
        </div>

        <transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <MenuItems
                class="absolute right-2 z-50 mt-2 w-60 origin-top-right divide-y divide-gray-100 rounded-md bg-white px-2 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            >
                <div class="py-1">
                    <MenuItem @click="toggleModal" v-slot="{ active }" v-if="!order.order_asigned">
                        <a
                            :class="[
                                active
                                    ? 'bg-gray-100 text-gray-900'
                                    : 'text-gray-700',
                                'block px-4 py-2 text-sm',
                            ]"
                            >Assign order to writer</a
                        >
                    </MenuItem>
                    <MenuItem v-slot="{ active }" v-if="order.client_ready ==! 1 && (order.order_asigned || order.display_writer == 1)">
                        <Link
                            as="link"
                            href="/admin/client-ready"
                            method="post"
                            :data="{ order_id: order.id }"
                            :class="[
                                active
                                    ? 'bg-gray-100 text-gray-900'
                                    : 'text-gray-700',
                                'block px-4 py-2 text-sm',
                            ]"
                        >
                            Mark order as ready for the client</Link
                        >
                    </MenuItem>
                    <MenuItem v-slot="{ active }" v-if="order.display_writer ==! 1 && !order.order_asigned">
                        <Link
                            href="/admin/jobs-display"
                            :data="{ order_id: order.id }"
                            method="post"
                            as="link"
                            :class="[
                                active
                                    ? 'bg-gray-100 text-gray-900'
                                    : 'text-gray-700',
                                'block px-4 py-2 text-sm',
                            ]"
                            >Make available to writers</Link
                        >
                    </MenuItem>
                    <MenuItem v-slot="{ active }">
                        <Link
                            :href="route('order.details', { id: order.id })"
                            as="link"
                            :class="[
                                active
                                    ? 'bg-gray-100 text-gray-900'
                                    : 'text-gray-700',
                                'block px-4 py-2 text-sm',
                            ]"
                            >Show order details</Link
                        >
                    </MenuItem>
                </div>
            </MenuItems>
        </transition>
    </Menu>
</template>

<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import Modal from "@/Components/ModalForm.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { defineEmits, ref } from "vue";
let props = defineProps({
    order: Object,
});

const emit = defineEmits(["open-modal"]);

const toggleModal = () => {
    emit("open-modal", props.order.id);
};
</script>
