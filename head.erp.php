<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.erp.sub.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');

?>

<div id="layermask"></div>

<div id="hd_login_msg">최고관리자 최고관리자님 로그인 중 <a href="http://192.168.0.112:8001/bbs/logout.php">로그아웃</a></div>
<div id="to_content"><a href="http://192.168.0.112:8001/adm/auth_list.php#container">본문 바로가기</a></div>

<header id="hd">
    <h1>마케팅콜센터</h1>
    <div id="hd_top">
        <button type="button" id="btn_gnb" class="btn_gnb_close ">메뉴</button>
        <div id="logo"><a href="http://192.168.0.112:8001/adm"><img src="http://192.168.0.112:8001/adm/img/logo.png" alt="마케팅콜센터 관리자" title=""></a></div>

        <div id="tnb">
            <ul>
                <li class="tnb_li"><a href="http://192.168.0.112:8001/" class="tnb_community" target="_blank" title="커뮤니티 바로가기">커뮤니티 바로가기</a></li>
                <li class="tnb_li"><a href="http://192.168.0.112:8001/adm/service.php" class="tnb_service">부가서비스</a></li>
                <li class="tnb_li"><button type="button" class="tnb_mb_btn">관리자<span class="./img/btn_gnb.png">메뉴열기</span></button>
                    <ul class="tnb_mb_area">
                        <li><a href="http://192.168.0.112:8001/adm/member_form.php?w=u&amp;mb_id=admin">관리자정보</a></li>
                        <li id="tnb_logout"><a href="http://192.168.0.112:8001/bbs/logout.php">로그아웃</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <nav id="gnb" class="gnb_large ">
        <h2>관리자 주메뉴</h2>
        <ul class="gnb_ul">
            <li class="gnb_li on">
                <button type="button" class="btn_op menu-100 menu-order-1" title="환경설정">환경설정</button>
                <div class="gnb_oparea_wr">
                    <div class="gnb_oparea">
                        <h3>환경설정</h3>
                        <ul>
                            <li data-menu="100100"><a href="http://192.168.0.112:8001/adm/config_form.php" class="gnb_2da  ">기본환경설정</a></li>
                            <li data-menu="100200"><a href="http://192.168.0.112:8001/adm/auth_list.php" class="gnb_2da   on">관리권한설정</a></li>
                            <li data-menu="100280"><a href="http://192.168.0.112:8001/adm/theme.php" class="gnb_2da gnb_grp_style gnb_grp_div">테마설정</a></li>
                            <li data-menu="100290"><a href="http://192.168.0.112:8001/adm/menu_list.php" class="gnb_2da gnb_grp_style ">메뉴설정</a></li>
                            <li data-menu="100300"><a href="http://192.168.0.112:8001/adm/sendmail_test.php" class="gnb_2da  gnb_grp_div">메일 테스트</a></li>
                        </ul>
                        <h3>업무관리</h3>
                        <ul>
                            <li data-menu="100100"><a href="http://192.168.0.112:8001/adm/config_form.php" class="gnb_2da  ">기본환경설정</a></li>
                            <li data-menu="100200"><a href="http://192.168.0.112:8001/adm/auth_list.php" class="gnb_2da   on">관리권한설정</a></li>
                            <li data-menu="100280"><a href="http://192.168.0.112:8001/adm/theme.php" class="gnb_2da gnb_grp_style gnb_grp_div">테마설정</a></li>
                            <li data-menu="100290"><a href="http://192.168.0.112:8001/adm/menu_list.php" class="gnb_2da gnb_grp_style ">메뉴설정</a></li>
                            <li data-menu="100300"><a href="http://192.168.0.112:8001/adm/sendmail_test.php" class="gnb_2da  gnb_grp_div">메일 테스트</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</header>

<div id="wrapper">

    <div id="container" class="">

        <h1 id="container_title">관리권한설정</h1>

        <div class="container_wr">
