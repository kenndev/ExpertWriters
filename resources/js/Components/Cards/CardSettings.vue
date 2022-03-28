<template>
    <div
        class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded-lg border-0 bg-blueGray-100 shadow-lg"
    >
        <form @submit.prevent="update">
            <div class="mb-0 rounded-t bg-white px-6 py-6">
                <div class="flex justify-between text-center">
                    <h6 class="text-xl font-bold text-blueGray-700">
                        My account
                    </h6>
                    <button
                        class="mr-1 rounded bg-emerald-500 px-4 py-2 text-xs font-bold uppercase text-white shadow outline-none transition-all duration-150 ease-linear hover:shadow-md focus:outline-none active:bg-emerald-600"
                        type="submit"
                    >
                        Update Settings
                    </button>
                </div>
            </div>
            <div class="flex-auto px-4 py-10 pt-0 lg:px-10">
                <h6
                    class="mt-3 mb-6 text-sm font-bold uppercase text-blueGray-400"
                >
                    User Information
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full px-4">
                        <div class="relative mb-3 w-full">
                            <label
                                class="mb-2 block text-xs font-bold uppercase text-blueGray-600"
                                htmlFor="grid-password"
                            >
                                Name
                            </label>
                            <input
                                type="text"
                                v-model="form.name"
                                class="w-full rounded border-0 bg-white px-3 py-3 text-sm text-blueGray-600 placeholder-blueGray-300 shadow transition-all duration-150 ease-linear focus:outline-none focus:ring"
                                placeholder="lucky.jesse"
                            />
                        </div>
                    </div>
                    <div class="w-full px-4">
                        <div class="relative mb-3 w-full">
                            <label
                                class="mb-2 block text-xs font-bold uppercase text-blueGray-600"
                                htmlFor="grid-password"
                            >
                                Email address
                            </label>
                            <input
                                type="email"
                                disabled
                                v-model="form.email"
                                class="w-full rounded border-0 bg-white px-3 py-3 text-sm text-blueGray-600 placeholder-blueGray-300 shadow transition-all duration-150 ease-linear focus:outline-none focus:ring disabled:border-slate-200 disabled:bg-slate-50 disabled:text-slate-500 disabled:shadow-none"
                                placeholder="jesse@example.com"
                            />
                        </div>
                    </div>
                </div>

                <hr class="border-b-1 mt-6 border-blueGray-300" />

                <h6
                    class="mt-3 mb-6 text-sm font-bold uppercase text-blueGray-400"
                >
                    Website Information
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full px-4 lg:w-6/12">
                        <div class="relative mb-3 w-full">
                            <label
                                class="mb-2 block text-xs font-bold uppercase text-blueGray-600"
                                htmlFor="grid-password"
                            >
                                Website Name
                            </label>
                            <input
                                type="text"
                                v-model="form.website_name"
                                class="w-full rounded border-0 bg-white px-3 py-3 text-sm text-blueGray-600 placeholder-blueGray-300 shadow transition-all duration-150 ease-linear focus:outline-none focus:ring"
                                placeholder="Smart Writer"
                            />
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-6/12">
                        <div class="relative mb-3 w-full">
                            <label
                                class="mb-2 block text-xs font-bold uppercase text-blueGray-600"
                                htmlFor="grid-password"
                            >
                                Wesite Contact Email
                            </label>
                            <input
                                type="text"
                                v-model="form.website_email"
                                class="w-full rounded border-0 bg-white px-3 py-3 text-sm text-blueGray-600 placeholder-blueGray-300 shadow transition-all duration-150 ease-linear focus:outline-none focus:ring"
                                placeholder="e.g info@expertwriters.com"
                            />
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-6/12">
                        <div class="relative mb-3 w-full">
                            <label
                                class="mb-2 block text-xs font-bold uppercase text-blueGray-600"
                                htmlFor="grid-password"
                            >
                                Writers Contact Email
                            </label>
                            <input
                                type="text"
                                v-model="form.writers_contact_email"
                                class="w-full rounded border-0 bg-white px-3 py-3 text-sm text-blueGray-600 placeholder-blueGray-300 shadow transition-all duration-150 ease-linear focus:outline-none focus:ring"
                                placeholder="e.g writers@expertwriters.com"
                            />
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-6/12">
                        <div class="relative mb-3 w-full">
                            <label
                                class="mb-2 block text-xs font-bold uppercase text-blueGray-600"
                                htmlFor="grid-password"
                            >
                                Website Phone Number
                            </label>
                            <input
                                type="text"
                                v-model="form.website_phone"
                                class="w-full rounded border-0 bg-white px-3 py-3 text-sm text-blueGray-600 placeholder-blueGray-300 shadow transition-all duration-150 ease-linear focus:outline-none focus:ring"
                                placeholder="e.g +254704103356"
                            />
                        </div>
                    </div>
                    <div class="lg:w-12/12 w-full px-4">
                        <div class="relative mb-3 w-full">
                            <label
                                class="mb-2 block text-xs font-bold uppercase text-blueGray-600"
                                htmlFor="grid-password"
                            >
                                Address
                            </label>
                            <input
                                type="text"
                                v-model="form.address"
                                class="w-full rounded border-0 bg-white px-3 py-3 text-sm text-blueGray-600 placeholder-blueGray-300 shadow transition-all duration-150 ease-linear focus:outline-none focus:ring"
                                placeholder="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09"
                            />
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-4/12">
                        <div class="relative mb-3 w-full">
                            <label
                                class="mb-2 block text-xs font-bold uppercase text-blueGray-600"
                                htmlFor="grid-password"
                            >
                                City
                            </label>
                            <input
                                type="text"
                                v-model="form.city"
                                class="w-full rounded border-0 bg-white px-3 py-3 text-sm text-blueGray-600 placeholder-blueGray-300 shadow transition-all duration-150 ease-linear focus:outline-none focus:ring"
                                placeholder="New York"
                            />
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-4/12">
                        <div class="relative mb-3 w-full">
                            <label
                                class="mb-2 block text-xs font-bold uppercase text-blueGray-600"
                                htmlFor="grid-password"
                            >
                                Country
                            </label>
                            <input
                                type="text"
                                v-model="form.country"
                                class="w-full rounded border-0 bg-white px-3 py-3 text-sm text-blueGray-600 placeholder-blueGray-300 shadow transition-all duration-150 ease-linear focus:outline-none focus:ring"
                                placeholder="United States"
                            />
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-4/12">
                        <div class="relative mb-3 w-full">
                            <label
                                class="mb-2 block text-xs font-bold uppercase text-blueGray-600"
                                htmlFor="grid-password"
                            >
                                Postal Code
                            </label>
                            <input
                                type="text"
                                v-model="form.postal_code"
                                class="w-full rounded border-0 bg-white px-3 py-3 text-sm text-blueGray-600 placeholder-blueGray-300 shadow transition-all duration-150 ease-linear focus:outline-none focus:ring"
                            />
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="lg:w-12/12 w-full px-4">
                        <div class="relative mb-3 w-full">
                            <label
                                class="mb-2 block text-xs font-bold uppercase text-blueGray-600"
                                htmlFor="grid-password"
                            >
                                Website description
                            </label>
                            <textarea
                                type="text"
                                v-model="form.description"
                                class="w-full rounded border-0 bg-white px-3 py-3 text-sm text-blueGray-600 placeholder-blueGray-300 shadow transition-all duration-150 ease-linear focus:outline-none focus:ring"
                                rows="4"
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";

//declare variables
const form = reactive({
    website_name: usePage().props.value.settings.website_name,
    country: usePage().props.value.settings.country,
    city: usePage().props.value.settings.city,
    address: usePage().props.value.settings.address,
    postal_code: usePage().props.value.settings.postal_code,
    name: usePage().props.value.auth.user.name,
    email: usePage().props.value.auth.user.email,
    description: usePage().props.value.settings.description,
    website_phone: usePage().props.value.settings.website_phone,
    writers_contact_email: usePage().props.value.settings.writers_contact_email,
    website_email: usePage().props.value.settings.website_email,
});

//update settings function
const update = () => {
    Inertia.post("/admin/settings-update", form);
    //form.put(route("update.settings"));
};

//Rerender page after posting
Inertia.on("success", (event) => {});
</script>
