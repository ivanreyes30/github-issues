<script setup>
const props = defineProps({
  item: Object
})

const item = props.item
const { labels } = item

const commentOnclick = () => {
  // window.open(comments_url, '_blank')
}
</script>

<template>
  <div class="git-card__body-list">
    <div class="git-card__body-list__left">
      <div class="git-card__body-list__left__title">
        <svg class="octicon octicon-issue-opened open" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
          <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"></path>
          <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0ZM1.5 8a6.5 6.5 0 1 0 13 0 6.5 6.5 0 0 0-13 0Z"></path>
        </svg>
        <span class="git-card__body-list__left__title__text">
          {{ item.title }}
        </span>
        <span
          v-for="(label, index) in labels"
          :key="`label-${index}`"
          class="git-card__body-list__left__title__badge"
          :style="{'background': `#${label.color}`}"
        >
          {{ label.name }}
        </span>
        <div class="git-card__body-list__left__title__details">
          {{ item.details_text }}
        </div>
      </div>
    </div>
    <div class="git-card__body-list__right">
      <a class="git-card__body-list__right__avatar">
        <img
          class="git-card__body-list__right__avatar_img"
          src="https://avatars.githubusercontent.com/u/66289020?s=40&v=4"
          width="20"
          height="20"
        />
      </a>
      <a
        class="git-card__body-list__right__comments"
        @click="commentOnclick"
      >
        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-comment v-align-middle">
          <path d="M1 2.75C1 1.784 1.784 1 2.75 1h10.5c.966 0 1.75.784 1.75 1.75v7.5A1.75 1.75 0 0 1 13.25 12H9.06l-2.573 2.573A1.458 1.458 0 0 1 4 13.543V12H2.75A1.75 1.75 0 0 1 1 10.25Zm1.75-.25a.25.25 0 0 0-.25.25v7.5c0 .138.112.25.25.25h2a.75.75 0 0 1 .75.75v2.19l2.72-2.72a.749.749 0 0 1 .53-.22h4.5a.25.25 0 0 0 .25-.25v-7.5a.25.25 0 0 0-.25-.25Z"></path>
        </svg>
        <span class="git-card__body-list__right__comments__number">
          {{ item.comments }}
        </span>
      </a>
    </div>
  </div>
</template>

<style scoped>
.open.octicon {
  fill: #1a7f37;
}

.git-card__body-list {
  padding: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.git-card__body-list:hover {
  background: #F6F8FA;
}

.git-card__body-list:not(:last-child) {
  border-bottom: 1px solid #D0D7DE;
}

.git-card__body-list__left__title__details {
  font-size: 12px;
  color: #636c76;
  padding-left: 15px;
}

.git-card__body-list__left__title__badge {
  display: inline-block;
  padding: 0 7px;
  font-size: 12px;
  font-weight: 500;
  line-height: 18px;
  white-space: nowrap;
  border: 1px solid transparent;
  border-radius: 2em;
  background: #D73A4A;
  color: white;
  margin-right: 4px;
}

.git-card__body-list__left__title__text {
  font-weight: 500;
  margin-left: 4px;
  margin-right: 4px;
}

.git-card__body-list__right__avatar {
  margin-right: 20px;
}

.git-card__body-list__right__avatar_img {
  border-radius: 100%;
}

.git-card__body-list__right__comments {
  text-decoration: none;
  color: #636c76;
  cursor: pointer;
}

.git-card__body-list__right__comments:hover {
  fill: #0969da;
  color: #0969da;
}

.git-card__body-list__right__comments:hover .octicon-comment {
  fill: #0969da;
}

.git-card__body-list__right__comments__number {
  font-weight: 600;
  font-size: 12px;
  margin-left: 4px;
}

.git-card__body-list__left__title__text {
  cursor: pointer;
}

.git-card__body-list__left__title__text:hover {
  color: #0969da;
}
</style>