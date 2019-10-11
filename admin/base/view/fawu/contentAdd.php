<ul class="nav nav-tabs">
    {if condition="checkPath('fawu/index')"}
    <li><a href="{:Url('fawu/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('fawu/contentAdd')"}
    <li class="active"><a href="{:Url('fawu/contentAdd')}">添加信息</a></li>
    {/if}
    
</ul>
<form  class="form-horizontal" action="{:url('fawu/contentAdd')}" method="post">
    {include file="form:form_fawu" /}
</form>
