import { mount, shallowMount, createLocalVue } from "@vue/test-utils";
import Listing from "../components/Listing.vue";
import Vuex from "vuex";

const localVue = createLocalVue();
let wrapper;
localVue.use(Vuex);
describe("Listing component Listing.vue", () => {
    let actions;
    let state;
    let store;

    beforeEach(() => {
        actions = {
            getEmails: jest.fn()
        };
        state = {
            emails: jest.fn()
        };

        store = new Vuex.Store({
            state,
            actions
            // getters
        });

        wrapper = shallowMount(Listing, {
            store,
            localVue,
            propsData: {
                emails: [],
                display: ""
            },
            mocks: {
                pagination: []
            },
            stubs: ["router-view", "router-link"],
            store,
            localVue
        });
    });

    test("component snapshot", () => {
        expect(wrapper).toMatchSnapshot();
    });

    test("component is a Vue instance", () => {
        expect(wrapper.isVueInstance).toBeTruthy();
    });

    test("render next button for pagination", () => {
        const button = wrapper.find(".btn-info");
        expect(button.text()).toBe("Next");
    });

    test("render previous button for pagination", () => {
        const button = wrapper.find(".btn-default");
        expect(button.text()).toBe("Previous");
    });
});
