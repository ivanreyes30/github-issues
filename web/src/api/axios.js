import axios from 'axios'
import logger from '@/helpers/logger'

export default {
  config: {
    baseURL: import.meta.env.VITE_API_URL,
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

  async setAuth () {
    this.http()
      .post(`auth/token/client-credentials`, {
        client_id: import.meta.env.VITE_CLIENT_ID,
        client_secret: import.meta.env.VITE_CLIENT_SECRET
      })
      .then(() => {
        /**
         * This code is for API retry when the token expires
         * Planning to create a queue request API for further enhancement.
         * 
         * const url = config.url
         * const method = config.method
         * const params = config.params
         * return axios.create(config)[method](url, { params })
        */
        location.reload()
        return true
      })
      .catch((error) => {
        logger.error(error)
      })
  },
}