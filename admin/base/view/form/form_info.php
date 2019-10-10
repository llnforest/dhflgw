<script type="text/javascript" charset="utf-8" src="__PublicAdmin__/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PublicAdmin__/ueditor/ueditor.all.min.js"> </script>
<div class="col-sm-12">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>网站标题</th>
                <td>
                    <input class="form-control text" type="text" name="title" value="{$info.title??''}" placeholder="网站标题">
                </td>
            </tr>
            <tr>
                <th>SEO关键字</th>
                <td class="layui-form">
                    <input class="form-control text" type="text" name="seo_key" value="{$info.seo_key??''}" placeholder="SEO关键字">
                </td>
            </tr>
            <tr>
                <th>SEO描述</th>
                <td class="layui-form">
                    <textarea class="form-control text" type="text" name="seo_des" placeholder="SEO描述">{$info.seo_des??''}</textarea>
                </td>
            </tr>
            <tr>
                <th>网站logo</th>
                <td>
                    <button name="image" type="button" class="layui-btn upload" lay-data="{'url': '{:url('index/upload/image',['type'=>'info'])}'}">
                        <i class="layui-icon">&#xe67c;</i>上传网站logo
                        <input class="image" type="hidden" name="logo_url" value="{$info.logo_url??''}">
                        <img class="mini-image {$info.logo_url?'':'hidden'}" data-path="__ImagePath__" src="{$info.logo_url?'__ImagePath__'.$info.logo_url:''}">
                    </button>
                </td>
            </tr>
            <tr>
                <th>微信二维码</th>
                <td>
                    <button name="image" type="button" class="layui-btn upload" lay-data="{'url': '{:url('index/upload/image',['type'=>'info'])}'}">
                        <i class="layui-icon">&#xe67c;</i>上传微信二维码
                        <input class="image" type="hidden" name="wx_url" value="{$info.wx_url??''}">
                        <img class="mini-image {$info.wx_url?'':'hidden'}" data-path="__ImagePath__" src="{$info.wx_url?'__ImagePath__'.$info.wx_url:''}">
                    </button>
                </td>
            </tr>
            <tr>
                <th>版权归属</th>
                <td>
                    <input class="form-control text" type="text" name="power" value="{$info.power??''}" placeholder="版权归属">
                </td>
            </tr>

            <tr>
                <th>备案信息</th>
                <td>
                    <input class="form-control text" type="text" name="case_info" value="{$info.case_info??''}" placeholder="备案信息">
                </td>
            </tr>
            <tr>
                <th>公司地址</th>
                <td class="layui-form">
                    <textarea class="form-control text" type="text" name="address" placeholder="公司地址">{$info.address??''}</textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2" class="text-center">
                    <button type="button" class="btn btn-success form-post " >保存</button>
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    var ue = UE.getEditor('description');
</script>

