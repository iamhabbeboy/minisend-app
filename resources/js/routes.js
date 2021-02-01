import Home from "./views/Home.vue";
import Single from "./views/Single.vue";
import Compose from "./views/Compose.vue";
import Recipient from "./views/Recipient.vue";

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
    },
    {
        path: "/recipient/:email",
        name: "recipient",
        component: Recipient
    }
];
