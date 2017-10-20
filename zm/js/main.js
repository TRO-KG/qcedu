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
				templateUrl:"modules/add-adm.html",
				controller:"addadm"
			});
		}]);
		/*   控制器     */
		adm.controller("addadm",["$scope", "$http",function($scope,$http){
			$scope.addmsg = {};
			$scope.verify = {};
			$scope.addmsg.flag = true;
			
			$scope.add = function(myform) {
				$scope.verify.tel = false;
				$scope.verify.email = false;
				var regTel = /^((0\d{2,3}-\d{7,8})|(1[3584]\d{9}))$/;
				var regEmail = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
				if(myform){
					if(!myform.account){
						$scope.verify.account = true;
					}else{
						$scope.verify.account = false;
					}
					if(!myform.password){
						$scope.verify.password = true;
					}else{
						$scope.verify.password = false;
					}
					if(!myform.username){
						$scope.verify.username = true;
					}else{
						$scope.verify.username = false;
					}
					if(myform.tel && ! regTel.test(myform.tel)){
						$scope.verify.tel = true;
					}
					if(myform.email && ! regEmail.test(myform.email)){
						$scope.verify.email = true;
					}
					if(!($scope.verify.account||$scope.verify.password||$scope.verify.username||$scope.verify.tel||$scope.verify.email)){
						$http({
							method:'post',
						    url: '/zm/doadminaction.php?act=addadm',
						    data:myform,
						    headers:{'Content-Type': 'application/x-www-form-urlencoded'},
							transformRequest: function(obj) {
								var str = [];
								for(var p in obj){
								str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
								}
								return str.join("&");
								}
						}).then(function successCallback(res) {
								angular.forEach($scope.user, function(v,k){
									$scope.user[k] = null;
								});						        
								$scope.addmsg.msg = "添加成功";
								$scope.addmsg.bg = "bg-success";
								$scope.addmsg.id = res.data;
						    }, function errorCallback(err) {
								$scope.addmsg.msg = "添加失败";
								$scope.addmsg.bg = "bg-warning";
								$scope.addmsg.id = false;
						});
					}
				}else{
					$scope.addmsg.msg = "请输入正确信息";
					$scope.addmsg.bg = "bg-warning";
					$scope.addmsg.color = "text-danger";
					$scope.addmsg.id = false;
				}			
				$scope.addmsg.flag = false;
			};
		}]);
})(window.angular);
