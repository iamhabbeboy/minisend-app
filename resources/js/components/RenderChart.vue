<template>
    <div class="small">
        <line-chart :chart-data="datacollection"></line-chart>
    </div>
</template>

<script>
import { mapState } from "vuex";
import LineChart from "../LineChart.js";

export default {
    components: {
        LineChart
    },
    data() {
        return {
            datacollection: null,
            postedCount: 0,
            failedCount: 0
        };
    },
    watch: {
        stat: {
            handler: function(response, newVal) {
                const dataset = [],
                    payload = response.data || [],
                    label = [];
                for (let [index, data] of payload.entries()) {
                    dataset.push(data.total);
                    label.push(data.status);
                }
                this.datacollection = {
                    labels: label,
                    datasets: [
                        {
                            label: "Email Activity",
                            backgroundColor: "#2a9d8f",
                            data: dataset
                        }
                    ]
                };
            },
            deep: true
        }
    },
    computed: {
        ...mapState(["stat"])
    },
    mounted() {
        this.$store.dispatch("getChartData");
    }
};
</script>

<style>
.small {
    width: 300px;
    height: 300px;
}
</style>
