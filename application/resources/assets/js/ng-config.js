/**
 * Created by Francois Venter on 2016/02/15.
 */

function config ($stateProvider, $urlRouterProvider, $locationProvider) {
    /**
     * AngularJS configuration
     *
     * Enabled HTML5 Mode
     * Enabled #! if needed for indexing
     */

    $urlRouterProvider.otherwise('generate');
    $locationProvider.html5Mode(true).hashPrefix('!');

    $stateProvider
        .state('generate', {
            url: '/generate',
            templateUrl: 'templates/generate.html',
            controller: 'ID.GenerateController',
            controllerAs: 'GenerateCtrl'
        })
        .state('validate', {
            url: '/validate',
            templateUrl: 'templates/validate.html',
            controller: 'ID.ValidateController',
            controllerAs: 'ValidateCtrl'
        });
}

config.$inject = ['$stateProvider', '$urlRouterProvider', '$locationProvider'];

module.exports = config;