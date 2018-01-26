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


    console.log($scope.cemeteryId);
    $scope.photos = [];
    $scope.cemetery = {};

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
        url: "../server/photo.php/photos/"+$scope.cemeteryId
    }).then(function successHandler(result) {
        console.log(result);
        $scope.photos = result.data;
    }, function errorHandler(result) {
        console.log(result)
    })


}]);