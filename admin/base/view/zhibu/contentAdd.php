<ul class="nav nav-tabs">
    {if condition="checkPath('zhibu/index')"}
    <li><a href="{:Url('zhibu/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('zhibu/contentAdd')"}
    <li class="active"><a href="{:Url('zhibu/contentAdd')}">添加信息</a></li>
    {/if}
    
</ul>
<form  class="form-horizontal" action="{:url('zhibu/contentAdd')}" method="post">
    {include file="form:form_zhibu" /}
</form>
