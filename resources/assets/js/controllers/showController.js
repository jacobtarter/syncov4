synco.controller('showController', ['$scope', '$http', '$location', '$routeParams', function($scope, $http, $location, $routeParams) {

		$scope.id = $routeParams.id;
		$scope.post = null;
		$scope.comments = [];

		$http.get(baseUrl + api + "posts/" + $scope.id)
		.success(function(response){
			$scope.post= response;
			angular.forEach(post.comments, function(nextComment) {
				angular.forEach(nextComment.ctext, function(ctext) {
					$scope.comments.push(ctext);
				});
			});
		}).error(function(response) {
			alert("error getting your json");
		});
	

}]);