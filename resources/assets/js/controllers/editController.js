synco.controller('editController', ['$scope', '$http', '$location', '$routeParams', function($scope, $http, $location, $routeParams) {

		$scope.id = $routeParams.id;
		$scope.post = null;

		alert(baseUrl + api + "posts/" + $scope.id);

		$http.get(baseUrl + api + "posts/" + $scope.id)
		.success(function(response){
			$scope.post= response;
		}).error(function(response) {
			alert("error getting your json");
		});
	

}]);