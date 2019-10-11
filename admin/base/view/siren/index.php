<ul class="nav nav-tabs">
    {if condition="checkPath('siren/index')"}
    <li  class="active"><a href="{:Url('siren/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('siren/contentAdd')"}
    <li><a href="{:Url('siren/contentAdd')}">添加信息</a></li>
    {/if}
</ul>
 <div class="layui-form">


    <div class="cf well form-search row ">

         <form  method="get">
             <div class="fl">
                 <div class="btn-group">
                     <input name="title" value="{:input('title')}" placeholder="信息标题" class="form-control"  type="text">
                 </div>
                 <div class="btn-group layui-form">
                     <select name="cate_id" class="form-control" lay-search>
                         <option value="">全部子菜单</option>
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
     <span class="btn btn-success batch" data-msg="确定要删除选中信息吗" data-url="{:url('siren/batchDelContent')}">删除</span>
        <table class="table table-hover table-bordered table-list" id="menus-table">
            <thead>
            <tr>
                <th width="15"><input type="checkbox"  lay-skin="primary" lay-filter="allChoose">
                <th width="80">图片</th>
                <th width="80">信息标题</th>
                <th width="80">子菜单</th>
                <th width="80">排序<span order="sort" class="order-sort"> </span></th>
                <th width="50">推荐</th>
                <th width="50">添加时间</th>
                <th width="80">操作</th>
            </tr>
            </thead>
            <tbody>
            {foreach $list as $v}
                <tr>
                    <td><input type="checkbox" name="batch_id" data-id="{$v.id}" lay-skin="primary" lay-filter="itemChoose"></td>
                    <td ><img class="mini-image" src="{$v.img?'__ImagePath__'.$v.img:''}" style="width:80px"></td>
                    <td>{$v.title}</td>
                    <td>{$v.name}</td>
                    <td>
                        {if condition="checkPath('siren/inputContent')"}
                        <input class="form-control change-data short-input"  post-id="{$v.id}" post-url="{:url('siren/inputContent')}" data-name="sort" value="{$v.sort}">
                        {else}
                        {$v.sort}
                        {/if}
                    </td>

                    <td>
                        {if condition="checkPath('siren/contentIsgood',['id'=>$v.id])"}
                        <input type="checkbox" data-name="is_good" data-url="{:url('siren/contentIsgood',['id'=>$v.id])}" lay-skin="switch" lay-text="是|否" {$v.is_good == 1 ?'checked':''} data-value="1|0">
                        {else}
                        {$v.is_good == 1?'<span class="blue">是</span>':'<span class="red">否</span>'}
                        {/if}
                    </td>

                    <td>{$v.sendtime}</td>
                    <td>
                        {if condition="checkPath('siren/contentEdit',['id'=>$v['id']])"}
                        <a  href="{:url('siren/contentEdit',['id'=>$v['id'],'cate_id'=>$v['cate_id'],'mark'=>input('mark')])}">编辑</a>
                        {/if}
                        {if condition="checkPath('siren/contentDelete',['id'=>$v['id']])"}
                            <a  class="span-post" post-msg="确定要删除吗" post-url="{:url('siren/contentDelete',['id'=>$v['id'],'mark'=>input('mark')])}">删除</a>
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