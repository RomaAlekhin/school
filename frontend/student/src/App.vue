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
import AppBar from "./components/AppBar";
import AppBottomNavigation from "./components/AppBottomNavigation";

import { mapActions } from "vuex";

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
    this.loadCatalogs();
  },

  methods: {
    ...mapActions({
      loadCatalogs: "catalog/loadCatalogs"
    })
  }
};
</script>
