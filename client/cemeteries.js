var cemeteries = angular.module('cemeteries',[]);

cemeteries.controller('cemeteriesController', ['$scope', '$http', '$window', function ($scope, $http, $window) {

    $scope.cemeteries = [];
    $scope.places = [];
    $scope.regions = [];
    $scope.countries = [];
    $scope.place = "";
    $scope.region = "";
    $scope.country = "all";

    $http({
        method: "GET",
        url: "../server/cemetery.php/cemeteries"
    }).then(function successHandler(result) {
        $scope.cemeteries = result.data;
        console.log(result);
    }, function errorHandler(result) {
        console.log(result);
    });

    $http({
      method: "GET",
      url: "../server/place.php/places"
    }).then(function successHandler(result){
      $scope.places = result.data;
      console.log(result);
    }, function errorHandler(result){
      console.log(result);
    });

    $http({
      method: "GET",
      url: "../server/region.php/allregions"
    }).then(function successHandler(result){
      $scope.regions = result.data;
      console.log(result);
    }, function errorHandler(result){
      console.log(result);
    });

    $http({
      method: "GET",
      url: "../server/country.php/countries"
    }).then(function successHandler(result){
      $scope.countries = result.data;
      console.log(result);
    }, function errorHandler(result){
      console.log(result);
    });

    $scope.choose = function (id) {
        $window.sessionStorage.setItem("cemeteryId", id);
    };

}]);
