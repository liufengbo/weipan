<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
	<title>银联支付</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/Public/Wap/newpay/css/style.css" rel="stylesheet" type="text/css" />
	<link href="/Public/Wap/newpay/Jquery/themes/default/easyui.css" rel="stylesheet" type="text/css" />
	<link href="/Public/Wap/newpay/Jquery/themes/icon.css" rel="stylesheet" type="text/css" />
	<link href="/Public/Wap/newpay/Jquery/demo/demo.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/Public/Wap/newpay/Jquery/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/Wap/newpay/Jquery/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="/Public/Wap/newpay/Jquery/locale/easyui-lang-zh_CN.js"></script>

</head>
<body>
<form name="form1" id="form1" method="post" action="<?php echo ($payWayurl); ?>" target="_self">
<input type="hidden" name="pGateWayReq" value="<?php echo ($strsubmitxml); ?>" />
</form>
<script language="javascript">document.form1.submit();</script>
</body>
</html>