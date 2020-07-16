function getStorage(key) {
  const item = localStorage.getItem(key);
  return (item && JSON.parse(item)) || null;
}

export default {
  namespaced: true,

  state: {
    isAuthenticated: getStorage("isAuthenticated"),
    user: getStorage("user")
  },

  getters: {
    isAuthenticated(state) {
      return state.isAuthenticated;
    },

    user(state) {
      return state.user;
    }
  },

  mutations: {
    SET_AUTHENTICATED(state, value) {
      localStorage.setItem("isAuthenticated", JSON.stringify(value));
      state.isAuthenticated = value;
    },

    SET_USER(state, value) {
      if (!value) {
        localStorage.removeItem("user");
      } else {
        localStorage.setItem("user", JSON.stringify(value));
      }
      state.user = value;
    }
  },

  actions: {
    async signIn({ dispatch }, credentials) {
      await axios.get("../sanctum/csrf-cookie");
      await axios.post("../login", credentials);

      return dispatch("me");
    },

    async signOut({ dispatch }) {
      await axios.post("../logout");

      return dispatch("me");
    },

    async register({ dispatch }, credentials) {
      await axios.get("../sanctum/csrf-cookie");
      await axios.post("../register", credentials);

      return dispatch("me");
    },

    me({ commit }) {
      return axios
        .get("user")
        .then(response => {
          commit("SET_AUTHENTICATED", true);
          commit("SET_USER", response.data);
        })
        .catch(() => {
          commit("SET_AUTHENTICATED", false);
          commit("SET_USER", null);
        });
    }
  }
};
