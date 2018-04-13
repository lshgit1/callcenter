<?php
include_once('./_common.php');

$g5['title'] = "매장정보"; //매장정보

include_once(G5_ERP_PATH.'/_head.php');
//include_once(G5_ERP_PATH.'/ml_layer.php');
?>

<style>
.tbl_frm01 th {width:180px;padding:10px 0;}
td ul{margin:0;padding:0;list-style:none;}
td li{margin:0;padding:0;list-style:none;}
td dd{margin:0;padding:0;list-style:none;}
.tbl_frm01 textarea {height: 50px;width:99.5%;}
.tbl_frm01 td input, .tbl_frm01 td input {border: 1px solid #ddd;padding: 1px 5px;}
.divfloat{float:left;padding-right:4px;width:170px;}

.showmodal{cursor:pointer;}
.input-help{color:#ea600c;}
.div-group{padding-bottom:4px;}
h3.h3-tbltitle{padding:20px 0;}

.tbl_head01 th {width:auto;padding:10px 0;}
.tbl_head01 td.ta-center {text-align:center;}
#td_addgroup th {width:auto;background:#f1f1f1;padding:4px 0;}

.btn_list .topbtn{border:1px solid #ccc; padding: 8px;display:inline-block;}
</style>

<!--
<div class="btn_list">
	<a href="./stock1_io_list.php" class="topbtn st-all">매장정보설정</a>
	<a href="./stock1_io_list.php?qty=0" class="topbtn st-all">매입목록</a>
	<a href="" class="topbtn st-all">거래대장</a>
</div>
-->
<form name="faginfo" id="faginfo" onsubmit="return faginfo_submit(this);" method="post" autocomplete="off">
<input type="hidden" name="w" value="<?php echo $w;?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
<input type="hidden" id="mb_no" name="mb_no" value="<?php echo $ag[mb_no]; ?>">
<input type="hidden" id="ag_code" name="ag_code" value="<?php echo $ag[ag_code]; ?>">

<div class="tbl_frm01 tbl_wrap">
	<table>
		<tbody>
			<tr>
				<th scope="row"><?php echo $_txtArray[312][$sesslang];//매장명?></th>
				<td colspan="3">
					<input type="text" name="ag_name" id="ag_name" class="td200 readonly" value="<?php echo get_text($ag[ag_name]);?>" maxlength="255" required="required" readonly="readonly" />
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[210][$sesslang];//매장코드?></th>
				<td colspan="3">
					<?php echo get_text($ag[ag_code]);?>
					<input type="hidden" name="ag_code" value="<?php echo get_text($ag[ag_code]);?>"/>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[313][$sesslang];//대표 ID?></th>
				<td colspan="3">
					<?php echo get_text($ag[mb_id]);?>
					<input type="hidden" name="mb_id" value="<?php echo get_text($ag[mb_id]);?>"/>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[320][$sesslang];//비밀번호?></th>
				<td colspan="3">
					<input type="password" name="mb_password" id="mb_password" class="td200" maxlength="20"/>
					* <?php echo $_txtArray[333][$sesslang];//비밀번호 변경시에만 입력하십시오?>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[315][$sesslang];//대표자명?></th>
				<td colspan="3">
					<input type="text" name="mb_name" id="mb_name" class="td200" value="<?php echo get_text($ag[mb_name]);?>" maxlength="50" required="required"/>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[321][$sesslang];//연락처/핸드폰?></th>
				<td colspan="3">
					<input type="text" name="mb_tel" id="mb_tel" class="td200" value="<?php echo get_text($ag[mb_tel]);?>" maxlength="20" required="required"/> / 
					<input type="text" name="mb_hp" id="mb_hp" class="td200" value="<?php echo get_text($ag[mb_hp]);?>" maxlength="20"/>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[322][$sesslang];//팩스/이메일?></th>
				<td colspan="3">
					<input type="text" name="mb_fax" id="mb_fax" class="td200" value="<?php echo get_text($ag[mb_fax]);?>" maxlength="20"/> / 
					<input type="text" name="mb_email" id="mb_email" class="td200" value="<?php echo get_text($ag[mb_email]);?>" maxlength="80"/>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[316][$sesslang];//매장주소?></th>
				<td colspan="3">
					<input type="text" name="mb_addr" id="mb_addr" class="w95" value="<?php echo get_text($ag[mb_addr]);?>" maxlength="255"/>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[323][$sesslang];//가입일?></th>
				<td colspan="3">
					<?php echo get_text($ag[mb_datetime]);?>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[323][$sesslang];//적립금 설정 - 몇원이상부터 사용가능, 몇%적립, 적립금사용시 재적립여부, 적립금 부여가능 레벨?></th>
				<td colspan="3">
					<?php echo get_text($ag[mb_datetime]);?>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[324][$sesslang];//회원메모?></th>
				<td colspan="3">
					<textarea name="mb_profile" id="mb_profile" class="txtarea" maxlength="3000" rows="2" placeholder="Memo"><?php echo get_text($ag[mb_profile]); ?></textarea>
				</td>
			</tr>

		</tbody>
	</table>
	<?php if($member[mb_level] == 8) { ?>
	
	<h3 class="h3-tbltitle"><?php echo $_txtArray[337][$sesslang];//적립금 설정?></h3>
	<table>
		<tbody>
			<tr>
				<th scope="row"><?php echo $_txtArray[338][$sesslang];// 현금적립율?></th>
				<td colspan="3">
					<input type="text" name="ag_mship_rate_cash" id="ag_mship_rate_cash" class="td30" value="<?php echo $ag[ag_mship_rate_cash];?>" minlength="1" maxlength="2" required="required" /> %
					<span style="padding-left:30px;">* <?php echo $_txtArray[341][$sesslang];// 현금구매금액에 대한 적립율?></span>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[344][$sesslang];// 카드적립율?></th>
				<td colspan="3">
					<input type="text" name="ag_mship_rate_card" id="ag_mship_rate_card" class="td30" value="<?php echo $ag[ag_mship_rate_card];?>" minlength="1" maxlength="2" required="required" /> %
					<span style="padding-left:30px;">* <?php echo $_txtArray[341][$sesslang];// 카드구매금액에 대한 적립율?></span>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[339][$sesslang];// 적립금 사용가능액?></th>
				<td colspan="3">
					<input type="text" name="ag_mship_limit" id="ag_mship_limit" class="td100" value="<?php echo $ag[ag_mship_limit];?>" maxlength="9" required="required" />
					<span style="padding-left:30px;">* <?php echo $_txtArray[342][$sesslang];//설정한 금액이상이 되어야 적립금 사용가능?></span>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php echo $_txtArray[340][$sesslang];// 적립금부여가능 직원레벨?></th>
				<td colspan="3">
					<input type="text" name="ag_mship_level" id="ag_mship_level" class="td30" value="<?php echo $ag[ag_mship_level];?>" maxlength="2" required="required" />
					<span style="padding-left:30px;">* <?php echo $_txtArray[343][$sesslang];//적립금 부여/삭감 가능한 직원레벨?></span>
				</td>
			</tr>
		</tbody>
	</table>

	<h3 class="h3-tbltitle"><?php echo $_txtArray[325][$sesslang];//매장 직원정보?></h3>
	<button type="button" onclick="add_mem('layerpopup3','');" style="border:1px solid #efefef;height:30px;padding:0 6px;margin-bottom:8px;"><?php echo $_txtArray[326][$sesslang];//직원추가?></button>
    <table class="tbl_head01">
		<caption><?php echo $g5['title']; ?> 목록</caption>
		<thead>
			<tr>
				<th scope="col"><?php echo $_txtArray[327][$sesslang];//직원명?></th>
				<th scope="col"><?php echo $_txtArray[328][$sesslang];//직원ID?></th>
				<th scope="col"><?php echo $_txtArray[329][$sesslang];//연락처?></th>
				<th scope="col"><?php echo $_txtArray[330][$sesslang];//이메일?></th>
				<th scope="col"><?php echo $_txtArray[331][$sesslang];//메뉴 접근권한 설정?></th>
			</tr>
		</thead>
		<tbody>
			<?php for ($i=0; $grow=sql_fetch_array($gresult); $i++) { ?>
			<?php
				$list = $i%2;
				$nListorder--; //게시물 일련번호
		        $bg = 'bg'.($i%2);
				// 직원정보
				$staff_name = get_text($grow[mb_name]);
				$staff_id = get_text($grow[mb_id]);
				$staff_tel = get_text($grow[mb_hp]);
				$staff_email = get_text($grow[mb_email]);
			?>	
			<tr>
				<td class="td150 ta-center"><?php echo $staff_name;?></td>
				<td class="td150 ta-center"><span onclick="add_mem('layerpopup3','<?php echo $staff_id;?>')" style="cursor:pointer;"><?php echo $staff_id;?></span></td>
				<td class="td100 ta-center"><?php echo $staff_tel;?></td>
				<td class="td180 ta-center"><?php echo $staff_email;?></td>
				<td class="tdmin150" style="text-align:left;padding-left:10px;">
					<input type="hidden" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>">
					<input type="hidden" name="sub_mb_id[<?php echo $i ?>]" value="<?php echo $grow['mb_id'] ?>" id="mb_id_<?php echo $i ?>">
					<input type="hidden" id="ag_menu_<?php echo $grow['mb_id'] ?>" name="ag_menu[<?php echo $i ?>]" value="" class="mb_agmenu">
					<?php $i=0; while($i < count($_menu_arr)) { ?>
					<?php
						$m_level = $_menu_arr[$i][0];
						$m_subj = $_menu_arr[$i][1];
						$m_link = $_menu_arr[$i][2];
						$m_alias = $_menu_arr[$i][3];
						
						$chkstr = "";
						if(in_array($m_alias, array_map("trim", explode('|', $grow[ag_menu])))) $chkstr = "checked='checked' ";
						$i++; 
					?>
					<input type="checkbox" id="<?php echo $grow[mb_id];?>_<?php echo $m_alias;?>" value="<?php echo $m_alias;?>" <?php echo $chkstr;?> class="agmenu" data-mbid="<?php echo $grow['mb_id'] ?>">
					<label for="<?php echo $grow[mb_id];?>_<?php echo $m_alias;?>"><?php echo $m_subj;?></label>&nbsp;&nbsp;
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
			<?php if (!$i) echo "<tr><td colspan=\"".$colspan."\" class=\"empty_table\">".$_txtArray[44][$sesslang]."</td></tr>"; ?>
		</tbody>
    </table>
	<?php } ?>

</div>

<div class="btn_confirm01 btn_confirm" style="margin-top:20px;">
	<input type="submit" class="btn_submit" id="btn_submit" style="background: #5f5f5f;" value="<?php echo $_txtArray[257][$sesslang];//확인?>">
</div>
</form>


<script>
// 매장정보 업데이트
function faginfo_submit(f)
{
	ajax_faginfo_submit();
	return false;
}

// 매장정보 업데이트
function ajax_faginfo_submit()
{
	$("#btn_submit").attr("disabled","disabled");

	$(".mb_agmenu").val("");	
	$('.agmenu').each(function(index){
		var mbid = $(this).data("mbid");
		var targetInput = $("#ag_menu_"+mbid);
		
		if($(this).prop("checked") == true)
		{
			if(targetInput.val() == "") targetInput.val($(this).val()); 
			else targetInput.val(targetInput.val()+"|"+$(this).val()); 
		}
	});
	
	var formData = $("#faginfo").serialize();

	$.ajax({ 
		type: "POST",
		url: "./ajax_aginfo_save.php",
		data: formData, 
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
				$("#btn_submit").removeAttr("disabled");
			}
			else
			{
				//alert("저장되었습니다.");
				alert(js_alert[0][sesslang]); 
				document.location.reload();
			}
		},
		complete: function(){
			loadend();
		}
	});
}

</script>
<?php
include_once(G5_ERP_PATH.'/_tail.php');
?>
