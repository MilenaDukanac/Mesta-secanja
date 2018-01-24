var oneCemetery = angular.module('oneCemetery',[]);

oneCemetery.controller('oneCemeteryController', ['$scope', '$http', '$window', function ($scope, $http, $window) {

    $scope.cemeteryId = window.sessionStorage.getItem('cemeteryId');
    $scope.photos = [];
    $scope.cemetery = {};

    $http({
        method: "GET",
        url: "../server/cemetery.php/cemetery/"+$scope.cemeteryId
    }).then(function successHandler(result) {
        $scope.cemetery=result.data;
        console.log(result);
    }, function errorHandler(result) {
        console.log(result);
    });


    $http({
        method: "GET",
        url: "../server/photo.php?type=cemetery&cemeteryId="+$scope.cemeteryId
    }).then(function successHandler(result) {
        console.log(result);
        $scope.photos = result.data;
    }, function errorHandler(result) {
        console.log(result)
    })


}]);