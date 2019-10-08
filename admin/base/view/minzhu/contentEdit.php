<ul class="nav nav-tabs">
    {if condition="checkPath('minzhu/index')"}
    <li><a href="{:Url('minzhu/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('minzhu/contentAdd')"}
    <li><a href="{:Url('minzhu/contentAdd')}">添加信息</a></li>
    {/if}
    {if condition="checkPath('minzhu/contentEdit',['id'=>$info.id])"}
    <li class="active"><a href="{:Url('minzhu/contentEdit',['id'=>$info.id])}">修改信息</a></li>
    {/if}
</ul>
 <form  class="form-horizontal" action="{:url('minzhu/contentEdit',['id'=>$info.id])}" method="post">
    {include file="form:form_minzhu" /}
</form>
