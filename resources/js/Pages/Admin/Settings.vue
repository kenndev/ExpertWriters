<template>
    <Admin>
        <div class="flex flex-wrap">
            <div class="w-full px-4 lg:w-8/12">
                <CardSettings />
            </div>
            <div class="w-full px-4 lg:w-4/12">
                <CardProfile />
                <CardSocial />
            </div>
        </div>
    </Admin>
</template>
<script>
import CardSettings from "@/components/Cards/CardSettings.vue";
import CardProfile from "@/components/Cards/CardProfile.vue";
import CardSocial from "@/Components/Cards/CardSocial.vue";
import Admin from "@/Layouts/Admin.vue";
export default {
    components: {
        CardSettings,
        CardProfile,
        CardSocial,
        Admin,
    },
};
</script>
