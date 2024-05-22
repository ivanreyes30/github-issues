import { defineStore } from 'pinia'

const defaultState = {
  loading: false,
  breadcrumbs: [
    {
      title: 'Issues',
      link: '/'
    }
  ]
}

export const useCoreStore = defineStore('core', {
  state: () => ({ ...defaultState }),

  getters: {
    links (state) {
      return state.breadcrumbs.map((value, index) => {
        const isLastArray = (index + 1) === (state.breadcrumbs.length)
        return {
          title: value.title,
          link: value.link,
          active: isLastArray
        }
      })
    }
  },

  actions: {
    setLoading (loading) {
      this.loading = loading
    },

    setBreadcrumbs (title, link) {
      this.breadcrumbs = [
        ...this.breadcrumbs,
        {
          title,
          link
        }
      ]
    },

    resetBreadcrumbs () {
      this.breadcrumbs = defaultState.breadcrumbs
    }
  }
})
