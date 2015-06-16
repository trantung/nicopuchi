<?php
//require_once('/home/webservice/public_html/nicopuchi/support/lib/configure.php');
require_once('/var/www/src/public_html/support/lib/configure.php');

require_once("file.member.class.php");
require_once("file.support.class.php");

class BlogSupporterMainPro {
	var $objTmpl;
	var $member_listdata;
	var $chrtbl;
	var $htmlstr;
	function BlogSupporterMainPro() {
		mb_language("Ja") ;
		mb_internal_encoding(DEF_ENCORDING_SRC);
		$this->htmlstr = "";
		$this->chrtbl = " !\"#$%&'()=-~^|@:;<>[]/*1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

		$dbMember = new file_member();
		$listdata = $dbMember->GetListData();
		$this->member_listdata = array();
		foreach ($listdata as $field) {
			$this->member_listdata[$field['id']] = $field;
		}

		$this->maindisplay();
	}
	function CharCat($str,$nCnt) {
		$str = str_replace("　","",$str);
		$str = str_replace(" ","",$str);
		$str = str_replace("\"","",$str);
		$str = str_replace("&amp;#","&#",$str);
		if (strstr($str,"&#") != FALSE) {
			$str2 = "";
			$flg = 0;
			for ($idx = 0;$idx < mb_strlen($str);$idx++) {
				if ($flg == 0) {
					$sd = mb_substr($str,$idx,2);
					if ($sd == "&#") {
						$flg = 1;
					} else {
						$str2 .= mb_substr($str,$idx,1);
					}
				} else {
					$c = mb_substr($str,$idx,1);
					if ($c == ";") {
						$flg = 0;
					}
				}
			}
			$str = $str2;
		}
		$str = str_replace("&","",$str);

		$str2 = mb_strimwidth($str, 0, ($nCnt + 1) * 2, "…");
		return ($str2);

	}
	function maindisplay() {
		$temlstr = $this->GetTemplate();

		$dbSupport = new file_support();
		$dbSupport->GetListData();
		$listdata = $dbSupport->sort(1);

		$nCnt = 0;
		foreach ($listdata as $field) {
			$work = $temlstr;
			if ($this->member_listdata[$field['id']]['mode'] == 0) {
				continue;
			}
			if ($this->member_listdata[$field['id']]['shonin'] == 0) {
				continue;
			}
			if ($this->member_listdata[$field['id']]['grad'] != 0) {
				continue;
			}

			$work = str_replace("%ID%",$field['id'],$work);
			$work = str_replace("%IDS%",substr("00000" . $field['id'],-5),$work);
			$work = str_replace("%NAME%",$this->CharCat($this->member_listdata[$field['id']]['nickname'],7),$work);
			if ($this->member_listdata[$field['id']]['sex'] == 0) {
				$work = str_replace("%SEX%","ⓒ",$work);
			} else {
				$work = str_replace("%SEX%","Ⓚ",$work);
			}
			$work = str_replace("%DATE%",substr($field['date'],0,4) . "." .  substr($field['date'],4,2) . "." . substr($field['date'],6,2),$work);
			$work = str_replace("%TIME%",substr($field['time'],0,2) . ":" . substr($field['time'],2,2),$work);
			$work = str_replace("%URL%",$this->member_listdata[$field['id']]['blogurl'],$work);
			if ($this->NewChek($field['date'],$field['time']) == 0) {
				$work = str_replace("%NEW%","",$work);
			} else {
				$work = str_replace("%NEW%"," class=\"new\"",$work);
			}
			$this->htmlstr .= $work;
			$nCnt++;
			if ($nCnt >= 20) {
				break;
			}
		}
	}
	function NewChek($date,$time) {
		$dt = mktime(
			(int)substr($time,0,2) + (int)substr(DEF_NEWDATE,11,2),
			(int)substr($time,2,2) + (int)substr(DEF_NEWDATE,14,2),
			0,
			(int)substr($date,4,2) + (int)substr(DEF_NEWDATE,5,2),
			(int)substr($date,6,2) + (int)substr(DEF_NEWDATE,8,2),
			(int)substr($date,0,4) + (int)substr(DEF_NEWDATE,0,4));
		if (date("YmdHi",$dt) >= date("YmdHi")) {
			return (1);
		}
		return (0);
	}
	function GetTemplate() {
$tmpl = <<<EOT
							<li>
								<a href="%URL%" target="_blank"%NEW%>
									<img src="/support/icon/%IDS%.jpg" alt="" width="140" height="94">
									<span class="update">%DATE% %TIME%</span>
									<span class="model-name">%NAME%%SEX%</span>
									<img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
								</a>
							</li>
EOT;
		return ($tmpl);
	}
}
$obj = new BlogSupporterMainPro();
?>
			<div class="module-type01">
				<div class="module-head">
					<h2 class="icn type01"><img src="/common/img/pc/index/ttl01.png" alt="ニコ☆プチ読者ブログサポーター" width="300" height="32"></h2>
					<a href="/support/" class="right fdb"><img src="/common/img/pc/img_list.png" alt="一覧" width="70" height="22"></a>
				</div>
				<div class="module-body bg-type01">
					<div id="blogsupporter" class="slider-area">
						<span class="ttl"><img src="/common/img/pc/index/ttl01b.png" alt="" width="140" height="152"></span>
						<ul class="slider-type01 index-list">
<?php echo $obj->htmlstr; ?>

						</ul>
					<!--/#blogSupporter--></div>
				</div>
			<!--/.module-type01--></div>
