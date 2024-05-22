import axios from 'axios'
import ApiConfig from '@/config/api'

export default {
  config: {
    baseURL: ApiConfig.URL,
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
  
  /**
   * This code is for API retry when the token expires
   * Planning to create a queue request API for further enhancement.
   * 
   * const url = config.url
   * const method = config.method
   * const params = config.params
   * return axios.create(config)[method](url, { params })
  */

  /**
   * This code is not used anymore
   * Commented it just for reference
    async setAuth () {
      this.http()
        .post(`auth/token/client-credentials`, {
          client_id: ApiConfig.CLIENT_ID,
          client_secret: ApiConfig.CLIENT_SECRET
        })
        .then(() => {
          location.reload()
          return true
        })
        .catch((error) => {
          logger.error(error)
        })
    }
  */
}