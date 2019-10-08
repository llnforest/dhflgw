<ul class="nav nav-tabs">
    {if condition="checkPath('huodong/index')"}
    <li><a href="{:Url('huodong/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('huodong/contentAdd')"}
    <li class="active"><a href="{:Url('huodong/contentAdd')}">添加信息</a></li>
    {/if}
    
</ul>
<form  class="form-horizontal" action="{:url('huodong/contentAdd')}" method="post">
    {include file="form:form_huodong" /}
</form>
