<template>
  <v-app>
    <v-main>
      <transition name="fade-transition" mode="out-in">
        <router-view />
      </transition>
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: "App"
};
</script>
