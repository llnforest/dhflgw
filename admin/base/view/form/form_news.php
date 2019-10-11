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
                <th>信息标题</th>
                <td>
                    <input class="form-control text" type="text" name="title" value="{$info.title??''}" placeholder="信息名称">
                    <span class="form-required">*</span>
                </td>
            </tr>
            <tr>
                <th>封面图片</th>
                <td>
                    <button name="image" type="button" class="layui-btn upload" lay-data="{'url': '{:url('index/upload/image',['type'=>'content'])}'}">
                        <i class="layui-icon">&#xe67c;</i>上传图片
                        <input class="image" type="hidden" name="img" value="{$info.img??''}">
                        <img class="mini-image {$info.img?'':'hidden'}" data-path="__ImagePath__" src="{$info.img?'__ImagePath__'.$info.img:''}">
                    </button>
                    <span class="red block">(图片建议大小 120*80)</span>
                </td>
            </tr>
            <tr>
                <th>信息简述</th>
                <td>
                    <textarea class="form-control text" type="text" name="description" placeholder="信息简述">{$info.description??''}</textarea>
                    <span class="form-required">*</span>
                </td>
            </tr>
            <tr>
                <th>信息详情</th>
                <td>
                    <script id="content" name="content" type="text/plain" style="width:850px;height:400px;">{$info.content??''}</script>
                </td>
            </tr>

            <tr>
                <th>信息排序</th>
                <td>
                    <input class="form-control text" type="text" name="sort" value="{$info.sort??''}" placeholder="信息排序">
                </td>
            </tr>
            <tr>
                <th>添加时间</th>
                <td>
                    <input class="form-control text date-time" type="text" name="sendtime" value="{$info.sendtime ? $info.sendtime : $now_time}" placeholder="添加时间" id="sendtime">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <input  type="hidden" name="mark" value="{:request()->controller()}">
                    <input id="img_data" type="hidden" name="img_data" value="">
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


