<ul class="nav nav-tabs">
    {if condition="checkPath('link/index')"}
    <li class="active"><a href="{:Url('link/index')}">站点链接列表</a></li>
    {/if}
    {if condition="checkPath('link/linkAdd')"}
    <li><a href="{:Url('link/linkAdd')}">添加站点链接</a></li>
    {/if}
</ul>
 <div class="layui-form">
     <div class="cf well form-search row ">

         <form  method="get">
             <div class="fl">
                 <div class="btn-group">
                     <input name="name" value="{:input('name')}" placeholder="网站名称" class="form-control"  type="text">
                 </div>
                 <div class="btn-group layui-form">
                     <select name="cate_id" class="form-control" lay-search>
                         <option value="">全部分类</option>
                         {foreach $cateList as $item}
                         <option value="{$item.id}" {if input('cate_id') == $item.id}selected{/if}>{$item.name}</option>
                         {/foreach}
                     </select>
                 </div>
                 <div class="btn-group">
                     <input type="hidden" name="mark" value="{:input('mark')}">
                     <button type="submit" class="btn btn-success">查询</button>
                 </div>
             </div>
         </form>
     </div>
        <span  class="btn btn-success batch" data-msg="确定要删除选中信息吗" data-url="{:url('link/batchDelLink')}" >删除</span>
        <table class="table table-hover table-bordered table-list layui-table" id="menus-table">
            <thead>
            <tr>
                <th width="15"><input type="checkbox"  lay-skin="primary" lay-filter="allChoose">
                <th width="80">图片</th>
                <th width="80">分类</th>
                <th width="250">网站名称</th>
                <th width="250">网站地址</th>
                <th width="50">排序<span order="sort" class="order-sort"> </span></th>
                <th width="50">操作</th>
            </tr>
            </thead>
            <tbody>
            {foreach $list as $v}
                <tr>
                    <td><input type="checkbox" name="batch_id" data-id="{$v.id}" lay-skin="primary" lay-filter="itemChoose"></td>
                    <td ><img class="mini-image" src="{$v.img?'__ImagePath__'.$v.img:''}" style="width:80px"></td>
                    <td>{$v.cate_name}</td>
                    <td>{$v.name}</td>
                    <td>{$v.linkurl}</td>
                    <td>
                        {if condition="checkPath('link/inputLink')"}
                        <input class="form-control change-data short-input"  post-id="{$v.id}" post-url="{:url('link/inputLink')}" data-name="sort" value="{$v.sort}">
                        {else}
                        {$v.sort}
                        {/if}
                    </td>
                    <td>
                        {if condition="checkPath('link/linkEdit',['id'=>$v['id']])"}
                        <a  href="{:url('link/linkEdit',['id'=>$v['id']])}">编辑</a>
                        {/if}
                        {if condition="checkPath('link/linkDelete',['id'=>$v['id']])"}
                            <a  class="span-post" post-msg="确定要删除吗" post-url="{:url('link/linkDelete',['id'=>$v['id']])}">删除</a>
                        {/if}
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="text-center">
        {$page}
    </div>
