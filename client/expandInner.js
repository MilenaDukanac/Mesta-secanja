var expandInner = angular.module('expandInner', []);

expandInner.controller('expandInnerController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
    $scope.newInner = {};
    $scope.expandInnerMessage = "";
    $scope.showExpandInnerMessage = false;

    $scope.ExpandInner = function () {

        var content = angular.toJson($scope.newInner);

        $http({
            method: "PUT",
            url: "../server/user.php",
            data: content
        }).then(function succesHandler(result) {
            $scope.expandInnerMessage = 'Inner circle expanded';
            $scope.showExpandInnerMessage = true;
            console.log(result);
        }, function errorHandler(result) {
            $scope.expandInnerMessage = 'Try again later';
            $scope.showExpandInnerMessage = true;
            console.log(result);
        });


    };
    /*
    $scope.expandInner = function () {
                var userame = $scope.newInner.username;

        $http({
            method: "GET",
            url: '../server/user.php?type=expandInner&username=' + username
            }
        }).then(function successHandler(result) {
            $scope.expandInnerMessage = `Inner circle expanded`;
            $scope.showExpandInnerMessage = true;
            console.log(result);
        }, function errorHandler(result) {
            $scope.expandInnerMessage = `Try again later`;
            $scope.showExpandInnerMessage = true;
            console.log(result);
        });
    };*/

}]);
