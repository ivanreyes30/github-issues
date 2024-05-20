import axios from '@/api/axios'

export default {
  ...axios,
  url: 'github',

  searchIssues (params) {
    return this.http()
      .get(`${this.url}/issue/search`, { params })
  }
}