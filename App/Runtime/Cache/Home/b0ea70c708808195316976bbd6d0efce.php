<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<?php $path = '/ITrecruit/Public/Home'; ?>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo ($path); ?>/images/favicon.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    
    <title>招聘管理-<?php echo ($sysInfo["title"]); ?></title>
  
    <style type="text/css">
      body { padding-top:60px; overflow-y:scroll;}
      form,div{
        margin:0;
        padding:0;
      }

      .online-resume{
        height:50px;
        margin-top:50px;
      }

      .resume-border{
        border:1px solid #dddddd;
      }

      #umessage{
        margin-top:10px;
        background-color:#eee;
      }
    </style>
    <script src="<?php echo ($path); ?>/js/jquery-1.8.3.min.js"></script>
    
    <!-- Bootstrap -->
    <link href="<?php echo ($path); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <script type="text/javascript">
    $(function(){
      $(".navbar-nav li").mousemove(function(){
        $(this).addClass('active');
        // alert('ok');
      }).mouseout(function(){
        $(this).removeClass('active');
      });
    });
    </script>
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container-fluid container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand glyphicon glyphicon-fire" href="<?php echo U('Home/Index/index');?>">IT招聘网</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo U('Home/Index/index');?>">首页 <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo U('Home/EnterpriseList/index');?>">企业列表</a></li>
        <li><a href="<?php echo U('Home/Apply/index');?>">招聘列表</a></li>
        <li><a href="<?php echo U('Home/Resume/index');?>">简历列表</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if($_SESSION['ITUser']['type'] == '0'): ?><!-- 求职者入口 -->
          <li><a href="<?php echo U('Home/Jobhunter/index');?>"><?php echo ($_SESSION['ITUser']['username']); ?></a></li>
          <li><a href="<?php echo U('Home/Login/loginOut');?>">退出</a></li>
        <?php elseif($_SESSION['ITUser']['type'] == '1'): ?>
        <!-- 企业入口 -->
          <li><a href="<?php echo U('Home/Enterprise/index');?>"><?php echo ($_SESSION['ITUser']['username']); ?></a></li>
          <li><a href="<?php echo U('Home/Login/loginOut');?>">退出</a></li>
        <?php else: ?>
        <!-- 未登陆入口 -->
          <li>
            <a data-toggle="dropdown" href="">登陆</a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo U('Home/Login/jobLogin');?>">求职者登陆</a></li>
              <li><a href="<?php echo U('Home/Login/enLogin');?>">企业登陆</a></li>
            </ul>
          </li>
          <li>
            <a data-toggle="dropdown" href="">注册</a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo U('Home/Register/jobRegister');?>">求职者注册</a></li>
              <li><a href="<?php echo U('Home/Register/enRegister');?>">企业注册</a></li>
            </ul>
          </li><?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  
    <div class="container">
      
    <div class="col-md-3" style="border-top:1px solid #ddd;">
      <div style="margin-top:10px;">
        <img src="<?php echo ($path); ?>/uploads/enterprise/photo/<?php echo ($_SESSION['ITUser']['en_photo']); ?>" alt="头像" class="img-circle center-block" width="160" height="160" style="margin-bottom:10px;">
        <p class="text-muted text-center"><strong><?php echo ($_SESSION['ITUser']['en_name']); ?></strong></p>
      </div>
      <ul class="nav nav-pills nav-stacked">
        <li role="presentation"><a href="<?php echo U('Home/Enterprise/index');?>">个人中心</a></li>
        <li role="presentation" class="active"><a href="<?php echo U('Home/EnApply/listApply');?>">招聘管理</a></li>
        <li role="presentation"><a href="<?php echo U('Home/DealResume/index');?>">简历管理</a></li>
        <li role="presentation"><a href="<?php echo U('Home/Enterprise/setEnInfo');?>">企业管理</a></li>
        <li role="presentation"><a href="<?php echo U('Home/Enterprise/updatePw');?>">修改密码</a></li>
      </ul>
    </div>
  
      
    <div class="col-md-9 resume-border">
      <div class="online-resume">
        <h3>企业招聘信息管理列表</h3>
      </div>
      <!-- 简历右边导航选项卡 -->
      <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="<?php echo U('Home/EnApply/listApply');?>">招聘职位列表</a></li>
        <li role="presentation"><a href="<?php echo U('Home/EnApply/addApply');?>">发布招聘信息</a></li>
      </ul>
      <!-- 简历右边导航选项卡结束 -->
      <!-- 我的信息 -->
      <div class="alert alert-info" role="alert" id="umessage">
        <span>我发布的招聘职位列表</span>
      </div>
      <!-- 基本信息 -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <span style="margin-right:20px;"><strong> <a href="<?php echo U('Home/EnApply/listApply');?>">全部招聘</a> </strong></span>
          <span style="margin-right:20px;"><strong> <a href="<?php echo U('Home/EnApply/listApply','status=0');?>">正在招聘</a> </strong></span>
          <span style="margin-right:20px;"><strong> <a href="<?php echo U('Home/EnApply/listApply','status=1');?>">暂停招聘</a> </strong></span>
        </div>
        <div class="panel-body table-responsive">
          <table class="table table-hover">
            <thead>
              <tr class="success">
                <th>职位名称</th>
                <th>职位状态</th>
                <th>查看次数</th>
                <th>应聘人数</th>
                <th>发布时间</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <?php if(is_array($applyList)): $i = 0; $__LIST__ = $applyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td>
                    <span><a href="<?php echo U('Home/Apply/applyDetails','id='.$vo['id']);?>" target="_blank"><?php echo ($vo["job_name"]); ?></a></span>
                  </td>
                  <td>
                    <span>
                      <?php if($vo["apply_status"] == '0'): ?>正在招聘
                      <?php else: ?>
                        招聘结束<?php endif; ?>
                    </span>
                  </td>
                  <td>
                    <span><?php echo ($vo["browse_times"]); ?></span>
                  </td>
                  <td>
                    <span><?php echo ($vo["apply_times"]); ?></span>
                  </td>
                  <td>
                    <span><?php echo (date("Y-m-d H:i:s",$vo["publish_time"])); ?></span>
                  </td>
                  <td>
                    <?php if($vo["apply_status"] == '0'): ?><span><a type="button" class="btn btn-danger btn-xs" href="<?php echo U('Home/EnApply/stopApply','aid='.$vo['id']);?>">停止招聘</a></span>
                      <a href="<?php echo U('Home/EnApply/delApply','aid='.$vo['id']);?>" title="删除这条招聘信息" onclick="if (confirm('确定要删除吗？')) return true; else return false;"><span class="glyphicon glyphicon-trash" style="margin-left:10px;"></span></a>
                    <?php else: ?>
                      <span><a type="button" class="btn btn-info btn-xs" href="<?php echo U('Home/EnApply/startApply','aid='.$vo['id']);?>">继续招聘</a></span>
                      <a href="<?php echo U('Home/EnApply/delApply','aid='.$vo['id']);?>" title="删除这条招聘信息" onclick="if (confirm('确定要删除吗？')) return true; else return false;"><span class="glyphicon glyphicon-trash" style="margin-left:10px;"></span></a><?php endif; ?>
                  </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              <?php $status = $_GET['status']; ?>
              <tr>
                <td colspan="6" align="center">
                  <ul class="pagination">
                    <?php if(($page) == "1"): ?><li class="disabled">
                      <a href="#">
                        <span aria-hidden="true">上一页</span>
                      </a>
                    </li>
                    <?php else: ?>
                      <li>   
                        <a href="<?php echo U('Home/EnApply/listApply/',array('page'=>($page-1),'status'=>$status));?>">
                          <span aria-hidden="true">上一页</span>
                        </a>
                      </li><?php endif; ?>
                    <!-- 页码小于8 -->            
                    <?php if(($pageCount) < "8"): $__FOR_START_8567__=1;$__FOR_END_8567__=$pageCount+1;for($i=$__FOR_START_8567__;$i < $__FOR_END_8567__;$i+=1){ ?><li <?php if(($i) == $page): ?>class="active"<?php endif; ?>>
                          <a href="<?php echo U('Home/EnApply/listApply/',array('page'=>$i,'status'=>$status));?>"><?php echo ($i); ?></a>
                        </li><?php } endif; ?>
                    <?php if(($page == $pageCount) OR ($pageCount == '0')): ?><li class="disabled">
                      <a href="#">
                        <span aria-hidden="true">下一页</span>
                      </a>
                    </li>
                    <?php else: ?>
                      <li>
                        <a href="<?php echo U('Home/EnApply/listApply/',array('page'=>($page+1),'status'=>$status));?>">
                          <span aria-hidden="true">下一页</span>
                        </a>
                      </li><?php endif; ?>
                  </ul>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- 基本信息面板结束 -->
    </div>
  
      
    <div class="col-md-12" style="margin-top:20px;">
	<p class="text-center">地址: <?php echo ($sysInfo["footer_address"]); ?></p>
	<p class="text-center">版权所有: <?php echo ($sysInfo["footer_copyright"]); ?></p>
</div>
  
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="<?php echo ($path); ?>/js/jquery.min.js"></script>
   <!-- <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo ($path); ?>/js/bootstrap.min.js"></script>
  </body>
</html>