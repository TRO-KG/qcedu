(function(angular){
	'use strict';
	var adm = angular.module('adm', ['ui.router']);
		adm.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
			$urlRouterProvider.otherwise('/');
			$stateProvider
			.state("sys",{
				url:"/",
				templateUrl:"modules/sys.php"
			})
			.state("accountlist", {
				url: '/accountlist',
				templateUrl: 'modules/account-list.html'
			})
			.state("addadm",{
				url:"/addadm",
				templateUrl:"modules/add-adm.html"
			});
		}]);
})(window.angular);
