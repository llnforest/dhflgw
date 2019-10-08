<ul class="nav nav-tabs">
    {if condition="checkPath('gaikuang/index')"}
    <li><a href="{:Url('gaikuang/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('gaikuang/contentAdd')"}
    <li><a href="{:Url('gaikuang/contentAdd')}">添加信息</a></li>
    {/if}
    {if condition="checkPath('gaikuang/contentEdit',['id'=>$info.id])"}
    <li class="active"><a href="{:Url('gaikuang/contentEdit',['id'=>$info.id])}">修改信息</a></li>
    {/if}
</ul>
 <form  class="form-horizontal" action="{:url('gaikuang/contentEdit',['id'=>$info.id])}" method="post">
    {include file="form:form_gaikuang" /}
</form>
