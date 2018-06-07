
$(document).ready(function() {
    if ($('.beautify_input').length > 0) {
        $('.beautify_input').cssSelect();
    }
});
function goback() {
    javascript: history.go(-1);
}
function closelayer() {
    layer.closeAll();
}
//统一表单提交验证
$.fn.MotorsSubmit = function(options) {
    var default_options = {
            theme: 'yellow_top',
            ajaxurl: '',
            loadurl: '',
            callback: '',
            isreload: false,
            isajax:false
        },
        options = $.extend(default_options, options);
    $(this).validator({
        stopOnError: true,
        theme: options.theme,
        ignore: ':hidden',
        beforeSubmit: function() { $("input[type='submit']").attr("disabled", true); },
        valid: function(form) {
            // var loadIndex = layer.load();
            $.ajax({
                url: options.ajaxurl,
                type: "post",
                data: $(form).serialize(),
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        $('.btn-submit').attr("disabled", true);
                        layer.msg(data.msg, { icon: 1 });
                        if (options.loadurl) {
                            setTimeout(function() {
                                window.location.href = options.loadurl;
                            }, 1500);
                        } else if (options.isajax) {
                            setTimeout(function() {
                                closelayer();
                                ajaxContent(1);
                            }, 1500);
                        } else if (options.callback) {
                            setTimeout(function() {
                                closelayer();
                                options.callback(data);
                            }, 1500);
                        } else if (options.isreload) {
                            setTimeout(function() {
                                closelayer();
                                window.location.reload();
                            }, 1500);
                        }
                    } else {
                        layer.msg(data.msg, { offset: '220px', icon: 2 });
                        $("input[type='submit']").attr("disabled", false);
                    }
                    // layer.close(loadIndex);
                }
            });
        },
        invalid: function() { $("input[type='submit']").attr("disabled", false); }
    });
};