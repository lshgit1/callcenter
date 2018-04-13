<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.erp.sub.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

//본사반품대기 건수
$sqlr = " select count(ct_idx) as readycnt from er_bp2_cart where ag_code = '{$member[ag_code]}' and bp_code = '0'  ";
$rowr = sql_fetch($sqlr);
$readycnt = $rowr[readycnt]; 

//예치금 잔액
$agrs = 0;
$sqlrs = sql_fetch(" select rs_sum_ag from er_account2 where ag_code = '{$member[ag_code]}' order by reg_datetime desc limit 1");
if($sqlrs[rs_sum_ag] != 0) $agrs = $sqlrs[rs_sum_ag]*-1;

//현재 주문중 금액
$sqloding = sql_fetch(" select ifnull(sum(od_price_total),0) as oding from er_order2 where ag_code = '{$member[ag_code]}' and (od_status  > '-1' and od_status < '4') ");
$oding = $sqloding[oding];

// 주문가능예치금
$avail_rs = $agrs - $oding;

?>
<style>
.lang-switch{float: right;position: absolute;top: 80px;right: 20px;z-index: 100;color: #fff;}
.lang-switch li{float: left;padding-left:10px;}
.lang-switch li span{cursor:pointer;}
</style>

<div id="layermask"></div>
<header id="hd" class="hd_zindex">
    <div id="hd_wrap">
        <h1>체리케이스</h1>
        <div id="logo"><a href="<?php echo G5_ERP_URL;?>"><img src="<?php echo G5_ERP_URL;?>/img/logo_cherry.jpg" alt="체리케이스 관리자" title=""></a></div>
        <ul id="tnb">
			<?php if($is_member) { ?>
            <li id="tnb_logout">
				<span><?php echo get_text($com[mb_id]);?></span>
				<a href="javascript:void(0);" class="showmodal" data-tgt="bpready" data-keyval="0"><?php echo $_txtArray[573][$sesslang];//본사반품대기?> ( <?php echo $readycnt;?> )</a>&nbsp;&nbsp;&nbsp;
				<a href="<?php echo G5_ERP_URL;?>/pd_mall.php"><?php echo $_menuArray[118][$sesslang];//쇼핑몰?></a>&nbsp;&nbsp;&nbsp;
				<a href="<?php echo G5_ERP_URL;?>/aod_cart.php"><?php echo $_menuArray[119][$sesslang];//장바구니?></a>&nbsp;&nbsp;&nbsp;
				<a href="<?php echo G5_ERP_URL;?>/account2.php"><?php echo $_txtArray[583][$sesslang];//예치금?> ( <?php echo number_format($avail_rs);?> )</a>&nbsp;&nbsp;&nbsp;
				<a href="<?php echo G5_BBS_URL;?>/logout.php"><?php echo $_menuArray[102][$sesslang];//로그아웃?></a>
			</li>
			<?php } else { ?>
            <li id="tnb_login"><a href="<?php echo G5_BBS_URL;?>/login.php">Log In</a></li>
			<?php } ?>
        </ul>
        <ul class="lang-switch">
            <li><span class="swlang" data-lang="ko">Korean</span></li>
            <li><span class="swlang" data-lang="en">English</span></li>
        </ul>
        <nav id="gnb">
            <h2>관리자 주메뉴</h2>
            <ul id="gnb_1dul">
				<li class="gnb_1dli">
					<a href="<?php echo G5_ERP_URL;?>/aginfo.php" class="gnb_1da"><?php echo $_txtArray[332][$sesslang];//매장정보?></a>
				</li>
				<?php $i=0; while($i < count($_menu_arr)) { ?>
				<?php
					$m_level = $_menu_arr[$i][0];
					$m_subj = $_menu_arr[$i][1];
					$m_link = $_menu_arr[$i][2];
					$m_alias = $_menu_arr[$i][3];
				?>
				<?php if(in_array($m_alias, array_map("trim", explode('|', $member[ag_menu]))))  { ?>
				<li class="gnb_1dli">
					<a href="<?php echo G5_ERP_URL;?>/<?php echo $m_link;?>" class="gnb_1da"><?php echo $m_subj;?></a>
				</li>
				<?php } ?>
				<?php $i++;  } ?>
			</ul>
        </nav>
    </div>
</header>

<div id="wrapper">

    <div id="container">
        <div id="text_size">
        </div>
        <h1><?php echo $g5['title'] ?></h1>
