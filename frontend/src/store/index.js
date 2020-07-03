import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    isAuthenticated: true //false
  },
  mutations: {
    signIn(store, payload) {
      store.isAuthenticated = true;
      store.user = payload;
    }
  },
  actions: {
    signIn({ commit }, payload = {}) {
      return new Promise(resolve => {
        const { login, password } = payload;
        console.log(login, password);
        commit("signIn", { userName: "test" });
        return resolve();
      });
    }
  },
  modules: {}
});
