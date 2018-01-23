var oneCemetery = angular.module('oneCemetery',[]);

oneCemetery.controller('oneCemeteryController', ['$scope', '$http', '$window', function ($scope, $http, $window) {

    $scope.cemeteryId = window.sessionStorage.getItem('cemeteryId');

    console.log($scope.cemeteryId);


}]);