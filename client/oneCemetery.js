var oneCemetery = angular.module('oneCemetery',[]);

oneCemetery.service('urlParser', function(){
    this.parse = function(url){
        var query = url.split('?');
        if (url.length === 1){
            return {};
        } //it means it has no parameters
        else{
            var paramsArray = query[1].split('&');
            var obj = {}; //this is going to be your return object
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





    if($scope.cemetery.longitude == null || $scope.cemetery.latitude == null)
        $scope.showMap = false;

    if($scope.cemetery.additionalData == null || $scope.cemetery.additionalData == "")
        $scope.showAdditionalData = false;

    if($scope.cemetery.description == null || $scope.cemetery.description == "")
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


}]);