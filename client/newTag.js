var newTag = angular.module('newTag', []);

newTag.controller('newTagController', ['$scope', '$http', '$window', function ($scope, $http, $window) {
    $scope.newTag = {};
    $scope.newTagMessage = "";
    $scope.showNewTagMessage = false;
    $scope.clearMsg = function() {
        $scope.newTagMessage = "";
    }

    $scope.newTag.possibleValues = "";



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
            $scope.newTagMessage = result.data;
            $scope.showNewTagMessage = true;
            document.formTag.reset();
            console.log(result);
        }, function errorHandler(result) {
            if(result.data == undefined || result.data == "") {
                $scope.newTagMessage = "This tag is already added!";
            }
            else{
                $scope.newTagMessage = result.data;
            }

            $scope.showNewTagMessage = true;
            document.formTag.reset();
            console.log(result);
        });
    };

}]);


