import Vue from "vue";
import VueRouter from "vue-router";

import Home from "@/views/Home";
import Lessons from "@/views/Lessons";
import Profile from "@/views/Profile";
import Message from "@/views/Message";

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
    path: "/lessons",
    name: "Lessons",
    component: Lessons,
    meta: { requiresAuth: true }
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
    meta: { requiresAuth: true }
  },
  {
    path: "/message",
    name: "Message",
    component: Message,
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
  },

  {
    path: "/about",
    name: "About",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/About.vue")
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
      next({
        name: "Login",
        query: { redirect: to.fullPath }
      });
    } else {
      next();
    }
  } else if (to.matched.some(record => record.meta.requiresVisitor)) {
    if (isAuthenticated) {
      next({ name: from.name });
    } else {
      next();
    }
  } else {
    next();
  }
});

export default router;
