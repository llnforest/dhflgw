<script type="text/javascript" charset="utf-8" src="__PublicAdmin__/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PublicAdmin__/ueditor/ueditor.all.min.js"> </script>
<style>
.layui-form-select dl{
    z-index: 1000
}
</style>
<div class="col-sm-12">
    <table class="table table-bordered">
        <tbody>

            <tr>
                <th width="120px">信件内容</th>
                <td>
                    {$info.message}
                </td>
            </tr>
            <tr>
                <th>发件人名</th>
                <td>
                    {$info.name}
                </td>
            </tr>
            <tr>
                <th>手机号码</th>
                <td>
                    {$info.phone}
                </td>
            </tr>
            <tr>
                <th>电子邮箱</th>
                <td>
                    {$info.email}
                </td>
            </tr>
            <tr>
                <th>发件时间</th>
                <td>
                    {$info.sendtime|date="Y-m-d H:i:s",###}
                </td>
            </tr>
            <tr>
                <th>回件内容</th>
                <td>
                    <script id="content" name="recontent" type="text/plain" style="width:850px;height:400px;">{$info.recontent??''}</script>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <button type="button" class="btn btn-success form-post " >保存</button>
                    <a class="btn btn-default active" href="JavaScript:history.go(-1)">返回</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    var ue = UE.getEditor('content',{
        enterTag : 'br'
    });
    $(function(){
        $(".add-img-btn").click(function(){
            var _clone = $(".clone").clone(true,true).removeClass("clone");
            $(".img-wrap").append(_clone);
            return false;
        })

        $(".img-delete").click(function(){
            $(this).parents('.img-block').remove();
        })

        $(".form-post").click(function(){
            var sublist = [];
            $(".img-wrap .img-block").each(function(index,item){
                var url = $(item).find(".image").val();
                if(url == '') return;
                var sort = $(item).find(".img-sort").val().trim();
                sublist.push({'url':url,sort:sort});
            })
            $("#img_data").val(JSON.stringify(sublist));
        })
    })
</script>


