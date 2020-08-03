<template>
  <v-main>
    <v-row justify="center">
      <v-col cols="11" md="8" lg="6">
        <v-alert
          v-if="errorMessage"
          transition="scale-transition"
          border="right"
          colored-border
          type="error"
          elevation="2"
        >
          {{ errorMessage }}
        </v-alert>

        <v-card ref="form" :elevation="5" :loading="isLoading">
          <v-card-title>Авторизация</v-card-title>
          <v-card-text>
            <v-text-field
              v-model="form.email"
              type="email"
              name="email"
              label="Email"
              prepend-icon="mdi-mail"
            />

            <v-text-field
              v-model="form.password"
              :append-icon="isShowPass ? 'mdi-eye' : 'mdi-eye-off'"
              :type="isShowPass ? 'text' : 'password'"
              name="password"
              label="Пароль"
              prepend-icon="mdi-lock"
              @click:append="isShowPass = !isShowPass"
            />
          </v-card-text>

          <v-card-actions>
            <router-link to="registration">Регистрация</router-link>
            <v-spacer />
            <router-link to="registration">Восстановить пароль</router-link>
          </v-card-actions>

          <v-card-actions class="justify-center">
            <v-checkbox :value="true" label="Запомнить меня" />
            <v-spacer />
            <v-btn
              :loading="isLoading"
              :disabled="isLoading"
              color="primary"
              @click="submit"
              >Войти</v-btn
            >
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-main>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "Login",

  data: () => ({
    errorMessage: "",
    isLoading: false,
    isShowPass: false,
    form: {
      email: "",
      password: ""
    }
  }),

  computed: {
    user() {
      return this.$store.state.auth.user;
    }
  },

  methods: {
    ...mapActions({
      signIn: "auth/signIn"
    }),

    async submit() {
      this.errorMessage = "";
      this.isLoading = true;

      try {
        await this.signIn(this.form);
        this.isLoading = false;
        this.redirectToApp();
      } catch (error) {
        this.isLoading = false;
        const errors = error.response.data.errors;
        const key = Object.keys(errors)[0];
        this.errorMessage = errors[key][0];
      }
    },

    redirectToApp() {
      if (!this.user) {
        this.$router.push({ name: "Home" });
      }

      const type = this.user.type;
      const { protocol, hostname } = window.location;
      window.location.href = `${protocol}//${type}.${hostname}`;
    }
  }
};
</script>
