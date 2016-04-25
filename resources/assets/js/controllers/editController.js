synco.controller('editController', ['$scope', '$http', '$location', '$routeParams', function($scope, $http, $location, $routeParams) {

		$scope.id = $routeParams.id;

		$http.get("www.synco.xyz/api/v1/posts/" + $scope.id)
		.success(function(response){
			$scope.post= response;
		}).error(function(response) {
			alert("error getting your json");
		});
	

}]);