<template>
    <div>
        <Header />
        <router-link to="/">&laquo; Back </router-link>
        <div style="background: #fff;padding: 4px">
            <h3>Page Not found</h3>
            </div>
        </div>
    </div>
</template>
<style scoped>
.body {
    font-size: 3rem;
    margin-top: 10px;
    background: #ddd;
    padding:10px;
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
        ...mapState(["email"]),
        getemail() {
            const id = this.$route.params.id;
            if(this.$store.state.emails.length === 0) {
                return this.$store.state.email.data
            }
            return this.$store.getters.getEmailById(id);
        }
    },
    mounted() {
        const id = this.$route.params.id;
        this.$store.dispatch("getEmail", { id: id });
    }
};
</script>
