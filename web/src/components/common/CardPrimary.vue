<script setup>
import { computed } from 'vue'

const props = defineProps({
  header: String,
  body: String,
  emptyPlaceholder: String,
  headerInfo: String
})

const isEmpty = computed(() => {
  return props.body === '' || props.body === null
})
</script>

<template>
  <div class="card text-bg-light">
    <div class="card-header">
      {{ props.header }}
      <span class="card-header-info">
        {{ headerInfo }}
      </span>
    </div>
    <div class="card-body">
      <p
        v-if="isEmpty"
        class="card-text fst-italic"
      >
        {{ emptyPlaceholder }}
      </p>
      <span
        v-else
        class="body"
        v-html="body"
      />
    </div>
  </div>
</template>

<style scoped>
.card {
  border: 1px solid #BBDFFF;
}

.card-header {
  background: #ddf4ff;
  border-bottom: 1px solid #BBDFFF;
  color: #1F2328;
  font-weight: 500;
}

.card-body {
  background: white;
  border-radius: 8px;
}

.card-text {
  background: white;
  border-radius: 8px;
  color: #636c76;
  font-weight: 200;
  font-size: italic;
}

.body {
  white-space: pre-line;
  font-size: 15px;
}

.card-header-info {
  font-weight: 300;
  font-size: 14px;
}
</style>