var deleteAccount = angular.module('deleteAccount', []);

deleteAccount.controller('deleteController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
    $scope.deleteAccountMessage = "";
    $scope.showDeleteAccountMessage = false;

    $scope.delete = function () {
        $http({
            method: "DELETE",
            url: '../server/user.php'
        }).then(function successHandler(result) {
            $scope.deleteAccountMessage = "Your account is successfully deleted.";
            $scope.showDeleteAccountMessage = true;

            setTimeout(function(){
              $window.location.href = "logout.php";
            }, 3000);

            console.log(result);
        }, function errorHandler(result) {
            $scope.deleteAccountMessage = "Sorry, try again.";
            $scope.showDeleteAccountMessage = true;
            console.log(result);
        });
    };

}]);
