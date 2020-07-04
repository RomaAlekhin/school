import Vue from "vue";
import VueRouter from "vue-router";
import Main from "@/views/Main";
import Login from "@/views/Login";
import Lessons from "@/views/Lessons";
import Profile from "@/views/Profile";
import Message from "@/views/Message";

import store from "@/store";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Main",
    component: Main,
    children: [
      {
        path: "lessons",
        name: "Lessons",
        component: Lessons
      },
      {
        path: "profile",
        name: "Profile",
        component: Profile
      },
      {
        path: "message",
        name: "Message",
        component: Message
      }
    ]
  },
  {
    path: "/login",
    name: "Login",
    component: Login
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
  if (to.path === "/login") return next();

  const isAuthenticated = store.state.isAuthenticated;
  if (!isAuthenticated) {
    let redirect = to.fullPath;
    if (redirect === "/") redirect = "/lessons";
    next({
      path: "/login",
      query: { redirect }
    });
  } else {
    next();
  }
});

export default router;
