<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<title>PMS - Student Information System</title>
<link rel="shortcut icon" href="http://localhost/PMS/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<form name="loginform" method="post" action="index.php">
<input type="hidden" name="module" value="login">
<input type="hidden" name="action" value="login">
<table width="100%" border="0" cellpadding="0" cellspacing="0" >
  <tbody><tr>
    <td valign="middle" height="100%" align="center" class="wrapper" >
		<?php 
		if(strlen($msg) > 0)
		{
		echo '<div class="errormsg" style="width:545px;">'.$msg.'</div>';
		}?>

<table 
align="center" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
          <td class="header"><table class="logo_padding" width="100%" 
border="0" cellpadding="0" cellspacing="0">
              <tbody><tr>
                <td>&nbsp;</td>
                <td align="right"><a href="#" 
target="_blank"></a></td>
              </tr>
            </tbody></table></td>
        </tr>
        <tr>

          <td class="content"><table width="100%" border="0" 
cellpadding="0" cellspacing="0">
              <tbody><tr>
                <td><table width="100%" border="0" cellpadding="0" 
cellspacing="0">
                    <tbody><tr>
                      <td class="header_padding"><table width="100%" 
border="0" cellpadding="0" cellspacing="0">
                          <tbody><tr>
                            <td class="header_txt">&nbsp;</td>
                          </tr>

                        </tbody></table></td>
                    </tr><tr>
                      <td class="padding"><table width="100%" border="0"
 cellpadding="0" cellspacing="0">
                          <tbody><tr>
                            <td>
                
				<table width="100%" align="center" border="0" cellpadding="2" 
cellspacing="2">
                 
                  <tbody>
                    
                    <tr>
                    <td width="40%" align="right">User Name :</td>

                    <td width="60%"><input name="txt_username" id="txt_username" class="login_txt" type="text"></td>
                  </tr>
                  <tr>
                    <td align="right">Password :</td>
                    <td><input name="txt_password" id="txt_password" class="login_txt" 
autocomplete="off" type="password"></td>
                  </tr>
				  <tr><td colspan="2">
				  
				  </td></tr><tr>

                    <td></td>
                    <td><input name="" class="login" value="" onClick="return validateUser();" type="submit" accesskey="Login [Alt+L]">                    </td>
                  </tr>
				  </tbody></table>
				  </td>
                          </tr>
                          <tr>
                            <td align="center"><p style="padding: 6px;">&nbsp;</p></td>

                          </tr>
                        </tbody></table></td>
                    </tr>
                  </tbody></table>
              </td></tr>
            </tbody></table>
        </td></tr><tr>
          <td class="footer" valign="top"><table width="100%" border="0"
 cellpadding="0" cellspacing="0">
              <tbody><tr>

                <td class="margin"></td>
              </tr>
              <tr>
                <td class="copyright" align="center">
                Copyright &copy; <?=date(Y)?> <a href="../index.php" target="_blank">Online Shopping System</a><a href="http://www.comptest.com" target="_blank"></a>. All rights Reserved.                </td>
              </tr>

            </tbody></table></td>
        </tr>
      </tbody></table></td>
  </tr>
</tbody></table>
</form>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() 
{
    $("#txt_username").focus();
});
function validateUser()
{
	if(!($("#txt_username").val()))
	{
		alert("Please enter username");
		return false;
	}
	if(!($("#txt_password").val()))
	{
		alert("Please enter password");
		return false;
	}
}
</script>