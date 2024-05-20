<script setup>
import { computed } from 'vue'
import { useRoute, useRouter } from 'vue-router'

const router = useRouter()
const route = useRoute()

const display = computed(() => {
  switch (route?.query?.status) {
    case '401': {
      return {
        code: 401,
        title: 'Unauthorized Access',
        message: 'You do not have permission to view this page.'
      }
    }
    default: {
      return {
        code: 404,
        title: 'Page Not Found',
        message: 'Sorry, the page you are looking for does not exist.'
      }
    }
  }
})

</script>

<template>
  <div class="error-container">
    <div class="error-content">
      <div class="error-code">
        {{ display.code }}
      </div>
      <div class="error-message">
        {{ display.title }}
      </div>
      <p>
        {{ display.message }}
      </p>
      <button
        type="button"
        class="btn btn-danger btn-lg mt-4"
        @click="router.push('/')"
      >
        Go Back
      </button>
    </div>
  </div>
</template>

<style scoped>

.error-container {
  text-align: center;
  padding: 2rem;
  background: white;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  position: fixed;
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.error-code {
  font-size: 6rem;
  font-weight: bold;
  color: #dc3545;
}

.error-message {
  font-size: 1.5rem;
  margin-bottom: 1.5rem;
}

.btn-home {
  padding: 0.75rem 1.5rem;
  font-size: 1.25rem;
}
</style>
