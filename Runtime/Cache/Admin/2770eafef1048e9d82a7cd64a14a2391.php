<?php if (!defined('THINK_PATH')) exit();?><div class="table_form" style="margin-top: 0px;">
    <form class="form-horizontal formname" method="post">
        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
        <input type="hidden" name="mater_id" value="<?php echo ($info["mater_id"]); ?>"/>
        <div id="arraw-left"><span></span></div>

        <div class="form_group">
            <div class="form_txt">标题：</div>
            <div class="form_input"><input type="text" name="title" size="50" class="ip" value="<?php echo ($info["title"]); ?>" /></div>
        </div>

        <div class="form_group">
            <div class="form_txt">封面：</div>
            <div class="form_input">
                <input type="text" size="50" maxlength="255" class="ip" value="<?php echo (getattachurl($info["pic_id"])); ?>" disabled/>
                <input type="hidden" name="pic_id" value="<?php echo ($info["pic_id"]); ?>"/>
                <input type="button" value="上传" id="upbtn" data-type="1" class="bnt bnt_save" />
                <span class="am-margin-left input-tips"><br>建议尺寸：360像素 * 200像素</span>
            </div>
            <div class="form_input img-div" style="display:none;">
                <img src="<?php echo (getattachurl($info["pic_id"])); ?>">
                <i class="iconfont icon-close img-del"></i>
            </div>
        </div>
        <div class="form_group">
            <div class="form_txt">正文：</div>
            <div class="form_input">
                <textarea name="content" id="container" rows="3" cols="50"><?php echo ($info["content"]); ?></textarea>
            </div>
        </div>
        <div class="form_group">
            <div class="form_txt">摘要：</div>
            <div class="form_input">
                <textarea name="abstract" rows="3" cols="43"><?php echo ($info["abstract"]); ?></textarea>
                <span class="am-margin-left input-tips"><br>长度100个字符</span>
            </div>
        </div>
        <div class="form_group">
            <div class="form_txt">原文链接：</div>
            <div class="form_input"><input type="text" name="url" size="50" class="ip" value="<?php echo ($info["url"]); ?>" /></div>
        </div>
        <div class="form_group">
            <div class="form_bnt">
                <button class="btn btn-white btn-info btn-round" type="submit">
                    <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> 保存素材
                </button>
            </div>
        </div>
    </form>
</div>
<script>
    if(ue){
        ue.destroy();
    }
    var ue = UE.getEditor('container');
</script>