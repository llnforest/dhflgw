<ul class="nav nav-tabs">
    {if condition="checkPath('gonggao/index')"}
    <li><a href="{:Url('gonggao/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('gonggao/contentAdd')"}
    <li class="active"><a href="{:Url('gonggao/contentAdd')}">添加信息</a></li>
    {/if}
    
</ul>
<form  class="form-horizontal" action="{:url('gonggao/contentAdd')}" method="post">
    {include file="form:form_gonggao" /}
</form>
