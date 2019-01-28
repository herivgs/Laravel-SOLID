import { shallow, mount } from 'vue-test-utils';
import expect from 'expect';
import FormComponent from '../../resources/js/components/FormComponent.vue';
// import moxios from 'moxios';
// import sinon from 'sinon';
import MockAdapter from "axios-mock-adapter";
let mock = new MockAdapter(axios);

describe('FormTask', () => {
    let wrapper;

    beforeEach(() => {
        mock.restore();
    });
    // afterEach(() => {
    //     moxios.uninstall();
    // });

    it('Create new Task', (done) => {
        // Arrange
        mock.onGet("/task").reply(200, {
            status: 200,
            response: [{
                id: 1,
                description: "Bengo",
                created_at: "2018-01-10 00:00:00",
                updated_at: "2018-01-10 00:00:00",
            }]
        });

       // Act
       let wrapper = mount(FormComponent);
       wrapper.vm.description = 'Hola mundo';
       wrapper.vm.error.description = 'Error Hola mundo';
       const button = wrapper.find('button')
       button.trigger('submit')

       done()

       // moxios.wait(() => {
       //     //Assert
       //     expect(wrapper.vm.description).toBe('');
       //     expect(wrapper.vm.error.description).toBe('');
       //     done();
       // });
    });
})
