export default function ({ store }) {
  store.commit('SET_LOADING', true);

  const loaderDuration = 1000;
  return new Promise((resolve) => {
    setTimeout(() => {
      store.commit('SET_LOADING', false);
      resolve();
    }, loaderDuration);
  });
}
