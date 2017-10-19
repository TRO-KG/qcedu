(function(angular) {
	'use strict';
	var qcedu = angular.module('qcedu', ['ui.router']);
	//   *****    路由配置        *****
	qcedu.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
		$urlRouterProvider.otherwise('/');
		$stateProvider
			.state("home", {
				url: '/',
				templateUrl: 'views/home.html'
			})
			.state("netedu", {
				url: '/netedu',
				templateUrl: 'views/netedu.html'
			})
			.state("adultedu", {
				url: '/adultedu',
				templateUrl: 'views/adultedu.html'
			})
			.state("tvedu", {
				url: '/tvedu',
				templateUrl: 'views/tvedu.html'
			})
			.state("selfstudy", {
				url: '/selfstudy',
				templateUrl: 'views/selfstudy.html'
			})
			.state("online", {
				url: '/online',
				templateUrl: 'views/online.html',
				controller: "onlineCtrl"
			})
			.state("about", {
				url: '/about',
				templateUrl: 'modules/about.html'
			})
			.state("contactus", {
				url: '/contactus',
				templateUrl: 'modules/contactus.html'
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
				url: '/info',
				templateUrl: 'views/info.html',
				controller: "infoCtrl"
			})
			.state("info.jiaowu", {
				url: '/jiaowu/{id}',
				views: {
					"content@info": {
						templateUrl: 'modules/jiaowu.html'
					}
				}
			})
			.state("info.zsjz", {
				url: '/zsjz/{id}',
				views: {
					"content@info": {
						templateUrl: 'modules/zsjz.html'
					}
				}
			})
			.state("info.bkzn", {
				url: '/bkzn/{id}',
				views: {
					"content@info": {
						templateUrl: 'modules/bkzn.html'
					}
				}
			})
			.state("info.jyxw", {
				url: '/jyxw/{id}',
				views: {
					"content@info": {
						templateUrl: 'modules/jyxw.html'
					}
				}
			})
			.state("info.zyzg", {
				url: '/zyzg/{id}',
				views: {
					"content@info": {
						templateUrl: 'modules/zyzg.html'
					}
				}
			});
	}]);

	// ********  指令   *******
	qcedu.directive("qcBigbanner", [function() {
			return {
				restrict: 'E',
				templateUrl: 'modules/banner.html',
				replace: true,
				controller: "bannerCtrl"
			}
		}])
		.directive('qcAcademy', [function() {
			return {
				restrict: 'E',
				templateUrl: 'modules/academy.html',
				replace: true,
				controller: "academyCtrl"
			}
		}])
		.directive("qcOutside", [function() {
			return {
				restrict: 'E',
				templateUrl: 'views/outside.html',
				replace: true
			}
		}])
		.directive("qcHonor", [function() {
			return {
				restrict: 'E',
				templateUrl: 'views/honor.html',
				replace: true
			}
		}])
		.directive('repeatFinish', [function() {
			return {
				link: function(scope, element, attr) {
					if(scope.$last == true) {
						scope.renderFinish();
					}
				}
			}
		}])
		.directive("academyFinish", [function() {
			return {
				link: function(scope, element, attr) {
					if(scope.$last == true) {
						scope.renderAcademy();
					}
				}
			}
		}]);

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
		.controller("bannerCtrl", ["$scope", function($scope) {
			$('.banner').slick({
				dots: true,
				autoplay: true,
				arrows: false,
				autoplaySpeed: 3000,
			});
		}])
		.controller("academyCtrl", ["$scope", function($scope) {
			$scope.renderAcademy = function() {
				$timeout(function() {
					$(".picScroll-top").slide({
						ttitCell: ".hd ul",
						mainCell: ".bd ul",
						autoPage: true,
						effect: "topLoop",
						autoPlay: true,
						vis: 2
					});
				}, 0);
			};

		}])
		.controller("summaryCtrl", ["$scope", "$stateParams", "$http", function($scope, $stateParams, $http) {}])
		.controller("infoCtrl", ["$scope", "$stateParams", "$http", "$state", function($scope, $stateParams, $http, $state) {

		}])
		.controller("onlineCtrl", ["$scope",function($scope) {
			$("[type=submit]").on("click",function($scope){
				var obj = new Object();
					obj.uesrname = $.trim($("#txt_name2").val());
					obj.professional = $.trim($("#txt_qq2").val());
					obj.address = $.trim($("#txt_where2").val());
					obj.usertel = $.trim($("#txt_tel2").val());
					obj.usertemail = $.trim($("#txt_email2").val());
				
				if(obj.uesrname === ""){
					alert("请悄悄地告诉我您的名字吧");
					$("#txt_name2").focus();
					return;
				};
				if(obj.address === ""){
					alert("人生三大问题之一：你从哪里来？"); 
					$("#txt_where2").focus();
					return;
				};
				if(obj.usertel === ""){
					alert("世界上最远的距离：我不知道怎么联系你。");
					$("#txt_tel2").focus();
					return;
				};
				if(!(/^1[3|5][0-9]\d{4,8}$/.test(obj.usertel))){
					alert("亲，若想获取及时信息，请输入正确的手机号");
					$("#txt_tel2").focus();
					return;
				};
				$.ajax({
					type:"post",
					url:"data_handling.php?act=onlineregistration",
					async:true,
					data:obj,
					success:function(res){
						alert("报名成功，请静候佳音。");
					},
					error:function(err){
						alert("服务器繁忙，请稍后重生。。。");
					}
				});
			});
		}]);
})(window.angular);