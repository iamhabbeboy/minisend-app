<template>
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="javascript:void(0)" @click="changePreviousPage()">Previous</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="javascript:void(0)" @click="changeNextPage()">Next</a>
        </li>
    </ul>
</template>
<script lang="ts">
export default {
    data() {
        return {
            pagination: [],
        }
    },
    computed: {
    },
    methods: {
        makePagination(data) {
            let pagination = {
                current_page: data.current_page,
                last_page: data.last_page,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url
            }
            this.pagination = pagination
        }
    }
}
</script>
