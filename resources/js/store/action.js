import axios from "axios";
const endpoint = "api/";
export default {
    async sendEmail({ commit }, data) {
        await axios
            .post("/api/emails", data)
            .then(response => commit("ADD_EMAIL", response.data.data))
            .catch(err => commit("ADD_EMAIL", {}));
    },
    async getEmails({ commit }, { url }) {
        const paginationUrl = url === "" ? "api/emails" : url;
        await axios
            .get(paginationUrl)
            .then(response => commit("GET_EMAILS", response.data))
            .catch(err => commit("GET_EMAILS", []));
    },
    addAttachment({ commit }, { files }) {
        const config = {
            headers: {
                "content-type": "multipart/form-data"
                // "X-CSRF-TOKEN": document.querySelector(
                //     'meta[name="csrf-token"]'
                // ).content
            }
        };
        axios
            .post("api/attachment", files, config)
            .then(response => commit("ADD_ATTACHMENTS", response.data.data))
            .catch(err => commit("ADD_ATTACHMENTS", []));
    },
    async deleteEmail({ commit }, { id }) {
        await axios
            .delete(`api/emails/${id}`)
            .then(response => commit("DELETE_EMAIL", response.data.data))
            .catch(err => commit("DELETE_EMAIL", {}));
    },
    async getEmail({ commit }, { id }) {
        await axios
            .get(`api/emails/${id}`)
            .then(response => commit("GET_EMAIL", response.data))
            .catch(err => commit("GET_EMAIL", {}));
    },
    async getSearch({ commit }, { query, status }) {
        await axios
            .get("api/emails/search", {
                params: { query: query, status: status }
            })
            .then(response => commit("GET_EMAILS", response.data))
            .catch(err => commit("GET_EMAILS", []));
    },
    async getRecipients({ commit }, { email }) {
        await axios
            .get("api/emails/recipient", {
                params: { email: email }
            })
            .then(response => commit("GET_EMAILS", response.data))
            .catch(err => commit("GET_EMAILS", []));
    },
    async getChartData({ commit }) {
        await axios
            .get("api/emails/chart")
            .then(response => commit("GET_CHART", response.data));
    }
};
