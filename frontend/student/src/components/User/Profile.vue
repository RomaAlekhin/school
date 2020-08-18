<template>
  <v-skeleton-loader :loading="isLoading" type="card">
    <v-img
      class="white--text align-center"
      height="200px"
      style="background-color: purple"
    >
      <v-list-item v-if="!isLoading">
        <v-list-item-avatar size="150" color="white">
          <v-img v-if="profile.avatar" :src="profile.avatar"></v-img>
          <v-icon :size="100">mdi-account</v-icon>
        </v-list-item-avatar>

        <v-list-item-content class="white--text">
          <v-list-item-title class="headline mb-1">{{
            profile.name
          }}</v-list-item-title>
          <v-list-item-title class="headline mb-1">{{
            profile.surname
          }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-img>

    <v-flex v-if="!isLoading">
      <template>
        <v-card-title class="justify-center">Профиль</v-card-title>
        <v-card class="mx-auto" flat>
          <v-card-subtitle class="py-0">Email</v-card-subtitle>

          <v-card-text class="text--primary">
            {{ profile.email }}
          </v-card-text>
        </v-card>

        <v-card class="mx-auto" flat>
          <v-card-subtitle class="py-0">Телефон</v-card-subtitle>

          <v-card-text class="text--primary">
            {{ profile.phone }}
          </v-card-text>
        </v-card>

        <v-card class="mx-auto" flat>
          <v-card-subtitle class="py-0">Дата рождения</v-card-subtitle>

          <v-card-text class="text--primary">
            {{ profile.birth_date }}
          </v-card-text>
        </v-card>
      </template>

      <template>
        <v-card-title class="justify-center">Данные родителя</v-card-title>
        <v-card class="mx-auto" flat>
          <v-card-subtitle class="py-0">Имя</v-card-subtitle>

          <v-card-text class="text--primary">
            {{ profile.parent_name }}
          </v-card-text>
        </v-card>

        <v-card class="mx-auto" flat>
          <v-card-subtitle class="py-0">Телефон</v-card-subtitle>

          <v-card-text class="text--primary">
            {{ profile.parent_phone }}
          </v-card-text>
        </v-card>

        <v-card class="mx-auto" flat>
          <v-card-subtitle class="py-0">Email</v-card-subtitle>

          <v-card-text class="text--primary">
            {{ profile.parent_email }}
          </v-card-text>
        </v-card>
      </template>
    </v-flex>
  </v-skeleton-loader>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "Profile",

  computed: {
    ...mapGetters({
      profile: "auth/user",
      isLoading: "auth/isLoadingUser"
    })
  }
};
</script>
