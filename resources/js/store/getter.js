export default {
    getEmailById: (state, getters) => id => {
        if (state.emails == undefined) return;
        return state.emails.data.find(email => email.id === id);
    },
    getEmailByParams: (state, getters) => query => {
        const search = query.trim().toLowerCase();
        if (!search.length) return state.emails;
        return state.emails.data.filter(
            email => email.sender.toLowerCase().indexOf(search) > -1
        );
    },
    getEmailBySearch: (state, getters) => (query, status) => {
        return state.emails.data.filter(
            email => email.status.toLowerCase() === status
        );
    },
    getTotalPost: (state, getters) => {
        return state.emails.data.find(email => {
            return email.id === 38;
        });
    }
};
