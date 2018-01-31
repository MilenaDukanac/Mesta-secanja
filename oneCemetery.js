var oneCemetery = angular.module('oneCemetery',[]);

oneCemetery.service('urlParser', function(){
    this.parse = function(url){
        var query = url.split('?');
        console.log(query);
        if (url.length === 1){
            return {};
        } //it means it has no parameters
        else{
            var paramsArray = query[1].split('&');
            var obj = {}; //this is  going to be your return object
            var i;
            for ( i=0; i < paramsArray.length; i++ ){
                var arr = paramsArray[i].split('=');
                var param = arr[0];
                var value;
                //check if is set with some value
                if( arr.length === 1 )
                    value = null;
                else
                    value = arr[1];
                obj[param] = value;
            }
            return obj;
        }
    };
});

oneCemetery.controller('oneCemeteryController', ['$scope', '$http', '$window','urlParser', function ($scope, $http, $window, urlParser) {

    var url = $window.location.href;
    var params = urlParser.parse(url);

    $scope.cemeteryId = params.id;

    $scope.photos = [];
    $scope.tags= [];
    $scope.cemetery = {};
    $scope.region = {};

    $scope.showMap = true;
    $scope.showAdditionalData = true;
    $scope.showDescription = true;
    $scope.showGallery = true;
    $scope.showTags = true;

    $http({
        method: "GET",
        url: "../server/cemetery.php/cemetery/"+$scope.cemeteryId
    }).then(function successHandler(result) {
        $scope.cemetery=result.data;
        console.log(result);
    }, function errorHandler(result) {
        console.log(result);
    });

    $http({
        method: "GET",
        url: "../server/region.php/cemeteryregion/"+$scope.cemeteryId
    }).then(function successHandler(result) {
        $scope.region=result.data;
        console.log(result);
    }, function errorHandler(result) {
        console.log(result);
    });


    if($scope.cemetery.longitude === null || $scope.cemetery.latitude === null)
        $scope.showMap = false;

    if($scope.cemetery.additionalData === null || $scope.cemetery.additionalData === "")
        $scope.showAdditionalData = false;

    if($scope.cemetery.description === null || $scope.cemetery.description === "")
        $scope.showDescription = false;

    $http({
        method: "GET",
        url: "../server/photo.php/photos/"+$scope.cemeteryId
    }).then(function successHandler(result) {
        console.log(result);
        $scope.photos = result.data;
        if($scope.photos.length == 0){
            $scope.showGallery = false;
            $scope.showTags = false;
        }

    }, function errorHandler(result) {
        console.log(result);
        $scope.showGallery = false;
        $scope.showTags = false;
    });


    $http({
        method: "GET",
        url: "../server/tags.php/tagsCemetery/"+$scope.cemeteryId
    }).then(function successHandler(result) {
        console.log(result);
        $scope.tags = result.data;
        if($scope.tags.length == 0){
            $scope.showTags = false;
        }
        else{
            $scope.showTags = true;
        }
    }, function errorHandler(result) {
        console.log(result);
        $scope.showTags = false;
    });

    $scope.photoInfo = {};
    $scope.photoTags = [];
    $scope.showPhotoPosition = false;

    $scope.comments = [];
    $scope.choosePhoto = function (id) {

        $scope.photoId = id;

        $scope.showPhotoPosition = true;
        $http({
            method: "GET",
            url: "../server/photo.php/photo/"+id
        }).then(function successHandler(result) {
            $scope.photoInfo = result.data;
            console.log(result);
        }, function errorHandler(result) {
            console.log(result);
        });

        $http({
            method: "GET",
            url: "../server/photo_tag.php/photo/"+id
        }).then(function successHandler(result) {
            $scope.photoTags = result.data;
            console.log(result);
        }, function errorHandler(result) {
            console.log(result);
        });

        if ($scope.photoInfo.longitude == null || $scope.photoInfo.latitude == null){
            $scope.showPhotoPosition = false;
        }
        $http({
            method: "GET",
            url: "../server/photo_comments.php/photo_comments/"+id
        }).then(function successHandler(result) {
            $scope.comments = result.data;
            console.log(result);
        }, function errorHandler(result) {
            console.log(result);
        });

    };

    $scope.newComment = {};
    $scope.username = "";

    $scope.addComment = function () {

        $scope.newComment.photoId = $scope.photoId;
        $scope.newComment.username = $username;
        $scope.newComment.text = $scope.text;

        var newComment = angular.toJson($scope.newComment);

        $http({
            method: "POST",
            url: "../server/photo_comments.php",
            data: newComment
        }).then(function successHandler(result) {
            console.log(result);
            console.log(newComment);
            console.log("---");
            console.log(result.data);
            $scope.comments.push($scope.newComment);
        }, function errorHandler(result) {
            $scope.errorMessageShow = true;
            console.log(result);

        });
    };


    $scope.showMoreComments = false;
    $scope.showButtonMoreComments = true;

    $scope.change = function(){

        $scope.showMoreComments = true;
        $scope.showButtonMoreComments = false;
    }

}]);


