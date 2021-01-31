import axios from "axios";
const endpoint = "api/";
export default {
    async sendEmail({ commit }, data) {
        await axios.post("/api/emails", data).then(response => {
            commit("ADD_EMAIL", response.data);
        });
    },
    async getEmails({ commit }) {
        await axios.get("api/emails").then(response => {
            commit("GET_EMAILS", response.data);
            console.log(response);
        });
    }
};
