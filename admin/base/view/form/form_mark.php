
<div class="col-sm-12">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>一级导航</th>
                <td>
                    <input class="form-control text" type="text" name="title" value="{$info.title??''}" placeholder="标识名称">
                </td>
            </tr>
            <tr>
                <th>标识</th>
                <td>
                    <input class="form-control text" type="text" name="mark" value="{$info.mark??''}" placeholder="标识">
                </td>
            </tr>
            <tr>
                <th>图片</th>
                <td>
                    <button name="image" type="button" class="layui-btn upload" lay-data="{'url': '{:url('index/upload/image',['type'=>'content'])}'}">
                        <i class="layui-icon">&#xe67c;</i>上传图片
                        <input class="image" type="hidden" name="img" value="{$info.img??''}">
                        <img class="mini-image {$info.img?'':'hidden'}" data-path="__ImagePath__" src="{$info.img?'__ImagePath__'.$info.img:''}">
                    </button>
                    <span class="red block">(图片建议大小 105*105)</span>
                </td>
            </tr>
            <tr>
                <th>描述</th>
                <td>
                    <textarea class="form-control text" type="text" name="remark" placeholder="描述">{$info.remark??''}</textarea>
                </td>
            </tr>
            <tr>
                <th>排序</th>
                <td>
                    <input class="form-control text" type="text" name="sort" value="{$info.sort??''}" placeholder="排序">
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

