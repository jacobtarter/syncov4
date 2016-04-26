synco.controller('showController', ['$scope', '$http', '$location', '$routeParams', function($scope, $http, $location, $routeParams) {

		$scope.id = $routeParams.id;
		$scope.post = null;

		$http.get(baseUrl + api + "posts/" + $scope.id)
		.success(function(response){
			$scope.post= response;
		}).error(function(response) {
			alert("error getting your json");
		});
	

}]);