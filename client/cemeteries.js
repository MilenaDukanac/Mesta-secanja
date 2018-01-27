var cemeteries = angular.module('cemeteries',[]);


cemeteries.filter("CemeteriesPlaceFilter", function(){
    return function(cemeteries, place){
        if(place == "all"){
            return cemeteries;
        }

        return cemeteries.filter(cemetery => cemetery.placeName == place);
    }
});
cemeteries.filter("CemeteriesRegionFilter", function(){
    return function(cemeteries, region){
        if(region == "all"){
            return cemeteries;
        }

        return cemeteries.filter(cemetery => cemetery.regionName == region);
    }
});
cemeteries.filter("CemeteriesCountryFilter", function(){
    return function(cemeteries, country){
        if(country == "all"){
            return cemeteries;
        }

        return cemeteries.filter(cemetery => cemetery.countryName == country);
    }
});


cemeteries.controller('cemeteriesController', ['$scope', '$http', '$window', '$filter', function ($scope, $http, $window, $filter) {

    $scope.cemeteries = [];
    $scope.places = [];
    $scope.regions = [];
    $scope.countries = [];
    $scope.place = "all";
    $scope.region = "all";
    $scope.country = "all";

    $scope.$watch('country', function () {
        $scope.place = "all";
        $scope.region = "all";
    });
    $scope.$watch('region', function () {
        $scope.place = "all";
    });

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
      url: "../server/region.php/regions"
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

}]);
