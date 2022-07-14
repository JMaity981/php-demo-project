<?
header("Pragma: public");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
$root_path=$_SERVER[DOCUMENT_ROOT]."/csmack";

function makeHeader($name, $sorter) {
	global $q; global $s; global $srci; global $sortBy; global $sortDir; global $page;
	return (($sortBy == $sorter)?'<img src="images/sr'.(($sortDir == 'asc')?'dn':'up').'.png" style="margin-right:2px; 	margin-bottom:2px; " align="absmiddle" />':'').'<a href="./?'.$q.(($s != '') ? '='.$s : '').(($srci!='')?'&'.$srci:'')."&sort=".$sorter."&dir=".(($sortDir == 'asc' && $sortBy == $sorter)?"desc":"asc").'&page='.$page.'" style="color:#000000;text-decoration:none;" title="Change Order">'.$name.'</a>';
}

function addslash($str) {
	return eregi_replace("'", "\'", $str);
}
function remslash($str) {
	return eregi_replace("\\\'","'", $str);
}

function cropString($str, $len) {
	if($str != '') {
	$str = array_shift(split("\n", $str));
	if (strlen($str) > $len) {
			$pos = strrpos(substr($strs, 0, $len), ' ');
			return (($pos === false)?substr($str, 0, $len).'&hellip;':substr($str, 0, $pos).'&nbsp;&hellip;');	
		} else
			return $str;
	} else 
		return $str;	
}

function setPhone($phone) {
    return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone); 
}

if ( $q == 'logout' ) {
	$result = query("SELECT name, uid, level, cid FROM sessions WHERE sid='$_sid' LIMIT 1");
	if ($result->num_rows == 1) {
		$row = $result->fetch_array(MYSQLI_NUM);
		$a_acc = intval($row[2]);
	}
	query("DELETE FROM sessions WHERE sid='$_sid'");
	setcookie("session", "", $time - 36000, "/", $host);
	header("HTTP/1.1 303 See Other");
	header("Location: ./".(($a_acc == 5)?"?customerWelcome&CID=".$CID:""));
	header("Connection: close");
	die;
}
query("DELETE FROM sessions WHERE UNIX_TIMESTAMP(time)<'".($time - 1200)."' AND level!='1'");
	if (array_key_exists("SID", $_GET)) {
	$_sid = trim($_GET['SID']);
	}

	if (array_key_exists("CID", $_GET)) {
	$CID = trim($_GET['CID']);
	$result = query("SELECT id, company_id, company_name FROM company WHERE company_id='$CID' AND status!='0' LIMIT 1"); 
	if ($result->num_rows == 0) {
		$q = 'customerCompError'; 
	} else{
		$row = $result->fetch_array(MYSQLI_NUM);
		$_cid = intval($row[0]);		
	}
}
if ($_sid != '' ) {
	$result = query("SELECT name, uid, level, cid FROM sessions WHERE sid='$_sid' LIMIT 1");
	if ($result->num_rows == 1) {
		$row = $result->fetch_array(MYSQLI_NUM);
		$a_uid = intval($row[1]);
		$a_acc = intval($row[2]);
		$_cid = intval($row[3]);
		$a_name = $row[0];
		query("UPDATE sessions SET time=FROM_UNIXTIME($time) WHERE sid='$_sid' LIMIT 1");
	} else {
		$_sid = '';
		setcookie("session", "", $time - 36000, "/", $host);
	}
}

