<ul class="nav nav-tabs">
    <li class="active"><a href="javascript:;">主席信访</a></li>
</ul>
 <div class="layui-form">

    <div class="cf well form-search row">

         <form  method="get">
             <div class="fl">
                 <div class="btn-group">
                     <input name="name" value="{:input('name')}" placeholder="输入发件人名" class="form-control"  type="text">
                 </div>
                 <div class="btn-group">
                     <input name="phone" value="{:input('phone')}" placeholder="输入手机号码" class="form-control"  type="text">
                 </div>
                 <div class="btn-group">
                     <input name="message" value="{:input('message')}" placeholder="输入发件内容" class="form-control"  type="text">
                 </div>
                 <div class="btn-group">
                     <button type="submit" class="btn btn-success">查询</button>
                 </div>
             </div>
         </form>
     </div>
     <span class="btn btn-success batch" data-msg="确定要删除选中留言吗" data-url="{:url('Message/batchDelMessage')}" >删除</span>
     <span class="btn btn-success batch" data-url="{:url('Message/batchReadMessage')}">标记已回复</span>

     <table class="table table-hover table-bordered table-list" id="menus-table">
            <thead>
            <tr>
                <th width="15"><input type="checkbox"  lay-skin="primary" lay-filter="allChoose">
                <th width="70">发件人名</th>
                <th width="90">手机号码</th>
                <th width="90">电子邮箱</th>
                <th width="250">发件内容</th>
                <th width="90">发件时间 <span order="sendtime" class="order-sort"> </span></th>
                <th width="90">状态{if $unread_num}<span class="layui-badge">{$unread_num}</span>{/if}</th>
                <th width="90">操作</th>
            </tr>
            </thead>
            <tbody>
            {foreach $list as $v}
                <tr>
                    <td><input type="checkbox" name="batch_id" data-id="{$v.id}" lay-skin="primary" lay-filter="itemChoose"></td>
                    <td>{$v.name}</td>
                    <td>{$v.phone}</td>
                    <td>{$v.email}</td>
                    <td>{$v.message}</td>
                    <td>{$v.sendtime|date="Y-m-d H:i:s",###}</td>
                    <td>
                        {if condition="$v.isstate eq 1"}
                            <a  class="span">已回复</a>
                        {else/}
                            <a  class="span-post" post-url="{:url('message/messageIsstate',['id'=>$v['id']])}" style="color:red">未回复</a>
                        {/if}
                    </td>
                    <td>
                        {if condition="checkPath('message/messageDel',['id'=>$v['id']])"}
                            <a  class="span-post" post-msg="确定要删除吗" post-url="{:url('message/messageDel',['id'=>$v['id']])}">删除</a>
                        {/if}
                        {if condition="$v.isstate neq 1"}
                        <a  href="{:url('message/messageEdit',['id'=>$v['id']])}">回复</a>
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