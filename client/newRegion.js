var newRegion = angular.module('newRegion', []);

newRegion.controller('newRegionController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
		$scope.newRegion = {};
		$scope.newRegionMessage = "";
		$scope.showNewRegionMessage = false;

    $scope.insertRegion = function () {
				var region = angular.toJson($scope.newRegion);

        $http({
            method: "POST",
            url: '../server/region.php',
						data: region
	        }).then(function successHandler(result) {
						$scope.newRegionMessage = "New region is successfully added."
						$scope.showNewRegionMessage = true;
            console.log(result);
	        }, function errorHandler(result) {
						$scope.newRegionMessage = "The country you added is not valid, please try again."
						$scope.showNewRegionMessage = true;
            console.log(result);
        });
    };

}]);
