<ul class="nav nav-tabs">
    {if condition="checkPath('gaikuang/index')"}
    <li><a href="{:Url('gaikuang/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('gaikuang/contentAdd')"}
    <li class="active"><a href="{:Url('gaikuang/contentAdd')}">添加信息</a></li>
    {/if}
    
</ul>
<form  class="form-horizontal" action="{:url('gaikuang/contentAdd')}" method="post">
    {include file="form:form_gaikuang" /}
</form>
