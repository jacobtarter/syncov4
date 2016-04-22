synco.controller('userController', ['$scope', '$http', '$location', function($scope, $http, $location) {
	
	$scope.API_URL = "http://www.synco.xyz/api/v1/";

	$scope.posts = null;

	$scope.whichPost = null;

	//Get Posts Method

	$http.get($scope.API_URL + "posts")
		.success(function(response){
			$scope.posts = response;
		});

	//Delete Post

	$scope.confirmDelete = function(id) {

		var isConfirmDelete = confirm('Are you sure you want to delete?');
		if (isConfirmDelete) {
			$http({
				method: 'DELETE',
				url: $scope.API_URL + 'posts/' + id
			}).
				success(function(data) {
					location.reload();
				}).
				error(function(data) {
					alert('Unable to delete.');
				});
		}
		else {
			return false;
		}
	}
	$scope.viewPost = function(id)
	{
		console.log('viewPost' + id);

		$http.get($scope.API_URL + "posts/" + id )
		.success(function(response){
			alert(API_URL + "posts/" + id);
			$scope.posts = response;
		});
		
	}

	angular.extend($scope, {
		doLogin: function(loginForm) {
			$http({	
				headers: {
					'Content-Type': 'application/json'
				},
				url: baseUrl + 'auth',
				method: "POST",
				data: {
					email: $scope.login.username,
					password: $scope.login.password
				}
			}).success(function(response) {
				console.log(response);
			}).
		
	;
}]);
//# sourceMappingURL=controllers.js.map
