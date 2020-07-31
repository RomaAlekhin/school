<template>
  <div>
    <div v-if="isAuthenticated">Logged as: {{ userEmail }}</div>
  </div>
</template>

<script>
export default {
  name: "Home",

  computed: {
    isAuthenticated() {
      return this.$store.state.auth.isAuthenticated;
    },

    userEmail() {
      return this.$store.state.auth.user.email;
    }
  }
};
</script>
