'use strict';
var adm = angular.module('adm', ['ui.router', 'ngFileUpload']);
adm.config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
	$urlRouterProvider.otherwise('/');
	$stateProvider
	.state("/", {
		url:"/",
		views:{
			menu:{
				templateUrl:"menu/homeMenu.html"
			},
			content:{
				templateUrl:"modules/sys.php"
			}
		}	
	})
	.state("homepage", {
		url:"/homepage",
		views:{
			menu:{
				templateUrl:"menu/homeMenu.html"
			},
			content:{
				templateUrl:"modules/list-bannerpic.html"
			}
		}	
	})
	.state("activity", {
		url:"/activity",
		views:{
			menu:{
				templateUrl:"menu/homeMenu.html"
			},
			content:{
				templateUrl:"modules/list-activity.html"
			}
		}	
	})
	.state("bannerpic", {
		url:"/bannerpic",
		views:{
			menu:{
				templateUrl:"menu/homeMenu.html"
			},
			content:{
				templateUrl:"modules/list-bannerpic.html"
			}
		}	
	})
	.state("teachers", {
		url:"/teachers",
		views:{
			menu:{
				templateUrl:"menu/homeMenu.html"
			},
			content:{
				templateUrl:"modules/list-teachers.html",
				controller:"listteacher"
			}
		}	
	})
	.state("addteacher", {
		url:"/addteacher",
		views:{
			menu:{
				templateUrl:"menu/homeMenu.html"
			},
			content:{
				templateUrl:"modules/add-teacher.html",
				controller:"addteacher"
			}
		}	
	})
	.state("uploadimage",{
		url:"/uploadimage",
		views:{
			menu:{
				templateUrl:"menu/homeMenu.html"
			},
			content:{
				templateUrl:"modules/upload-image.html",
				controller:"uploadImage"
			}
		}
	})
	.state("accountlist", {
		url: '/accountlist',
		views:{
			menu:{
				templateUrl:"menu/adminMenu.html"
			},
			content:{
				templateUrl: 'modules/list-account.html',
				controller:"listAccount"
			}
		}
	})
	.state("modifyadm", {
		url: '/modifyadm/:id',
		views:{
			menu:{
				templateUrl:"menu/adminMenu.html"
			},
			content:{
				templateUrl: 'modules/modify-adm.html',
				controller:"modifyadm"
			}
		}
	})
	.state("addadm",{
		url:"/addadm",
		views:{
			menu:{
				templateUrl:"menu/adminMenu.html"
			},
			content:{
				templateUrl: 'modules/add-adm.html',
				controller:"addadm"
			}
		}
	})
	.state("articles",{
		url:"/articles",
		views:{
			menu:{
				templateUrl:"menu/articleMenu.html"
			},
			content:{
				templateUrl:"modules/list-article.html",
				controller:"listArticle"
			}
		},
		controller:"articles"
	})
	.state("addarticle",{
		url:"/addarticle",
		views:{
			menu:{
				templateUrl:"menu/articleMenu.html"
			},
			content:{
				templateUrl:"modules/add-article.html",
				controller:"addArticle"
			}
		}	
	})
	.state("detailsarticle", {
		url: '/detailsarticle/:id',
		views:{
			menu:{
				templateUrl:"menu/adminMenu.html"
			},
			content:{
				templateUrl: 'modules/details-article.html',
				controller:"detailsArticle"
			}
		}
	})
	.state("modifyarticle", {
		url: '/modifyarticle/:id',
		views:{
			menu:{
				templateUrl:"menu/adminMenu.html"
			},
			content:{
				templateUrl: 'modules/modify-article.html',
				controller:"modifyArticle"
			}
		}
	})
	.state("cooperate",{
		url:"/cooperate",
		views:{
			menu:{
				templateUrl:"menu/cooperateMenu.html"
			},
			content:{
				templateUrl:"modules/list-cooperate.html"
			}
		}	
	})
	.state("addcooperate",{
		url:"/addcooperate",
		views:{
			menu:{
				templateUrl:"menu/cooperateMenu.html"
			},
			content:{
				templateUrl:"modules/add-cooperate.html",
				controller:"addCooperate"
			}
		}	
	})
	.state("cooperatelist",{
		url:"/cooperatelist",
		views:{
			menu:{
				templateUrl:"menu/cooperateMenu.html"
			},
			content:{
				templateUrl:"modules/list-cooperate.html",
				controller:"addCooperate"
			}
		}	
	});
}]);
