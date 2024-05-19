import { defineStore } from 'pinia'
import AuthApi from '@/api/auth'
import AuthService from '@/services/auth'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: AuthService.auth()
  }),

  actions: {
    async getAuth () {
      return new Promise((resolve, reject) => {
        AuthApi.verifyClientCredentialToken()
          .then(({ data }) => {
            this.user = data
            resolve(data)
          })
          .catch((error) => {
            reject(error)
          })
      })
    }
  }
})
