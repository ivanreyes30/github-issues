<script setup>
const props = defineProps({
  color: String,
  name: String
})
</script>

<template>
  <span
    class="badge"
    :style="{'background': `#${props.color}`}"
  >
    {{ props.name }}
  </span>
</template>

<style scoped>
.badge {
  display: inline-block;
  padding: 0 7px;
  font-size: 12px;
  font-weight: 500;
  line-height: 18px;
  white-space: nowrap;
  border: 1px solid transparent;
  border-radius: 2em;
  color: white;
  margin-right: 4px;
}
</style>