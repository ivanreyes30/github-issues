export default {
  error (error) {
    console.log(`Error: ${error?.response?.data?.message}`)
  },

  info (message) {
    console.log(`Info: ${message}`)
  }
}