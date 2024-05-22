<script setup>
import { useCoreStore } from '@/stores/core'
import { RouterLink } from 'vue-router'

const coreStore = useCoreStore()
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
      </li>
    </ol>
  </nav>
</template>

<style scoped>
.active {
  color: black;
  text-decoration: none;
}
</style>