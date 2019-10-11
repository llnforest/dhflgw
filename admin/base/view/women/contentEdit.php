<ul class="nav nav-tabs">
    {if condition="checkPath('women/index')"}
    <li><a href="{:Url('women/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('women/contentAdd')"}
    <li><a href="{:Url('women/contentAdd')}">添加信息</a></li>
    {/if}
    {if condition="checkPath('women/contentEdit',['id'=>$info.id])"}
    <li class="active"><a href="{:Url('women/contentEdit',['id'=>$info.id])}">修改信息</a></li>
    {/if}
</ul>
 <form  class="form-horizontal" action="{:url('women/contentEdit',['id'=>$info.id])}" method="post">
    {include file="form:form_women" /}
</form>
