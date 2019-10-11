<ul class="nav nav-tabs">
    {if condition="checkPath('gongxiang/index')"}
    <li><a href="{:Url('gongxiang/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('gongxiang/contentAdd')"}
    <li class="active"><a href="{:Url('gongxiang/contentAdd')}">添加信息</a></li>
    {/if}
    
</ul>
<form  class="form-horizontal" action="{:url('gongxiang/contentAdd')}" method="post">
    {include file="form:form_gongxiang" /}
</form>
