(function (angular) {
    'use strict';
	var qcedu = angular.module('qcedu',['ui.router']);
	//   *****    路由配置        *****
		qcedu.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider){ 
			 $urlRouterProvider.otherwise('/');  
		    $stateProvider  
		      .state({  
		        name: 'home',  
		        url: '/',  
		        templateUrl: 'modules/home.html'  
		      })  
		      .state({  
		        name: 'netedu',  
		        url: '/netedu',  
		        templateUrl: 'modules/netedu.html'  
		      })
		      .state({  
		        name: 'tvedu',  
		        url: '/tvedu',  
		        templateUrl: 'modules/tvedu.html'  
		      })
		      .state({  
		        name: 'adultedu',  
		        url: '/adultedu',  
		        templateUrl: 'modules/adultedu.html'  
		      })
		      .state({  
		        name: 'selfstudy',  
		        url: '/selfstudy',  
		        templateUrl: 'modules/selfstudy.html'  
		      })
		      .state({  
		        name: 'teachingnotice',  
		        url: '/teachingnotice',  
		        templateUrl: 'modules/teachingnotice.html'  
		      })
		      .state({  
		        name: 'online',  
		        url: '/online',  
		        templateUrl: 'modules/online.html'  
		      })
		      .state({  
		        name: 'about',  
		        url: '/about',  
		        templateUrl: 'modules/about.html'  
		      });
			}]);
	// ********  指令   *******
	qcedu.directive('qcHeader',[function(){
		return {
			restrict: 'E',
			templateUrl: 'modules/head.html',
			replace:true
		}
	}]).directive("qcBigbanner",[function(){
		return {
			restrict: 'E',
			templateUrl: 'modules/banner.html',
			replace:true,
	        controller: function(){
						    $('.banner').slick({
						        dots: true,
						        autoplay:true,
						        arrows:false,
						        autoplaySpeed:3000,
						    	});
							}
		}
	}]).directive('qcFooter',[function(){
		return {
			restrict: 'E',
			templateUrl: 'modules/foote.html',
			replace:true
		}
	}]).directive('repeatFinish', function () {
	    return {
	        link: function (scope, element, attr) {
	            if (scope.$last == true) {
	                scope.renderFinish();
	            }
	        }
	    };
	});;
	

	qcedu.controller('schoolCtrl',function ($scope, $http, $timeout){
			var url="action.php?act=netschool";
			$http.get(url).success( function(response) {
	          $scope.coopschools = response;
	        });
	        $scope.renderFinish = function () {
	                $timeout(function () {
	                    var Cwidth =  document.body.offsetWidth;
	                   	if(Cwidth>=768){
						   jQuery(".picScroll-left").slide({
						   	titCell:".hd ul",
						   	mainCell:".bd ul",
						   	autoPage:true,
						   	effect:"leftLoop",
						   	autoPlay:true,
						   	vis:5,
						   	trigger:"click"
						   	});
						}
	                }, 0);
	            };
		});
	qcedu.controller('enrollmentCtrl',function($scope, $http){
		var url="action.php?act=enrollment";
		$http.get(url).success( function(response) {
          $scope.items = response;
       });
	});
	qcedu.controller('guideCtrl', function($scope, $http){
		var url="action.php?act=guide";
		$http.get(url).success( function(response) {
          $scope.items = response;
       });
	});
	qcedu.controller('newCtrl', function($scope, $http){
		var url="action.php?act=edunews";
		$http.get(url).success( function(response) {
          $scope.items = response;
       });
	});
	qcedu.controller('noticeCtrl', function($scope, $http){
		var url="action.php?act=notice";
		$http.get(url).success( function(response) {
          $scope.items = response;
       });
	});
})(window.angular);