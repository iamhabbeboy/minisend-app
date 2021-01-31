<template>
    <div>
        <Filters />
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
                <tr v-for="(email, index) of emails" :key="index">
                    <td>{{index + 1}}</td>
                    <td>{{email.sender}}</td>
                    <td>{{email.recipient}}</td>
                    <td>{{email.subject}}</td>
                    <td>{{email.status}}</td>
                    <td>
                        <router-link :to="{ name: 'single', params: { id: email.id}}" class="btn btn-sm btn-primary">View</router-link>
                        &nbsp;
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import Filters from "./Filters";
export default {
    components: {
        Filters
    },
    props: ["emails"]
};
</script>
