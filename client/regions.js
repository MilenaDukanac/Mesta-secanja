var regions = angular.module("regions", []);

regions.filter("CountryFilter", function(){
  return function(regions, countryName){
    if(country == "all"){
      return regions;
    }

    return regions.filter(region => region.countryName == country);
  }
});

regions.controller("mainController", ["$scope", "$http", "$filter", function($scope, $http, $filter){
  $scope.regions = [];
  $scope.countries = [];

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

/*
regions.factory('shareCountries', [function() {
  var countries = [];
  return {
    getCountries: function() {
      return countries;
    },
    setCountries: function(newCountries) {
      countries = countries;
    },
  }
}]);

regions.controller("countryController", ["$scope", "$http", function($scope, $http, shareCountries){
  $scope.countries = [];

  $http({
    method: "GET",
    url: "../server/country.php/countries"
  }).then(function successHandler(result){
    $scope.countries = result.data;
    shareCountries.setCountries($scope.countries);
    console.log(result);
  }, function errorHandler(result){
    console.log(result);
  });

}]);

regions.controller("regionController", ["$scope", "$http", function($scope, $http, shareCountries){
  $scope.regions = [];
  $scope.countries = shareCountries.getCountries();
  foreach(countries as country){
    $http({
      method: "GET",
      url: "../server/region.php/regions/"+country.id
    }).then(function successHandler(result){
      $scope.regions = result.data;
      console.log(result);
    }, function errorHandler(result){
      console.log(result);
    });
  }

}]);
*/