if ($q == 'login') {
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	if ( count($_POST) != 0 ) {
		$level = intval($level);
		$result = query("SELECT id, level, firstname, status, lastname, cid,uname FROM users WHERE email!='' AND uname='".strtolower($username)."' AND pass='".md5($password)."' AND status!='0' LIMIT 1");
		if ($result->num_rows == 1) {
			$row = $result->fetch_array(MYSQLI_NUM);
			$a_uid = intval($row[0]);
			$a_acc = intval($row[1]);
			$_cid = intval($row[5]);
			$a_name = $row[6];
			query("DELETE FROM sessions WHERE uid='$a_uid'");
			do {
				$_sid = md5(uniqid(microtime()));
				$result = query("SELECT uid FROM sessions WHERE sid='$_sid' LIMIT 1");
			} while ($result->num_rows > 0);
			query("INSERT INTO sessions VALUES('$_sid', '$a_name', '$a_uid', '$_cid', '$a_acc', FROM_UNIXTIME($time))");
			setcookie("session", $_sid, $time+1200, "/", $host);
			header("HTTP/1.1 303 See Other");
			header("Location: ./?".($_POST['url']?$_POST['url']:$H[$a_acc]));
			header("Connection: close");
			die;
		} 
	}
	$a_uid = -1;
	$q = 'login';
	$url = $_POST['url'];
}
if ($_sid != '') {
	setcookie("session","$_sid",NULL,"/",$host);
}
if ( trim($q) == '' && $a_acc == 0) {
	$q = 'login';
} else if(trim($q) == '' && $a_acc >0) {
	$q = $H[$a_acc];
}
	
$access = array('adminHome'=>array(1,2),'addresCategory'=>array(1,2),'addresSubcategory'=>array(1,2),
'resCategory'=>array(1,2),'resSubcategory'=>array(1,2),'category'=>array(1,2),'addCategory'=>array(1,2),'addQuestion'=>array(1,2),'quiz'=>array(1,2),'users'=>array(1,2),'user'=>array(1,2),'photoSizes'=>array(1,2),'photosize'=>array(1,2),'addResource'=>array(1,2),'searchResource'=>array(1,2),'manageresources'=>array(1,2),'photoupload_step1'=>array(1,2),'photoupload_step2'=>array(1,2),'photoupload_step3'=>array(1,2),'photoupload_step4'=>array(1,2),'faqcategory'=>array(1,2),'addfaqCategory'=>array(1,2),'addfaq'=>array(1,2),'faq'=>array(1,2));

if (in_array($q, array_keys($access)) && !in_array($a_acc, $access[$q])) {
	if (array_key_exists('nohtml', $_GET)) {
		header('Content-type: text/xml');
		echo "<error><id>You have been logged out due to more than 20 minutes of inactivity.</id></error>"; 
		die;
	} else {	
		$q = 'login';
		$url = ($_SERVER['REQUEST_METHOD'] == 'POST')?$_SERVER['HTTP_REFERER']:$_SERVER['QUERY_STRING'];
	}
}

if ($q == 'saveCategory' && count($_POST)) {	
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	if ($id) $cr="and id!='$id'";
	if ($category == '') $err['category'] = "Resource may not be empty.";
	else if(query("SELECT resource FROM resourcetype WHERE resource='$category' and status!=0 ".$cr."")->num_rows>0)
	$err['category'] = "Resource already exist.";
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	if (!$id){
	query ("INSERT INTO resourcetype SET resource='$category',status=1");
	$msg = "Created";}
	else {
	query ("UPDATE resourcetype SET resource='$category' WHERE id='$id'");
	$msg = "Updated";}
	echo "<result><msg>Successfully $msg.</msg></result>";
	die;
}
if ($q == 'DeleteResource') {
	$id = $_GET[del];
	$page = $_GET[page];
	if ($id)
	query ("UPDATE resourcetype SET status='0' WHERE id='$id'");
	header("location: ./?category&page=$page");
}
if ($q == 'Resourcestatus') {
	$id=$_GET[id];
	$page=$_GET[page];
	if($id)
	query("UPDATE resourcetype SET status='".$_GET[st]."' WHERE id='$id'");
	header("location: ./?category&page=$page");
}


