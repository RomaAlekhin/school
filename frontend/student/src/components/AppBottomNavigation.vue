<template>
  <v-bottom-navigation app v-model="bottomNav" dark shift>
    <v-btn v-for="(link, i) in links" :key="i" :to="link.to">
      <span>{{ link.title }}</span>
      <v-icon>{{ link.icon }}</v-icon>
    </v-btn>
  </v-bottom-navigation>
</template>

<script>
export default {
  name: "AppBottomNavigation",

  data: () => ({
    bottomNav: null,
    links: [
      { title: "Главная", to: "/", icon: "mdi-home" },
      { title: "Занятия", to: "/lessons", icon: "mdi-book-open-page-variant" },
      // { title: "Сообщения", to: "/message", icon: "mdi-message" },
      { title: "Профиль", to: "/profile", icon: "mdi-account" }
    ]
  }),

  created() {
    this.setBottomNav();
  },

  methods: {
    setBottomNav() {
      const path = this.$route.path;
      this.bottomNav = this.links.findIndex(link => link.to === path);
    }
  }
};
</script>

<style>
.v-item-group.v-bottom-navigation .v-btn.v-size--default {
  height: inherit;
}
</style>
