<template>
    <div>
        <Header />
        <router-link to="/">&laquo; Back </router-link>
        <div style="background: #fff;padding: 4px">
            <h3>{{ emails.subject }}</h3>
            <b>From:</b> {{ emails.sender }} | <b>To:</b> {{ emails.recipient }}
            <div class="body">{{ emails.content }}</div>
        </div>
    </div>
</template>
<style scoped>
.body {
    font-size: 3rem;

}
</style>
<script>
import Header from "../components/Header";
import { mapState } from "vuex";
export default {
    components: {
        Header
    },
    computed: {
        ...mapState(["emails"]),
        emails() {
            const id = this.$route.params.id;
            return this.$store.getters.getEmailById(id);
        }
    },
    mounted() {
    }
};
</script>
