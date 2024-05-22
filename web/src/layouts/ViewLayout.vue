<script setup>
import { RouterView } from 'vue-router'
import NavBar from '@/components/NavBar.vue'
import BreadcrumbList from '@/components/BreadcrumbList.vue'
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
