<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="10" md="8" lg="6">
        <v-card ref="form">
          <v-card-text>
            <v-text-field
              v-model="login"
              label="Логин"
              placeholder="John Doe"
              required
            ></v-text-field>
            <v-text-field
              v-model="password"
              :append-icon="isShowPass ? 'mdi-eye' : 'mdi-eye-off'"
              :type="isShowPass ? 'text' : 'password'"
              label="Пароль"
              @click:append="isShowPass = !isShowPass"
            ></v-text-field>
          </v-card-text>
          <v-card-actions class="justify-center">
            <v-btn color="primary" @click="signIn">Войти</v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "Login",

  data() {
    return {
      isShowPass: false,
      login: "",
      password: ""
    };
  },

  methods: {
    signIn() {
      const { login, password } = this;
      this.$store
        .dispatch("signIn", { login, password })
        .then(() => {
          const { redirect = "/" } = this.$route.query;
          this.$router.push(redirect);
        })
        .catch(error => alert(error));
    }
  }
};
</script>
