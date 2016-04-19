app.controller('postController', function($scope, $http, API_URL) {

	$http.get(API_URL + "posts")
		.success(function(resonse){
			$scope.posts = response.data;
		});

});