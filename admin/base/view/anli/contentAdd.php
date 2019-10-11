<ul class="nav nav-tabs">
    {if condition="checkPath('anli/index')"}
    <li><a href="{:Url('anli/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('anli/contentAdd')"}
    <li class="active"><a href="{:Url('anli/contentAdd')}">添加信息</a></li>
    {/if}
    
</ul>
<form  class="form-horizontal" action="{:url('anli/contentAdd')}" method="post">
    {include file="form:form_anli" /}
</form>
