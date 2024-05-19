import AuthApi from '@/api/auth'
import ErrorHandler from '@/helpers/error-handler'
import logger from '@/helpers/logger'
import router from '@/router/index'
import { useCookies } from 'vue3-cookies'
import { useAuthStore } from '@/stores/auth'

export default {
  cookie: useCookies().cookies,

  auth () {
    // const credentials = this.cookie.get('auth')
    // if (!credentials) return null
    // return credentials
    return this.cookie.get('auth')
  },

  async setAuth () {
    try {
      const { data } = await AuthApi.getClientCredentialToken()
      const authStore = useAuthStore()
      const auth = await authStore.getAuth()
      // console.log(auth)
      this.setAuthCookie(auth, data.expires_in)
      return true
    } catch (error) {
      console.log('qweqwe')
      logger.error(error)
      return false
    }
  },

  setAuthCookie (auth, expires) {
    const token = JSON.stringify(auth)
    this.cookie.set('auth', token, expires, '/', import.meta.env.VITE_APP_DOMAIN)
  }
} 