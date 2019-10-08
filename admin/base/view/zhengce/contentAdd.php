<ul class="nav nav-tabs">
    {if condition="checkPath('zhengce/index')"}
    <li><a href="{:Url('zhengce/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('zhengce/contentAdd')"}
    <li class="active"><a href="{:Url('zhengce/contentAdd')}">添加信息</a></li>
    {/if}
    
</ul>
<form  class="form-horizontal" action="{:url('zhengce/contentAdd')}" method="post">
    {include file="form:form_zhengce" /}
</form>
