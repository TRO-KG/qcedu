<?php require_once '../../include.php' ?>
<div class="row">
	<div class="col-xs-12 systitle row">
		<h3 class="text-center">系统信息</h3>
		<div class="sysmsg">
			<div class="row systable">
				<div class="col-xs-3 text-center">操作系统</div>
				<div class="col-xs-9"><?PHP echo PHP_OS; ?></div>
			</div>
			<div class="row systable">
				<div class="col-xs-3 text-center">当前IP地址</div>
				<div class="col-xs-9"><?PHP echo $_SERVER["REMOTE_ADDR"]; ?></div>
			</div>
			<div class="row systable">
				<div class="col-xs-3 text-center">Apache版本</div>
				<div class="col-xs-9"><?php echo apache_get_version(); ?></div>
			</div>
			<div class="row systable">
				<div class="col-xs-3 text-center">PHP版本</div>
				<div class="col-xs-9"><?PHP echo PHP_VERSION; ?></div>
			</div>
			<div class="row systable borbtm">
				<div class="col-xs-3 text-center">运行方式</div>
				<div class="col-xs-9"><?php echo php_sapi_name(); ?></div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 systitle row">
		<h3 class="text-center">软件信息</h3>
		<div class="sysmsg">
			<div class="row systable">
				<div class="col-xs-3 text-center">系统名称</div>
				<div class="col-xs-9">启辰教育网络平台</div>
			</div>
			<div class="row systable">
				<div class="col-xs-3 text-center">软件归属</div>
				<div class="col-xs-9">启辰教育（ZM）</div>
			</div>
			<div class="row systable">
				<div class="col-xs-3 text-center">公司网址</div>
				<div class="col-xs-9"><a href="<?PHP echo DOMAIN_NAME; ?>"><?PHP echo DOMAIN_NAME; ?></a></div>
			</div>
			<div class="row systable borbtm">
				<div class="col-xs-3 text-center">技术顾问&nbsp;&&nbsp;后期维护</div>
				<div class="col-xs-9"><a href="http://www.mkonggang.com">Mr.Kong（大窟窿）</a></div>
			</div>
		</div>
	</div>
</div>