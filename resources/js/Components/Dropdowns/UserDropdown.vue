<template>
    <div>
        <a
            class="block text-blueGray-500"
            href="#pablo"
            ref="btnDropdownRef"
            v-on:click="toggleDropdown($event)"
        >
            <div class="flex items-center">
                <span
                    class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-blueGray-200 text-sm text-white"
                >
                    <img
                        alt="..."
                        class="w-full rounded-full border-none align-middle shadow-lg"
                        :src="image"
                    />
                </span>
            </div>
        </a>
        <div
            ref="popoverDropdownRef"
            class="z-50 float-left min-w-48 list-none rounded bg-white py-2 text-left text-base shadow-lg"
            v-bind:class="{
                hidden: !dropdownPopoverShow,
                block: dropdownPopoverShow,
            }"
        >
            
            
            <BreezeNavActionsLink
                :href="route('logout')"
                as="link"
                method="post"
            >
                Log out
            </BreezeNavActionsLink>
        </div>
    </div>
</template>

<script>
import { createPopper } from "@popperjs/core";
import BreezeNavActionsLink from "@/Components/NavlinkActions.vue";
import image from "@/assets/img/team.jpg";

export default {
    data() {
        return {
            dropdownPopoverShow: false,
            image: image,
        };
    },
    components: {
        BreezeNavActionsLink,
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
