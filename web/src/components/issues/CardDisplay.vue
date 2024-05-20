<script setup>
import { computed } from 'vue'
import CardList from '@/components/issues/CardList.vue'

const props = defineProps({
  loading: Boolean,
  issues: Array
})

const isEmpty = computed(() => (props.issues.length === 0))

const totalIssues = computed(() => (props.issues.length))

const display = computed(() => {
  if (props.loading) return 'Loading...'
  return 'No issues found.'
})

</script>

<template>
  <div class="git-card">
    <div class="git-card__header">
      <div class="git-card__header-content">
        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-issue-opened">
          <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"></path>
          <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0ZM1.5 8a6.5 6.5 0 1 0 13 0 6.5 6.5 0 0 0-13 0Z"></path>
        </svg>
        <span class="git-card__header-text">
          {{ totalIssues }} Open Issues
        </span>
      </div>
    </div>
    <div class="git-card__body">
      <div
        v-if="isEmpty"
        class="git-card__body__empty"
      >
        <div class="spinner-border" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        {{ display }}
      </div>
      <CardList
        v-else
        v-for="(item, index) in props.issues"
        :item="item"
        :key="`issue-${index}`"
      />
    </div>
  </div>
</template>

<style scoped>
.git-card {
  border: 1px solid #D0D7DE;
  border-radius: 4px;
}

.git-card__header {
  background: #F6F8FA;
  padding: 15px;
  border-bottom: 1px solid #D0D7DE;
  border-radius: 4px;
  display: flex;
}

.git-card__header-content {
  display: flex;
  align-items: center;
  gap: 5px;
}

.git-card__header-text {
  margin-top: -2px;
}

.octicon-comment {
  fill: #636c76;
}

.git-card__body__empty {
  padding: 15px;
  display: flex;
  align-items: center;
  gap: 10px;
}
</style>