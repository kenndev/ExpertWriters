<template>
    <nav
        class="navbar-expand-lg fixed top-0 z-50 flex w-full flex-wrap items-center justify-between bg-white px-2 py-3 shadow"
    >
        <div
            class="container mx-auto flex flex-wrap items-center justify-between px-4"
        >
            <div
                class="relative flex w-full justify-between lg:static lg:block lg:w-auto lg:justify-start"
            >
                <router-link to="/">
                    <a
                        class="mr-4 inline-block whitespace-nowrap py-2 text-sm font-bold uppercase leading-relaxed text-blueGray-700"
                        href="#pablo"
                    >
                        Expert Writers
                    </a>
                </router-link>
                <button
                    class="block cursor-pointer rounded border border-solid border-transparent bg-transparent px-3 py-1 text-xl leading-none outline-none focus:outline-none lg:hidden"
                    type="button"
                    v-on:click="setNavbarOpen"
                >
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div
                class="flex-grow items-center lg:flex"
                :class="[navbarOpen ? 'block' : 'hidden']"
                id="example-navbar-warning"
            >
                <ul class="flex list-none flex-col lg:ml-auto lg:flex-row">
                   
                    <li class="flex items-center">
                        <a
                            href="#"
                            v-scroll-to="'#element'"
                            class="ml-3 mb-3 rounded bg-emerald-500 px-4 py-2 text-xs font-bold uppercase text-white shadow outline-none transition-all duration-150 ease-linear hover:shadow-lg focus:outline-none active:bg-emerald-600 lg:mr-1 lg:mb-0"
                            type="button"
                        >
                            <i class="fas fa-arrow-alt-circle-down"></i> Download Now
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            navbarOpen: false,
        };
    },
    methods: {
        setNavbarOpen: function () {
            this.navbarOpen = !this.navbarOpen;
        },
    },
    
};
</script>
