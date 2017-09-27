(function(angular) {
	'use strict';
	var qcedu = angular.module('qcedu', ['ui.router']);
	//   *****    路由配置        *****
	qcedu.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
		$urlRouterProvider.otherwise('/');
		$stateProvider
			.state("home", {
				url: '/',
				templateUrl: 'modules/home.html'
			})
			.state("netedu", {
				url: '/netedu',
				templateUrl: 'modules/netedu.html'
			})
			.state("tvedu", {
				url: '/tvedu',
				templateUrl: 'modules/tvedu.html'
			})
			.state("adultedu", {
				url: '/adultedu',
				templateUrl: 'modules/adultedu.html'
			})
			.state("selfstudy", {
				url: '/selfstudy',
				templateUrl: 'modules/selfstudy.html'
			})
			.state("online", {
				url: '/online',
				templateUrl: 'modules/online.html'
			})
			.state("about", {
				url: '/about',
				templateUrl: 'modules/about.html'
			})
			.state("school", {
				url: '/school/{id}',
				templateUrl: 'modules/school.html',
				controller: "summaryCtrl"
			})
			.state("infoview", {
				url: '/infoview/{id}',
				templateUrl: 'modules/infoview.html',
				controller: "infoCtrl"
			})
			.state("info", {
				url: '/info/{id}',
				templateUrl: 'modules/info.html',
				controller: "infoCtrl"
			})
			.state("info.jiaowu", {
				url: '/jiaowu',
				views: {
					"content@info": {
						templateUrl: 'modules/jiaowu.html'
					}
				}
			})
			.state("info.zsjz", {
				url: '/zsjz',
				views: {
					"content@info": {
						templateUrl: 'modules/zsjz.html'
					}
				}
			})
			.state("info.bkzn", {
				url: '/bkzn',
				views: {
					"content@info": {
						templateUrl: 'modules/bkzn.html'
					}
				}
			})
			.state("info.jyxw", {
				url: '/jyxw',
				views: {
					"content@info": {
						templateUrl: 'modules/jyxw.html'
					}
				}
			})
			.state("info.zyzg", {
				url: '/zyzg',
				views: {
					"content@info": {
						templateUrl: 'modules/zyzg.html'
					}
				}
			});
	}]);

	// ********  指令   *******
	qcedu.directive('qcHeader', [function() {
		return {
			restrict: 'E',
			templateUrl: 'modules/head.html',
			replace: true
		}
	}]).directive("qcBigbanner", [function() {
		return {
			restrict: 'E',
			templateUrl: 'modules/banner.html',
			replace: true,
			controller: "bannerCtrl"
		}
	}]).directive('qcFooter', [function() {
		return {
			restrict: 'E',
			templateUrl: 'modules/footer.html',
			replace: true
		}
	}]).directive('repeatFinish', function() {
		return {
			link: function(scope, element, attr) {
				if(scope.$last == true) {
					scope.renderFinish();
				}
			}
		};
	});;

	//   *****   控制器       ******
	qcedu.controller('schoolCtrl', function($scope, $http, $timeout) {
			var url = "action.php?act=netschool";
			$http.get(url).success(function(response) {
				$scope.coopschools = response;
			});
			$scope.renderFinish = function() {
				$timeout(function() {
					var Cwidth = document.body.offsetWidth;
					if(Cwidth >= 768) {
						jQuery(".picScroll-left").slide({
							titCell: ".hd ul",
							mainCell: ".bd ul",
							autoPage: true,
							effect: "leftLoop",
							autoPlay: true,
							vis: 5,
							trigger: "click"
						});
					}
				}, 0);
			};
		})
		.controller('enrollmentCtrl', ["$scope", "$http", function($scope, $http) {
			var url = "action.php?act=enrollment";
			$http.get(url).success(function(response) {
				$scope.items = response;
			});
		}])
		.controller('guideCtrl', ["$scope", "$http", function($scope, $http) {
			var url = "action.php?act=guide";
			$http.get(url).success(function(response) {
				$scope.items = response;
			});
		}])
		.controller('newCtrl', ["$scope", "$http", function($scope, $http) {
			var url = "action.php?act=edunews";
			$http.get(url).success(function(response) {
				$scope.items = response;
			});
		}])
		.controller('noticeCtrl', ["$scope", "$http", function($scope, $http) {
			var url = "action.php?act=notice";
			$http.get(url).success(function(response) {
				$scope.items = response;
			});
		}])
		.controller("bannerCtrl", ["$scope", function() {
			$('.banner').slick({
				dots: true,
				autoplay: true,
				arrows: false,
				autoplaySpeed: 3000,
			});
		}])
		.controller("summaryCtrl", ["$scope", "$stateParams", "$http", function($scope, $stateParams, $http) {}])
		.controller("infoCtrl", ["$scope", "$stateParams", "$http", "$state", function($scope, $stateParams, $http, $state) {
			console.log($stateParams);
			if("" == $stateParams.id) {
				//				$state.go('info.jiaowu');
			}
		}]);
})(window.angular);