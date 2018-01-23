var expendInner = angular.module('expendInner', []);

expendInner.controller('expendInnerController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
	$scope.newInner = {};
    $scope.expendInnerMessage = "";
    $scope.showExpendInnerMessage = false;

	$scope.ExpendInner = function () {

			var content = angular.toJson($scope.newInner);

			$http({
					method: "PUT",
					url: "../server/user.php",
					data: content
			}).then(function succesHandler(result) {
					$scope.expendInnerMessage = 'Inner circle expended';
					$scope.showExpendInnerMessage = true;
					console.log(result);
			}, function errorHandler(result) {
					$scope.expendInnerMessage = 'Try again later';
					$scope.showExpendInnerMessage = true;
					console.log(result);
			});


		};
	/*
    $scope.expendInner = function () {
				var userame = $scope.newInner.username;

        $http({
            method: "GET",
            url: '../server/user.php?type=expendInner&username=' + username
            }
        }).then(function successHandler(result) {
            $scope.expendInnerMessage = `Inner circle expended`;
            $scope.showExpendInnerMessage = true;
            console.log(result);
        }, function errorHandler(result) {
            $scope.expendInnerMessage = `Try again later`;
            $scope.showExpendInnerMessage = true;
            console.log(result);
        });
    };*/

}]);
