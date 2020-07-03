<template>
  <v-bottom-navigation app v-model="bottomNav" dark shift>
    <v-btn to="/">
      <span>Главная</span>
      <v-icon>mdi-home</v-icon>
    </v-btn>

    <v-btn to="lessons">
      <span>Занятия</span>
      <v-icon>mdi-book-open-page-variant</v-icon>
    </v-btn>

    <v-btn to="message">
      <span>Сообщения</span>
      <v-icon>mdi-message</v-icon>
    </v-btn>

    <v-btn to="profile">
      <span>Профиль</span>
      <v-icon>mdi-account</v-icon>
    </v-btn>
  </v-bottom-navigation>
</template>

<script>
export default {
  name: "AppBottomNavigation",

  data() {
    return {
      bottomNav: null
    };
  }
};
</script>

<style>
.v-item-group.v-bottom-navigation .v-btn.v-size--default {
  height: inherit;
}
</style>
