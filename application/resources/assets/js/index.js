/**
 * Created by Francois Venter on 2016/02/15.
 */
/**
 * jQuery and Bootstrap
 *
 * Bootstrap is dependent on jQuery so we defined jQuery on the window object
 *
 * Bootstrap is simply required to load all the bootstrap plugins
 * since bootstrap does not define a package we will just require it
 *
 */
window.jQuery = window.$ = require('jquery');
require('bootstrap');

/**
 * AngularJS and Angular UI Router
 *
 * We will use AngularJS to define a single page application and
 * Angular UI Router will be used to track application state etc
 *
 */


var angular = require('angular');
var uiRouter = require('angular-ui-router');

//AngularJS Configuration
var ngConfig = require('./ng-config');

//Id Module
var IDModule = require('./Id/module');

angular.module('app', [
        uiRouter,
        IDModule
    ])
    .run(['$rootScope', '$state', '$stateParams', function ($rootScope, $state, $stateParams) {
        //We make $state and $stateParams available on the $rootScope
        $rootScope.$state = $state;
        $rootScope.$stateParams = $stateParams;
    }])
    .config(ngConfig);
