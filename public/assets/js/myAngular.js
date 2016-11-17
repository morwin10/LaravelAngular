

var app = angular.module('myAngular', []);
app.controller('myctrl', function($scope, $http) {
    var page = '';
    $http.get(BASE_URL + "store?page=" + page)
    .success(function (response) {$scope.names = response.records;});
});
