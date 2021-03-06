adm.directive('contenteditable', function() {
    return {
        restrict: 'A' ,
        require: 'ngModel',
        link: function(scope, element, attrs, ctrl) {
            // 创建编辑器
            var editor = new wangEditor('editor-trigger');
            editor.config.menus = [
            	'fontfamily',
            	'fontsize',
            	'head',
		        'bold',
		        'underline',
		        'italic',
		        'strikethrough',
		        '|',
		        'eraser',
		        'forecolor',
		        'bgcolor',
		        '|',
		        'quote',
		        'unorderlist',
		        'orderlist',
		        'alignleft',
		        'aligncenter',
		        'alignright',
		        '|',
		        'link',
		        'unlink',
		        'table',
		        '|',
		        'img',
		        'video',
		        'location',
		        '|',
		        'undo',
		        'redo',
		        'fullscreen'
		    ];
		    editor.config.uploadImgUrl = 'doadminaction.php';
            editor.onchange = function () {
                // 从 onchange 函数中更新数据
                scope.$apply(function () {
                    var html = editor.$txt.html();
                    ctrl.$setViewValue(html);
                });
            };
            editor.create();
        }
    };
});