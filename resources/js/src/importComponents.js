/**
 * Axios
 * {@link} https://github.com/axios/axios
 */
const axios = require("axios");
window.axios = axios.create({
  baseURL: "/api/"
});
