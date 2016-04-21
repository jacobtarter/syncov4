var app = angular.module('synco', ['ngRoute', 'ngCookies'])
	.constant('API_URL', 'http://www.synco.xyz/api/v1/');;

app.config(['$routeProvider', '$locationProvider',
	function($routeProvider, $locationProvider) {
		$routeProvider.when('/', {
			templateUrl: 'templates/main.html',
			controller: 'mainController'
		});

		$routeProvider.when('#/view', {
			templateUrl: 'templates/view.html',
			controller: 'mainController'
		});

		$routeProvider.when('#/login', {
			templateUrl: 'templates/login.html',
			controller: 'mainController'
		});

		$routeProvider.otherwise('/');
	}

	])
//# sourceMappingURL=app.js.map
