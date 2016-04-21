app.controller('userController', ['$scope', '$http', '$location', function($scope, $http, $location) {
	angular.extend($scope, {
		doLogin: function(loginForm) {
			headers: {
				'Content-Type': 'application/json'
			},
			url: 'synco.xyz/auth',
			method: "POST",
			data: {
				email: $scope.login.username,
				password: $scope.login.password
			}
		}).success(function(response)) {
		console.log(response);
		});

		}
	});
}]);