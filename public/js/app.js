var synco = angular.module('synco', ['ngRoute', 'ngCookies']);
	

synco.config(['$routeProvider', '$locationProvider',
	function($routeProvider, $locationProvider) {
		$routeProvider.when('/', {
			templateUrl: 'templates/main.html',
			controller: 'mainController'
		});

		$routeProvider.when('/view', {
			templateUrl: 'templates/view.html',
			controller: 'mainController'
		});

		$routeProvider.when('/login', {
			templateUrl: 'templates/login.html',
			controller: 'userController'
		});

		$routeProvider.otherwise('/');
	}

	]);
//# sourceMappingURL=app.js.map
