<script setup>
import { computed, reactive, onMounted, onBeforeUnmount } from 'vue'
import { useRouter } from 'vue-router'
import { useCoreStore } from '@/stores/core'
import { useIssueStore } from '@/stores/issues'
import DefaultApi from '@/api/default'
import logger from '@/helpers/logger'
import CardPrimary from "@/components/common/CardPrimary.vue"

const coreStore = useCoreStore()
const issueStore = useIssueStore()
const router = useRouter()
let state = reactive({
  details: {},
  comments: []
})

const isEmptyComments = computed(() => {
  return state.comments.length === 0
})

const getDetails = async () => {
  const url = issueStore.selected.details_url
  return await DefaultApi.get(url)
}

const getComments = async () => {
  const url = issueStore.selected.comments_url
  return await DefaultApi.get(url)
}

onMounted(async () => {
  try {
    coreStore.setLoading(true)
    const [detailsPr, commentsPr] = await Promise.all([getDetails(), getComments()])
    state.details = detailsPr.data
    state.comments = commentsPr.data
    coreStore.setBreadcrumbs(state.details.title, '#')
  } catch (error) {
    logger.error(error)
    router.push('/error?status=404')
  } finally {
    coreStore.setLoading(false)
  }
})

onBeforeUnmount(() => {
  coreStore.resetBreadcrumbs()
})
</script>

<template>
  <div class="issue-details">
    <div class="issue-details__header">
      <span class="issue-details__header__title">
        {{ state.details.title }}
        <span class="number">
          #{{ state.details.number }}
        </span>
      </span>
      <div class="issue-details__header__details">
        <span class="issue-details__header_details--open">
          <svg
            aria-hidden="true"
            height="16"
            viewBox="0 0 16 16"
            version="1.1"
            width="16"
            data-view-component="true"
            class="octicon octicon-issue-opened flex-items-center mr-1"
          >
            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"></path>
            <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0ZM1.5 8a6.5 6.5 0 1 0 13 0 6.5 6.5 0 0 0-13 0Z"></path>
          </svg>
          Open
        </span>
        <span class="issue-details__header_details-date">
          <span>
            {{ state.details.specific_details_text }}
          </span>
          <span class="float-end mt-2">
            {{ state.details.timestamp }}
          </span>
        </span>
      </div>
    </div>
    <div class="issue-details__description">
      <CardPrimary
        class="mt-4"
        empty-placeholder="No description provided."
        header="Description"
        :body="state.details.body"
      />
    </div>
    <div
       v-if="!isEmptyComments"
      class="issue-details__comments"
    >
      <span class="issue-details__header__title my-4 d-block">
        Comments
      </span>
      <CardPrimary
        v-for="(comment, index) in state.comments"
        :key="`comment-${index}`"
        :header="comment.user.login"
        :header-info="`commented ${comment.created_diff} (${comment.timestamp})`"
        :body="comment.body"
        class="mb-4"
        empty-placeholder="No comments provided."
      />
    </div>
  </div>
</template>

<style scoped>
.octicon {
  fill: white;
  position: relative;
  top: -1px;
}
.issue-details__header__title {
  font-size: 32px;
  font-weight: 400;
  color: #1F2328;
}

.issue-details__header__title .number {
  font-weight: 300;
  color: #636c76;
  line-height: 1.25rem;
}

.issue-details__header_details--open {
  background: #1f883d;
  border-radius: 2em;
  color: white;
  padding: 5px;
  font-weight: 500;
  align-items: center;
  gap: 4px;
  width: 85px;
  display: inline-block;
  text-align: center;
}

.issue-details__header {
  border-bottom: 1px solid #d0d7de;
  padding-bottom: 20px;
}

.issue-details__header_details-date {
  color: #636c76;
  font-weight: 400;
  font-size: 14px;
  margin-left: 8px;
}
</style>
