<template>
  <div
    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16"
  >
    <div class="px-6">
      <div class="flex flex-wrap justify-center">
        <div class="w-full px-4 flex justify-center">
          <div class="relative">
            <img
              alt="..."
              :src="team2"
              class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"
            />
          </div>
        </div>
        
      </div>
      <div class="text-center mt-24 mb-10">
        <h3
          class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2"
        >
          {{ usePage().props.value.auth.user.name}}
        </h3>
        <div
          class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase"
        >
          <i class="fas fa-mail mr-2 text-lg text-blueGray-400"></i>
          {{ usePage().props.value.auth.user.email}}
        </div>
        
      </div>
      
    </div>
  </div>
</template>
<script setup>
import team2 from "@/assets/img/team-2-800x800.jpg";
import {usePage} from "@inertiajs/inertia-vue3";
</script>
