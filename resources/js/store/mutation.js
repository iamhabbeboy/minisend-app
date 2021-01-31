export default {
    ADD_EMAIL(state, email) {
        state.emails = email;
    },
    ADD_ATTACHMENTS(state, files) {
        state.attachments = files;
    },
    GET_EMAILS(state, emails) {
        state.emails = emails;
    }
};
