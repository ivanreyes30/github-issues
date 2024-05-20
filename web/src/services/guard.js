import AuthService from '@/services/auth'

export default {
  async authorized (to, from, next) {
    // if (await AuthService.verify()) return next()
    if (AuthService.auth()) return next()

    if (await AuthService.setAuth()) return next()

    return next('/error-page')
  }
}