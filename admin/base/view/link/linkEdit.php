<ul class="nav nav-tabs">
    {if condition="checkPath('link/index')"}
    <li><a href="{:Url('link/index')}">站点链接列表</a></li>
    {/if}
    {if condition="checkPath('link/linkAdd')"}
    <li><a href="{:Url('link/linkAdd')}">添加站点链接</a></li>
    {/if}
    {if condition="checkPath('link/linkEdit',['id'=>$info.id])"}
    <li class="active"><a href="{:Url('link/linkEdit',['id'=>$info.id])}">修改站点链接</a></li>
    {/if}
</ul>
 <form  class="form-horizontal" action="{:url('link/linkEdit',['id'=>$info.id])}" method="post">
    {include file="form:form_link" /}
</form>
