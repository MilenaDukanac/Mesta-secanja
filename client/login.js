var app = angular.module('app', []);

app.controller('loginControler', ['$scope', '$http', '$window', function ($scope, $http, $window) {

    $scope.username = "";
    $scope.password = "";
	$scope.loginMessage="";
	$scope.showLoginMessage=false;
	$scope.showLoginIndicator=true;
	
    $scope.login = function () {
        var user = $scope.username;
        var pass = $scope.password;
	

        // $http.get('../server/user1.php?type=login&username=' + user + '&password=' + pass, {responsetype: JSON}).
        // success(function(data, status, headers, config){
        //     if(data!=="null"){
        //         if(data.isEmpty)
        //             $scope.greska = false;
        //         else
        //             $scope.greska=true;
        //     }
        // }).
        // error(function(data, status, headers, config){
        //
        // });

        $http({
            method: "GET",
            url: '../server/user.php?type=login&username=' + user + '&password=' + pass
        }).then(function successHandler(result) {
			$scope.showLoginIndicator=false;
            $window.location.href = "home.php";
            console.log(result);

        }, function errorHandler(result) {
			//$scope.loginMessage="Incorrect username or password!";
			
			$scope.showLoginMessage=true;
			$scope.showLoginIndicator=true;
            console.log(result);
        });
    };

}]);

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