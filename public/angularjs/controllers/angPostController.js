app.controller('angPostController', function($scope, $http, API_URL) {

	$http.get(API_URL + "posts")
		.success(function(response){
			$scope.posts = response;
		});

});
