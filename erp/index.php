<?php
include_once('./_common.php');

$g5['title'] = "매장정보"; //매장정보

include_once(G5_ERP_PATH.'/_head.php');
//include_once(G5_ERP_PATH.'/ml_layer.php');
?>

<div class="local_ov01 local_ov">
    <a href="http://192.168.0.112:8001/adm/auth_list.php" class="ov_listall btn_ov02">전체목록</a>    <span class="btn_ov01"><span class="ov_txt">설정된 관리권한</span><span class="ov_num">0건</span></span>
</div>

<form name="fsearch" id="fsearch" class="local_sch01 local_sch" method="get">
    <input type="hidden" name="sfl" value="a.mb_id" id="sfl">
    <label for="stx" class="sound_only">회원아이디<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="" id="stx" required="" class="required frm_input">
    <input type="submit" value="검색" id="fsearch_submit" class="btn_submit">
</form>

<form name="fauthlist" id="fauthlist" method="post" action="http://192.168.0.112:8001/adm/auth_list_delete.php" onsubmit="return fauthlist_submit(this);">
    <input type="hidden" name="sst" value="a.mb_id, au_menu">
    <input type="hidden" name="sod" value="">
    <input type="hidden" name="sfl" value="">
    <input type="hidden" name="stx" value="">
    <input type="hidden" name="page" value="1">
    <input type="hidden" name="token" value="">

    <div class="tbl_head01 tbl_wrap">
        <table>
            <caption>관리권한설정 목록</caption>
            <thead>
            <tr>
                <th scope="col">
                    <label for="chkall" class="sound_only">현재 페이지 회원 전체</label>
                    <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
                </th>
                <th scope="col"><a href="http://192.168.0.112:8001/adm/auth_list.php?&amp;sst=a.mb_id&amp;sod=asc&amp;sfl=&amp;stx=&amp;sca=&amp;page=1">회원아이디</a></th>
                <th scope="col"><a href="http://192.168.0.112:8001/adm/auth_list.php?&amp;sst=mb_nick&amp;sod=asc&amp;sfl=&amp;stx=&amp;sca=&amp;page=1">닉네임</a></th>
                <th scope="col">메뉴</th>
                <th scope="col">권한</th>
            </tr>
            </thead>
            <tbody>
            <tr><td colspan="5" class="empty_table">자료가 없습니다.</td></tr>    </tbody>
        </table>
    </div>

    <div class="btn_list01 btn_list">
        <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value" class="btn btn_02">
    </div>
</form>


<script>
    jQuery(function($){

        var menu_cookie_key = 'g5_admin_btn_gnb';

        $(".tnb_mb_btn").click(function(){
            $(".tnb_mb_area").toggle();
        });

        $("#btn_gnb").click(function(){

            var $this = $(this);

            try {
                if( ! $this.hasClass("btn_gnb_open") ){
                    set_cookie(menu_cookie_key, 1, 60*60*24*365);
                } else {
                    delete_cookie(menu_cookie_key);
                }
            }
            catch(err) {
            }

            $("#container").toggleClass("container-small");
            $("#gnb").toggleClass("gnb_small");
            $this.toggleClass("btn_gnb_open");

        });

        $(".gnb_ul li .btn_op" ).click(function() {
            $(this).parent().addClass("on").siblings().removeClass("on");
        });

    });
</script>



<?php
include_once(G5_ERP_PATH.'/_tail.php');
?>
