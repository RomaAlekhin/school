<template>
  <v-main>
    <v-row justify="center">
      <v-col cols="10" md="8" lg="6">
        <v-card ref="form">
          <v-card-title>Авторизация</v-card-title>
          <v-card-text>
            <v-text-field
              v-model="form.email"
              type="email"
              name="email"
              label="Email"
              prepend-icon="mdi-account"
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
          <v-card-actions class="justify-center">
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
    isLoading: false,
    isShowPass: false,
    form: {
      email: "",
      password: ""
    }
  }),

  methods: {
    ...mapActions({
      signIn: "auth/signIn"
    }),

    async submit() {
      this.isLoading = true;
      try {
        await this.signIn(this.form);
        this.isLoading = false;
        this.$router.push({ name: "Lessons" });
      } catch (err) {
        this.isLoading = false;
      }
    }
  }
};
</script>
