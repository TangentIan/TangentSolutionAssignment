/**
 * Created by Francois Venter on 2016/02/15.
 */
var angular = require('angular');

var GenerateController = require('./Controllers/Generate');
var ValidateController = require('./Controllers/Validate');

module.exports = angular.module('ID', [])
    .controller('ID.GenerateController', GenerateController)
    .controller('ID.ValidateController', ValidateController)
    .name;