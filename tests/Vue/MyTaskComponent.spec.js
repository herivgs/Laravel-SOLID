import { shallow, mount } from 'vue-test-utils';
import expect from 'expect';
import MyTaskComponent from '../../resources/js/components/MyTaskComponent.vue';
// import moxios from 'moxios';
import MockAdapter from "axios-mock-adapter";
let mock = new MockAdapter(axios);

describe('TaskList', () => {
    let wrapper;

    beforeEach(() => {
        mock.restore();
    });


    it('renders the correct title on the page', () => {
        expect(wrapper.html()).toContain('Dashboard');
    });

    it('shows the todos fetched from the api', () => {
        // Arrange
        let response = [{
            id: 1,
            description: "Bingo",
            created_at: "2018-01-10 00:00:00",
            updated_at: "2018-01-10 00:00:00",
        }];
        mock.onGet("/task").reply(200, {
            status: 200,
            response: response
        });

       // Act
       wrapper = mount(MyTaskComponent);
       console.log(wrapper.vm.tasks);

       // Assert
       expect(wrapper.vm.tasks).toHaveProperty("description")
    });

});
