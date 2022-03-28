<template>
    <nav
        class="relative z-10 flex flex-wrap items-center justify-between bg-white py-4 px-6 shadow-xl md:fixed md:left-0 md:top-0 md:bottom-0 md:block md:w-64 md:flex-row md:flex-nowrap md:overflow-hidden md:overflow-y-auto"
    >
        <div
            class="mx-auto flex w-full flex-wrap items-center justify-between px-0 md:min-h-full md:flex-col md:flex-nowrap md:items-stretch"
        >
            <!-- Toggler -->
            <button
                class="cursor-pointer rounded border border-solid border-transparent bg-transparent px-3 py-1 text-xl leading-none text-black opacity-50 md:hidden"
                type="button"
                v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
            >
                <i class="fas fa-bars"></i>
            </button>
            <!-- Brand -->
            <BreezeNavLink
                class="mr-0 inline-block whitespace-nowrap p-4 px-0 text-left text-sm font-bold uppercase text-blueGray-600 md:block md:pb-2"
                :href="route('dashboard')"
            >
                <img
                                    alt="..."
                                    class="h-auto max-w-full rounded-lg border-none align-middle"
                                    :src="home"
                                />
            </BreezeNavLink>
            <!-- User -->
            <ul class="flex list-none flex-wrap items-center md:hidden">
                <li class="relative inline-block">
                    <notification-dropdown />
                </li>
                <li class="relative inline-block">
                    <user-dropdown />
                </li>
            </ul>
            <!-- Collapse -->
            <div
                class="absolute top-0 left-0 right-0 z-40 h-auto flex-1 items-center overflow-y-auto overflow-x-hidden rounded shadow md:relative md:mt-4 md:flex md:flex-col md:items-stretch md:opacity-100 md:shadow-none"
                v-bind:class="collapseShow"
            >
                <!-- Collapse header -->
                <div
                    class="mb-4 block border-b border-solid border-blueGray-200 pb-4 md:hidden md:min-w-full"
                >
                    <div class="flex flex-wrap">
                        <div class="w-6/12">
                            <BreezeNavLink
                                class="mr-0 inline-block whitespace-nowrap p-4 px-0 text-left text-sm font-bold uppercase text-blueGray-600 md:block md:pb-2"
                                :href="route('dashboard')"
                            >
                                Expert Writers
                            </BreezeNavLink>
                        </div>
                        <div class="flex w-6/12 justify-end">
                            <button
                                type="button"
                                class="cursor-pointer rounded border border-solid border-transparent bg-transparent px-3 py-1 text-xl leading-none text-black opacity-50 md:hidden"
                                v-on:click="toggleCollapseShow('hidden')"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                <form class="mt-6 mb-4 md:hidden">
                    <div class="mb-3 pt-0">
                        <input
                            type="text"
                            placeholder="Search"
                            class="h-12 w-full rounded border-0 border border-solid border-blueGray-500 bg-white px-3 py-2 text-base font-normal leading-snug text-blueGray-600 placeholder-blueGray-300 shadow-none outline-none focus:outline-none"
                        />
                    </div>
                </form>

                <!-- Divider -->
                <hr class="my-4 md:min-w-full" />
                <!-- Heading -->
                <h6
                    class="block pt-1 pb-4 text-xs font-bold uppercase text-blueGray-500 no-underline md:min-w-full"
                >
                    Admin Layout Pages
                </h6>
                <!-- Navigation -->

                <ul class="flex list-none flex-col md:min-w-full md:flex-col">
                    <li class="items-center">
                        <BreezeNavLink
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                        >
                            <i
                                class="fas fa-tv mr-2 text-sm"
                                :class="[
                                    route().current('dashboard')
                                        ? 'opacity-75'
                                        : 'text-blueGray-300',
                                ]"
                            ></i>
                            Dashboard
                        </BreezeNavLink>
                    </li>
                    <li class="items-center">
                        <BreezeNavLink
                            :href="route('pricing')"
                            :active="route().current('pricing')"
                        >
                            <i
                                class="fas fa-money-check mr-2 text-sm"
                                :class="[
                                    route().current('pricing')
                                        ? 'opacity-75'
                                        : 'text-blueGray-300',
                                ]"
                            ></i>
                            Pricing
                        </BreezeNavLink>
                    </li>
                    <li class="items-center">
                        <BreezeNavLink
                            :href="route('orders')"
                            :active="route().current('orders')"
                        >
                            <i
                                class="fas fa-briefcase mr-2 text-sm"
                                :class="[
                                    route().current('orders')
                                        ? 'opacity-75'
                                        : 'text-blueGray-300',
                                ]"
                            ></i>
                            Orders
                        </BreezeNavLink>
                    </li>
                    <!-- <li class="items-center">
                        <BreezeNavLink
                            :href="route('orders')"
                        >
                            <i
                                class="fa fa-money-bill mr-2 text-sm"
                                :class="[
                                    route().current('orders')
                                        ? 'opacity-75'
                                        : 'text-blueGray-300',
                                ]"
                            ></i>
                            Earnings
                        </BreezeNavLink>
                    </li>
                    <li class="items-center">
                        <BreezeNavLink
                            :href="route('orders')"
                            
                        >
                            <i
                                class="fas fa-graduation-cap mr-2 text-sm"
                                :class="[
                                    route().current('orders')
                                        ? 'opacity-75'
                                        : 'text-blueGray-300',
                                ]"
                            ></i>
                            Writers
                        </BreezeNavLink>
                    </li> -->
                </ul>

            

                <!-- Divider -->
                <hr class="my-4 md:min-w-full" />
                <!-- Heading -->
                <h6
                    class="block pt-1 pb-4 text-xs font-bold uppercase text-blueGray-500 no-underline md:min-w-full"
                >
                    Settings
                </h6>
                <!-- Navigation -->

                <ul
                    class="flex list-none flex-col md:mb-4 md:min-w-full md:flex-col"
                >
                    <li class="items-center">
                        <BreezeNavLink
                            :href="route('settings')"
                            :active="route().current('settings')"
                        >
                            <i
                                class="fas fa-tools mr-2 text-sm"
                                :class="[
                                    route().current('settings')
                                        ? 'opacity-75'
                                        : 'text-blueGray-300',
                                ]"
                            ></i>
                            Settings
                        </BreezeNavLink>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>
</template>
); }

<script>
import NotificationDropdown from "@/components/Dropdowns/NotificationDropdown.vue";
import UserDropdown from "@/components/Dropdowns/UserDropdown.vue";
import BreezeNavLink from "@/Components/NavLink.vue";
import useResources from "@/Composables/resources";
import home from "@/assets/img/logs.png";
export default {
    data() {
        return {
            collapseShow: "hidden",
            home
        };
    },
    methods: {
        toggleCollapseShow: function (classes) {
            this.collapseShow = classes;
        },
    },
    components: {
        NotificationDropdown,
        UserDropdown,
        BreezeNavLink,
        
    },
};
</script>
