<ul class="nav nav-tabs">
    {if condition="checkPath('mark/index')"}
    <li class="active"><a href="{:Url('mark/index')}">一级导航</a></li>
    {/if}
    {if condition="checkPath('mark/markAdd')"}
    <li><a href="{:Url('mark/markAdd')}">添加一级导航</a></li>
    {/if}
</ul>
 <div class="layui-form">
     <span class="btn btn-success batch" data-msg="确定要删除选中信息吗" data-url="{:url('mark/batchDelMark')}">删除</span>
     <table class="table table-hover table-bordered table-list" id="menus-table">
            <thead>
            <tr>
                <th width="15"><input type="checkbox"  lay-skin="primary" lay-filter="allChoose">
                <th width="80">图片</th>
                <th width="80">一级导航</th>
                <th width="80">标识</th>
                <th width="180">描述</th>
                <th width="80">排序<span order="sort" class="order-sort"> </span></th>
                <th width="80">操作</th>
            </tr>
            </thead>
            <tbody>
            {foreach $list as $v}
                <tr>
                    <td><input type="checkbox" name="batch_id" data-id="{$v.id}" lay-skin="primary" lay-filter="itemChoose"></td>

                    <td ><img class="mini-image" src="{$v.img?'__ImagePath__'.$v.img:''}" style="width:80px"></td>
                    <td>{$v.title}</td>
                    <td>{$v.mark}</td>
                    <td>{$v.remark}</td>
                    <td>
                        {if condition="checkPath('mark/inputMark')"}
                        <input class="form-control change-data short-input"  post-id="{$v.id}" post-url="{:url('mark/inputMark')}" data-name="sort" value="{$v.sort}">
                        {else}
                        {$v.sort}
                        {/if}
                    </td>
                    <td>
                        {if condition="checkPath('mark/markEdit',['id'=>$v['id']])"}
                        <a  href="{:url('mark/markEdit',['id'=>$v['id']])}">编辑</a>
                        {/if}
                        {if condition="checkPath('mark/markDelete',['id'=>$v['id']])"}
                            <a  class="span-post" post-msg="确定要删除吗" post-url="{:url('mark/markDelete',['id'=>$v['id']])}">删除</a>
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