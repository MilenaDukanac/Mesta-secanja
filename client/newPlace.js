var newPlace = angular.module('newPlace', []);

newPlace.controller('newPlaceController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
		$scope.newPlace = {};
		$scope.newPlaceMessage = "";
		$scope.showNewPlaceMessage = false;
		$scope.clearMsg = function() {
			$scope.newPlaceMessage = "";
		}

    $scope.insertPlace = function () {
        if($scope.newPlace.description === undefined) {
            $scope.newPlace.description = "";
        }
				
				var place = angular.toJson($scope.newPlace);

        $http({
            method: "POST",
            url: '../server/place.php',
						data: place
	        }).then(function successHandler(result) {
						$scope.newPlaceMessage = "New place is successfully added.";
						$scope.showNewPlaceMessage = true;
						document.formPlace.reset();
            console.log(result);
	        }, function errorHandler(result) {
						$scope.newPlaceMessage = "The region you added is not valid, please try again.";
						$scope.showNewPlaceMessage = true;
						document.formPlace.reset();
            console.log(result);
        });
    };

}]);
