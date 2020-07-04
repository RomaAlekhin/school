<template>
  <v-app>
    <app-bar />

    <v-content>
      <router-view />
    </v-content>

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

  data() {
    return {};
  },

  computed: {
    isAuthenticated() {
      return this.$store.state.isAuthenticated;
    }
  }
};
</script>
