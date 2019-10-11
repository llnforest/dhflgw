
<div class="col-sm-12">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>链接分类</th>
                <td>
                    <div class="layui-form select">
                        <select name="cate_id" class="form-control text">
                            {foreach $cateList as $item}
                            <option value="{$item.id}" {if input('cate_id') == $item.id}selected{/if}>{$item.name}</option>
                            {/foreach}
                        </select>
                    </div>
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
                    <span class="red block">(图片建议大小 180*70)</span>
                </td>
            </tr>
            <tr>
                <th>网站名称</th>
                <td>
                    <input class="form-control text" type="text" name="name" value="{$info.name??''}" placeholder="网站名称">
                </td>
            </tr>
            <tr>
                <th>网站地址</th>
                <td>
                    <input class="form-control text" type="text" name="linkurl" value="{$info.linkurl??''}" placeholder="网站地址"><span class="form-required" size="3">以 http:// 开头</span>
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