if ($q == 'savefaqCategory' && count($_POST)) {	
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	if ($id) $cr="and id!='$id'";
	if ($category == '') $err['category'] = "FAQ Category may not be empty.";
	else if(query("SELECT faqcategory FROM faqcategory WHERE faqcategory='$category' and status!=0 ".$cr."")->num_rows>0)
	$err['category'] = "FAQ Category already exist.";
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	if (!$id){
	query ("INSERT INTO faqcategory SET faqcategory = '$category',status=1");
	$msg = "Created"; }
	else {
	query ("UPDATE faqcategory SET faqcategory = '$category' WHERE id='$id'");
	$msg = "Updated";}
	echo "<result><msg>Successfully $msg.</msg></result>";
	die;
}
if ($q == 'Deletefaqcategory') {
	$id = $_GET[del];
	$page = $_GET[page];
	if ($id)
	query ("UPDATE faqcategory SET status = '0' WHERE id='$id'");
	header("location: ./?faqcategory&page=$page");
}
if ($q == 'Faqcategorystatus') {
	$id = $_GET[id];
	$page = $_GET[page];
	if ($id)
	query("UPDATE faqcategory SET status='".$_GET[st]."' WHERE id='$id'");
	header("location: ./?faqcategory&page=$page");
}

if ($q == 'addfaq' && count($_POST)) {	
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	$answer=stripslashes( $_POST['answer'] );
	if ($id) $cr="and id!='$id'";
	if ($category == '') $err['category'] = "FAQ Category may not be empty.";
	if ($question == '') $err['question'] = "FAQ question may not be empty.";
	if ($answer == '') $err['answer'] = "Answer may not be empty.";
	else if(query("SELECT question FROM faq WHERE category = '$category' and question = '$question' and status!=0 ".$cr."")->num_rows>0)
	$err['category'] = "Question already exist.";
	if (!$id){
	query ("INSERT INTO faq SET category = '$category',question = '$question',answer = '$answer', status = 1");
	$msg = "Created";}
	else {
	query ("UPDATE faq SET category = '$category',question = '$question',answer = '$answer' WHERE id='$id'");
	$msg = "Updated";
	}
	header("location: ./?faq");
}

if ($q == 'Deletefaq') {
	$id = $_GET[del];
	$page = $_GET[page];
	if ($id)
	query ("UPDATE faq SET status = '0' WHERE id='$id'");
	header("location: ./?faq&page=$page");
}
if ($q == 'faqstatus') {
	$id = $_GET[id];
	$page = $_GET[page];
	if($id)
	query("UPDATE faq SET status='".$_GET[st]."' WHERE id='$id'");
	header("location: ./?faq&page=$page");
}

if ($q == 'resourceCategory' && count($_POST)) {	
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	if($id) $cr="and id!='$id'";
	if ($category == '') $err['category'] = "Category may not be empty.";
	else if(query("SELECT category FROM resourcecategory WHERE category='$category' and status!=0 ".$cr."")->num_rows>0)
	$err['category'] = "Category already exist.";
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	if (!$id){
	query("INSERT INTO resourcecategory SET category='$category',status=1");
	$msg = "Created"; }
	else {
	query("UPDATE resourcecategory SET category='$category' WHERE id='$id'");
	$msg = "Updated"; }
	echo "<result><msg>Successfully $msg.</msg></result>";
	die;
}
if ($q == 'DeleteRescategory') {
	$id = $_GET["del"];
	$page = $_GET["page"];
	if ($id)
	query("UPDATE resourcecategory SET status='0' WHERE id='$id'");
	header("location: ./?resCategory&page=$page");
}
if ($q == 'Rescategorystatus') {
	$id = $_GET["id"];
	$page = $_GET["page"];
	if($id)
	query("UPDATE resourcecategory SET status='".$_GET[st]."' WHERE id='$id'");
	header("location: ./?resCategory&page=$page");
}

if ($q == 'resourceSubCategory' && count($_POST)) {	
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	if ($id) $cr="and id!='$id'";
	if ($category == '') $err['category'] = "Category may not be empty.";
	if ($subcategory == '') $err['subcategory'] = "Subcategory may not be empty.";
	else if(query("SELECT subcategory FROM resourcesubcategory WHERE subcategory='$subcategory' and cid='$category' and status!=0 ".$cr."")->num_rows>0)
	$err['subcategory'] = "Subcategory already exist.";
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	if(!$id){
	query("INSERT INTO resourcesubcategory SET cid='$category',subcategory='$subcategory',status=1");
	$msg = "Created";}
	else {
	query("UPDATE resourcesubcategory SET cid='$category',subcategory='$subcategory' WHERE id='$id'");
	$msg = "Updated";}
	echo "<result><msg>Successfully $msg.</msg></result>";
	die;
}
if ($q == 'DeleteRessubcategory') {
	$id = $_GET[del];
	$page = $_GET[page];
	if ($id)
	query("UPDATE resourcesubcategory SET status='0' WHERE id='$id'");
	header("location: ./?resSubcategory&page=$page");
}
if ($q == 'Ressubcategorystatus') {
	$id = $_GET[id];
	$page = $_GET[page];
	if ($id)
	query("UPDATE resourcesubcategory SET status='".$_GET[st]."' WHERE id='$id'");
	header("location: ./?resSubcategory&page=$page");
}

