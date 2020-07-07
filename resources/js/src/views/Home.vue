<template>
  <div>
    Home
    <div>
      Products: <br />
      <pre>{{ this.products }}</pre>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",

  data: () => ({
    products: []
  }),

  async created() {
    this.products = await axios
      .get("products", {
        params: {
          page: 1
        }
      })
      .then(response => response.data);
  }
};
</script>
