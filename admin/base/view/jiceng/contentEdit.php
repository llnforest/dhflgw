<ul class="nav nav-tabs">
    {if condition="checkPath('jiceng/index')"}
    <li><a href="{:Url('jiceng/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('jiceng/contentAdd')"}
    <li><a href="{:Url('jiceng/contentAdd')}">添加信息</a></li>
    {/if}
    {if condition="checkPath('jiceng/contentEdit',['id'=>$info.id])"}
    <li class="active"><a href="{:Url('jiceng/contentEdit',['id'=>$info.id])}">修改信息</a></li>
    {/if}
</ul>
 <form  class="form-horizontal" action="{:url('jiceng/contentEdit',['id'=>$info.id])}" method="post">
    {include file="form:form_jiceng" /}
</form>
