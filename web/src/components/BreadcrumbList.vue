<script setup>
import { useCoreStore } from '@/stores/core'
import { RouterLink } from 'vue-router'

const coreStore = useCoreStore()


</script>

<template>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li
        v-for="(item, index) in coreStore.breadcrumbs"
        :key="`breadcrumb-${index}`"
      >
        <!-- <a href="#">
          Home
        </a> -->
        <RouterLink :to="item.link">
          {{ item.title }}
        </RouterLink>
      </li>
      <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Library</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data</li> -->
    </ol>
  </nav>
</template>

<style scoped>
.router-link-active {
  color: black;
  text-decoration: none;
}
</style>