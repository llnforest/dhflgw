<ul class="nav nav-tabs">
    {if condition="checkPath('liangdai/index')"}
    <li><a href="{:Url('liangdai/index')}">信息列表</a></li>
    {/if}
    {if condition="checkPath('liangdai/contentAdd')"}
    <li><a href="{:Url('liangdai/contentAdd')}">添加信息</a></li>
    {/if}
    {if condition="checkPath('liangdai/contentEdit',['id'=>$info.id])"}
    <li class="active"><a href="{:Url('liangdai/contentEdit',['id'=>$info.id])}">修改信息</a></li>
    {/if}
</ul>
 <form  class="form-horizontal" action="{:url('liangdai/contentEdit',['id'=>$info.id])}" method="post">
    {include file="form:form_liangdai" /}
</form>
