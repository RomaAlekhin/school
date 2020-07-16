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
          <v-card-title>Регистрация</v-card-title>
          <v-card-text>
            <v-text-field
              v-model="form.name"
              type="text"
              name="name"
              label="Имя"
              prepend-icon="mdi-account"
            />

            <v-text-field
              v-model="form.surname"
              type="text"
              name="surname"
              label="Фамилия"
              prepend-icon="mdi-account"
            />

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
            <v-text-field
              v-model="form.password_confirmation"
              :append-icon="isShowPass ? 'mdi-eye' : 'mdi-eye-off'"
              :type="isShowPass ? 'text' : 'password'"
              name="password_confirmation"
              label="Подтвердите пароль"
              prepend-icon="mdi-lock"
              @click:append="isShowPass = !isShowPass"
            />
          </v-card-text>

          <v-card-actions>
            <router-link to="login">Войти</router-link>
          </v-card-actions>

          <v-card-actions class="justify-center">
            <v-checkbox :value="true" label="Запомнить меня" />
            <v-spacer />
            <v-btn
              :loading="isLoading"
              :disabled="isLoading"
              color="primary"
              @click="submit"
              >Регистрация</v-btn
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
  name: "Registration",

  data: () => ({
    errorMessage: "",
    isLoading: false,
    isShowPass: false,
    form: {
      name: "",
      surname: "",
      email: "",
      password: "",
      password_confirmation: ""
    }
  }),

  methods: {
    ...mapActions({
      register: "auth/register"
    }),

    async submit() {
      this.errorMessage = "";
      this.isLoading = true;

      try {
        await this.register(this.form);
        this.isLoading = false;
        this.$router.push({ name: "Lessons" });
      } catch (error) {
        this.isLoading = false;
        const errors = error.response.data.errors;
        if (!errors) return false;

        const key = Object.keys(errors)[0];
        this.errorMessage = errors[key][0];
      }
    }
  }
};
</script>
