import { defineStore } from 'pinia'
import logger from '@/helpers/logger'
import AuthApi from '@/api/auth'
import AuthService from '@/services/auth'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: AuthService.auth(),
    loading: !AuthService.auth()
  }),

  actions: {
    async getAuth () {
      this.loading = true
      return new Promise((resolve, reject) => {
        AuthApi.verifyClientCredentialToken()
          .then(({ data }) => {
            this.user = data
            resolve(data)
          })
          .catch((error) => {
            logger.error(error)
            reject(error)
          })
          .finally(() => {
            this.loading = false
          })
      })
    },

    setLoading (loading) {
      this.loading = loading
    }
  }
})
