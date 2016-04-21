app.controller('mainController', ['$scope', '$http', API_URL, function($scope) {

$scope.posts = null;

	$scope.whichPost = null;

	//Get Posts Method

	$http.get(API_URL + "posts")
		.success(function(response){
			$scope.posts = response;
		});

	//Delete Post

	$scope.confirmDelete = function(id) {

		var isConfirmDelete = confirm('Are you sure you want to delete?');
		if (isConfirmDelete) {
			$http({
				method: 'DELETE',
				url: API_URL + 'posts/' + id
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
		alert('Hi!' + id);
		console.log('viewPost' + id);

		
		$http.get(API_URL + "posts/" + id )
		.success(function(response){
			alert(API_URL + "posts/" + id);
			$scope.posts = response;
		});
		
	}
	
		

	

}]);
//# sourceMappingURL=controllers.js.map
