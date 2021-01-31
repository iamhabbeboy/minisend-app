export default {
    getEmailById: (state, getters) => id => {
        return state.emails.find(email => email.id === id);
    },
    getEmailByParams: (state, getters) => query => {
        const search = query.trim().toLowerCase();
        if (!search.length) return state.emails;
        return state.emails.filter(
            email => email.sender.toLowerCase().indexOf(search) > -1
        );
    },
    getEmailBySearch: (state, getters) => (query, status) => {
        return state.emails.filter(
            email => email.status.toLowerCase() === status
        );
    }
};
