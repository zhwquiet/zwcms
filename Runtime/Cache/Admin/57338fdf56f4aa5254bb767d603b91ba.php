<?php if (!defined('THINK_PATH')) exit();?><div id="upcontent">
    <form>
        <ul class="upload">
            <li>
                <input id="file_upload" name="file_upload" type="file" multiple="true">
            </li>
            <li>
                <input type="button" id="upfile"/>
            </li>
            <li>
                <input type="button" id="sourcefile"/>
            </li>
        </ul>
        <div id="count">本次共允许上传<span><?php echo ($uploadLimit); ?></span>个文件，每个文件不超过<span><?php echo ($maxSize); ?></span>KB</div>
        <div id="types">允许的格式：<?php echo ($exts); ?></div>
        <fieldset class="blue" >
            <legend>待上传文件列表</legend>
            <ul id="queue"></ul>
        </fieldset>
        <div>
            <div class="picList"><ul class="picShow"></ul></div>
        </div>
    </form>
</div>
<script type="text/javascript">
	var upimg =new Object;
	var uploadLimit = '<?php echo ($uploadLimit); ?>';
	var i=0;
    $(function() {
        $('#file_upload').uploadify({
            'auto'     : false,
            'removeTimeout' : 1,
            'queueID':'queue',
            'swf'      : '/Public/Vendor/uploadify/uploadify.swf',
            'uploader' : "<?php echo U('Upload/upload',array('uptype'=>$uptype));?>",
            'formData': { 'session': '<?php echo session_id();?>'}, 
            'method'   : 'post',
            'buttonText' : '',
            'width':74,
            'height':28,
            'multi'    : true,
            'uploadLimit' : uploadLimit,
            'fileTypeDesc' : 'All Files',
            'fileTypeExts' : "<?php echo ($exts); ?>",
            'fileSizeLimit' : '<?php echo ($maxSize); ?>KB',
            'onUploadSuccess' : function(file, data, response) {
            	data = jQuery.parseJSON(data);
                if(data.success){
                	var imgId=data.Filedata;
                	if(imgId.ext == 'pic'){
                        var picObj="<li><img width='80' src='"+imgId.savepath+"'</li>";
                	}else{
                		var picObj="<li><img width='80' src='"+'./Public/Admin/Images/ext/'+imgId.ext+'.gif'+"'</li>";
                	}
                	upimg[i] = new Object;
                	upimg[i]['path'] = imgId.savepath;
                	upimg[i]['id'] = imgId.id;
                	upimg[i]['name'] = imgId.name;
                	$.cookie('upimg',JSON.stringify(upimg));
                    $('.picShow').append(picObj);
                    i++;	
                }else{
                	layer.msg(data.msg, {icon: 2});
                } 
            }
        });
    });
    $(function(){
        $('#upfile').click(function(){
        	$('#file_upload').uploadify('upload');
        });
    });
    function AttachpageAjax(pageNum){
        $.ajax({
            url:"<?php echo U('Attachment/ajaxpage');?>",
            data:"pageRows=8&pageNum="+pageNum,
            success:function(data){
                $("#upcontent").html(data);
            }
        });
    }
    $("#sourcefile").click(function(){
    	AttachpageAjax(1);
    });
</script>