import axios from '@/api/axios'

export default {
  ...axios,
  url: 'auth',

  getClientCredentialToken () {
    return this.http()
      .post(`${this.url}/token/client-credentials`, {
        client_id: import.meta.env.VITE_CLIENT_ID,
        client_secret: import.meta.env.VITE_CLIENT_SECRET
      })
  },

  verifyClientCredentialToken () {
    return this.http()
      .get(`${this.url}/verify/client-credentials`)
  }
}