import { defineStore } from 'pinia'

export const useCoreStore = defineStore('core', {
  state: () => ({
    loading: false,
    breadcrumbs: [
      {
        title: 'Issues',
        link: '/'
      }
    ]
  }),

  actions: {
    setLoading (loading) {
      this.loading = loading
    }
  }
})
