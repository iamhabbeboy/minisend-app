<template>
<div>
    <Header />
    <RenderChart />
    <router-link to="/compose" class="btn btn-lg btn-success">
        Compose Mail
    </router-link>
    <br />
    <br />
    <Listing :emails="emails" display="true" />
    <!-- <Pagination /> -->
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
    data() {
        return {
            chartData: null,
            test: null
        }
    },
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
    mounted() {},
    methods: {}
};
</script>
