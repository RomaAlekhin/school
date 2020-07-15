/**
 * Axios
 * {@link} https://github.com/axios/axios
 */
const axios = require("axios");
window.axios = axios.create({
  withCredentials: true,
  baseURL: "http://school.test/api"
  // baseURL: "http://localhost:8000/"
});