if ($q == 'adduser' && count($_POST)) {	
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	if ($id) $cr="and id!='$id'";
	if ($name == '') $err['name'] = "Name may not be empty.";
	if ($email == '') $err['email'] = "Email may not be empty.";
	else if(query("SELECT email FROM users WHERE email='$email' and status!=0 ".$cr."")->num_rows>0)
	$err['email'] = "EmailId already exist.";
	elseif (!eregi('^[-a-z0-9!#$%&\'*+/=?^_`{|}~]+(\.[-a-z0-9!#$%&\'*+/=?^_`{|}~]+)*@(([a-z]([-a-z0-9]*[a-z0-9]+)?){1,63}\.)+([a-z]([-a-z0-9]*[a-z0-9]+)?){2,63}$',$email)) $err['email'] = "Invalid email address.";
	if ($username == '') $err['username'] = "Username may not be empty.";
	else if(query("SELECT uname FROM users WHERE uname='$username' and status!=0 ".$cr."")->num_rows>0)
	$err['username'] = "Username already exist.";
	if(!$id) {
	if ($password == '') $err['password'] = "Password may not be empty.";
	elseif(strlen($password)<5) $err['password'] = "Password should be more then 5 character.";
	if ($cpassword == '') $err['cpassword'] = "Confirm password may not be empty.";
	if($password!=$cpassword) $err['cpassword'] = "Password do not match.";
	}
	else {
		if ($password){
		if (strlen($password)<5) $err['password'] = "Password should be more then 5 character.";
		if ($cpassword == '') $err['cpassword'] = "Confirm password may not be empty.";
		if ($password!=$cpassword) $err['cpassword'] = "Password do not match.";
		$str = ",pass='".md5($password)."'";
		}
	}
	if ($level == '') $err['level'] = "Userlevel may not be empty.";
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	if (!$id){
	query("INSERT INTO users SET firstname='$name',email='$email',uname='$username',pass='".md5($password)."',level='$level',status=1");
	$msg="Created";}
	else {
	query("UPDATE users SET firstname='$name',email='$email',uname='$username',level='$level' ".$str." WHERE id='$id'");
	$msg="Updated";}
	echo "<result><msg>Successfully $msg.</msg></result>";
	die;
}
if ($q == 'DeleteUser') {
	$id = $_GET[del];
	$page = $_GET[page];
	if ($id)
	query("UPDATE users SET status='0' WHERE id='$id'");
	header("location: ./?users&page=$page");
}
if ($q == 'Userstatus') {
	$id = $_GET[id];
	$page = $_GET[page];
	if ($id)
	query("UPDATE users SET status='".$_GET[st]."' WHERE id='$id'");
	header("location: ./?users&page=$page");
}

