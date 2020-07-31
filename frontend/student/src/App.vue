<template>
  <v-app>
    <app-bar />

    <v-main>
      <transition name="fade-transition" mode="out-in">
        <router-view />
      </transition>
    </v-main>

    <app-bottom-navigation v-if="isAuthenticated" />
  </v-app>
</template>

<script>
// const AppBar = () => import("./components/AppBar");
import AppBar from "./components/AppBar";
// const AppBottomNavigation = () => import("./components/AppBottomNavigation");
import AppBottomNavigation from "./components/AppBottomNavigation";

export default {
  name: "App",

  components: {
    AppBar,
    AppBottomNavigation
  },

  computed: {
    isAuthenticated() {
      return this.$store.state.auth.isAuthenticated;
    }
  },

  created() {
    this.getUsers();
    this.getUser();
  },

  methods: {
    async getUsers() {
      await axios.get("user");
    },

    async getUser() {
      await axios.get("user/2");
    }
  }
};
</script>
