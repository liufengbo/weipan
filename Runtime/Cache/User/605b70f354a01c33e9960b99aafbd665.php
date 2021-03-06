<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<title>您需要登录后才可以使用本功能</title>
<link href="<?php echo RES;?>/login/resource/font/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo RES;?>/login/css/login.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo RES;?>/login/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/login/js/common.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/login/js/jquery.tscookie.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/login/js/jquery.validation.min.js"></script>
<script src="<?php echo RES;?>/login/resource/js/jquery.supersized.min.js" ></script>
<script src="<?php echo RES;?>/login/resource/js/jquery.progressBar.js" type="text/javascript"></script>
</head>
<body>
 <!--v3-v12-->
<div class="login-layout">
  <div class="top">
    <h5><em></em></h5>
    <h2>平台管理中心</h2>
    <h6 style="color:#f0581d;display:none;" id="showmsg">用户名密码错误</h6>
  </div>
  <form method="post" id="form_login">
    <input type='hidden' name='formhash' value='jU4ZJ_WhPEDIfAcKFpb-f9armpW6siv' />    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="SiteUrl" id="SiteUrl" value="http://www.jswanhuatong.com/" />
    <div class="lock-holder">
      <div class="form-group pull-left input-username">
        
          <label>账号</label>
          <input name="user_name" id="user_name" autocomplete="off" type="text" class="input-text" value="" required>
          
      </div>
      <i class="fa fa-ellipsis-h dot-left"></i> <i class="fa fa-ellipsis-h dot-right"></i>
      <div class="form-group pull-right input-password-box">
          <label>密码</label>
          <input name="password" id="password" class="input-text" autocomplete="off" type="password" required pattern="[\S]{6}[\S]*" title="密码不少于6个字符">
      </div>
    </div>
    <div class="avatar"><img src="<?php echo RES;?>/login/images/login/admin.png" alt=""></div>
    <div class="submit"> <span>
      
      <span>
     
      <input name="" class="input-button btn-submit" type="button" value="登录">
      </span> </div>
      <div class="submit2"></div>
  </form>
  <div class="bottom">
  </div>
</div>
<script>
$(function(){
        $.supersized({

        // 功能
        slide_interval     : 4000,    
        transition         : 1,    
        transition_speed   : 1000,    
        performance        : 1,    

        // 大小和位置
        min_width          : 0,    
        min_height         : 0,    
        vertical_center    : 1,    
        horizontal_center  : 1,    
        fit_always         : 0,    
        fit_portrait       : 1,    
        fit_landscape      : 0,    

        // 组件
        slide_links        : 'blank',    
        slides             : [    
                                 {image : '/Public/User/login/images/login/1.jpg'},
                                 {image : '/Public/User/login/images/login/2.jpg'},
                                 {image : '/Public/User/login/images/login/3.jpg'},
								 {image : '/Public/User/login/images/login/4.jpg'},
								 {image : '/Public/User/login/images/login/5.jpg'}
                       ]

    });
	//显示隐藏验证码
    $("#hide").click(function(){
        $(".code").fadeOut("slow");
    });
    $("#captcha").focus(function(){
        $(".code").fadeIn("fast");
    });
    //跳出框架在主窗口登录
   if(top.location!=this.location)	top.location=this.location;
    $('#user_name').focus();
    if ($.browser.msie && ($.browser.version=="6.0" || $.browser.version=="7.0")){
        window.location.href=' <?php echo U("User/ie6update");?>';
       
    }
    $("#captcha").nc_placeholder();
	//动画登录
    $('.btn-submit').click(function(e){
      //提示信息\
      if($("#user_name").val()==''){
        $("#showmsg").show().html("登录名不能为空");
        return false;
      }
      if($("#password").val()==''){
        $("#showmsg").show().html("密码不能为空");
        return false;
      }
      $("#showmsg").hide();

            $('.input-username,dot-left').addClass('animated fadeOutRight')
            $('.input-password-box,dot-right').addClass('animated fadeOutLeft')
            $('.btn-submit').addClass('animated fadeOutUp')
            setTimeout(function () {
                      $('.avatar').addClass('avatar-top');
                      $('.submit').hide();
                      $('.submit2').html('<div class="progress"><div class="progress-bar progress-bar-success" aria-valuetransitiongoal="100"></div></div>');
                      $('.progress .progress-bar').progressbar({
                          done : function() {
                            ajax_submit();
                            //$('#form_login').submit();
                          }
                      }); 
              },
          300);

          });

    // 回车提交表单
    $('#form_login').keydown(function(event){
        if (event.keyCode == 13) {
            $('.btn-submit').click();
        }
    });
    function ajax_submit(){
      var param={};
      param.username=$("#user_name").val();
      param.password=$("#password").val();

      $.ajax({
        url:'<?php echo U("User/login");?>',
        type:'post',
        data:param,
        dataType:'json',
        beforeSend:function(){
          $("#user_name").attr("disabled","true");
          $("#password").attr("disabled","true");
         
        },
        success:function(data){
          if(data.statusCode==0){
            window.location.href='<?php echo U("Index/index");?>';
          }
          else{
           // $("#alertInfo").html(data.message).stop(true,true).show().fadeOut(6000);
            $("#showmsg").show().html("用户名或密码错误！请刷新重试");
            
          }
          $("#user_name").removeAttr("disabled");
          $("#password").removeAttr("disabled");
          
        },
        error:function(){
          //$("#alertInfo").html("用户名或密码错误！").stop(true,true).show().fadeOut(6000);
          $("#showmsg").show().html("用户名或密码错误！请刷新重试");
          $("#user_name").removeAttr("disabled");
          $("#password").removeAttr("disabled");
          
        }
      });
      return false;

    }
});

</script>
</body>
</html>