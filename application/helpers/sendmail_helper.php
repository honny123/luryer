<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 require_once ("class.phpmailer.php");
function sendmail($data){
	$mail = new PHPMailer();
	$mail->IsSMTP();       
	$mail->SMTPAuth = true;                     // 经smtp发送  
	$mail->CharSet = 'utf-8';
 $mail->Host     = "smtp.yeah.net";           // SMTP 服务器  
  $mail->Port = 25;
  $mail->SMTPSecure = "tls";
 $mail->Username = "luryer@yeah.net";    // 用户名  
 $mail->Password = "wlsh.425071817";          // 密码  
 $mail->From     = "luryer@yeah.net";                  // 发信人  
 $mail->FromName = "裸游网";        // 发信人别名  
 $mail->AddAddress($data['adress']);                 // 收信人   
 $mail->WordWrap = 50;  					//设置每行字符长度
 $mail->IsHTML(true);                            // 以html方式发送  
 $mail->Subject  = '裸游网账户激活';                 // 邮件标题  
 $mail->Body     = '尊敬的'.$data['adress'].':<br />'.
 '感谢您注册裸游网，点击下面链接激活账户。<br />'.
 site_url('active?adress='.$data['adress'].'&code='.$data['activeCode']).'<br />'.
 '如果不能打开，请将上面地址复制粘贴到浏览器地址栏中打开';                   // 邮件内空  
 //$mail->AltBody  =  '尊敬的'.$data['adress'].":\n感谢您注册裸游网，点击下面链接激活账户。\n".site_url('active?adress='.$data['adress'].'&code='.$data['activeCode']);  
 if(!$mail->Send())    
    {    
        echo "邮件发送有误 <p>";    
        echo "邮件错误信息: " . $mail->ErrorInfo;    
        exit;    
    } 
}
 