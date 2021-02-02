import { mount, shallowMount, createLocalVue } from "@vue/test-utils";
import Home from "../views/Home.vue";
import Vuex from "vuex";

const localVue = createLocalVue();
let wrapper;
localVue.use(Vuex);
describe("Home.vue", () => {
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
        wrapper = shallowMount(Home, {
            store,
            localVue,
            propsData: {},
            mocks: {},
            stubs: ["router-view", "router-link"],
            store,
            localVue
        });
    });

    test("component snapshot", () => {
        expect(wrapper).toMatchSnapshot();
    });

    it('calls store action "getEmails"', () => {
        expect(actions.getEmails).toHaveBeenCalled();
    });
    it("renders compose link text", () => {
        const composeLink = wrapper.find(".btn-success");
        expect(composeLink.text()).toBe("Compose Mail");
    });
});
