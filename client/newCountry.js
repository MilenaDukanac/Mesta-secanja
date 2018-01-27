var newCountry = angular.module('newCountry', []);

newCountry.controller('newCountryController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
    $scope.countryName = "";
    $scope.newCountryMessage = "";
    $scope.showNewCountryMessage = false;
    $scope.clearMsg = function() {
        $scope.newCountryMessage = "";
    }

    $scope.insertCountry = function () {
        var country = angular.toJson($scope.countryName);

        $http({
            method: "POST",
            url: '../server/country.php',
            data: country
        }).then(function successHandler(result) {
            $scope.newCountryMessage = "New country is successfully added.";
            $scope.showNewCountryMessage = true;
            document.formCountry.reset();
            console.log(result);
        }, function errorHandler(result) {
            $scope.newCountryMessage = "Country already exists! ";
            $scope.showNewCountryMessage = true;
            document.formCountry.reset();
            console.log(result);
        });
    };

}]);
