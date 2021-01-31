import Vue from "vue";
import Vuex from "vuex";
import states from "./state";
import actions from "./action";
import getters from "./getter";
import mutations from "./mutation";
Vue.use(Vuex);

export const store = new Vuex.Store({
    state: states,
    actions: actions,
    getters: getters,
    mutations: mutations
});
