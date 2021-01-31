import Vue from "vue";
import Vuex from "vuex";
import VueRouter from "vue-router";
import MiniSend from "./components/MiniSend";
import { routes } from "./routes";
import { store } from "./store/index";
Vue.use(VueRouter);

const router = new VueRouter({
    routes
});

new Vue({
    router,
    store: store,
    render: h => h(MiniSend)
}).$mount("#app");
