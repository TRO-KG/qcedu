(function(angular){
	'use strict';
	var admin = angular.module("admin",['ui.router']);
	admin.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
		$urlRouterProvider.otherwise('/');
		$stateProvider
			.state("sys", {
				url: '/',
				templateUrl: 'modules/sys.html',
				data: { admcont: '系统信息' }
			})
	}]);
})(window.angular)
