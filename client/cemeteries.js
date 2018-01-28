var cemeteries = angular.module('cemeteries',[]);

cemeteries.service('urlParser', function(){
    this.parse = function(url){
        var query = url.split('?');
        if (query.length === 1){
            return 1;
        } //it means it has no parameters
        else{
            var paramsArray = query[1].split('&');
            var obj = {}; //this is going to be your return object
            var i;
            for ( i=0; i < paramsArray.length; i++ ){
                var arr = paramsArray[i].split('=');
                var param = arr[0];
                var value;
                //check if is set with some value
                if( arr.length === 1 )
                    value = null;
                else
                    value = arr[1];
                obj[param] = value;
            }
            return obj;
        }
    };
});


cemeteries.filter("CemeteriesPlaceFilter", function(){
    return function(cemeteries, place){
        if(place == "all"){
            return cemeteries;
        }

        return cemeteries.filter(cemetery => cemetery.placeId == place);
    }
});
cemeteries.filter("CemeteriesRegionFilter", function(){
    return function(cemeteries, region){
        if(region == "all"){
            return cemeteries;
        }

        return cemeteries.filter(cemetery => cemetery.regionId == region);
    }
});
cemeteries.filter("CemeteriesCountryFilter", function(){
    return function(cemeteries, country){
        if(country == "all"){
            return cemeteries;
        }

        return cemeteries.filter(cemetery => cemetery.countryId == country);
    }
});


cemeteries.controller('cemeteriesController', ['$scope', '$http', '$window', '$filter', 'urlParser', function ($scope, $http, $window, $filter, urlParser) {

    var url = $window.location.href;
    var params = urlParser.parse(url);
    var region = params.region;
    var country = params.country;

    console.log(params);
    if(params == 1) {
        region = "all";
        country = "all";
    }

    $scope.country = country;
    $scope.region = region;


    $scope.place = "all";

    $scope.cemeteries = [];
    $scope.places = [];
    $scope.regions = [];
    $scope.countries = [];

    $scope.$watch('country', function () {
        $scope.place = "all";
        $scope.region = region;
        region = "all";
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
