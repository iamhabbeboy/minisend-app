<template>
    <div>
        <Filters />
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
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
                <tr>
                    <td scope="row">#</td>
                    <td>1012</td>
                    <td>Abiodun Solomon</td>
                    <td>Damola</td>
                    <td>testing</td>
                    <td>sldkfdf</td>
                    <td>sldfkjsdklf</td>
                    <td>Failed</td>
                    <td>sldfkj</td>
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
    }
};
</script>
