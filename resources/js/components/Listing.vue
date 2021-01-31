<template>
    <div>
        <Filters />
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Sender</th>
                    <th scope="col">Recipient</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Content</th>
                    <th scope="col">Attachment</th>
                    <th scope="col">Status</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(email, index) of emails.data" :key="index">
                    <td>{{index + 1}}</td>
                    <td>{{email.sender}}</td>
                    <td>{{email.recipient}}</td>
                    <td>{{email.subject}}</td>
                    <td>{{email.content}}</td>
                    <td>N/A</td>
                    <td>{{email.status}}</td>
                    <td>--</td>
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
