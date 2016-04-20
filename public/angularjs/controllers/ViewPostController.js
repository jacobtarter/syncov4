app.controller('ViewPostController', function($scope, $http, API_URL) {

	$scope.post = null;

	//Get Posts Method

	$http.get(API_URL + "posts")
		.success(function(response){
			$scope.posts = response;
		});

	//Delete Post

	$scope.confirmDelete = function(pid)
	{
		var isConfirmDelete = confirm('Are you sure you want to delete this post?');
		if (isConfirmDelete)
		{
			$http({
				method: 'GET',
				url: API_URL + 'posts/delete/' + pid
			}).
			success(function(data) {
				//console.log(data);
				location.reload();
			}).
			error(function(data) {
				//console.log(data);
				alert('Error - Post not deleted. pid: ' + API_URL + 'posts/delete/' + pid) ;
			});
		}
		else
		{
			return false;
		}
	}

});