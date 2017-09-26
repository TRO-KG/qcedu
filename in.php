<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="renderer" content="webkit"> 
	<title>启辰教育</title>
	<meta name="keywords" content="启辰教育">
	<meta name="description" content="启辰教育">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery.mmenu.all.css"/>
	<link rel="stylesheet" type="text/css" href="../css/slick.css"/>	
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<script src="../js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/Html5.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/angular.min.js"></script>
    <script src="js/angular-route.min.js"></script>
    <script src="js/app.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/jquery.SuperSlide.2.1.js" type="text/javascript" charset="utf-8"></script>
</head>
<body id="wrapper" ng-app='app'>
<div>
<!-- S header-->
<header>
<div id="header">
    <div id="top" class="hidden-xs">
         <div class="mainwrap clearfix">
                <div class="row top">
                        <div class="col-sm-3">
                           <span class="float_l">你好，欢迎来到启辰教育！</span>
                        </div>
                        <div class="col-sm-9">
                            <div class="menu float_r">
                                   <a href="#" target="_blank">高起专</a>
                                   <a href="#" target="_blank">专升本</a>
                                   <a href="#" target="_blank">高起本</a>
                                   <a href="#">在线报名</a>
                                   <a href="#">联系我们</a>
                            </div>
                        </div>
                </div>
         </div>
    </div>
    <div class="mainwrap head clearfix">
        <div class="logo float_l" ><a href="#"><img src="images/logo.png"/></a></div>
        <div class="tel float_r hidden-xs">
               <a>153-0371-8943</a>
               <p>全国服务咨询热线：</p>
        </div>      
    </div> 
    <div class="clear"></div> 
    <!--S nav-->
    <div class="navbar hidden-xs ">
          <ul class="mainwrap nav">
              <li class="m">
                    <h3><a ui-sref="home" ui-sref-active="current">启辰首页</a></h3>
              </li>
              <li  class="m">
                    <h3><a ui-sref="netedu" ui-sref-active="current">网络教育</a></h3>
              </li>
              <li  class="m">
                    <h3><a ui-sref="adultedu" ui-sref-active="current">成人教育</a></h3>
              </li>
              <li  class="m">
                    <h3><a ui-sref="tvedu" ui-sref-active="current">电大开放</a></h3>
              </li>
              
              <li  class="m">
                    <h3><a ui-sref="selfstudy" ui-sref-active="current">自学考试</a></h3>
              </li>
              <li  class="m">
                    <h3><a ui-sref="teachingnotice" ui-sref-active="current">教务通知</a></h3>
                    <ul class="sub">
                    	
                        <li><a href="#/teachingnotice">教务通知</a></li>
                        
                        <li><a href="#">招生简章</a></li>
                        
                        <li><a href="#">报考指南</a></li>
                        
                        <li><a href="#">教育新闻</a></li>
                        
                        <li><a href="#">职业资格</a></li>
                        
                    </ul>
              </li>
              <li  class="m">
                    <h3><a ui-sref="online" ui-sref-active="current">在线报名 </a></h3>
              </li>
              <li  class="m">
                    <h3><a ui-sref="about" ui-sref-active="current">关于我们</a></h3>
              </li>
           </ul>
            <script type="text/javascript">
            jQuery(".nav").slide({ 
                    type:"menu",
                    titCell:".m",
                    targetCell:".sub",
                    effect:"slideDown",
                    delayTime:300,
                    triggerTime:0,
                    returnDefault:true
                });
            </script> 
    </div>
    <!--E nav--> 
    <a href="#mmenu" class="phone-nav hidden visible-xs">
		 <span></span>
	     <span></span>
	     <span></span>
	 </a>
</div> 
</header>
<!-- E header-->
<!--移动端  Mmenu S-->
	<nav id="mmenu"  class="mm-hidden">
		<ul>
			<li><a href="#/">启辰首页</a></li>
			<li><a href="#/netedu">网络教育</a></li>
            <li><a href="#/adultedu">成人教育</a></li>
            <li><a href="#">电大开放</a></li>
            <li><a href="#">自学考试</a></li>
			<li><a href="#">教务通知</a>
				<ul>
                	
					<li><a href="#">教务通知</a></li>
	    			
					<li><a href="#">招生简章</a></li>
	    			
					<li><a href="#">报考指南</a></li>
	    			
					<li><a href="#">教育新闻</a></li>
	    			
					<li><a href="#">职业资格</a></li>
	    			
				</ul>
			</li>
			<li><a href="#">在线报名</a></li>
            <li><a href="#">关于我们</a></li>
            <li><a href="#">联系我们</a></li>
		</ul>
	</nav>	
<!--移动端  Mmenu E-->

<div class="clear"></div>

<!--S banner-->
<div class="banner">
    <div><a href="javascript:void(0)"><img src="upload/banner_2.jpg" alt=""></a></div>
    <div><a href="javascript:void(0)"><img src="upload/banner_2.jpg" alt=""></a></div>
   
</div>
<!--E banner-->
<!--slick-->
<script src="js/slick.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	    $(function(){
		    $('.banner').slick({
		        dots: true,
		        autoplay:true,
		        arrows:false,
		        autoplaySpeed:3000,
		    });
		});
</script>
<div class="clear"></div>
<!-- S section--><!-- S section-->
<section ui-view>
</section>

<!-- E section--> 

<div class="clear"></div>


<!--footer开始-->
<?php include 'modules/footer.html';?>
<!--footer结束-->
</body>
</html>
