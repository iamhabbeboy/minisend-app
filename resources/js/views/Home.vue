<template>
<div>
    <Header />
    <RenderChart />
    <router-link to="/compose" class="btn btn-lg btn-success">
        Compose Mail <i class="fa fa-plus-circle"></i>
    </router-link>
    <br />
    <br />
    <Listing :emails="emails" display="true" />
</div>
</template>

<script>
import Header from "../components/Header";
import Listing from "../components/Listing";
import RenderChart from "../components/RenderChart";
import {
    mapState
} from "vuex";

export default {
    components: {
        Header,
        Listing,
        RenderChart
    },
    computed: {
        ...mapState(["emails"]),
    },
    created() {
        this.$store.dispatch("getEmails", {
            url: ''
        });
    },
};
</script>
