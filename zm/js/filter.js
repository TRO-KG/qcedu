adm.filter('reverse',function(){
		return function(text,flag) {
			text = flag ? text : null;
			return text;
	    }
	});
