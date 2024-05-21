<script setup>
import { reactive, onMounted, ref } from 'vue'
import IssueCardDisplay from '@/components/issues/CardDisplay.vue'
import githubApi from '@/api/github'
import logger from '@/helpers/logger'

let state = reactive({ items: [] })
let loading = ref(false)

const getIssues = async () => {
  loading.value = true
  try {
    const { data } = await githubApi.searchIssues({})
    state.items = data
  } catch (error) {
    logger.error(error)
    return false
  } finally {
    loading.value = false
  }
}

onMounted(async () => {
  await getIssues()
})

</script>

<template>
  <IssueCardDisplay
    :issues="state.items"
    :loading="loading"
  />
</template>

<style scoped>

</style>
