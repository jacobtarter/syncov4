var app = angular.module('app', ['ngRoute', 'ngCookies']);

app.config(['$routeProvider', '$locationProvider',
	function($routeProvider, $locationProvider) {
		$routeProvider.when('/', {
			templateurl: 'templates/main.html',
			controller: 'mainController'
		});

		$routeProvider.when('/view', {
			templateurl: 'templates/view.html',
			controller: 'mainController'
		});

		$routeProvider.when('/login', {
			templateurl: 'templates/login.html',
			controller: 'mainController'
		});

		$routeProvider.otherwise('/');
	}

	])
//# sourceMappingURL=app.js.map
