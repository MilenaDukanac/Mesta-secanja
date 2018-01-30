var newTag = angular.module('newTag', []);

newTag.controller('newTagController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
    $scope.newTag = {};
    $scope.newTagMessage = "";
    $scope.showNewTagMessage = false;
    $scope.clearMsg = function() {
        $scope.newTagMessage = "";
    }



    $scope.insertTag = function () {

        var possibleValues = [];
        var pvArray = $scope.newTag.possibleValues.split(';');



        $scope.newTag.possibleValuesArray = pvArray;


        var tag = angular.toJson($scope.newTag);

        $http({
            method: "POST",
            url: '../server/tags.php',
            data: tag
        }).then(function successHandler(result) {
            $scope.newTagMessage = "New tag is successfully added.";
            $scope.showNewTagMessage = true;
            document.formTag.reset();
            console.log(result);
        }, function errorHandler(result) {
            $scope.newTagMessage = "The category doesn't exist or the tag is already added!";
            $scope.showNewTagMessage = true;
            document.formTag.reset();
            console.log(result);
        });
    };

}]);


