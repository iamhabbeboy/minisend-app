<template>
<div>
    <Header />
    <router-link to="/">&laquo; Back </router-link>
    <div style="background: #fff;padding: 4px">
        <h3>{{ recipient }}</h3>
        <Listing :emails="emails" />
    </div>
</div>
</template>

<style scoped>
.body {
    font-size: 3rem;
    margin-top: 10px;
    background: #ddd;
    padding: 10px;
}
</style>

<script>
import Listing from "../components/Listing";
import Header from "../components/Header";
import {
    mapState
} from "vuex";
export default {
    components: {
        Header,
        Listing
    },
    computed: {
        ...mapState(["emails"]),
        recipient() {
            return this.$route.params.email;
        }
    },
    mounted() {
        // if(this.$route.params.email === '') {
        //    return this.$router.push('/')
        // }
        const email = this.$route.params.email;
        this.$store.dispatch("getRecipients", {
            email: email
        });
    },
};
</script>
