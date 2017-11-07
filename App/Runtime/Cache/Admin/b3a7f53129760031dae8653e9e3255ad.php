<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="/ITrecruit/Admin/Hot/index" method="post">
    <input type="hidden" name="pageNum" value="<?php echo ((isset($currentPage) && ($currentPage !== ""))?($currentPage):'1'); ?>" />
    <input type="hidden" name="numPerPage" value="<?php echo ($numPerPage); ?>" /><!--每页显示多少条-->
    <input type="hidden" name="_order" value="<?php echo ($_REQUEST['_order']); ?>"/>
    <input type="hidden" name="_sort" value="<?php echo ($_REQUEST['_sort']); ?>"/>
</form>
<div class="pageHeader">
    <form rel="pagerForm" onsubmit="return navTabSearch(this);" method="post">
        <input type="hidden" name="numPerPage" value="<?php echo ($numPerPage); ?>" /><!--每页显示多少条-->
        <div class="searchBar">
            <table class="searchContent">
                <tr>
                    <td>
                        请输入热门名进行搜索：<input type="text" name="hot_name" value="<?php echo ($_POST['hot_name']); ?>" /> 
                    </td>
                    <td>
                        <div class="buttonActive"><div class="buttonContent"><button type="submit">搜索</button></div></div>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
<div class="pageContent">
    <div class="panelBar">
        <ul class="toolBar">
            <li><a class="add" href="/ITrecruit/Admin/Hot/add" target="dialog" title="添加企业用户"><span>添加</span></a></li>
            <li><a class="delete" href="/ITrecruit/Admin/Hot/del/id/{item_id}/navTabId/listHot" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
            <li><a class="edit" href="/ITrecruit/Admin/Hot/edit/id/{item_id}" target="dialog" title="修改企业用户信息"><span>修改</span></a></li>
            <li><a class="icon"  href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
        </ul>
    </div>
    <table class="table" width="100%" layoutH="110" nowrapTD="false">
        <thead>
            <tr>
                <th align="center" width="50">id</th>
                <th>热点名</th>
                <th>热点类型</th>
                <th>热点等级</th>
                <th>添加时间</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="item_id" rel="<?php echo ($vo["id"]); ?>">
                    <td><?php echo ($vo["id"]); ?></td>
                    <td><?php echo ($vo["hot_name"]); ?></td>
                    <td>
                        <?php if($vo["type"] == 0): ?>职位
                        <?php elseif($vo["type"] == 1): ?>
                            企业
                        <?php elseif($vo["type"] == 2): ?>
                            简历<?php endif; ?>
                    </td>
                    <td><?php echo ($vo["hot_level"]); ?></td>
                    <td><?php echo (date("Y-m-d H:i:s",$vo["hot_time"])); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="panelBar">
        <div class="pages">
            <span>显示</span>
            <select class="combox" name="numPerPage" onchange="navTabPageBreak(<?php echo (C("TMPL_L_DELIM")); ?>numPerPage:this.value<?php echo (C("TMPL_R_DELIM")); ?>)">
                <option value="5" <?php if($numPerPage == 5): ?>selected<?php endif; ?>>5</option>
                <option value="10" <?php if($numPerPage == 10): ?>selected<?php endif; ?>>10</option>
                <option value="15" <?php if($numPerPage == 15): ?>selected<?php endif; ?>>15</option>
                <option value="20" <?php if($numPerPage == 20): ?>selected<?php endif; ?>>20</option>
                <option value="25" <?php if($numPerPage == 25): ?>selected<?php endif; ?>>25</option>
                <option value="30" <?php if($numPerPage == 30): ?>selected<?php endif; ?>>30</option>
            </select>
            <span>共<?php echo ($totalCount); ?>条</span>
        </div>
        <div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="<?php echo ($pageNumShown); ?>" currentPage="<?php echo ($currentPage); ?>"></div>

    </div>
</div>