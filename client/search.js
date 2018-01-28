var searchCemetery=angular.module("searchCemetery",[]);

searchCemetery.filter("CountryFilter", function(){
    return function(regions, country){
        if(country == "all"){
            return regions;
        }

        return regions.filter(region => region.countryId == country);
    }
});

searchCemetery.controller("searchController",['$scope','$http', '$window','$filter',function($scope,$http,$window,$filter){

    $scope.countries = [];
    $scope.regions = [];

    $scope.country="all";
    $scope.region="all";

    $scope.$watch('country', function () {
        $scope.region = "all";
    });

    $http({
        method: "GET",
        url: "../server/country.php/countries"
    }).then(function successHandler(result){
        $scope.countries=result.data;
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


    $scope.search = function(){
        $window.location.href = "cemeteries.php?country="+$scope.country+"&region="+$scope.region;
    }



}]);