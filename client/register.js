var app = angular.module('app', []);

app.controller('registerControler', ['$scope', '$http','$window', function ($scope, $http, $window) {

    $scope.newUser = {};
    $scope.confpass = "";
    $scope.sameR = true;
    $scope.greska = false;

    $scope.same= function($first,$second){
        if($first!=$second)
            $scope.sameR=true;
        else
            $scope.sameR=false;
    }

    $scope.unique = function () {

        console.log($scope.newUser.username);
        $http({
            method: "GET",
            url: "../server/user.php?type=unique&username="+$scope.newUser.username
        }).then(function successHandler(result) {
            $scope.greska = true;
            console.log(result);
        }, function errorHandler(result) {
            $scope.greska = false;
            console.log(result);
        });

    };

    $scope.register = function () {

        if($scope.newUser.note === undefined) {
            $scope.newUser.note = "";
        }



        var user = angular.toJson($scope.newUser);


        $http({
            method: "POST",
            url: '../server/user.php',
            data: user,
            headers: {
                "Content-Type": "application/json"
            }
        }).then(function succesHandler(result) {
            $window.location.href = "home.php";
        }, function errorHandler(result) {
            console.log(result);
        });


    };


}]);