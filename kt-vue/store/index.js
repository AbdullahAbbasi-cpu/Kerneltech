export const state = () => ({
  headerData: {
     title: '',
     description: '',
     description1: '',
     bgImage: '',
     customClass: '',
  },
  loading: false,
})
export const mutations = {
  setHeaderData(state, headerData) {
     state.headerData = headerData;
  },
  SET_LOADING(state, value) {
    state.loading = value;
  },
}
export const actions = {
  setHeaderData({
     commit
  }, headerData) {
     commit('setHeaderData', headerData);
  },
}
export const getters = {
  getHeaderData: (state) => state.headerData,
}