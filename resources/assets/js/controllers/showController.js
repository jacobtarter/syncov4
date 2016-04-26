synco.controller('showController', ['$scope', '$http', '$location', '$routeParams', function($scope, $http, $location, $routeParams) {

		$scope.id = $routeParams.id;
		$scope.post = null;
		$scope.comments = [];

		$http.get(baseUrl + api + "posts/" + $scope.id)
		.success(function(response){
			$scope.post= response;
			$scope.comments = $scope.post.comments;
			$scope.commentDetails = [];
			angular.forEach($scope.post.comments, function(nextComment) {
				angular.forEach(nextComment.ctext, function(ctext) {
					$scope.commentDetails.push(ctext);
				});
			});
		}).error(function(response) {
			alert("error getting your json");
		});
	

}]);