<script setup>

</script>

<template>
  <div id="loader">
    <div class="loader__body">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <p class="mt-2">
        Loading...
      </p>
    </div>
  </div>
</template>

<style scoped>
body, html {
  height: 100%;
  margin: 0;
  overflow: hidden;
}

#loader {
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  background-color: white;
  z-index: 9999;
}

.spinner-border {
  display: block;
  margin: auto;
}

.loaded #loader {
  display: none;
}

.content {
  display: none;
}

.loaded .content {
  display: block;
}
</style>
