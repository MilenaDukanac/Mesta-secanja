var tagSearch=angular.module("tagSearch",[]);

tagSearch.filter("TagFilter", function(){
    return function(possibleValues, tagId){
        // if(country == "all"){
        //     return regions;
        // }

        return possibleValues.filter(possibleValue => possibleValue.tagId == tagId);
    }
});

tagSearch.controller("tagSearchController",['$scope','$http', '$window','$filter',function($scope,$http,$window,$filter){

    $scope.tags = [];                   // tagovi
    $scope.tagPossibleValues = [];      // moguce vrednosti
    $scope.photoTags = [];                    // konkretan tag
    $scope.photos  = [];          // konkretna moguca vrednost taga

    // Hvatanje svih mogucih tagova
    $http({
        method: "GET",
        url: "../server/tags.php/tags"
    }).then(function successHandler(result){
        $scope.tags = result.data;
        console.log(result);
    }, function errorHandler(result){
        console.log(result);
    });

    // Hvatanje svih mogucih mogucih vrednosti
    $http({
        method: "GET",
        url: "../server/tags.php/possiblevalues"
    }).then(function successHandler(result){
        $scope.tagPossibleValues = result.data;
        console.log(result);
    }, function errorHandler(result){
        console.log(result);
    });

    $scope.showPhotos = false;

    $scope.search = function(){
    //    $window.location.href = "cemeteries.php?country="+$scope.country+"&region="+$scope.region;
        var query = "";
        var count = 0;
        for(var key in $scope.photoTags){

            if($scope.photoTags[key].length > 0){
                if(query == "") {
                    query += "select p.name, p.id" +
                        " from centralcemeteries.photo_tag pt join centralcemeteries.photo p" +
                        " on pt.photoId = p.id" +
                        " where pt.tagId=" + key + " and pt.value=\"" + $scope.photoTags[key] +
                        "\" and p.id in ";
                }
                else{
                    query += "(select photoId from centralcemeteries.photo_tag " +
                             "where tagId=" + key + " and value=\"" + $scope.photoTags[key] +
                                               "\" and photoId in ";
                    count++;
                }
            }
        }
        query += "(select id from centralcemeteries.photo)";
        for(var i = 0; i<count; i++){
            query += ")";
        }
        query += " group by p.id";
        console.log(query);
        $http({
            method: "GET",
            url: "../server/photo_tag.php/query/"+query
        }).then(function successHandler(result){
            $scope.photos = result.data;
            console.log(result);
        }, function errorHandler(result){
            console.log(result);
        });



    }



}]);