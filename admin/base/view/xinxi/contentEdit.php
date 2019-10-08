<ul class="nav nav-tabs">
    {if condition="checkPath('xinxi/index')"}
    <li><a href="{:Url('xinxi/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('xinxi/contentAdd')"}
    <li><a href="{:Url('xinxi/contentAdd')}">添加信息</a></li>
    {/if}
    {if condition="checkPath('xinxi/contentEdit',['id'=>$info.id])"}
    <li class="active"><a href="{:Url('xinxi/contentEdit',['id'=>$info.id])}">修改信息</a></li>
    {/if}
</ul>
 <form  class="form-horizontal" action="{:url('xinxi/contentEdit',['id'=>$info.id])}" method="post">
    {include file="form:form_xinxi" /}
</form>
