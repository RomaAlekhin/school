<template>
  <v-app-bar app color="primary" dark>
    <div class="d-flex align-center">
      <v-img
        alt="Vuetify Logo"
        class="shrink mr-2"
        contain
        src="https://cdn.vuetifyjs.com/images/logos/vuetify-logo-dark.png"
        transition="scale-transition"
        width="40"
      />

      <v-img
        alt="Vuetify Name"
        class="shrink mt-1 hidden-sm-and-down"
        contain
        min-width="100"
        src="https://cdn.vuetifyjs.com/images/logos/vuetify-name-dark.png"
        width="100"
      />
    </div>
    <v-spacer></v-spacer>
    <v-btn
      v-if="isAuthenticated"
      :loading="isLoading"
      :disabled="isLoading"
      @click="exit"
      >Выйти <v-icon dark right>mdi-lock</v-icon></v-btn
    >
  </v-app-bar>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "AppBar",

  data: () => ({
    isLoading: false
  }),

  computed: {
    isAuthenticated() {
      return this.$store.state.auth.isAuthenticated;
    }
  },

  methods: {
    ...mapActions({
      signOut: "auth/signOut"
    }),

    async exit() {
      this.isLoading = true;
      try {
        await this.signOut();
        this.isLoading = false;
        this.$router.push({ name: "Login" });
      } catch (err) {
        this.isLoading = false;
      }
    }
  }
};
</script>
