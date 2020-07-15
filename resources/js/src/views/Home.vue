<template>
  <div>
    Home
    <div v-if="isAuthenticated">Logged as: {{ userEmail }}</div>
    <div v-if="products">
      {{ products }}
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",

  data: () => ({
    products: null
  }),

  computed: {
    isAuthenticated() {
      return this.$store.state.auth.isAuthenticated;
    },

    userEmail() {
      return this.$store.state.auth.user.email;
    }
  },

  created() {
    this.getProducts();
  },

  methods: {
    async getProducts() {
      const response = await axios.get("products");
      this.products = response.data;
    }
  }
};
</script>
