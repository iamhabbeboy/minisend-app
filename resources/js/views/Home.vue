<template>
    <div>
        <Header />
        <router-link to="/compose" class="btn btn-lg btn-success">
            Compose</router-link>
        <br />
        <br/>
        <Listing :emails="emails"/>
    </div>
</template>

<script>
import Header from "../components/Header";
import Listing from "../components/Listing";
import { mapState } from "vuex";
export default {
    components: {
        Header,
        Listing
    },
    computed: {
        ...mapState(["emails"]),
    },
    mounted() {
        this.$store.dispatch('getEmails');
    }
};
</script>
