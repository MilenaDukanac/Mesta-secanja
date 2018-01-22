var searchCemetery=angular.module("searchCemetery",[]);

searchCemetery.controller("searchController",['$scope','$http','$filter',function($scope,$http,$filter){

$scope.cemeteries=[];

$scope.country="Serbia";
$scope.region="Banat";

$scope.searchCem = function(){

        $http({
            method: "GET",
            url: "../server/cemetery.php/cemeteries/"+$scope.country+"/"+$scope.region
        }).then(function successHandler(result){
			$scope.cemeteries=result.data;
			console.log(result);
        }, function errorHandler(result){
			console.log(result);
        });

    }
	
	
	
	
	
}]);