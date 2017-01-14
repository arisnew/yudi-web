//loading...
function loading(div_container, is_show ){
    $("#"+div_container).css({
        'display':'none',
        'float':'right',
        'margin-right':'20px',
        'z-index':'5'
    });
    if(is_show == true)
    $("#"+div_container).html('<img src="'+base_url+'asset/img/icons/loading1.gif" />').fadeIn();
    if(is_show == false)
    $("#"+div_container).html('<img src="'+base_url+'asset/img/icons/loading1.gif" />').fadeOut();
}

function blockPage(message) {
    $.blockUI({
        message: '<h4><img src="'+base_url+'asset/img/icons/ajax-loader.gif" /><i class="icon-info-sign"></i> ' + message + '</h4>',
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        }
    });
}

function loadContent(dURL){
    blockPage('Mohon tunggu...');
    setTimeout(function(){
        $.ajax({
            url: dURL,
            data: 0,
            dataType: "html",
            type: "POST",
            cache: false,
            success: function(html){
                $.unblockUI();
                if(html != ''){
                    $("#dinamic-content").html(html);
                } else {
                    $(location).attr('href', base_url);
                }
            },
            error : function () {
                alert("Unknow error");
            }
        });
    },10);

}