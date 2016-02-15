/**
 * Created by Francois Venter on 2016/02/15.
 */

function ValidateController(IDService) {
    //Set vm the function scope to clear up scoping issues in closures.
    var vm = this;

    /**
     * @id Generated ID or Text Displayed
     * @message error message that will be displayed if there is a error when invoking the service
     * @error flag if there is an error
     * @disableGenerate flag to disable generate to prevent multiple server requests
     *
     * @type {{id: string, message: string, error: boolean, disableGenerate: boolean}}
     */
    vm.model = {
        id: '',
        message: '',
        error: false,
        success: false,
        disableValidate: false
    };

    this.validate = function () {
        vm.model.disableValidate = true;
        vm.model.message = '';
        vm.model.error = false;
        vm.model.success = false;

        IDService.validateId(vm.model.id)
            .then(function (data){
                if(data.valid === true) {
                    vm.model.success = true;
                } else {
                    vm.model.error = true;
                    vm.model.message = 'The given South African ID Number is invalid.'
                }

                vm.model.disableValidate = false;
            }, function (err) {
                if(err.status === 400) {
                    vm.model.error = true;
                    vm.model.message = err.data.error;
                } else {
                    vm.model.error = true;
                    vm.model.message = 'Could not complete the request, contact support. Status: ' + err.status;
                }
                vm.model.disableValidate = false;
            });
    }
}

ValidateController.$inject = ['ID.Service'];

module.exports = ValidateController;