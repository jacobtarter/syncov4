var synco = angular.module('synco', ['ngRoute', 'ngCookies']);
	

synco.config(['$routeProvider', '$locationProvider',
	function($routeProvider, $locationProvider) {
		$routeProvider.when('/', {
			templateUrl: 'templates/main.html',
			controller: 'userController'
		});

		$routeProvider.when('/view/:id', {
			templateUrl: 'templates/view.html',
			controller: 'userController'
		});

		$routeProvider.when('/login', {
			templateUrl: 'templates/login.html',
			controller: 'userController'
		});

		$routeProvider.when('/post', {
			templateUrl: 'templates/post.html',
			controller: 'userController'
		});

		$routeProvider.when('/post/:id', {
			templateUrl: 'templates/editPost.html',
			controller: 'userController'
		});

		$routeProvider.otherwise('/');
	}

	]);
//# sourceMappingURL=app.js.map
