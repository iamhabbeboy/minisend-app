import { mount, shallowMount, createLocalVue } from "@vue/test-utils";
import Single from "../views/Single.vue";
import Vuex from "vuex";

const localVue = createLocalVue();
let wrapper;
localVue.use(Vuex);
describe("Single component Single.vue", () => {
    let actions;
    let state;
    let store;

    beforeEach(() => {
        actions = {
            getEmail: jest.fn(),
            getEmails: jest.fn()
        };
        state = {
            email: jest.fn(),
            emails: jest.fn()
        };

        store = new Vuex.Store({
            state,
            actions
            // getters
        });
        const $route = {
            fullPath: "/",
            params: {
                id: 1
            }
        };
        wrapper = shallowMount(Single, {
            store,
            localVue,
            propsData: {
                params: "id",
                display: ""
            },
            mocks: {
                $route
            },
            stubs: ["router-view", "router-link"],
            store,
            localVue
        });
    });

    it('calls store action "getEmails"', () => {
        expect(actions.getEmail).toHaveBeenCalled();
    });

    it('calls store action "getEmail"', () => {
        expect(actions.getEmail).toHaveBeenCalled();
    });
    test("component is a Vue instance", () => {
        expect(wrapper.isVueInstance).toBeTruthy();
    });

    test("component snapshot", () => {
        expect(wrapper).toMatchSnapshot();
    });

    // test("render next button for pagination", () => {
    //     const button = wrapper.find(".btn-info");
    //     expect(button.text()).toBe("Next");
    // });

    // test("render previous button for pagination", () => {
    //     const button = wrapper.find(".btn-default");
    //     expect(button.text()).toBe("Previous");
    // });
});
