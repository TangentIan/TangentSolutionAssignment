/**
 * Created by Francois Venter on 2016/02/15.
 */
var angular = require('angular');

var IDService = require('./Services/ID');
var GenerateController = require('./Controllers/Generate');
var ValidateController = require('./Controllers/Validate');


module.exports = angular.module('ID', [])
    .service('ID.Service', IDService)
    .controller('ID.GenerateController', GenerateController)
    .controller('ID.ValidateController', ValidateController)
    .name;