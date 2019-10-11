<ul class="nav nav-tabs">
    {if condition="checkPath('zixun/index')"}
    <li><a href="{:Url('zixun/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('zixun/contentAdd')"}
    <li><a href="{:Url('zixun/contentAdd')}">添加信息</a></li>
    {/if}
    {if condition="checkPath('zixun/contentEdit',['id'=>$info.id])"}
    <li class="active"><a href="{:Url('zixun/contentEdit',['id'=>$info.id])}">修改信息</a></li>
    {/if}
</ul>
 <form  class="form-horizontal" action="{:url('zixun/contentEdit',['id'=>$info.id])}" method="post">
    {include file="form:form_zixun" /}
</form>
