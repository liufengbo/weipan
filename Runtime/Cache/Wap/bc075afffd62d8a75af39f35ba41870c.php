<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="viewport" content="width=device-width,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
	<title>快速充值中心</title>
    <style>
        body,div,ul,li,h5,h4,h3,h2,h1,p{ margin:0; padding:0;}
        a,li,p{ font-size:12px;}
        a{ text-decoration:none;}
        li{list-style:none;}
        body,th,td,input,select,textarea,button {line-height:1 ;font-family:"微软雅黑", "黑体","宋体";}
        input,select,textarea,button {vertical-align:middle;outline:none;}
        body{ background-color:#eeeeee;}
        input{ font-size:14px;  padding:8px 0; }
        button,input{ background:none; border:none; }

        /*头部*/
        .haeder{ height:44px; background:#20282c; position:relative;}
        .haeder-tittle{ text-align:center; height:44px; line-height:44px; color:#000;font-weight:bold}
        .haeder-back-btn{ position:absolute; left:1%; width:48px; height:44px; background:url(../images/back.png) no-repeat center center; background-size:50% 50%; }
        .haeder-finish-btn{ position:absolute; right:1%; top:16px; width:48px; height:44px; color:#fff; font-weight:bold; font-size:14px;}
        .haeder-back-btn:hover{}
        /*利率*/
        .bill-rate-container,.roll-out-container{ margin-top:12px; color:#8e8e93; background:#fff;}
        /*转入列表*/
        .roll-out-container li{ line-height:44px; height:44px; margin-left:20px; border-bottom:1px #eeeeee solid; font-size:14px; color:#333;}
        .roll-out-container{border-top:1px #eeeeee solid;border-bottom:1px #eeeeee solid;}
        .bill-money{ float:right; margin-right:30px;}
        .roll-income-input{ margin-left:13%; font-weight:bold;}
        .bill-sub-btn{ width:100%; line-height:44px; font-size:14px; font-weight:bold; text-align:center; color:#FFF; background:#64ba55; margin:30px auto;}
        .bill-sub-btn:hover{ background:#569f49;}
        .firm-payment{ border-top:1px #EEEEEE solid; display:block; color:#64ba55; line-height:40px; position:fixed; bottom:0; text-align:center; background:#fff; width:100%; font-size:16px;}
        .firm-payment hover{color:#569f49;}
        .bill-btn-container{ width:90%; padding:0 5%; overflow-x:hidden;}
        .bill-sub-btn,.sub-capion1,.verification-code,.selected{border-radius:4px;-moz-border-radius:4px;-ms-border-radius:4px;-webkit-border-radius:4px;-o-border-radius:4px;}
        .underline-none{ border-bottom:none !important;}
        /*弹框提示*/
        .sub-capion1{ background:url(../images/wrang.png) no-repeat center 0 ; background-size:64px auto; height:100px; color:#fff; text-align:center; width:200px; padding:6px 6px; position:absolute; left:50%; top:30%; margin-left:-100px; font-size:14px;}
        .sub-capion1 p{ position:absolute; top:74px; left:0; display:inline-block; width:100%; text-align:center; color:#333; font-size:15px; line-height:20px}
        /*账单明细*/
        .table-responsive{ background:#fff;}
        .bill-detail-container{border:#e6e6e6 1px solid; margin-bottom:10px; padding:10px 4%; overflow:hidden;}
        .right-detail{ padding-left:6%; float:left;}
        .bill-week,.left-date p{ color:#999; font-size:13px; line-height:20px;}
        .left-date{height:54px; padding-top:18px;}
        .bill-week{ font-size:14px;}
        .bill-detail-container h4{margin:0; line-height:30px;}
        .bill-detail-container p{margin:0;}
        .left-date{ width:34%; border-right:#e6e6e6 1px solid; float:left;}
        .bill-success{ color:#393; font-weight:bold; line-height:25px;}
        /*set*/
        .roll-out-container a{ display:inline-block; line-height:44px; height:44px; width:100%; color:#333; font-size:14px;}
        .set-menu-container{ border-top:#e6e6e6 1px solid;}
        .set-title{ width:120px; display:inline-block;}
        .set-input{ font-weight:bold; width:60%;Border:1px solid #000;}
        .set-label{ font-weight:bold; width:60%;}


        .user-container{ background:#fff;}
        .order-container{ background: url(../images/bottomborder.png) repeat-x bottom #fff; background-size:10% auto; margin-bottom:15px;}
        .business-user{ line-height:60px; text-indent:60px; font-size:16px; background:url(../images/business.png) no-repeat 10px center; background-size:40px auto; font-weight:bold;}

        /*particulars*/
        .trading-success{text-indent:50px; background:url(../images/success@2x.png) no-repeat 16px center #EEE; background-size:30px auto; color:#1ea300; font-size:18px; line-height:64px;}
        .particulars-container{ height:335px; background:#fff; border-top:#d9d9d9 1px solid;border-bottom:#d9d9d9 1px solid;}
        .order-detail{background:#fff; border-top:#d9d9d9 1px solid;border-bottom:#d9d9d9 1px solid; }
        .trad-mane{ height:120px; text-align:center;}
        .name-text{ font-size:15px; font-weight:bold; line-height:35px; margin-top:20px;}
        .num-text{font-size:38px; }
        .trad-line{ height:1px; background:#d9d9d9; margin-left:15px;}
        .trad-detail ul{ margin-left:15px; margin-top:10px; margin-bottom:10px;}
        .trad-detail ul li{ line-height:25px; font-size:14px; color:#7b7b7b;}
        .trad-detail ul li span{ text-align:right; display:inline-block; float:right; margin-right:15px;}
        .trad-detail{}
        .trad-attention{ line-height:60px;}
        .trad-attention p{  font-size:14px; font-weight:bold; margin-left:15px; text-indent:60px; background:url(../images/eyears_logo.png) no-repeat 0 center; background-size:45px auto;}
        .trad-attention p span{ float:right; margin-right:14px; color:#7b7b7b; vertical-align:middle;}
        .attention-ok{  display:inline-block;}
        .trad-attention p span label{ margin-left:5px;vertical-align:middle;}
        .wepay-mark{ color:#bfbfc3; font-size:14px; background:url(../images/wepay.png) no-repeat 0 center; background-size:32px auto; line-height:40px; width:100px; text-indent:40px; position:absolute; bottom:10px; left:50%; margin-left:-50px;}
        /*错误提示*/
        .sub-capion{border-radius:4px;-moz-border-radius:4px;-ms-border-radius:4px;-webkit-border-radius:4px;-o-border-radius:4px;background:rgba(0,0,0,0.5); line-height:30px; color:#fff; text-align:center; width:148px; padding:6px 6px; position:absolute; left:50%; top:40%; margin-left:-80px; font-size:14px; }

        /*order*/
        .order-info{ padding:20px; font-size:13px;}
        .order-info li{ line-height:24px;}
		.pwd-btn {
			display: block;
			width: 90%;
			margin: 5px auto 0;
			border: 0;
			border-radius: 5px;
			background: #daac33;
			padding: .5rem 0;
			cursor: pointer;
			font-size: 1.7rem;
			text-align: center;
			color: #fff;
		}
    </style>
	<script type="text/javascript">
        function getNowFormatDate() {
            var date = new Date();
            var seperator1 = "-";
            var seperator2 = ":";
            var year = date.getFullYear();
            var month = date.getMonth() + 1;
            var strDate = date.getDate();
            if (month >= 1 && month <= 9) {
                month = "0" + month;
            }
            if (strDate >= 0 && strDate <= 9) {
                strDate = "0" + strDate;
            }
            var currentdate = year + seperator1 + month + seperator1 + strDate
                + " " + date.getHours() + seperator2 + date.getMinutes()
                + seperator2 + date.getSeconds();
            return currentdate;
        }
	</script>
	<link rel="stylesheet" href="../../../Public/Wap/jinrong/Mobile/Public/css/style-05.css">

</head>
<body>
<?php if("交易成功" == $message){?>
<div style="margin-left: 10px;margin-top:30px;color:#556B2F;font-size:30px;font-weight: bolder; text-align: center;">扫码支付</div><br/>
<div style="overflow: hidden;text-align: center;">
	<img alt="扫码支付" src="http://weipan.rakefx.com/wap/IpsPay/qrcode?data=<?php echo urlencode($strQrCodeUrl);?>" class="codeimg2" style="width:150px;height:150px;"/>
</div>
<div><a class="pwd-btn" href="http://weipan.rakefx.com/wap/user/private_person">支付完成</a></div>
<?php }else {?>
<div class="roll-out-container">
	<ul>
		<li><span class="set-title">交易结果</span>
			<span class="set-label"><?php echo $message?></span>
            <span class="set-label"><?php echo $code?></span>
		</li>
	</ul>
</div>
<?php }?>
</body></html>