<script setup>
import { computed } from 'vue'
import { RouterView } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import { useCoreStore } from '@/stores/core'
import { useRouter } from 'vue-router'
import PageLoader from '@/components/PageLoader.vue'

const authStore = useAuthStore()
const coreStore = useCoreStore()
const router = useRouter()

const isLoading = computed(() => {
  if (router.currentRoute.value.name === 'ErrorView') return false
  return authStore.loading || coreStore.loading
})

</script>

<template>
  <div>
    <PageLoader v-if="isLoading"/>
    <RouterView />
  </div>
</template>

<style scoped>

</style>
