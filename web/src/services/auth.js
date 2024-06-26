import AuthApi from '@/api/auth'
import logger from '@/helpers/logger'
import WebConfig from '@/config/web'
import { useCookies } from 'vue3-cookies'
import { useAuthStore } from '@/stores/auth'

export default {
  cookie: useCookies().cookies,

  auth () {
    return this.cookie.get('auth')
  },

  async setAuth () {
    const authStore = useAuthStore()

    try {
      authStore.setLoading(true)
      const { data } = await AuthApi.getClientCredentialToken()
      const auth = await authStore.getAuth()
      this.setAuthCookie(auth, data.expires_in)
      return true
    } catch (error) {
      logger.error(error)
      return false
    } finally {
      authStore.setLoading(false)
    }
  },
 
  setAuthCookie (auth, expires) {
    const token = JSON.stringify(auth)
    this.cookie.set('auth', token, (expires - 60), '/', WebConfig.DOMAIN)
  }
} 