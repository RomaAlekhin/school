import Vue from "vue";
import VueRouter from "vue-router";

import Home from "@/views/Home";

import Login from "@/views/Login";
import Registration from "@/views/Registration";

import store from "@/store";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    meta: { requiresAuth: true }
  },

  {
    path: "/login",
    name: "Login",
    component: Login,
    meta: { requiresVisitor: true }
  },
  {
    path: "/registration",
    name: "Registration",
    component: Registration,
    meta: { requiresVisitor: true }
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

router.beforeEach((to, from, next) => {
  const isAuthenticated = store.state.auth.isAuthenticated;

  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!isAuthenticated) {
      next({ name: "Login" });
    } else {
      next();
    }
  } else if (to.matched.some(record => record.meta.requiresVisitor)) {
    if (isAuthenticated) {
      next({ name: "Home" });
    } else {
      next();
    }
  } else {
    next();
  }
});

export default router;
