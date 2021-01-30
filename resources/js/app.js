import Vue from "vue";
import VueRouter from "vue-router";
import MiniSend from "./components/MiniSend";
import { routes } from "./routes";
Vue.use(VueRouter);

const router = new VueRouter({
    routes, // short for `routes: routes`
});

new Vue({
    router,
    render: (h) => h(MiniSend),
}).$mount("#app");
