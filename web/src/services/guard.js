import AuthService from '@/services/auth'

export default {
  async authorized (to, from, next) {
    if (AuthService.auth()) return next()

    if (await AuthService.setAuth()) return next()

    return next('/error?status=401')
  }
}