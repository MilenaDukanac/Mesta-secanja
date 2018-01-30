var expandInner = angular.module('expandInner', []);

expandInner.controller('expandInnerController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
    $scope.newInner = {};
    $scope.expandInnerMessage = "";
    $scope.showExpandInnerMessage = false;

    $scope.clearMsg = function() {
        $scope.expandInnerMessage = "";
		document.expandInnerForm.reset();
    };

    $scope.expandInner = function () {

        var content = angular.toJson($scope.newInner);

        $http({
            method: "PUT",
            url: "../server/user.php",
            data: content
        }).then(function succesHandler(result) {
            $scope.expandInnerMessage = 'Inner circle is successfully expanded.';
            $scope.showExpandInnerMessage = true;
            document.expandInnerForm.reset();
            console.log(result);
        }, function errorHandler(result) {
            $scope.expandInnerMessage = 'The user is already inner.';
            $scope.showExpandInnerMessage = true;
			document.expandInnerForm.reset();
            console.log(result);
        });


    };



}]);