if ($q == 'addQuestion' && count($_POST)) {
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	if ($id) $cr = "and id!='$id'";
	if ($category == '') $err['category'] = "Resource  type may not be empty.";
	if ($quizquestion == '') $err['quizquestion'] = "Question may not be empty.";
	if ($ans == '') $err['message'] = "Please choose right answer.";
	for ($i=1;$i<=$counter;$i++){
		if (trim($_POST["answer$i"]) == '') 
		$err['message'] = "Please fill all answer";
		if ($id){
		if(query("SELECT answer FROM answers WHERE answer='".$_POST["answer$i"]."' and status!=0 and qid='$id' and id!='".$_POST["answerid$i"]."'")->num_rows>0)
		$err['message'] = "Duplicate answer found.Please check your answer.";}
	}
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	if (!$id){
	query("INSERT INTO questions SET question='$quizquestion',resourcetype='$category',created=now(),status=1");
	$qid = $mysqli->insert_id;
	for ($i=1;$i<=$counter;$i++){
	$a = ($i==$ans)?"1":"0";
	query("INSERT INTO answers SET qid='$qid',answer='".$_POST["answer$i"]."',astatus='$a',status=1");
		}
	$msg="Created";
	}
	else {
		$msg = "Updated";
		query("UPDATE questions SET question='$quizquestion',resourcetype='$category' WHERE id='$id'");
		for ($i=1;$i<=$counter;$i++){
			$a = ($i==$ans)?"1":"0";
			if ($_POST["answerid$i"]){
			query("UPDATE answers SET qid='$id',answer='".$_POST["answer$i"]."',astatus='$a'
			 WHERE id='".$_POST["answerid$i"]."'");
			 }
			else {
			query("INSERT INTO answers SET qid='$id',answer='".$_POST["answer$i"]."',astatus='$a',status=1");
			}
		}
	}
	echo "<result><msg>Successfully $msg.</msg></result>";
	die;
}

if ($q == 'DeleteQuestion') {
	$id = $_GET[del];
	$page = $_GET[page];
	if ($id){
	query("UPDATE questions SET status='0' WHERE id='$id'");
	query("UPDATE answers SET status='0' WHERE qid='$id'");
	}
	header("location: ./?quiz&page=$page");
}
if ($q == 'Questionstatus') {
	$id = $_GET[id];
	$page = $_GET[page];
	if ($id)
	query("UPDATE questions SET status='".$_GET[st]."' WHERE id='$id'");
	header("location: ./?quiz&page=$page");
}
if ($q == 'deleteAns') {
	$id = $_GET[id];
	$s = $_GET[s];
	if ($id)
	query("UPDATE answers SET status='0' WHERE id='$id'");
	header("location: ./?addQuestion=$s");
}

if ($q == 'savePhotosize' && count($_POST)) {
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	if ($id) $cr="and id!='$id'";
	if ($title == '') $err['title'] = "Title may not be empty.";
	else if (query("SELECT title FROM photosize WHERE title='$title'  and status!=0 ".$cr." LIMIT 1")->num_rows>0)
	$err['title'] = "Title already exist.";
	else if (!eregi('^[a-zA-Z0-9_]{1,}$',$title)) $err['title'] = "Invalid title. Enter only characters, number and _.";
	if ($pwidth == '') $err['pwidth'] = "Horizontal width may not be empty.";
	else if (!is_numeric($pwidth)) $err['pwidth'] = "Horizontal width should be in number.";
	if ($pheight == '') $err['pheight'] = "Vertical width may not be empty.";
	else if (!is_numeric($pheight)) $err['pheight'] = "Vertical width should be in number.";
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	if(!$id){
	query("INSERT INTO photosize SET title='$title',hwidth='$pwidth',vwidth='$pheight',status=1");
	mkdir($root_path."/resources/photos/".$title."");
	$msg="Created";}
	else {
	query("UPDATE photosize SET title='$title',hwidth='$pwidth',vwidth='$pheight' WHERE id='$id'");
	$msg="Updated";
	if (is_dir($root_path."/resources/photos/".$oldtitle."")) {
		if($oldtitle!=$title)
		rename($root_path."/resources/photos/".$oldtitle."",$root_path."/resources/photos/".$title."");
	} else
		mkdir($root_path."/resources/photos/".$title."");
	}
	echo "<result><msg>Successfully $msg.</msg></result>";
	die;
}

if ($q == 'DeletePhotosize') {
	$id = $_GET[del];
	$page = $_GET[page];
	if($id)
	query("UPDATE photosize SET status='0' WHERE id='$id' LIMIT 1");
	header("location: ./?photoSizes&page=$page");
}
if ($q == 'PhotosizeStatus') {
	$id = $_GET[id];
	$page = $_GET[page];
	if($id)
	query("UPDATE photosize SET status='".$_GET[st]."' WHERE id='$id' LIMIT 1");
	header("location: ./?photoSizes&page=$page");
}

if ($q == 'addResource' && count($_POST)) {
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	//if($id) $cr="and id!='$id'";
	if ($title == '') $err['title'] = "Title may not be empty.";
	if ($description == '') $err['description'] = "Description may not be empty.";
	if ($keyword == '') $err['keyword'] = "Keyword/Tags may not be empty.";
	if ($photosize == '') $err['photosize'] = "Photo size may not be empty.";
	if ($category == '') $err['category'] = "Category may not be empty.";
	if ($sub_cids == '') $err['subcategory'] = "SubCategory may not be empty.";
	if ($_FILES["image"]["name"] == '') $err['image'] = "Image may not be empty.";
	
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	echo "<result><msg>Successfully Created.</msg></result>";
	die;
}

if ($q == 'photoUpload' && count($_POST)) {
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	$ext = array_pop(split("\.", $_FILES['upload_photo']['name']));
	list($width,$height)=@getimagesize($_FILES["upload_photo"]["tmp_name"]);
	if ($_FILES["upload_photo"]["name"] == '') $err['er'] = "Full-size Image may not be empty.";
	else if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'JPEG' && $ext != 'JPG') 
	$err['er'] = "Upload only jpg image.";
	else if ($width < 1600 || $height < 1200)  
	$err['er'] = "Full-size Image needs to be at least 1600 x 1200 pixels (or equivalent).";
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	do {
		$pname = md5(uniqid(microtime()));
		$pname=$pname.".".$ext;
		$result = query("SELECT id FROM resources WHERE file='$pname'  LIMIT 1");
	} while ($result->num_rows > 0);
	if(move_uploaded_file($_FILES["upload_photo"]["tmp_name"],$root_path."/resources/photo_original/".$pname.""))
	{
		$original_image = $root_path."/resources/photo_original/".$pname."";
		$thumb_image =$root_path."/resources/photo_thumbnail/".$pname;
		$thumb_imagesmall=$root_path."/resources/photo_thumbnailsmall/".$pname;
		$thumbmax_width = "380";
		$thumbmax_height = "285";
		
		$thumbsmallmax_width = "110";
		$thumbsmall_height = "110";
		
		exec("\"c:/program files/ImageMagick-6.5.0-Q16/convert.exe\" -size {$width}x{$height} $original_image -thumbnail 		          {$thumbmax_width}x{$thumbmax_height} $thumb_image");
		//watermark
		exec("\"c:/program files/ImageMagick-6.5.0-Q16/composite.exe\" -watermark 30% -gravity center ".$root_path.		         		"/admin/images/watermark.png  $thumb_image $thumb_image");
		exec("\"c:/program files/ImageMagick-6.5.0-Q16/convert.exe\" -size {$width}x{$height} $original_image -thumbnail 		          {$thumbsmallmax_width}x{$thumbsmall_height} $thumb_imagesmall");
		
		$column = ($width < $height) ? "vwidth":"hwidth";
		$size = ($width < $height) ? "".$height."":"".$width."";
		$res = query("SELECT $column,title FROM photosize WHERE $column <= '$size' ");
		 
		while ($result=$res->fetch_array()) {
		$path=$root_path."/resources/photos/".$result[1]."/".$pname;
		exec("\"c:/program files/ImageMagick-6.5.0-Q16/convert.exe\" ".$root_path."/resources/photo_original/".$pname."  \( mpr:image -thumbnail $result[0]x -write $path \)");
		
		}
		query("INSERT INTO resources SET file='$pname',resourcetype='$rid',created=now(),status=1");
		$lastid=$mysqli->insert_id;
		session_register("photoId");
		$_SESSION["photoId"] = $lastid;
		echo "<result><msg>Successfully Created.</msg></result>";
		die;
	}
	else {
		echo "<error><msg>Error in photo upload.</msg></error>";
		die;
	}
}

