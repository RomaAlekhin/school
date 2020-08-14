<template>
  <v-flex>
    <v-skeleton-loader :loading="loading" type="card">
      <v-img
        class="white--text align-center"
        height="200px"
        src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
      >
        <v-list-item>
          <v-list-item-avatar size="150" color="white">
            <v-img v-if="profile.avatar" :src="profile.avatar"></v-img>
            <v-icon :size="100">mdi-account</v-icon>
          </v-list-item-avatar>
          <v-list-item-content class="white--text">
            <v-list-item-title class="headline mb-1">Комаров</v-list-item-title>
            <v-list-item-title class="headline mb-1">Василий</v-list-item-title>
            <v-list-item-title class="headline mb-1"
              >Александрович</v-list-item-title
            >
          </v-list-item-content>
        </v-list-item>
      </v-img>

      <v-card-title>Title</v-card-title>
      <v-card-text>Card Text</v-card-text>
    </v-skeleton-loader>
    <pre>
      <!-- {{ profile }} -->
    </pre>
  </v-flex>
</template>

<script>
export default {
  name: "Profile",

  data: () => ({
    profile: {},
    loading: false
  }),

  created() {
    this.getProfile();
  },

  methods: {
    async getProfile() {
      this.loading = true;

      try {
        this.profile = await axios.get("profile");
        this.loading = false;
      } catch (error) {
        this.loading = false;
      }
    }
  }
};
</script>
