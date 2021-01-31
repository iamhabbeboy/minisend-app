import Home from "./views/Home.vue";
import Compose from "./views/Compose.vue";
import Single from "./views/Single.vue";

export const routes = [
    {
        path: "/",
        name: "home",
        component: Home
    },
    {
        path: "/compose",
        name: "compose",
        component: Compose
    },
    {
        path: "/single/:id",
        name: "single",
        component: Single
    }
];
