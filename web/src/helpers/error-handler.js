
export default {
  handler (error) {
    switch (error?.response?.status) {
      case 401: {
        location.reload()
        break
      }
    }
  }
}