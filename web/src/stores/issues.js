import { defineStore } from 'pinia'
import logger from '@/helpers/logger'
import GithubApi from '@/api/github'

export const useIssueStore = defineStore('issues', {
  state: () => ({
    issues: [],
    selected: null
  }),

  actions: {
    getIssues (params) {
      return new Promise((resolve, reject) => {
        GithubApi.searchIssues(params)
          .then(({ data }) => {
            this.issues = data
            resolve(data)
          })
          .catch((error) => {
            logger.error(error)
            reject(error)
          })
      })
    },

    setSelected (id) {
      const issue = this.issues.find((value) => (value.id === id))
      this.selected = issue
    }
  }
})
