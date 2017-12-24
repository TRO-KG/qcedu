adm.filter('reverse',function(){
		return function(text,flag) {
			text = flag ? text : null;
			return text;
	    }
	})
	.filter('cancelFlag',function(){
		return function(cancelBtn,flag) {
			cancelBtn = flag ? "取消" : "关闭";
			return cancelBtn;
	    }
	});
