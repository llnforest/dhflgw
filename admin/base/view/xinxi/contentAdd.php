<ul class="nav nav-tabs">
    {if condition="checkPath('xinxi/index')"}
    <li><a href="{:Url('xinxi/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('xinxi/contentAdd')"}
    <li class="active"><a href="{:Url('xinxi/contentAdd')}">添加信息</a></li>
    {/if}
    
</ul>
<form  class="form-horizontal" action="{:url('xinxi/contentAdd')}" method="post">
    {include file="form:form_xinxi" /}
</form>
