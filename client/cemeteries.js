var cemeteries = angular.module('cemeteries',[]);

cemeteries.controller('cemeteriesController', ['$scope', '$http', '$window', function ($scope, $http, $window) {

    $scope.allCemeteries = [];
    $scope.regionName = "";
    $scope.countryName = "";

    $http({
        method: "GET",
        url: "../server/cemetery.php/cemeteries"
    }).then(function successHandler(result) {
        $scope.allCemeteries = result.data;
        console.log(result);
    }, function errorHandler(result) {
        console.log(result);
    });


    $scope.choose = function (id) {

        $window.sessionStorage.setItem("cemeteryId", id);

    };

}]);
