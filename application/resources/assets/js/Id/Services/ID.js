/**
 * Created by Francois Venter on 2016/02/15.
 */

function IDService($http, $q) {
    this.generateId = function () {
        var deferred = $q.defer();

        $http({
            method: 'GET',
            url: '/api/id'
        }).then(function (response) {
            if(response.status === 200) {
                deferred.resolve(response.data);
            } else {
                deferred.reject(response);
            }

        }, function (response) {
            deferred.resolve(response);
        });

        return deferred.promise;
    };

    this.validateId = function (id) {
        var deferred = $q.defer();

        $http({
            method: 'GET',
            url: '/api/id/' + id
        }).then(function (response) {
            if(response.status === 200) {
                deferred.resolve(response.data);
            } else {
                deferred.reject(response);
            }

        }, function (response) {
            deferred.resolve(response);
        });

        return deferred.promise;
    };
}

IDService.$inject = ['$http', '$q'];

module.exports = IDService;