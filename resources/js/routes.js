import Home from "./views/Home.vue";
import Login from "./views/Login.vue";
import Single from "./views/Single.vue";
import Compose from "./views/Compose.vue";
import Recipient from "./views/Recipient.vue";
import PageNotFound from "./views/PageNotFound.vue";

export const routes = [
    {
        path: "/",
        name: "login",
        component: Login
    },
    {
        path: "/home",
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
    },
    {
        path: "/recipient/:email",
        name: "recipient",
        component: Recipient
    },
    {
        path: "*",
        name: "notfound",
        component: PageNotFound
    }
];
