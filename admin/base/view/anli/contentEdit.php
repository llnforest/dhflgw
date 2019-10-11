<ul class="nav nav-tabs">
    {if condition="checkPath('anli/index')"}
    <li><a href="{:Url('anli/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('anli/contentAdd')"}
    <li><a href="{:Url('anli/contentAdd')}">添加信息</a></li>
    {/if}
    {if condition="checkPath('anli/contentEdit',['id'=>$info.id])"}
    <li class="active"><a href="{:Url('anli/contentEdit',['id'=>$info.id])}">修改信息</a></li>
    {/if}
</ul>
 <form  class="form-horizontal" action="{:url('anli/contentEdit',['id'=>$info.id])}" method="post">
    {include file="form:form_anli" /}
</form>
