var isprevpage="";
/**
 * 验证大于等于的整数
 * @param obj
 * @returns {Boolean}
 */
function checkInt(obj){
    var nubmer = parseInt($(obj).val());
    if(isNaN(nubmer)||nubmer<0||!(/^\d+$/.test(nubmer))){
        $(obj).val('');
        return false;
    }
}
//退出
function quit(){
    layer.confirm('确定要退出登录？', {
        btn: ['确定','取消'], //按钮
        title:'退出登录'
    }, function(){
        window.location.href="admin.php?s=/Index/quit";
    }, function(){

    });
}
//判断是否有选择
function isCheck(){
    var arrchk=$("#tablelist").find("input[name='id']:checked");
    var ids="";
    $(arrchk).each(function(){
        if(ids==""){
            ids+=this.value
        }else{
            ids+=","+this.value
        }
    });
    if(ids==""){
        layer.msg('至少选择一条信息', { icon: 2});
        return false;
    }
    return ids;
}
function setCheck(zNodes,onClick){
    var setting = {
        check: {
            enable: false
        },
        data: {
            simpleData: {
                enable: true
            }
        },
        callback: {
            onClick: onClick
        }
    };
    $.fn.zTree.init($("#treeDemo"), setting, zNodes);
}
//分页获取内容数据
function ajaxContent(pageNum) {
    var loadIndex = layer.load();
    if(typeof(pageMethod) == "undefined"){
        var pagePrefix = '';
    }else{
        var pagePrefix = pageMethod;
    }
    if(!isprevpage || pageNum){
        var pageNum1=$(".paginationBox .pagination .current").text();
        pageNum1=pageNum1||1;
        pageNum=pageNum||pageNum1;
        var page="";
        if(pageNum){
            page = '&pageNum='+pageNum;
        }
        var drows = $('#rows').val();
        var pageRows = "";
        if (drows) {
            pageRows = "&rows=" + drows;
        }

        var param = page+pageRows+"&"+$("#searchForm").serialize();

        localStorage.setItem(pagePrefix+"formParam",param);
    }else{
        var param = decodeURI(localStorage.getItem(pagePrefix+"formParam"))
        var arr= new Array(); //定义一数组
        arr=param.split("&");
        for (i=0;i<arr.length ;i++ ){
            if(arr[i]){
                var parr = new Array();
                parr = arr[i].split("=");
                if(parr[1]){
                    $("#searchForm").find("[name='"+parr[0]+"']").val(parr[1]);

                    var a_obj = $("#searchForm").parent().next().find(".dropdown[data-name='"+parr[0]+"']").children("a");
                    var text = a_obj.next().find(".dl_select[data='"+parr[1]+"']").text();
                    var spanhtml = a_obj.find("span").prop("outerHTML");
                    var labelhtml = a_obj.find("label").prop("outerHTML");
                    if(text == ''){
                        a_obj.html(spanhtml+labelhtml+'↓');
                    }else{
                        a_obj.html(spanhtml+labelhtml+':'+text);
                    }
                }
            }
        }
    }

    var url = durl + param;
    $.get(url,{},function(data) {
        layer.close(loadIndex);
        $("#tablelist").html(data);
    });

}
function fy(){
    var num=parseInt($("#input_num").val());
    ajaxContent(num);
}
//回车搜索
$(document).on('keypress','#searchForm input',function (event) {
    if (event.keyCode == 13 && durl != undefined) {
        ajaxContent(1);
    }
});

//通用下拉筛选选项选择
$(".dl_select").click(function(){
    var data = $(this).attr('data');
    var text = $(this).text();
    var a_obj = $(this).parents("dl").prev();
    $("#searchForm").find("input[name='"+$(this).parents("li").attr('data-name')+"']").val(data);
    var spanhtml = a_obj.find("span").prop("outerHTML");
    var labelhtml = a_obj.find("label").prop("outerHTML");
    if(data == ''){
        a_obj.html(spanhtml+labelhtml+'↓');
    }else{
        a_obj.html(spanhtml+labelhtml+':'+text);
    }
    $(this).parents("dl").hide();
    ajaxContent(1);
});


