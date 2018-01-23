var newTag = angular.module('newTag', []);

expendInner.controller('newTagController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
		$scope.newTag = {};
    $scope.newTagMessage = "";
    $scope.showNewTagMessage = false;

    $scope.newTag = function () {
        var category = $scope.newTag.category;
        var tagName = $scope.newTag.tagName;
        /* TODO
                $http({
                    method: "GET",
                    url: '../server/user.php?type=expendInner&username=' + username + '&privilegy=' + privilegy
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
        */
    };

}]);
