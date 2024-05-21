import axios from '@/api/axios'

export default {
  ...axios,
  url: 'github',

  searchIssues (params) {
    return this.http()
      .get(`${this.url}/issue/search`, { params })
  },

  detailsIssue (id, params) {
    return this.http()
      .get(`${this.url}/issue/${id}/details`, { params })
  },

  commentsIssue (id, params) {
    return this.http()
      .get(`${this.url}/issue/${id}/comments`, { params })
  }
}