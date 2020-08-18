import { getLocalStorage } from "@/utils";

export default {
  namespaced: true,

  state: {
    catalogs: getLocalStorage("catalogs")
  },

  getters: {
    getCatalog: state => (key = "") => {
      const CATALOGS = state.catalogs;
      if (!CATALOGS || !CATALOGS[key]) return [];
      return CATALOGS[key];
    }
  },

  mutations: {
    SET_CATALOGS(state, value) {
      localStorage.setItem("catalogs", JSON.stringify(value));
      state.catalogs = value;
    }
  },

  actions: {
    async loadCatalogs({ commit }) {
      const response = await axios.get("catalogs");
      return commit("SET_CATALOGS", response.data);
    }
  }
};
