<template>
    <div>
        <span v-if="display">
            <Filters />
        </span>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Sender</th>
                    <th scope="col">Recipient</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Status</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(email, index) of getemails" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ email.sender }}</td>
                    <td>
                        <router-Link
                            :to="{ name: 'recipient',
                            params: { email: email.recipient }}"
                        >
                            {{ email.recipient }}
                        </router-Link>
                        </td>
                    <td>{{ email.subject }}</td>
                    <td>{{ email.status }}</td>
                    <td>
                        <router-link
                            :to="{ name: 'single', params: { id: email.id } }"
                            class="btn btn-sm btn-primary"
                            >View</router-link
                        >
                        &nbsp;
                        <button
                            class="btn btn-sm btn-danger"
                            @click="deleteEmail(email.id)"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button
            class="btn btn-default btn-sm"
            @click="fetchPagination(pagination.prev_page_url)"
            :disabled="!pagination.prev_page_url"
        >
            Previous
        </button>
        <span
            >Page {{ pagination.current_page }} of {{ pagination.last_page }}
        </span>
        <button
            class="btn btn-info btn-sm"
            @click="fetchPagination(pagination.next_page_url)"
            :disabled="!pagination.next_page_url"
        >
            Next
        </button>
    </div>
</template>
<script>
import Filters from "./Filters";
import axios from "axios";

export default {
    components: {
        Filters
    },
    data() {
        return {
            pagination: [],
        };
    },
    props: ["emails", "display"],
    mounted() {
    },
    computed: {
        getemails() {
            this.makePagination(this.emails);
            return this.emails.data;
        }
    },
    methods: {
        makePagination(data) {
            let pagination = {
                current_page: data.current_page,
                last_page: data.last_page,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url
            };
            this.pagination = pagination;
        },
        fetchPagination(url) {
            return this.$store.dispatch("getEmails", { url: url });
        },
        deleteEmail(id) {
            if (window.confirm("Are you sure?")) {
                this.$store.dispatch("deleteEmail", {
                    id: id
                });
            }
        }
    }
};
</script>
