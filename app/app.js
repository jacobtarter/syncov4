var app = angular.module('synco', ['ngRoute'])
	.constant('API_URL', 'http://www.synco.xyz/api/v1/');

app.config(['$routeProvider',
	function($routeProvider) {
		$routeProvider.
			when('/ViewOrder/:id', {
				templateUrl: 'js/show_post.html',
				controller: 'ViewPostController'
			});
	}]);
	