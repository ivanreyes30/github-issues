<script setup>

</script>

<template>
  <div class="issue-details">
    <div class="issue-details__header">
      <span class="issue-details__header__title">
        test issue
        <span class="number">
          #3
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
          <!-- <span class="user">
            ivanreyes30
          <span> -->
          <span>
            opened this issue 2 days ago · 2 comments
          </span>
        </span>
      </div>
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
