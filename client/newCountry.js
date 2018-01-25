var newCountry = angular.module('newCountry', []);

newCountry.controller('newCountryController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
		$scope.countryName = "";
		$scope.newCountryMessage = "";
		$scope.showNewCountryMessage = false;

    $scope.insertCountry = function () {
				var country = angular.toJson($scope.countryName);

        $http({
            method: "POST",
            url: '../server/country.php',
						data: country
        }).then(function successHandler(result) {
						$scope.newCountryMessage = "New country is successfully added.";
						$scope.showNewCountryMessage = true;
            console.log(result);
        }, function errorHandler(result) {
						$scope.newCountryMessage = "Please try again.";
						$scope.showNewCountryMessage = true;
            console.log(result);
        });
    };

}]);
