<script setup>
import { onBeforeMount } from 'vue'
import {computed } from 'vue'
// import AuthService from '@/services/auth'
import { useRoute, useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import { RouterView } from 'vue-router'

const router = useRouter()
const route = useRoute()
const auth = useAuthStore()

const routeName = computed(() => (route.name))

const checkAuth = async () => {
  // console.log(['ErrorView'].includes(route.name), route.name)
  // if (['ErrorView'].includes(route.name)) return
  // return await auth.getAuth()
}

onBeforeMount(async () => {
  // await nextTick()
  // console.log(routeName.value)
  // return await auth.getAuth()
  // const routeName = router.currentRoute._rawValue
  // console.log(router)
  // console.log(routeName)
  // const route = useRoute()
  // console.log(['ErrorView'].includes(routeName), routeName)
  // console.log()
  // checkAuth()
})

</script>

<template>
  <div>
    <nav class="navbar navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <!-- <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24"> -->
        </a>
      </div>
    </nav>
    <RouterView />
  </div>
</template>

<style scoped>

</style>
