<template>
    <div>
        <a
            class="py-1 px-3 text-blueGray-500"
            href="#pablo"
            ref="btnDropdownRef"
            v-on:click="toggleDropdown($event)"
        >
            <i class="fas fa-ellipsis-v"></i>
        </a>
        <div
            ref="popoverDropdownRef"
            class="relative z-50 float-left min-w-48 list-none rounded bg-white py-2 text-left text-base shadow-lg"
            v-bind:class="{
                hidden: !dropdownPopoverShow,
                block: dropdownPopoverShow,
            }"
        >
            <div>
                <a
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
        </div>
    </div>
</template>
<script>
import { createPopper } from "@popperjs/core";
export default {
    data() {
        return {
            dropdownPopoverShow: false,
        };
    },
    props: {
        color: {
            default: "light",
            validator: function (value) {
                // The value must match one of these strings
                return ["light", "dark"].indexOf(value) !== -1;
            },
        },
    },
    methods: {
        toggleDropdown: function (event) {
            event.preventDefault();
            if (this.dropdownPopoverShow) {
                this.dropdownPopoverShow = false;
            } else {
                this.dropdownPopoverShow = true;
                createPopper(
                    this.$refs.btnDropdownRef,
                    this.$refs.popoverDropdownRef,
                    {
                        placement: "bottom-start",
                    }
                );
            }
        },
    },
};
</script>
