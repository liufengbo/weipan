<?php if (!defined('THINK_PATH')) exit();?>


<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link type="text/css" href="<?php echo RES;?>/jinrong/Mobile/weiyun/css/public.css?v=110" rel="stylesheet" />
    <script>
        //页面加载效果
        function loadpage() {
            var load_html = '<div class="page_load" id="page_losd" style="position:fixed; width:100%; height:100%; background:#000000; z-index:999999; top:0; left:0; bottom:0; right:0;">' +
                '<div class="loader show">' +
                '<div class="act">' +
                '  <div class="spinner">  <div class="double-bounce1"></div>  <div class="double-bounce2"></div></div>' +
                ' </div>' +
                '<div class="bg"></div>' +
                '  <span class="text">页面加载中...</span>' +
                '</div></div>'
            document.write(load_html);

        }
        loadpage();
        document.onreadystatechange = loadpagecom;
        //加载状态为complete时移除loading效果
        function loadpagecom(close) {
            if (close || document.readyState == "complete") {
                var loadingMask = document.getElementById('page_losd');
                if (!loadingMask) return;
                loadingMask.parentNode.removeChild(loadingMask);
            }
        }
    </script>
    <link href="http://at.alicdn.com/t/font_2hn9yxdur6n7b9.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo RES;?>/jinrong/Mobile/Public/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo RES;?>/jinrong/Mobile/weiyun/js/vue.min.js"></script>
    <script src="<?php echo RES;?>/jinrong/Mobile/weiyun/js/public.js?v=110"></script>
    <script src="<?php echo RES;?>/jinrong/Mobile/weiyun/js/layer.js"></script>
    <link type="text/css" href="<?php echo RES;?>/jinrong/Mobile/weiyun/css/layer.css" rel="stylesheet" />


    <title>卡券详情</title>
    <link type="text/css" href="<?php echo RES;?>/jinrong/Mobile/weiyun/css/detail.css?v=110" rel="stylesheet" />
    <style>
        .card-coupons{ padding: 15px;}
        .coupon-block{ background: #dfb938; color: #303030; position: relative; padding: 0.8em 0;}
        .coupon-block>h3{ color: #303030; text-align: center; font-size: 1.2em;}
        .coupon-block .date-riqi{ position: relative; box-sizing: border-box; padding: 0 10px;}
        .coupon-block .date-riqi>hr{ margin:6px 0 0 0; border-color:#303030 }
        .coupon-block .date-riqi>div{     background: #dfb938;
            position: absolute;
            left: 0;
            top: -5px;
            width: 80%;
            margin-left: 10%;
            text-align: center;
            font-size: 11px;}

        .moneyValue{ font-size: 4.3em; font-weight: bold; padding: 0.5em 0 0.1em 10px;}
        .moneyValue>small{ font-weight: normal; font-size: 0.3em; margin-left: 0.2em;}
        .coupon-block>p{ color: #847033; padding-left: 12px; font-size: 0.9em;}
        .top-y{ position: absolute; background: #000; top: 0; width: 100%; background: url("<?php echo RES;?>/jinrong/Mobile/weiyun/images/top-y.jpg")  repeat-x}
        .bot-y{ position: absolute; background: #000; bottom: 0; width: 100%; background: url("<?php echo RES;?>/jinrong/Mobile/weiyun/images/bot-y.jpg")  repeat-x bottom;}
        .coupon-block>img{ width: 80px; position: absolute; right: 15px; bottom: 30px;}
        .suliang{ margin: 12px 0; background: #1e1e1e; line-height: 2.6em; font-size: 0.9em; padding: 0 12px;}
        .suliang span{ color: #dfb938}
        .smguize{background: #1e1e1e;color: #aeaeae; padding: 10px; margin-bottom: 68px;}
        .smguize h4{ margin: 0; font-size: 1em; color: #aeaeae;}
        .smguize p{ color: #6e6e6e; font-size: 0.9em; line-height: 2.2em;}
        .meue-nav{ position: fixed; bottom: 0; background: #1e1e1e; border-top:2px solid #484848; width: 100%; left: 0; height: 60px;}
        .meue-nav a{ background:#dfb938; color: #000; display: block; width: 140px; margin: 0 auto; text-align: center; border-radius: 3px; line-height: 3em; margin-top: 7px;}
    </style>
    <script type="text/javascript">
        var vue;
        $(function () {
            vue=new Vue({
                el: 'body',
                data: {
                    item: null,
                },
                methods: {
                    init: function () {
                        this.item = window.sessionStorage.getItem("coupon");
                        console.log(this.item);
                        this.item = JSON.parse(this.item);
                        if (this.item) {

                        } else {
                            console.log("数据不存在!")
                        }
                    },
                    getLocalTime: function (str) {
                        return getLocalTime(str)
                    },
                }
            })
            vue.init();

        })

    </script>
    <title>
        全民微云购
    </title></head>
<body>

<div class="card-coupons">
    <div class="coupon-block">
        <h3>{{item.coupon.name}}</h3>
        <div class="date-riqi">
            <hr>
            <hr>
            <div>有效期：{{item.add_time}}~{{item.over_time}}</div>
        </div>
        <div class="moneyValue">{{item.coupon.amount}}<small>元</small></div>
        <p><template v-if="item.SatisfyAmount>0">满{{item.coupon.satisfy_amount}}元使用</template></p>
        <p>使用范围：{{item.coupon.use_area}}</p>
        <div class="top-y">&nbsp;</div>
        <div class="bot-y">&nbsp;</div>
        <img src="<?php echo RES;?>/jinrong/Mobile/weiyun/images/Ymoney.png">
    </div>
    <div class="suliang">共 <span>{{item.count}}</span> 张</div>
    <div class="smguize">
        <h4>使用说明：</h4>
        <p>{{{item.coupon.remark}}}</p>
    </div>
    <div class="meue-nav" v-if="item.status==0"><a  href="/" >立即使用</a></div>
</div>



<div class="loader">
    <div class="act">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <div class="bg"></div>
</div>

</body>
</html>