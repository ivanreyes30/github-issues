<script setup>
import { useCoreStore } from '@/stores/core'
import { RouterLink } from 'vue-router'

const coreStore = useCoreStore()

// console.log(coreStore.links)
</script>

<template>
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li
        v-for="(item, index) in coreStore.links"
        :key="`breadcrumb-${index}`"
        class="breadcrumb-item"
        :aria-current="item.active ? 'page' : ''"
      >
        <RouterLink
          :class="{'active': item.active}"
          :to="item.link"
        >
          {{ item.title }}
        </RouterLink>

        <!-- <RouterLink to="/about">test</RouterLink> -->
      </li>
      <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Library</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data</li> -->
    </ol>
  </nav>
</template>

<style scoped>
.active {
  color: black;
  text-decoration: none;
}
</style>