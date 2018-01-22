var deleteAcount = angular.module('deleteAcount', []);

deleteAcount.controller('deleteController', ['$scope', '$http', '$window', function ($scope, $http, $window) {

    $scope.delete = function () {
        $http({
            method: "DELETE",
            url: '../server/user.php'
        }).then(function successHandler(result) {
            $window.location.href = "logout.php";
            console.log(result);
        }, function errorHandler(result) {
            console.log(result);
        });
    };

}]);
