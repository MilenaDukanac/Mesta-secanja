var newRegion = angular.module('newRegion', []);

newRegion.controller('newRegionController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
		$scope.newRegion = {};

    $scope.insertRegion = function () {
				var region = angular.toJson($scope.newRegion);

        $http({
            method: "POST",
            url: '../server/region.php',
						data: region,
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
