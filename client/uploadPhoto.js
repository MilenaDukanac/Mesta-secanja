var app = angular.module('uploadPhoto', ['ngTagsInput']);

app.config(function(tagsInputConfigProvider) {
    tagsInputConfigProvider.setDefaults('tagsInput', {
        placeholder: 'New tag',
        removeTagSymbol: '✖'
    })
});

app.controller('tags', ['$scope', '$http', '$window', function($scope, $http, $window)
{
    $scope.tags = [];
    $scope.photoTags = [];
    $scope.photoTag = {};

    $scope.photoId = 0;
    $scope.newPhoto = {};
    $scope.newPhotoMessage = "";
    $scope.shownNewPhotoMessage = false;

    $scope.newPhoto.name = name;
    $scope.newPhoto.cemeteryId = cemeteryId;

    $scope.showBackButton = true;
    $scope.showPhotoForm = false;
    $scope.showTagsForm = false;

    if(success == 1){
        $scope.showBackButton = false;
        $scope.showPhotoForm = true;
    }

    // Da insertujemo uploadovanu sliku u bazu
    $scope.insertPhoto = function (){

        if($scope.newPhoto.note === undefined) {
            $scope.newPhoto.note = "";
        }
        if($scope.newPhoto.longitude === undefined) {
            $scope.newPhoto.longitude = null;
        }
        if($scope.newPhoto.latitude === undefined) {
            $scope.newPhoto.latitude = null;
        }

        var photo = angular.toJson($scope.newPhoto);

        $http({
            method: "POST",
            url: "../server/photo.php",
            data: photo
        }).then(function successHandler(result){
            $scope.newPhotoMessage = "New photo is successfully added!";
            $scope.photoId = result.data.id;
            console.log($scope.photoId);
            $scope.shownNewPhotoMessage = true;
            $scope.showPhotoForm = false;
            $scope.showTagsForm = true;
        }, function errorHandler(result){
            $scope.newPhotoMessage = "Try again!";
            $scope.shownNewPhotoMessage = true;
            console.log(result);
        });
    };

    // za hvatanje svih tagova
    $http({
        method: "GET",
        url: "../server/tags.php/tags"
    }).then(function successHandler(result){
        $scope.tags = result.data;
        console.log(result);
    }, function errorHandler(result){
        console.log(result);
    });

    $scope.insertTags = function(){

        for(var key in $scope.photoTags){

            console.log($scope.photoTags);
            console.log(key);

            if($scope.photoTags[key].length > 0){

                for(var j=0; j<$scope.photoTags[key].length; j++) {

                    // Treba nam photoId, tagId, value
                    var obj = {};
                    obj.photoId = $scope.photoId;
                    obj.tagId = key;
                    obj.value = $scope.photoTags[key][j].text;
                    var photoTag = angular.toJson(obj);

                    console.log(obj);
                    console.log(photoTag);

                    $http({
                        method: "POST",
                        url: "../server/photo_tag.php",
                        data: photoTag
                    }).then(function successHandler(result) {
                        //   $scope.newPhotoMessage = "New photo is successfully added!";
                        //   $scope.shownNewPhotoMessage = true;
                        console.log(result);
                    }, function errorHandler(result) {
                        //    $scope.newPhotoMessage = "Try again!";
                        //      $scope.shownNewPhotoMessage = true;
                        console.log(result);
                    });
                }
            }
        }

        $window.location.href = "cemetery.php?id="+$scope.newPhoto.cemeteryId;
    }

    $scope.goBack = function () {
        $window.location.href = "cemetery.php?id="+$scope.newPhoto.cemeteryId;
    }

}]);

