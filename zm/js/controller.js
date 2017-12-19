'use strict';
/*   控制器     */
adm.controller("modifyadm",["$stateParams","$rootScope","$scope","$http",function($stateParams,$rootScope,$scope,$http){
	$scope.pop = true;
	$scope.text = "未作任何修改！";
	$scope.flag = false;
	$scope.data = $stateParams;
	
	$scope.subFn = function(){
		$scope.pop = true;
		$scope.flag = true;
	}
	$scope.cancelFn = function(){
		$scope.pop = false;
		$scope.flag = false;
	}
	$scope.confirmFn = function(adm){
		$scope.pop = false;
		$scope.flag = false;
		$scope.getAdm(adm,"updateadm");
	}
	$scope.newAdm =function(a){
		$scope.pop = false;
	}
	$scope.getAdm = function(data,act="modifyadm"){
		$http({
			method:'post',
		    url: '/zm/doadminaction.php?act='+act,
		    data:data,
		    headers:{'Content-Type': 'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj){
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				}
				return str.join("&");
				}
		}).then(function successCallback(res) {
				$scope.adm = res.data;
		   }, function errorCallback(err) {
				console.log(err);
		});
	}
    $scope.getAdm($scope.data);
}])
.controller("listAccount",["$rootScope","$scope","$http",function($rootScope,$scope,$http){
	$scope.pageSizeList =  [{"label" : "10", "value" : "10"},{"label" : "15", "value" : "15"},{"label" : "20", "value" : "20"}];
	$scope.pageSize = $scope.pageSizeList[0];
	$scope.data = new Object({
		pageSize : $scope.pageSize.value,
		page     : 1
	});
	$scope.selectPage = function(page){
		 //不能小于1大于最大
        if (page < 1 || page > $scope.totalPages) return;
        //最多显示分页数5
        if (page > 2) {
            //因为只显示5个页数，大于2页开始分页转换
            var newpageList = [];
            for (var i = (page - 3) ; i < ((page + 2) > $scope.totalPages ? $scope.totalPages : (page + 2)) ; i++) {
                newpageList.push(i + 1);
            }
            $scope.pageList = newpageList;
        }
		$scope.data.page = page;
		$scope.getAdmList($scope.data);
	}
	$scope.resetTable = function(){
		$scope.data.pageSize = $scope.pageSize.value;
		$scope.getAdmList($scope.data);
	}
	$scope.prevPage = function(){
		$scope.data.page = $scope.data.page - 1;
		if($scope.data.page <= 0 ) $scope.data.page = 1;
		$scope.getAdmList($scope.data);
	}
	$scope.nextPage = function(){
		$scope.data.page = $scope.data.page + 1;
		if($scope.data.page >= $scope.totalPages ) $scope.data.page = $scope.totalPages;
		$scope.getAdmList($scope.data);
	}
	$scope.firstPage = function(){
		$scope.data.page = 1;
		$scope.getAdmList($scope.data);
	}
	$scope.endPage = function(){
		$scope.data.page = $scope.totalPages;
		$scope.getAdmList($scope.data);
	}
	$scope.getAdmList = function(data){
		$http({
			method:'post',
		    url: '/zm/doadminaction.php?act=listaccount',
		    data:data,
		    headers:{'Content-Type': 'application/x-www-form-urlencoded'},
		    transformRequest: function(obj) {
				var str = [];
				for(var p in obj){
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				}
				return str.join("&");
			}
		}).then(function successCallback(res) {
			$scope.adms           = res.data.rows;
			$scope.adms.totalRows = res.data.totalRows;
			$scope.adms.length    = res.data.rows.length;
			$scope.totalPages     = Math.ceil($scope.adms.totalRows/$scope.data.pageSize);
			if($scope.totalPages<7){
				$scope.flag = $scope.totalPages;
			}else{
				$scope.flag = 7;
			}
			$scope.pageList = [];
			for (var i = 0; i < $scope.flag; i++) {
                $scope.pageList.push(i + 1);
          	}
			$scope.isActivePage($scope.data.page);
		   }, function errorCallback(err) {
			console.log("err：" + err);	
		});
	}
	$scope.isActivePage = function (page) {
        return $scope.data.page == page;
    };
	$scope.getAdmList($scope.data);
	$scope.editFn = function(id){
		console.log(id);
	}
}])
.controller("addadm",["$scope", "$http",function($scope,$http){
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
//								angular.forEach($scope.user, function(v,k){
//									$scope.user[k] = null;
//								});						        
						$scope.addmsg.msg = "添加成功";
						$scope.addmsg.bg = "bg-success";
						$scope.addmsg.id = res.data;
				   }, function errorCallback(err) {
				   		console.log("err：" + err);	
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
}])
.controller("uploadImage",['$scope', 'Upload', function ($scope, Upload) {
	$scope.submit = function() {
	    if ($scope.form.file.$valid && $scope.file) {
	        $scope.upload($scope.file);
	    }
    };
    $scope.upload = function (file) {
    Upload.upload({
            url: '/lib/upload.func.php',
            data: {file: file, 'username': $scope.username}
        }).then(function (resp) {
            console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
        }, function (resp) {
            console.log('Error status: ' + resp.status);
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
        });
    };
}])
.controller("articles",["$rootScope","$scope",function($rootScope,$scope){
	$scope.a = "文章列表";
	console.log(1);
}])
.controller("addCooperate",["$rootScope", "$scope", "$http", "Upload",function($rootScope,$scope,$http,Upload){
	$scope.flag = true;
	$("form div[contenteditable='true']").blur(function(){
		$scope.school = $scope.getSchool();
		$scope.checkSchool($scope.school);
		$scope.flag = false;
		$scope.$applyAsync();
	});
	$scope.add = function(){
		
		if ($scope.myform.file.$valid && $scope.file) {
			$scope.upload($scope.file);
	   }else{
	   	$scope.addCooperate($scope.school);
	   }	
	}
	$scope.checkSchool = function(obj){
		angular.forEach(obj, function(value, key){
			console.log("V:"+value+"K:"+key);
		});
	}
	$scope.getSchool = function(){
		var school = new Object({
			"name"    : $.trim($("#name").text()),
			"synopsis": $.trim($("#synopsis").text()),
			"zsdx"    : $.trim($("#zsdx").text()),
			"bmtj"    : $.trim($("#bmtj").text()),
			"bmff"    : $.trim($("#bmff").text()),
			"zscc"    : $.trim($("#zscc").text()),
			"lqff"    : $.trim($("#lqff").text()),
			"xxfs"    : $.trim($("#xxfs").text()),
			"rxks"    : $.trim($("#rxks").text()),
			"zsbf"    : $.trim($("#zsbf").text())
		});
		return school;
	}
	$scope.upload = function (file) {
        Upload.upload({
            url: '/lib/upload.func.php',
            data: {file: file}
        }).then(function (resp) {
        	$scope.school.logo = resp.config.data.file.name;
        	$scope.addCooperate($scope.school);
        }, function (resp) {

        }, function (evt) {
			console.log("err：" + evt);	
        });
    };
    $scope.addCooperate = function(data){
    	$http({
			method:'post',
		    url: '/zm/doadminaction.php?act=addCooperate',
		    data:data,
		    headers:{'Content-Type': 'application/x-www-form-urlencoded'},
			transformRequest: function(obj) {
				var str = [];
				for(var p in obj){
					str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
				}
				return str.join("&");
				}
		}).then(function successCallback(res) {
				console.log("res："+ res);
		   }, function errorCallback(err) {
				console.log("err："+ err);
		});
    }
}]);
