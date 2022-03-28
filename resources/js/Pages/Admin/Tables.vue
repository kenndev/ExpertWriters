<template>
    <Admin>
        <div class="mt-4 flex flex-wrap">
            <div class="mb-12 w-full px-4">
                <card-table />
            </div>
            <div class="mb-12 w-full px-4">
                <card-table color="dark" />
            </div>
        </div>
    </Admin>
</template>
<script>
import CardTable from "@/components/Cards/CardTable.vue";
import Admin from "@/Layouts/Admin.vue";
export default {
    components: {
        CardTable,
        Admin,
    },
};
</script>
