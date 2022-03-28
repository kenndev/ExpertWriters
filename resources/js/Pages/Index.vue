<template>
    <div>
        <index-navbar />
        <section
            class="header relative flex h-screen max-h-860-px items-center justify-center pt-16"
        >
            <div class="container mx-auto flex flex-wrap items-center">
                <div class="w-full px-4 md:w-8/12 lg:w-6/12 xl:w-6/12">
                    <div class="pt-32 sm:pt-0">
                        <h2 class="text-4xl font-semibold text-blueGray-600">
                            Expert Writers - Committed to People, Committed to
                            the Future
                        </h2>
                        <p
                            class="mt-4 text-lg leading-relaxed text-blueGray-500"
                        >
                            Expert Writers is a one-stop-shop for custom written
                            papers. It provides a custom paper writing service
                            that serves students from across the world or anyone
                            that would want to have a paper or article done for
                            them.
                        </p>
                        <p
                            class="mt-4 text-lg leading-relaxed text-blueGray-500"
                        >
                            It features 3 main platform, The client platform
                            where a client can order a paper, an admin platform
                            to manage the business and a writers platform where
                            writers can claim jobs to work on.
                        </p>

                        <div class="mt-12">
                            <a
                                href="#" v-scroll-to="'#element'"
                                class="get-started mr-1 mb-1 rounded bg-emerald-500 px-6 py-4 text-sm font-bold uppercase text-white shadow outline-none transition-all duration-150 ease-linear hover:shadow-lg focus:outline-none active:bg-emerald-600"
                            >
                                Get started
                            </a>
                            <a
                                href="expertwriters.linsure.co.ke"
                                class="github-star ml-1 mr-1 mb-1 rounded bg-blueGray-700 px-6 py-4 text-sm font-bold uppercase text-white shadow outline-none transition-all duration-150 ease-linear hover:shadow-lg focus:outline-none active:bg-blueGray-600"
                                target="_blank"
                            >
                                View Demo
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <img
                class="b-auto absolute top-0 right-0 -mt-48 hidden max-h-860-px w-10/12 pt-16 sm:mt-0 sm:w-6/12 md:hidden lg:block"
                :src="patternVue"
                alt="..."
            />
        </section>

        <section class="relative mt-48 bg-blueGray-100 pb-40 md:mt-40">
            <div
                class="absolute top-0 bottom-auto left-0 right-0 -mt-20 h-20 w-full"
                style="transform: translateZ(0)"
            >
                <svg
                    class="absolute bottom-0 overflow-hidden"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    version="1.1"
                    viewBox="0 0 2560 100"
                    x="0"
                    y="0"
                >
                    <polygon
                        class="fill-current text-blueGray-100"
                        points="2560 0 2560 100 0 100"
                    ></polygon>
                </svg>
            </div>
            <div class="container mx-auto">
                <div class="flex flex-wrap items-center">
                    <div
                        class="mr-auto ml-auto -mt-32 w-10/12 px-12 md:w-6/12 md:px-4 lg:w-4/12"
                    >
                        <div
                            class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded-lg bg-white bg-emerald-500 shadow-lg"
                        >
                            <img
                                alt="..."
                                src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=80"
                                class="w-full rounded-t-lg align-middle"
                            />
                            <blockquote class="relative mb-4 p-8">
                                <svg
                                    preserveAspectRatio="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 583 95"
                                    class="absolute left-0 -top-94-px block h-95-px w-full"
                                >
                                    <polygon
                                        points="-30,95 583,95 583,65"
                                        class="fill-current text-emerald-500"
                                    ></polygon>
                                </svg>
                                <h4 class="text-xl font-bold text-white">
                                    Start your online writing business today
                                    with Expert Writers
                                </h4>
                                <p class="text-md mt-2 font-light text-white">
                                    Starting your writing business just got
                                    easier. Expert Writers brings togther all
                                    aspects of a writing empire that you would
                                    need. From managing your writers to clients
                                    placing orders and processing payments. The
                                    platform is easy to cutomise to your liking.
                                    It's as easy as matching together pre-made
                                    components.
                                </p>
                            </blockquote>
                        </div>
                    </div>

                    <div class="w-full px-4 md:w-6/12">
                        <div class="flex flex-wrap">
                            <div class="w-full px-4 md:w-6/12">
                                <div class="relative mt-4 flex flex-col">
                                    <div class="flex-auto px-4 py-5">
                                        <div
                                            class="mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center text-blueGray-500 shadow-lg"
                                        >
                                            <i class="fa fa-money-bill"></i>
                                        </div>
                                        <h6 class="mb-1 text-xl font-semibold">
                                            Payment
                                        </h6>
                                        <p class="mb-4 text-blueGray-500">
                                            Uses PayPal Checkout that present
                                            clients with the most relevant
                                            online payment methods. It ensures
                                            fewer screens, fewer clicks, and
                                            better checkout conversion.
                                        </p>
                                    </div>
                                </div>
                                <div class="relative flex min-w-0 flex-col">
                                    <div class="flex-auto px-4 py-5">
                                        <div
                                            class="mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center text-blueGray-500 shadow-lg"
                                        >
                                            <i
                                                class="fas fa-drafting-compass"
                                            ></i>
                                        </div>
                                        <h6 class="mb-1 text-xl font-semibold">
                                            Ease of placing orders
                                        </h6>
                                        <p class="mb-4 text-blueGray-500">
                                            Expert Writers is designed in such a
                                            way that the process of placing an
                                            order is easy and fast. Just one
                                            step involved and it's done.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-4 md:w-6/12">
                                <div
                                    class="relative mt-4 flex min-w-0 flex-col"
                                >
                                    <div class="flex-auto px-4 py-5">
                                        <div
                                            class="mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center text-blueGray-500 shadow-lg"
                                        >
                                            <i class="fas fa-newspaper"></i>
                                        </div>
                                        <h6 class="mb-1 text-xl font-semibold">
                                            Technology Used
                                        </h6>
                                        <p class="mb-4 text-blueGray-500">
                                            Developed with modern technology
                                            with the future in mind. It's
                                            responsive and can be used with any
                                            device. Powered by Vue 3, Tailwind
                                            CSS and Laravel.
                                        </p>
                                    </div>
                                </div>
                                <div class="relative flex min-w-0 flex-col">
                                    <div class="flex-auto px-4 py-5">
                                        <div
                                            class="mb-5 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white p-3 text-center text-blueGray-500 shadow-lg"
                                        >
                                            <i class="fas fa-file-alt"></i>
                                        </div>
                                        <h6 class="mb-1 text-xl font-semibold">
                                            Documentation
                                        </h6>
                                        <p class="mb-4 text-blueGray-500">
                                            Built by developers for developers.
                                            You will love how easy is to to work
                                            with Expert Writers.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16 flex flex-wrap justify-center text-center">
                <div class="w-full px-12 md:w-6/12 md:px-4">
                    <h2 class="text-4xl font-semibold"></h2>
                    <p
                        class="mt-4 mb-4 text-xl leading-relaxed text-blueGray-500"
                    >
                        Expert Writers is a completly new product built using
                        our past experience in web development to make it easy
                        for you to start a writing empire.
                    </p>
                </div>
            </div>
        </section>

        <section class="z-1 relative block bg-blueGray-600">
            <div class="container mx-auto">
                <div class="flex flex-wrap justify-center">
                    <div class="lg:w-12/12 -mt-24 w-full px-4">
                        <div class="flex flex-wrap">
                            <div class="w-full px-4 lg:w-4/12">
                                <h5
                                    class="pb-4 text-center text-xl font-semibold"
                                >
                                    Login Page
                                </h5>
                                <router-link to="/auth/login">
                                    <div
                                        class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded-lg bg-white shadow-lg transition-all duration-150 ease-linear hover:-mt-4"
                                    >
                                        <img
                                            alt="..."
                                            class="h-auto max-w-full rounded-lg border-none align-middle"
                                            :src="login"
                                        />
                                    </div>
                                </router-link>
                            </div>

                            <div class="w-full px-4 lg:w-4/12">
                                <h5
                                    class="pb-4 text-center text-xl font-semibold"
                                >
                                    Home Page
                                </h5>
                                <router-link to="/profile">
                                    <div
                                        class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded-lg bg-white shadow-lg transition-all duration-150 ease-linear hover:-mt-4"
                                    >
                                        <img
                                            alt="..."
                                            class="h-auto max-w-full rounded-lg border-none align-middle"
                                            :src="home"
                                        />
                                    </div>
                                </router-link>
                            </div>

                            <div class="w-full px-4 lg:w-4/12">
                                <h5
                                    class="pb-4 text-center text-xl font-semibold"
                                >
                                    Admin Page
                                </h5>
                                <router-link to="/landing">
                                    <div
                                        class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded-lg bg-white shadow-lg transition-all duration-150 ease-linear hover:-mt-4"
                                    >
                                        <img
                                            alt="..."
                                            class="h-auto max-w-full rounded-lg border-none align-middle"
                                            :src="admin"
                                        />
                                    </div>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="overflow-hidden bg-blueGray-600 py-10" id="element">
            <div class="container mx-auto pb-20">
                <div class="flex flex-wrap justify-center"></div>
            </div>
        </section>

        <section class="relative bg-blueGray-200 pb-16 pt-32" >
            <div
                class="absolute top-0 bottom-auto left-0 right-0 -mt-20 h-20 w-full"
                style="transform: translateZ(0)"
            >
                <svg
                    class="absolute bottom-0 overflow-hidden"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    version="1.1"
                    viewBox="0 0 2560 100"
                    x="0"
                    y="0"
                >
                    <polygon
                        class="fill-current text-blueGray-200"
                        points="2560 0 2560 100 0 100"
                    ></polygon>
                </svg>
            </div>

            <div class="container mx-auto">
                <div
                    class="relative z-10 -mt-64 flex flex-wrap justify-center rounded-lg bg-white py-16 px-12 shadow-xl"
                >
                    <div class="w-full text-center lg:w-8/12">
                        <p class="text-center text-4xl">
                            <span role="img" aria-label="love"> 😍 </span>
                        </p>
                        <h3 class="text-3xl font-semibold">
                            Do you love this Starter Kit?
                        </h3>
                        <p
                            class="mt-4 mb-4 text-lg leading-relaxed text-blueGray-500"
                        >
                            Cause if you do, it can be yours now. Hit the button
                            below to get yourself this platform and start your
                            writing business today!
                        </p>
                        <div class="mt-10 flex flex-col sm:block">
                            <a
                                href="https://www.creative-tim.com/learning-lab/tailwind/vue/overview/notus?ref=vn-index"
                                target="_blank"
                                class="get-started mr-1 mb-2 rounded bg-emerald-500 px-6 py-4 text-sm font-bold uppercase text-white shadow outline-none transition-all duration-150 ease-linear hover:shadow-lg focus:outline-none active:bg-emerald-600"
                            >
                                Get started
                            </a>
                        </div>
                        <div class="mt-16 text-center"></div>
                    </div>
                </div>
            </div>
        </section>
        <footer-component />
    </div>
</template>
<script>
import IndexNavbar from "@/components/Navbars/IndexNavbar.vue";
import FooterComponent from "@/components/Footers/Footer.vue";

import patternVue from "@/assets/img/dashboard.jpg";
import componentBtn from "@/assets/img/component-btn.png";
import componentProfileCard from "@/assets/img/component-profile-card.png";
import componentInfoCard from "@/assets/img/component-info-card.png";
import componentInfo2 from "@/assets/img/component-info-2.png";
import componentMenu from "@/assets/img/component-menu.png";
import componentBtnPink from "@/assets/img/component-btn-pink.png";
import documentation from "@/assets/img/documentation.png";
import login from "@/assets/img/login.jpg";
import home from "@/assets/img/home.jpg";
import admin from "@/assets/img/admin.jpg";

export default {
    data() {
        return {
            patternVue,
            componentBtn,
            componentProfileCard,
            componentInfoCard,
            componentInfo2,
            componentMenu,
            componentBtnPink,
            documentation,
            login,
            home,
            admin,
        };
    },
    components: {
        IndexNavbar,
        FooterComponent,
    },
};
</script>
