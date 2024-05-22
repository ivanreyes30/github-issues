export default {
  error (error) {
    let message = error?.message

    if (error?.response !== undefined) message = error?.response?.data?.message

    console.error(`Error: ${message}`)
  },

  info (message) {
    console.log(`Info: ${message}`)
  }
}