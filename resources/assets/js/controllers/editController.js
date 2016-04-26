synco.controller('editController', ['$scope', '$http', '$location', '$routeParams', function($scope, $http, $location, $routeParams) {

		$scope.id = $routeParams.id;

		alert(baseUrl + api + "posts/" + $scope.id);

		$http.jsonp(baseUrl + api + "posts/" + $scope.id)
		.success(function(response){
			$scope.post= response;
		}).error(function(response) {
			alert("error getting your json");
		});
	

}]);