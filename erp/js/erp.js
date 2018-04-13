function check_all(f)
{
    var chk = document.getElementsByName("chk[]");

    for (i=0; i<chk.length; i++)
        chk[i].checked = f.chkall.checked;
}

function btn_check(f, act)
{
    if (act == "update") // 선택수정
    {
        f.action = list_update_php;
        str = "수정";
    }
    else if (act == "delete") // 선택삭제
    {
        f.action = list_delete_php;
        str = "삭제";
    }
    else
        return;

    var chk = document.getElementsByName("chk[]");
    var bchk = false;

    for (i=0; i<chk.length; i++)
    {
        if (chk[i].checked)
            bchk = true;
    }

    if (!bchk)
    {
        alert(str + "할 자료를 하나 이상 선택하세요.");
        return;
    }

    if (act == "delete")
    {
        if (!confirm("선택한 자료를 정말 삭제 하시겠습니까?"))
            return;
    }

    f.submit();
}

function is_checked(elements_name)
{
    var checked = false;
    var chk = document.getElementsByName(elements_name);
    for (var i=0; i<chk.length; i++) {
        if (chk[i].checked) {
            checked = true;
        }
    }
    return checked;
}

//***************************** 이랑추가 *******************************//
$(function() {
	//모달창 띄우기
	$(document).on("click",".showmodal",function(){
		//event.preventDefault();
		var tgt = $(this).data("tgt");
		var keyval = $(this).data("keyval");
		show_modal('layerpopup2', tgt, keyval);
	});

	//모달창 닫기
	$(document).on("click","#layermask",function(){
		$("#layermask").fadeOut("fast");
		$("#iframe_wrap2").html("").empty();  
		$("#layerpopup2").hide();  
		$("#iframe_wrap3").html("").empty();  
		$("#layerpopup3").hide();  
		$("#iframe_wrap4").html("").empty();  
		$("#layerpopup4").hide();  
		$("body").css("min-width","");
	});
});

// 언어세션 생성
$(document).on("click",".swlang",function(){
	//event.preventDefault();
	var tgtlang = $(this).data("lang");

	$.ajax({ 
		type: "GET",
		url: g5_url+"/erp/ajax_setsess_lang.php",
		data: "lang="+tgtlang, 
		beforeSend: function(){
			loadstart();
		},
		success: function(msg){ 
			var msgarray = $.parseJSON(msg);
			if(msgarray.rslt == "error")
			{
				alert(msgarray.errcode); 
				if(msgarray.errurl) {document.location.replace(msgarray.errurl);}
				else {	loadend(); return false;}
			}
			else
			{
				document.location.reload();
			}
		},
		complete: function(){
			loadend();
		}
	});
});
