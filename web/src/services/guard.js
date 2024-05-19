import AuthService from '@/services/auth'

export default {
  async authorized (to, from, next) {
    // console.log(!!AuthService.auth())
    // console.log(AuthService.auth() !== undefined)
    console.log(to)
    if (AuthService.auth()) return next()
    if (!await AuthService.setAuth()) return next('/error-page')
    console.log(from)

    return next()
  }
}