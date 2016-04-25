synco.controller('editController', ['$scope', '$http', '$location', '$routeParams', function($scope, $http, $location, $routeParams) {


		var self = this;
		$scope.id = $routeParams.id;


	

		$http.get(baseUrl + api + "posts/" + $scope.id )
		.success(function(response){
			alert(baseUrl + api + "posts/" + $scope.id);
			alert(response[0].about.title);
			$scope.epost= response;
			alert($scope.epost[0].about.title);

		}).error(function(response) {
			alert("error getting your json");
		});
	

}]);