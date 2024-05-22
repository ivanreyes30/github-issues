<script setup>
import IssueCardDisplay from '@/components/issues/CardDisplay.vue'
import { onMounted, ref } from 'vue'
import { useIssueStore } from '@/stores/issues'
import { useRouter } from 'vue-router'

let loading = ref(false)
const issueStore = useIssueStore()
const router = useRouter()

const selectIssue = (number) => {
  issueStore.setSelected(number)
  return router.push(`/issue/${number}`)
}

onMounted(async () => {
  loading.value = true
  await issueStore.getIssues()
  loading.value = false
})


</script>

<template>
  <IssueCardDisplay
    :issues="issueStore.issues"
    :loading="loading"
    @selectIssue="selectIssue"
  />
</template>

<style scoped>

</style>
