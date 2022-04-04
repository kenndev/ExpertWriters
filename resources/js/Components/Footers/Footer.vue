<template>
    <footer class="relative bg-blueGray-200 pt-8 pb-6">
        <div
            class="pointer-events-none absolute bottom-auto top-0 left-0 right-0 -mt-20 h-20 w-full overflow-hidden"
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
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap text-center lg:text-left">
                <div class="w-full px-4 lg:w-6/12">
                    <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
                    <h5 class="mt-0 mb-2 text-lg text-blueGray-600">
                        Get in touch with the developer. Email:
                        murimi.kenn@gmail.com
                    </h5>
                    <h5 class="mt-0 mb-2 text-lg text-blueGray-600">
                        Phone number: +254704103356
                    </h5>
                </div>
                <div class="w-full px-4 lg:w-6/12">
                    <div class="items-top mb-6 flex flex-wrap">
                        <div class="ml-auto w-full px-4 lg:w-4/12">
                            <span
                                class="mb-2 block text-sm font-semibold uppercase text-blueGray-500"
                            >
                                Useful Links
                            </span>
                            <ul class="list-unstyled">
                                <li>
                                    <a
                                        target="_blank"
                                        class="block pb-2 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                                        href="http://expertwriters.thetradinghut.net/"
                                    >
                                        Expert Writers Demo
                                    </a>
                                </li>
                                <li>
                                    <a
                                        target="_blank"
                                        class="block pb-2 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                                        href="http://expertwritersdashboard.thetradinghut.net/login"
                                    >
                                        Admin/ Writers Login
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="block pb-2 text-sm font-semibold text-blueGray-600 hover:text-blueGray-800"
                                        href="mailto:murimi.kenn@gmail.com"
                                    >
                                        Contact Us
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-blueGray-300" />
            <div
                class="flex flex-wrap items-center justify-center md:justify-between"
            >
                <div class="mx-auto w-full px-4 text-center md:w-4/12">
                    <div class="py-1 text-sm font-semibold text-blueGray-500">
                        Copyright © {{ date }} Expert Writers by
                        <a
                            href="http://kennedy.thetradinghut.net"
                            class="text-blueGray-500 hover:text-blueGray-800"
                        >
                            Creative Kenn
                        </a>
                        .
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
export default {
    data() {
        return {
            date: new Date().getFullYear(),
        };
    },
};
</script>
