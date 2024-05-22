<script setup>
// import { computed } from 'vue'
import { RouterView } from 'vue-router'
// import { useAuthStore } from '@/stores/auth'
// import { useCoreStore } from '@/stores/core'
import NavBar from '@/components/NavBar.vue'
import BreadcrumbList from '@/components/BreadcrumbList.vue'

// const authStore = useAuthStore()
// const coreStore = useCoreStore()

// const isLoading = computed(() => {
//   return authStore.loading || coreStore.loading
// })
// console.log(isLoading.value)
</script>

<template>
  <NavBar/>
  <div class="container pt-4">
    <BreadcrumbList/>
    <RouterView />
  </div>
</template>

<style scoped>

</style>
