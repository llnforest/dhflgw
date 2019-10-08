<ul class="nav nav-tabs">
    {if condition="checkPath('yaowen/index')"}
    <li><a href="{:Url('yaowen/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('yaowen/contentAdd')"}
    <li class="active"><a href="{:Url('yaowen/contentAdd')}">添加信息</a></li>
    {/if}
    
</ul>
<form  class="form-horizontal" action="{:url('yaowen/contentAdd')}" method="post">
    {include file="form:form_yaowen" /}
</form>
