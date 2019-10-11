<ul class="nav nav-tabs">
    {if condition="checkPath('siren/index')"}
    <li><a href="{:Url('siren/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('siren/contentAdd')"}
    <li><a href="{:Url('siren/contentAdd')}">添加信息</a></li>
    {/if}
    {if condition="checkPath('siren/contentEdit',['id'=>$info.id])"}
    <li class="active"><a href="{:Url('siren/contentEdit',['id'=>$info.id])}">修改信息</a></li>
    {/if}
</ul>
 <form  class="form-horizontal" action="{:url('siren/contentEdit',['id'=>$info.id])}" method="post">
    {include file="form:form_siren" /}
</form>
