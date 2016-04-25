synco.controller('editController', ['$scope', '$http', '$location', function($scope, $http, $location) {





		console.log('viewPost' + id);

		$http.get(baseUrl + api + "posts/" + id )
		.success(function(response){
			alert(baseUrl + api + "posts/" + id);
			alert(response[0].about.title);
			$scope.epost= response;
			alert($scope.epost[0].about.title);

		}).error(function(response) {
			alert("error getting your json");
		});
	

}]);