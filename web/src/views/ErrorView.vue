<template>
  <div class="error-container">
    <div class="error-content">
      <div class="error-code">401</div>
      <div class="error-message">Unauthorized Access</div>
      <p>You do not have permission to view this page.</p>
    </div>
  </div>
</template>

<style scoped>
/* body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  background-color: #f8f9fa;
} */

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
