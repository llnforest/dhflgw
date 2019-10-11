<ul class="nav nav-tabs">
    {if condition="checkPath('news/index')"}
    <li><a href="{:Url('news/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('news/contentAdd')"}
    <li class="active"><a href="{:Url('news/contentAdd')}">添加信息</a></li>
    {/if}
    
</ul>
<form  class="form-horizontal" action="{:url('news/contentAdd')}" method="post">
    {include file="form:form_news" /}
</form>
