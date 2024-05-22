import axios from 'axios'

export default {
  config: {
    withCredentials: true
  },

  http () {
    const instance = axios.create(this.config)

    instance.interceptors.request.use((config) => {
      config.headers.Accept = 'application/json'
      return config
    })

    return instance
  },

  get (endpoint, params) {
    return this.http()
      .get(endpoint, { params })
  }
}