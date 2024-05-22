<script setup>
import IssueCardDisplay from '@/components/issues/CardDisplay.vue'
import { computed, onMounted, ref } from 'vue'
import { useIssueStore } from '@/stores/issues'
import { useRouter } from 'vue-router'

let loading = ref(false)
const issueStore = useIssueStore()
const router = useRouter()

const displayList = computed(() => {
  if (loading.value) return []
  return issueStore.issues
})

const selectIssue = (number) => {
  issueStore.setSelected(number)
  return router.push(`/issue/${number}`)
}

const getIssues = async () => {
  loading.value = true
  await issueStore.getIssues()
  loading.value = false
}

onMounted(async () => {
  await getIssues()
})

</script>

<template>
  <IssueCardDisplay
    :issues="displayList"
    :loading="loading"
    @selectIssue="selectIssue"
  />
</template>

<style scoped>

</style>