if ($q == 'CancelUpload') {
	if($s)
	query("UPDATE resources SET status='0' where id='$s'");
	header("Location: ./?addResource");
	}

if ($q == 'photoUpload1' && count($_POST)) {
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	if ($q1 == '' || $q1 == 'Yes') $err['info'] = "Images cannot contain any visible trademarked products,corporate identity, logos or copyrighted elements. Please cancel this upload and, if possible, remove the offending elements and re-upload.\n";
	if ($q2 == '' || $q2 == 'Yes') $err['info1'] = "Images cannot contain any artwork, photography or statuary to which you are not the principal copyright holder. Please cancel this upload and, if possible, remove the offending elements and re-upload\n";
	if ($q3 == '' || $q3 == 'Yes') $err['info2'] = "You need a model release for every face that appears in the photograph. Please cancel this upload, get a model release for every visible face and re-upload\n";
	if ($q4 == '' || $q4 == 'No') $err['info3'] = "You cannot upload a photograph to which you are not the principal copyright holder. Please cancel and upload an appropriate photograph instead\n";
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	echo "<result><msg>Successfully Updated.</msg></result>";
	die;
}
if ($q == 'photoUploadcomplete' && count($_POST)) {
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	if ($title == '') $err['title'] = "Title may not be empty.";
	if ($description == '') $err['description'] = "Description may not be empty.";
	if ($media == '') $err['media'] = "Source Media may not be empty.";
	if ($keyword == '') $err['keyword'] = "Keyword may not be empty.";
	if ($cid == '') $err['category'] = "Category may not be empty.";
	if ($sub_cids == '') $err['subcategory'] = "SubCategory may not be empty.";
	$ext = array_pop(split("\.", $_FILES['model']['name']));
	if ($_FILES["model"]["name"]) {
		if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'JPEG' && $ext != 'JPG') 
		$err["model"]="Model Release Image should have jpg format";
	}
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	if ($_FILES["model"]["name"]) {
	do {
		$pname = md5(uniqid(microtime()));
		$pname=$pname.".".$ext;
		$result = query("SELECT id FROM resources WHERE modelrelease='$pname'  LIMIT 1");
	} while ($result->num_rows > 0);
	if (move_uploaded_file($_FILES["model"]["tmp_name"],$root_path."/resources/modelrelease/".$pname."")) {
		$mfile=",modelrelease='$pname'";
	} }
	query("UPDATE resources SET 			title='$title',description='$description',keywords='$keyword',category='$cid',subcategory='$sub_cids',sourcemedia='$media',
	print='$print',license='$license',subscriptions='$subscription' $mfile WHERE id='$id' LIMIT 1");
	echo "<result><msg>Successfully Updated.</msg></result>";
	die;
}