$(document).on('mouseenter', ".dropdown", function () {
    $("dl", this).stop(!0, !0).slideDown(300)
});
$(document).on('mouseleave', ".dropdown", function () {
    $("dl", this).stop(!0, !0).slideUp(300)
});
$(document).on('click', ".dropdowns", function () {
    $(this).find('.st_tree').slideDown(300);
})
$(document).on('click', ".tt11", function () {
    $('#treeDemo').slideDown(300);
})

$(document).on('click', ".bnt_cate", function (e) {
    e.stopPropagation();
    $('#t2_1').val('作为一级栏目');
    $('#t2').val('0');
})
$(document).on('mouseleave', ".dropdowns", function () {
    $(this).find('.ztree').hide();
})
//选择模型属性
$(document).on('change', "#t3", function () {
    var config = $("#t3 option:selected").attr("config");
    $(this).attr('config', config);
})
//表check全选
$('#tablelist').on('click',"#chkall",function(){
    if(this.checked){
        $(":checkbox").each(function(){
            this.checked=true;
        });
    }else{
        $(":checkbox").each(function(){
            this.checked=false;
        });
    }

});
//栏目列表展开、收起
$(document).on('click','.tree-icon',function (e) {
    e.stopPropagation();
    if($(this).hasClass('icon-zixunlanmu')){
        return;
    }
    var parents_tr = $(this).parents("tr");
    var id = parents_tr.attr('data-id');
    if($(this).hasClass('icon-liebiaozhankai')){
        shut(id);
    }else{
        open(id);
    }
    $(this).toggleClass("icon-liebiaozhankai");
    $(this).toggleClass("icon-liebiaoshouqi");
});
//递归关闭所有的孩子
function shut(id) {
    var obj = $(".child-tr.child"+id);
    if(obj.text() == undefined){
        return false;
    }
    obj.each(function(i,v){
        shut($(v).attr('data-id'));
    });
    obj.hide();
}
//根据历史记录来展开节点
function open(id) {
    var obj = $(".child-tr.child"+id);
    if(obj.text() == undefined){
        return false;
    }
    obj.each(function(i,v){
        if($(v).find("i").hasClass('icon-liebiaozhankai')){
            open($(v).attr('data-id'));
        }
    });
    obj.show();
}
//栏目、内容移动方法
function moveItem(options){
    $.post("admin.php?s=/Category/moveItem",{'type':options.type,'cateid':options.cateid},function(str){
        var index=layer.open({
            type: 1,
            area:['580px','400px'],
            title: options.title,
            closeBtn: 1,
            shadeClose: false,
            skin: '',
            content: str,
            btn:['确定','取消'],
            yes:function(){
                var pid = $("#itempId").val();
                $.ajax({
                    url: options.ajaxurl,
                    type: 'POST',
                    data: {'id': options.cateid, 'pid': pid},
                    dataType:"json",
                    success: function (data) {
                        layer.close(index);
                        if (data.success) {
                            layer.msg('移动成功！', { icon: 1 });
                            options.callback();
                        } else {
                            layer.msg('移动失败！', { icon: 1 });
                        }
                    }
                });
            },
            cancel:function(){
                layer.close(index);
            }
        });
    });
}

