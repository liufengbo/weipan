<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>交易记录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="wap-font-scale" content="no">
	<link rel="stylesheet" href="<?php echo RES;?>/jinrong/Mobile/Public/css/style.css">
	<link rel="stylesheet" href="<?php echo RES;?>/jinrong/Mobile/Public/css/common.css"> 
	<link rel="stylesheet" href="<?php echo RES;?>/jinrong/Mobile/Public/css/ucenter.css"> 
	<style> body{padding-bottom:80px;}</style>
</head>
<body class="page-mobile ">
<div class="jz-head">
<a href="###" id="account_icon_btn" class="pos-left head-show jz-my_head">
<img src="<?php echo ($user['headimgurl']); ?>" width="33" height="33" alt="">
</a>
<span><?php echo ($user['wechat_name']); ?></span>
<a href="javascript:void(0);" id="screen" class="font-sm pos-right">
<?php if($_SESSION['is_sim'] == 1): ?>切换模拟盘
                <?php else: ?>
                切换实盘赚翻天<?php endif; ?>



    </a>
</div>
    <div class="account-top-view text-center">
         <?php if($_SESSION['is_sim'] == 1): ?><p class="font-sm">余额</p>
                <p class="account-total"><?php echo ($user['money']); ?></p>
                <?php else: ?>
                 <p class="font-sm">模拟盘余额</p>
                <p class="account-total"><?php echo ($user['coin']); ?></p><?php endif; ?>

       
<?php if($_SESSION['is_sim'] == 1): ?><span class="span-right">累计交易：<?php echo ($total['count']); ?>笔<p>累计流水：<?php if($total['sum'] == ''): ?>0.00<?php else: echo ($total['sum']); endif; ?> 元</p></span>
    <span class="span-left">今日交易：<?php echo ($today['count']); ?>笔<p>今日盈利：<?php if($today['sum'] == ''): ?>0.00<?php else: ?>

<?php echo $today['sum']-$today['lastsum']; endif; ?> 元</p></span>
 <?php else: ?>
        <span class="span-right">累计模拟交易：<?php echo ($total['count']); ?>笔<p>累计模拟流水：<?php if($total['sum'] == ''): ?>0.00<?php else: echo ($total['sum']); endif; ?>元</p></span>
		<span class="span-left">今日模拟交易：<?php echo ($today['count']); ?>笔<p>今日模拟盈利：<?php if($today['sum'] == ''): ?>0.00<?php else: echo $today['sum']-$today['lastsum']; endif; ?>元</p></span><?php endif; ?>      
    </div>
<div class="water">
<div class="water-1"></div>
<div class="water-2"></div>
</div>
    <div class="wrapper investrecord-wrapper">
        <!-- 投资记录 S -->
    <table class="rec-table rec-table6" id="all_list">
        <tr class="rec-tr">
            <th class="rec-th">资产类型</th>
            <th class="rec-th">涨/跌</th>
            <th class="rec-th">到期时间</th> 
			<th class="rec-th">买入金额</th>
			<th class="rec-th">盈利情况</th> 
			<th class="rec-th">订单状态</th> 
        </tr>
    </table>
    <!-- 投资记录 E -->
<div class="def-p com-agreement fz12 am-unchecked mt10 hide" id="cash_tips">
<span class="vam">提现审核时间为工作日9:00-17:00。通过审核后，提现资金将在10分钟内到账。</span>
</div>
<div class="com-empty hide"><div class="come-txt"></div></div> 
<div class="more-btn hide">
<a href="javascript:void(0);" style="display: block;"></a>
<div class="loading">
<span id="floatingBarsG2" class="floatingBarsG"></span><span>加载中...</span>
</div>
</div>
</div> 
<div class="loading-wrapper" style="display: none;">
<div class="loading-area">
<div id="floatingBarsG1" class="floatingBarsG"></div>
<p id="msg">登录中...</p> 
</div>
<div class="mask" style="opacity: 0.3;"></div>
</div>
<script type='text/javascript'>var ROOT = "";</script>
<script src="<?php echo RES;?>/jinrong/Mobile/Public/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/jinrong/Mobile/Public/js/common.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/jinrong/Mobile/Public/js/history.js"></script>


<script type="text/javascript">
$(function(){
    $('.jz-footer ul a').removeClass('active');   
})</script>

<link rel="stylesheet" href="<?php echo RES;?>/jinrong/Mobile/Public/images/iconfont/iconfont.css">
<style>

    .jz-footer {
        height: 56px;
        bottom: 0;
         border-top: 0;
        box-shadow: 0 -3px 3px rgba(5,5,5,0.05);
        background: #3c3b3b!important;
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fafafa), to(#fafafa));
    }
    .foot_nav li a{
        color:#fff;
    }
</style>
<footer class="jz-footer">

    <ul class="foot_nav jz-flex-row font-lg">
        <li class="jz-flex-col"> <a class="bd active" href="<?php echo U('Trading/index');?>"><i class="jz-icon icon-conduct-null"></i><span>交易</span></a></li>
        <!--<li class="jz-flex-col"> <a class="bd " href="<?php echo U('Trading/dice');?>"><i class="jz-icon iconfont icone-21466"></i><span>玩色子</span></a></li>-->
        <li class="jz-flex-col"><a class="bd " href="<?php echo U('User/insurance');?>"><i class="jz-icon new_icon-zhibo2"></i><span>新手教程</span></a> </li>
        <!--<li class="jz-flex-col"><a class="bd " href="<?php echo U('Trading/jueshengquan');?>"><i class="jz-icon icon-friends01"></i><span>决胜圈</span></a> </li>-->
        <li class="jz-flex-col"><a class="bd " href="<?php echo U('User/invite');?>"><i class="jz-icon icon-vip04"></i><span>全民经纪人</span></a> </li>
		<li class="jz-flex-col"><a class="bd " href="<?php echo U('User/private_person');?>"><i class="jz-icon icon-accounts-null "></i><span>账户</span></a> </li> 

    </ul>

</footer>

</body>
</html>