if ($q == 'photoEdit' && count($_POST)) {
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	if ($title == '') $err['title'] = "Title may not be empty.";
	if ($description == '') $err['description'] = "Description may not be empty.";
	if ($media == '') $err['media'] = "Source Media may not be empty.";
	if ($keyword == '') $err['keyword'] = "Keyword may not be empty.";
	if ($cid == '') $err['category'] = "Category may not be empty.";
	if ($sub_cids == '') $err['subcategory'] = "SubCategory may not be empty.";
	$ext = array_pop(split("\.", $_FILES['model']['name']));
	if ($_FILES["model"]["name"]) {
		if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'JPEG' && $ext != 'JPG') 
		$err["model"]="Model Release Image should have jpg format";
	}
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	if ($_FILES["model"]["name"]) {
	do {
		$pname = md5(uniqid(microtime()));
		$pname=$pname.".".$ext;
		$result = query("SELECT id FROM resources WHERE modelrelease='$pname'  LIMIT 1");
	} while ($result->num_rows > 0);
	if (move_uploaded_file($_FILES["model"]["tmp_name"],$root_path."/resources/modelrelease/".$pname."")) {
		$mfile=",modelrelease='$pname'";
	} }
	query("UPDATE resources SET 			title='$title',description='$description',keywords='$keyword',category='$cid',subcategory='$sub_cids',sourcemedia='$media',
	print='$print',license='$license',subscriptions='$subscription' $mfile WHERE id='$id' LIMIT 1");
	echo "<result><msg>Successfully Updated.</msg></result>";
	die;
}

