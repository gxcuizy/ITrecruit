<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<?php $path = '/ITrecruit/Public/Home'; ?>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo ($path); ?>/images/favicon.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>操作成功跳转提示信息</title>
    <link href="<?php echo ($path); ?>/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        *{ padding: 0; margin: 0; }/*290C0C*/
        body{ background: #290C0C; font-family: '微软雅黑'; color: #fff; font-size: 16px; }
        .system-message{ padding: 24px 48px;margin-top:100px;}
        .system-message h1{ font-size: 80px; font-weight: normal; line-height: 120px; margin-bottom: 12px }
        .system-message .jump{ padding-top: 10px;margin-bottom:20px}
        .system-message .jump a{ color: #333;}
        .system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
        .system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
        #wait {
            font-size:46px;
        }
        #btn-stop,#href{
            display: inline-block;
            margin-right: 10px;
            font-size: 16px;
            line-height: 18px;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            border: 0 none;
            background-color: #8B0000;
            padding: 10px 20px;
            color: #fff;
            font-weight: bold;
            border-color: transparent;
            text-decoration:none;
        }
         
        #btn-stop:hover,#href:hover{
            background-color: #ff0000;
        }
    </style>
    </head>
    <body>
        <div class="container">
            <div class="system-message" align="center">
                <h2>恭喜您！IT招聘网提示您：<br /><br /><?php echo($message); ?></h2>
                <p class="detail"></p>
                <p class="jump">
                    <b id="wait"><?php echo($waitSecond); ?></b> 秒后页面将自动跳转
                </p>
                <div>
                    <a id="href" id="btn-now" href="<?php echo($jumpUrl); ?>">立即跳转</a>
                    <button id="btn-stop" type="button" onclick="stop()">停止跳转</button>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        (function(){
            var wait = document.getElementById('wait'),href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
             	if(time <= 0) {
             		location.href = href;
             		clearInterval(interval);
             	};
            }, 1000);
            window.stop = function (){
                console.log(111);
                clearInterval(interval);
            }
        })();
        </script>
    </body>
</html>