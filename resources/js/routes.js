import Home from "./views/Home.vue";
import Compose from "./views/Compose.vue";
export const routes = [
    { path: "/", component: Home },
    { path: "/compose", component: Compose }
    // { path: "/email/test", component: Bar }
];
