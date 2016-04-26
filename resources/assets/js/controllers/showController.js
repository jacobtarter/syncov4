synco.controller('showController', ['$scope', '$http', '$location', '$routeParams', function($scope, $http, $location, $routeParams) {

		$scope.id = $routeParams.id;
		$scope.post = null;
		$scope.comments = [];

		$http.get(baseUrl + api + "posts/" + $scope.id)
		.success(function(response){
			$scope.post= response;
			$scope.comments = $scope.post[0].comments;
			$scope.commentDetails = [];
			angular.forEach($scope.comments, function(nextComment) {
				
				$scope.commentDetails.push(nextComment);
				
			});
		}).error(function(response) {
			alert("error getting your json");
		});
	

}]);