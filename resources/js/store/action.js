import axios from "axios";
const endpoint = "api/";
export default {
    async sendEmail({ commit }, data) {
        await axios.post("/api/emails", data).then(response => {
            commit("ADD_EMAIL", response.data.data);
        });
    },
    async getEmails({ commit }) {
        await axios.get("api/emails").then(response => {
            commit("GET_EMAILS", response.data.data);
        });
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
        axios.post("api/attachment", files, config).then(response => {
            commit("ADD_ATTACHMENTS", response.data.data);
        });
    }
};