if ($q == 'delResource') {
	$id = $_GET[del];
	$page = $_GET[page];
	if ($id)
	query ("UPDATE resources SET status='0' WHERE id='$id' LIMIT 1");
	header("location: ./?manageresources&page=$page");
}

if ($q == 'changeResourcestatus') {
	$id = $_GET[id];
	$page = $_GET[page];
	if ($id)
	query ("UPDATE resources SET status='$_GET[st]' WHERE id='$id' LIMIT 1");
	header("location: ./?manageresources&page=$page");
}

if ($q == 'addPage' && count($_POST)) {
	header('Content-type: text/xml');
	$err = array();
	foreach ($_POST as $key => $val) {
		eval("$".$key." = htmlspecialchars(eregi_replace(\"'\",\"\'\",trim('$val')));");
	}
	if ($id) $cr="and id!='$id'";
	if ($title == '') $err['title'] = "Title may not be empty $l.";
	else if(query("SELECT title FROM pages WHERE title='$title' AND status!=0 ".$cr."")->num_rows>0)
	$err['title'] = "Title already exist.";
	//if (strip_tags($body) == '') $err['body'] = "Body may not be empty.";
	if (count($err) > 0) {
		echo "<error>\n";
		foreach ($err as $key=>$val)
			echo "<$key>$val</$key>\n";
		echo "</error>";
		die;
	}
	if ($id) {
	query("UPDATE pages SET title='$title',body='$body' WHERE id='$id' LIMIT 1");
	$msg = "Updated";
	} else {
	query("INSERT INTO pages SET title='$title',body='$body',created=now(),status=1");
	$msg = "Created";
	}
	echo "<result><msg>Successfully $msg.</msg></result>";
	die;
}

/*General functions  used for creativeSmack*/
 
function getPage($result,$inpage,$page,$sarr) {
global $q;
$all = $result->num_rows;
if($all == 0) return;
$pnum = ceil($all/$inpage);
$pst = array();
if ($page == '') $page = 1;
if ($page > $pnum) $page = $pnum; 
$a = max($page - 2,1);
$b = min($page + 2,$pnum);
$a = max(min($a,$b-4),1);
$b = min(max($b,$a+4),$pnum);
$srch = implode('&',$sarr);
unset($sarr['sort'],$sarr['dir']);
$srci = implode('&',$sarr);
if ( $page > 1) { $pst[] = "<a href='./?$q".(($s != '') ? '='.$s : '').(($srch!='')?'&'.$srch:'')."&page=".($page-1)."' style='color: #A29CC9;'>Prev</a>"; }
if ( $a > 2 )  { $pst[] = '&hellip;'; } elseif ( $a == 2 ) { $a = 1; }
for ( $i=$a; $i<=$b; $i++) {
	if ( $i != $page ) {
		$pst[] = "<a href='./?$q".(($s != '') ? '='.$s : '').(($srch!='')?'&'.$srch:'')."&page=$i'>$i</a>";
	} else {
		$pst[] = "<span style='text-decoration:underline; color:#b5b5b5'>$i</span>";
	}
}
if ( $pnum > $b + 1 ) { $pst[] = '&hellip;'; } elseif ( $pnum == $b + 1 ) { $pst[] = "<a href='./?$q".(($s != '') ? '='.$s : '').(($srch!='')?'&'.$srch:'')."&page=$pnum'>$pnum</a>"; }
			
if ( $page < $pnum ) { $pst[] = "<a href='./?$q".(($s != '') ? '='.$s : '').(($srch!='')?'&'.$srch:'').'&page='.($page+1)."'>Next</a>"; }
$pst="Pages: ".join($pst,"&nbsp;")."";
if ($page != 1)
	$sl = ($page*$inpage)-$inpage+1;
else
	$sl = 1;

$arr = $all."##".$pnum."##".$pst."##".$sl;
return $arr; 
}

function printDate($date) {
	print substr($date,0,10);
}
?>