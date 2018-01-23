var newCountry = angular.module('newCountry', []);

newCountry.controller('newCountryController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
		$scope.countryName = "";

    $scope.newCountry = function () {
				var country = angular.toJson($scope.countryName);

        $http({
            method: "POST",
            url: '../server/country.php',
						data: country,
						headers: {
							"Content-Type": "application/json"
						}
        }).then(function successHandler(result) {
            console.log(result);
        }, function errorHandler(result) {
            console.log(result);
        });
    };

}]);
