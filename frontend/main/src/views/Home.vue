<template>
  <div>
    <div v-if="isAuthenticated">Logged as: {{ userEmail }}</div>
    <v-btn @click="signOut">Выйти</v-btn>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "Home",

  computed: {
    isAuthenticated() {
      return this.$store.state.auth.isAuthenticated;
    },

    userEmail() {
      return this.$store.state.auth.user.email;
    }
  },

  methods: {
    ...mapActions({
      signOut: "auth/signOut"
    })
  }
};
</script>
