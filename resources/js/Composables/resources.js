import axios from "axios";
import { ref } from "vue";

export default function useResources() {
    const stats = ref([]);

    const url = window.location.origin;

    const getStats = async () => {
        let response = await axios.get(url + "/api/get-stats");
        stats.value = response.data.data;
    };

    return {
        stats,
        getStats,
    };
}
