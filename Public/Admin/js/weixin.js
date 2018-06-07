$("#reply_type").change(function () {
    var type = $(this).val();
    if(type == 1){
        $("#reply_content").show();
        $("#reply_id").hide();
        $("#replay_url").hide();
    }else if(type == 2){
        $("#reply_content").hide();
        $("#reply_id").show();
        $("#replay_url").hide();
    }else if(type == 3){
        $("#reply_content").hide();
        $("#reply_id").hide();
        $("#replay_url").show();
    }else{
        $("#reply_content").hide();
        $("#reply_id").hide();
        $("#replay_url").hide();
    }
});
/**
 * 选择素材
 */
$("#select_master").click(function () {
    $.get("/admin.php/Weixin/materLayer",{},function(str){
        var index=layer.open({
            type: 1,
            area:['970px','550px'],
            title: '素材选择',
            closeBtn: 1,
            shadeClose: false,
            skin: 'layui-layer-auto',
            content: str,
            btn:['确定','取消'],
            yes:function(index, layero){
                var mater_id = $(layero).find(".list-loop.bg").attr('data-id');
                $("#mater_id").val(mater_id);
                $.get("/admin.php/Weixin/getMaterInfo",{mater_id:mater_id},function(data){
                    $(".master_box").html(data);
                    layer.close(index);
                });
            },
            cancel:function(){
                layer.close(index);
            }
        });
    });
});
$(document).on('click',".list-loop",function () {
    $(this).siblings().removeClass('bg');
    $(this).addClass('bg');
});
/**
 * 清空素材
 */
$("#delete_master").click(function () {
    $(".master_box").empty();
    $("#mater_id").val('');
});