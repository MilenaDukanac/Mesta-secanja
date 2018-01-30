var changePassword = angular.module('changePassword', []);

changePassword.controller('changePasswordController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
    $scope.user = {};
  	$scope.changePasswordMessage = "";
  	$scope.showChangePasswordMessage = false;

    $scope.sameR = true;

    $scope.same= function($first,$second){
        if($first!=$second)
            $scope.sameR=true;
        else
            $scope.sameR=false;
    }

    $scope.changePassword = function () {
        var user = angular.toJson($scope.user);

        $http({
            method: "POST",
            url: '../server/user.php?type=changepassword',
            data: user,
            header:  {
                "Content-Type": "application/json"
            }
        }).then(function successHandler(result) {
            $scope.changePasswordMessage = "Your password is successfully changed. Please log in with the new one."
			      $scope.showChangePasswordMessage = true;

            setTimeout(function(){
              $window.location.href = "logout.php";
            }, 3000);

            console.log(result);
        }, function errorHandler(result) {
			      $scope.changePasswordMessage = "You entered wrong old password, try again.";
			      $scope.showChangePasswordMessage = true;
            console.log(result);
        });
    };

}]);
