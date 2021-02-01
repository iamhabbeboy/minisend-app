<template>
    <div class="row">
        <div class="col-md-3">
            <input
                type="text"
                class="form-control"
                placeholder="Search by sender, recipient, subject"
                @keyup="searchEmailByQuery"
                v-model="query"
            />
        </div>
        <div class="col-md-3">
            <select class="form-control" v-model="status">
                <option value="">status</option>
                <option value="posted">Posted</option>
                <option value="sent">Sent</option>
                <option value="failed">Failed</option>
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary" @click="searchEmail">Search</button>
        </div>
    </div>
</template>
<script>
import { mapState } from "vuex";
export default {
    data() {
        return {
            status: "",
            query: null
        };
    },
    computed: {
        ...mapState(["emails"])
    },
    methods: {
        searchEmailByQuery(event) {
            const query = event.target.value;
            if (!query.length) {
                return this.$store.dispatch("getEmails", { url: "" });
            }
            this.$store.dispatch("getSearch", { query: query, status: "" });
        },
        searchEmail(event) {
            const query = this.query;
            const status = this.status;
            if (status == '') {
                this.$store.dispatch("getEmails", { url: "" });
            }
            this.$store.dispatch("getSearch", { query: query, status: status });
        }
    }
};
</script>
