/**
 * Created by Francois Venter on 2016/02/15.
 */

function GenerateController(IDService) {
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
        id: '...',
        message: '',
        error: false,
        disableGenerate: false
    };

    this.generate = function () {
        vm.model.id = '...';
        vm.model.disableGenerate = true;
        vm.model.message = '';
        vm.model.error = false;

        IDService.generateId()
            .then(function (data){
                vm.model.id = data.id;
                vm.model.disableGenerate = false;
            }, function (err) {
                vm.model.message = 'Could not complete the request, contact support. Status: ' + err.status;
                vm.model.error = true;
            });
    }
}

GenerateController.$inject = ['ID.Service'];

module.exports = GenerateController;