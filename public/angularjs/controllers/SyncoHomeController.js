app.controller('SyncoHomeController', function($scope, $http, API_URL) {

	$scope.post = null;

	if(angular.equals($scope.post, null))
	{
		$http.get(API_URL + "posts")
			.success(function(response){
				$scope.posts = response;
			});
	}
	else
	{
		$http.get(API_URL + "posts/" + $scope.post)
			.success(function(response){
				$scope.posts = response;
			});
	}

});
