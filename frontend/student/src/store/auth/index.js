import { getLocalStorage } from "@/utils";

export default {
  namespaced: true,

  state: {
    isAuthenticated: getLocalStorage("isAuthenticated"),
    user: getLocalStorage("user"),
    isLoadingUser: false
  },

  getters: {
    isAuthenticated(state) {
      return state.isAuthenticated;
    },

    user(state) {
      return state.user;
    },

    isLoadingUser(state) {
      return state.isLoadingUser;
    }
  },

  mutations: {
    SET_AUTHENTICATED(state, value = false) {
      localStorage.setItem("isAuthenticated", JSON.stringify(value));
      state.isAuthenticated = value;
    },

    SET_USER(state, value = null) {
      if (!value) {
        localStorage.removeItem("user");
      } else {
        localStorage.setItem("user", JSON.stringify(value));
      }
      state.user = value;
    },

    SET_LOADING_USER(state, value = false) {
      state.isLoadingUser = value;
    }
  },

  actions: {
    async signIn({ dispatch, commit }, credentials) {
      commit("SET_LOADING_USER", true);

      await axios.get("../sanctum/csrf-cookie");
      await axios.post("login", credentials);

      return dispatch("me");
    },

    async signOut({ dispatch }) {
      await axios.post("logout");
      return dispatch("checkAuth");
    },

    async register({ dispatch, commit }, credentials) {
      commit("SET_LOADING_USER", true);

      await axios.get("../sanctum/csrf-cookie");
      await axios.post("register", credentials);

      return dispatch("me");
    },

    checkAuth({ dispatch, commit }) {
      return new Promise(resolve => {
        axios
          .get("check_auth")
          .then(() => {
            commit("SET_AUTHENTICATED", true);
            dispatch("me");
            return resolve();
          })
          .catch(() => {
            commit("SET_AUTHENTICATED");
            commit("SET_USER");
            commit("SET_LOADING_USER");
            return resolve();
          });
      });
    },

    me({ state, commit }) {
      const { user } = state;
      if (!user) {
        commit("SET_LOADING_USER", true);
      }

      return axios
        .get("me")
        .then(response => {
          commit("SET_AUTHENTICATED", true);
          commit("SET_USER", response.data);
          commit("SET_LOADING_USER");
        })
        .catch(() => {
          commit("SET_AUTHENTICATED");
          commit("SET_USER");
          commit("SET_LOADING_USER");
        });
    }
  }
};