var orderData = function (id, orderNum) {
    this.id = id;
    this.orderNum = orderNum;
}
//栏目排序保存
$(document).on("click", '.save_btn_sort', function () {
    var data = [];
    $.each($('#tablelist tr.item'), function (i, item) {
        if ($(item).find('.ord_input').val() != "") {
            items = new orderData($(item).attr('data-id'), $(item).find('.ord_input').val());
            data.push(items);
        }
    });
    var url=$(this).attr('data-url');
    //这里的html可以是ajax请求
    $.ajax({
        url: url,
        type: 'POST',
        async: false,
        data: {'orderNum': data},
        dataType:"json",
        success: function (data) {
            if (data.success) {
                layer.msg(data.msg, { icon: 1 });
            } else {
                layer.msg(data.msg, { icon: 2 });
            }
        }
    });
});
//删除栏目
$(document).on('click', ".deleteItemBtn", function () {
    var tr = $(this).parents('tr');
    var id = tr.attr('data-id');
    var pid = tr.attr('data-pid');
    layer.confirm('确定要删除该栏目及该栏目下的所有内容？<br>此操作不可恢复，请谨慎操作！', {icon: 3, title: '提示'}, function (index) {
        $.ajax({
            url: '/admin.php/Category/deleteItem',
            type: 'POST',
            data: {'id': id},
            dataType:"json",
            success: function (data) {
                if (data.success) {
                    layer.msg(data.msg, { icon: 1 });
                    tr.fadeOut('slow');
                    shut(id);
                    if($(".child-tr.child"+pid+":visible").length <= 1){
                        $(".item.item"+pid).find(".tree-icon").removeClass('icon-liebiaozhankai icon-liebiaoshouqi').addClass('icon-zixunlanmu');
                    }
                } else {
                    layer.msg(data.msg, { icon: 2 });
                }
            }
        });
        layer.close(index);
    });
});
//清楚栏目缓存
$(document).on('click','.recache',function(){
    $.ajax({
        url:'admin.php/Index/delCache',
        success:function(data){
            if(data){
                layer.msg('清理缓存成功', { icon: 1 });
            }else{
                layer.msg('清理缓存失败', { icon: 1 });
            }
        },
        error:function(){}
    });
});
//栏目移动
$(document).on('click','.moveItem',function(){
    var options = {
        type:2,
        cateid:$(this).attr('data-id'),
        title:'栏目移动',
        ajaxurl:"admin.php?s=/Category/moveFun",
        callback:function(){
            setTimeout(function(){
                window.location.reload();
            },1500);
        }
    };
    moveItem(options);
});
//通用删除
$(document).on('click','.delete',function(e){
    var url = $(this).attr('rel');
    var tr = $(this).parent().parent();
    var index=layer.open({
        content:'确定要删除？',
        btn:['确定','取消'],
        yes:function(){
            $.ajax({
                url:url,
                dataType:"json",
                success:function(data){
                    if(data.success){
                        layer.msg(data.msg, { icon: 1 });
                        tr.fadeOut('slow');
                    }else{
                        layer.msg(data.msg, { icon: 2 });
                    }
                },
                error:function(){}
            });
            layer.close(index);
        },
        cancel:function(){layer.close(index);}
    });
});
//通用layer提示框函数
function alertlayer(options){
    var default_options = {
            content:'',
            ids:'',
            ajaxurl: '',
            loadurl: '',
            callback: '',
            isreload: false,
            isajax:false,
            isremovetr:false
        },
        options = $.extend(default_options, options);
    var index=layer.open({
        content:options.content,
        btn:['确定','取消'],
        yes:function(){
            $.ajax({
                url:options.ajaxurl,
                data:"ids="+options.ids,
                dataType:"json",
                success:function(data){
                    if(data.success){
                        layer.msg(data.msg, { icon: 1});
                        if (options.loadurl) {
                            setTimeout(function() {
                                window.location.href = options.loadurl;
                            }, 1500);
                        } else if (options.isajax) {
                            setTimeout(function() {
                                layer.close(index);
                                ajaxContent(1);
                            }, 1500);
                        } else if (options.callback) {
                            setTimeout(function() {
                                layer.close(index);
                                options.callback();
                            }, 1500);
                        } else if (options.isreload) {
                            setTimeout(function() {
                                layer.close(index);
                                window.location.reload();
                            }, 1500);
                        } else if (options.isremovetr) {
                            var idnum;
                            idnum=options.ids.split(",");
                            for(i=0;i<=idnum.length;i++){
                                $("#tablelist").find("#tr_"+idnum[i]).fadeOut('slow');
                            }
                        }
                    }else{
                        layer.msg(data.msg, { icon: 2});
                    }
                },
                error:function(){}
            });
        },
        cancel:function(){layer.close(index);}
    });
}
//拼音转换
$(document).on("click", '.bnt_pinyin', function () {
    var value = $('#t0').val();
    $.ajax({
        url: 'admin.php/Category/getPinYin',
        type: 'POST',
        async: false,
        data: {'value': value},
        success: function (data) {
            $('#t1').val(data);
        }
    });
});
//选择模板列表页面
$(document).on('click', "#list .bnt_temp", function () {
    var config = $("#t3").attr("config");
    if(config == '' || config == undefined){
        layer.msg('请先选择模型', { icon: 2 });
        return;
    }
    layer.open({
        title: '模板选择',
        type: 1,
        shade: 0.2,
        area: '340px',
        content: "<div id='act_loading'><span class='ui-dialog-loading'>Loading..</span></div>"
    });
    $.ajax({
        url: 'admin.php/Category/getListData',
        type: 'POST',
        async: false,
        data: {'config': config},
        success: function (data) {
            var html = '<div>' +
                '<div>提示：模板选择请谨慎操作</div>' +
                '</div>';
            $('#act_loading').replaceWith(data);
        }
    });
})
//选择模板详情页面
$(document).on('click', "#show .bnt_temp", function () {
    var config = $("#t3").attr("config");
    if(config == '' || config == undefined){
        layer.msg('请先选择模型', { icon: 2 });
        return;
    }
    layer.open({
        title: '模板选择',
        type: 1,
        shade: 0.2,
        area: '340px',
        content: "<div id='act_loading'><span class='ui-dialog-loading'>Loading..</span></div>"
    });
    $.ajax({
        url: 'admin.php/Category/getShowData',
        type: 'POST',
        async: false,
        data: {'config': config},
        success: function (data) {
            var html = '<div>' +
                '<div>提示：模板选择请谨慎操作</div>' +
                '</div>';
            $('#act_loading').replaceWith(data);
        }
    });
});
//图片上传
$(document).on('click','#upbtn',function(e){
    var idinput = $(this).prev();
    var urlinput = idinput.prev();
    var img = $(this).parents(".form_group").find("img");
    var uptype = $(this).attr('data-type');
    $.post("admin.php/Upload/index",{'uptype':uptype},function(str){
        var index=layer.open({
            type: 1,
            area:['580px','400px'],
            title: '上传图片',
            closeBtn: 1,
            shadeClose: false,
            skin: '',
            content: str,
            btn:['确定','取消'],
            yes:function(){
                var upimg = $.cookie('upimg');
                if(upimg){
                    var upimg = JSON.parse(upimg);
                    urlinput.val(upimg[0].path);
                    idinput.val(upimg[0].id);
                    if(img != undefined){
                        img.attr('src',upimg[0].path);
                        img.parent().show();
                    }
                    $.cookie('upimg',null);
                    layer.close(index);
                }
            },
            cancel:function(){
                layer.close(index);
            }
        });
    });
});
//选择某一个图片
$(document).on('click','#upcontent .source li',function(){
    var selected = $(this).find('.selected');
    if(uploadLimit != 1){
        if(selected.is(":visible")){
            selected.hide();
        }else{
            selected.show();
        }
    }else{
        $(this).siblings().find('.selected').hide();
        selected.show();
    }
    $.cookie('upimg','');
    i = 0;
    var upimg = new Object;
    $(this).parent().children().each(function(){
        if($(this).find('.selected').is(":visible")){
            upimg[i] = new Object;
            upimg[i]['path'] = $(this).find('.selected').attr('data-url');
            upimg[i]['id'] = $(this).attr('data-id');
            $.cookie('upimg',JSON.stringify(upimg));
            i++;
        }
    });
});
//图片删除
$(document).on('click','.img-del',function () {
    var that = $(this);
    var input = that.parents(".form_group").find("input");
    var url = input.eq(0);//图片路径元素
    var imgid = input.eq(1);//存id的input元素
    url.val('');
    imgid.val('');
    that.prev().attr('src','');
    that.parent().hide();
    return false;
});

/**
 * 颜色选择器
 */
$(document).on('click', '#color', function () {
    var a = $(this).width();
    $(this).height();
    var c = $(this).offset().top, d = $(this).offset().left;
    $.fn.colorpicker({x: c, y: d + a, inputid: "s2", backid: "color"})
})
//粗体
$(document).on('click', '#s0', function () {
    isChecked = $(this).prop('checked');
    if(isChecked){
        $('#c0').val('font-weight:bold;');
    }else{
        $('#c0').val('');
    }
})
//斜体
$(document).on('click', '#s1', function () {
    isChecked = $(this).prop('checked');
    if(isChecked){
        $('#c1').val('font-style:italic;');
    }else{
        $('#c1').val('');
    }
});

$(document).on('click', ".list_item", function () {
    var config = $("#t3").attr("config");
    var value = $(this).attr('attr_item');
    $('#t8').val(config + '/' + value);
    layer.closeAll();
})
$(document).on('click', ".show_item", function () {
    var config = $("#t3").attr("config");
    var value = $(this).attr('attr_item');
    $('#t9').val(config + '/' + value);
    layer.closeAll();
})
$(document).on('click',".bnt_clear",function(){
    var id = $(this).attr('config');
    $("#"+id).val('');
});