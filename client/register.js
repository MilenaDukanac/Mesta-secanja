var app = angular.module('app', []);

app.controller('registerControler', ['$scope', '$http','$window', function ($scope, $http, $window) {

    $scope.newUser = {};
    $scope.confirmpassword = "";
    $scope.register = function () {

        console.log($scope.newUser);
        var user = angular.toJson($scope.newUser);

        $http({
            method: "POST",
            url: '../server/user.php',
            data: user,
            headers:{
                "Content-Type": "application/json"
            }
        }).
        then(function succesHandler(result) {
            $window.location.href = "home.php";
        }, function errorHandler(result) {
            console.log(result);
        });
    };


}]);