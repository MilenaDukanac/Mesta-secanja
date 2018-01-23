var newCemetery = angular.module('newCemetery', []);

newCemetery.controller('newCemeteryController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
		$scope.newCemetery = {};

    $scope.insertCemetery = function () {
		    if($scope.newCemetery.description === undefined) {
		      $scope.newCemetery.description = "";
		    }
				if($scope.newCemetery.additionalData === undefined) {
		      $scope.newCemetery.additionalData = "";
		    }
				if($scope.newCemetery.longitude === undefined) {
		      $scope.newCemetery.longitude = 0;
		    }
				if($scope.newCemetery.latitude === undefined) {
		      $scope.newCemetery.latitude = 0;
		    }

			var cemetery = angular.toJson($scope.newCemetery);

        $http({
            method: "POST",
            url: '../server/cemetery.php',
						data: cemetery,
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
