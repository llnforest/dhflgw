<ul class="nav nav-tabs">
    {if condition="checkPath('susong/index')"}
    <li><a href="{:Url('susong/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('susong/contentAdd')"}
    <li class="active"><a href="{:Url('susong/contentAdd')}">添加信息</a></li>
    {/if}
    
</ul>
<form  class="form-horizontal" action="{:url('susong/contentAdd')}" method="post">
    {include file="form:form_susong" /}
</form>
