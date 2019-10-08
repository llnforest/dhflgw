<ul class="nav nav-tabs">
    {if condition="checkPath('xiazai/index')"}
    <li><a href="{:Url('xiazai/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('xiazai/contentAdd')"}
    <li><a href="{:Url('xiazai/contentAdd')}">添加信息</a></li>
    {/if}
    {if condition="checkPath('xiazai/contentEdit',['id'=>$info.id])"}
    <li class="active"><a href="{:Url('xiazai/contentEdit',['id'=>$info.id])}">修改信息</a></li>
    {/if}
</ul>
 <form  class="form-horizontal" action="{:url('xiazai/contentEdit',['id'=>$info.id])}" method="post">
    {include file="form:form_xiazai" /}
</form>
