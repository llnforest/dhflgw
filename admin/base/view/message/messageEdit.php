<ul class="nav nav-tabs">
    {if condition="checkPath('message/index')"}
    <li><a href="{:Url('message/index')}">主席信访</a></li>
    {/if}
    {if condition="checkPath('message/messageEdit',['id'=>$info.id])"}
    <li class="active"><a href="{:Url('message/messageEdit',['id'=>$info.id])}">回复信访</a></li>
    {/if}
</ul>
 <form  class="form-horizontal" action="{:url('message/messageEdit',['id'=>$info.id])}" method="post">
    {include file="form:form_message" /}
</form>
