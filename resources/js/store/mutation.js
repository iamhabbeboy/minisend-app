export default {
    ADD_EMAIL(state, email) {
        state.emails = email;
    },
    ADD_ATTACHMENTS(state, files) {
        state.attachments = files;
    },
    GET_EMAILS(state, emails) {
        state.emails = emails;
    },
    DELETE_EMAIL(state, emails) {
        const index = state.emails.data.findIndex(
            email => email.id == emails.id
        );
        state.emails.data.splice(index, 1);
    },
    GET_EMAIL(state, email) {
        state.email = email;
    },
    GET_RECIPIENTS(state, emails) {
        state.emails = emails;
    },
    GET_CHART(state, data) {
        state.stat = data;
    }
};
