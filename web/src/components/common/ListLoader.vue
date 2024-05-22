<script setup>
const props = defineProps({
  loading: Boolean,
  color: String,
  name: String
})
</script>

<template>
  <div
    v-if="props.loading"
    class="loader"
  >
    <div class="spinner-border" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    <span>
      Loading...
    </span>
  </div>
</template>

<style scoped>
.loader {
  display: flex;
  align-items: center;
  gap: 10px;
  margin: 15px;
}
</style>