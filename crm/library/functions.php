<?php
defined('PATH_LIB') or die("Restricted Access");
//require '/vendor/autoload.php';
//use \Osms\Osms;

function generatePIN()
{
    $pin=rand(1111,9999);
    return $pin;
}

function randomFix($length)
{
    $random= "";

    srand((double)microtime()*1000000);

    $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
    $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
    $data .= "0FGH45OP89";

    for($i = 0; $i < $length; $i++)
    {
            $random .= substr($data, (rand()%(strlen($data))), 1);
    }
    return $random;
}

function send_sms($to,$message)
{
    if($_SERVER['HTTP_HOST'] == "192.168.0.5" || $_SERVER['HTTP_HOST'] == "103.36.121.52:82")
    {
        //$to='91'.$to;
        //$to=$to;
        //$url = "http://104.156.253.108:8008/websmpp/websms?user=OMSoftD&pass=fQ4c5Gyz&sid=KWIKBL&mno=".trim($to)."&text=".urlencode($message)."&type=1";
        $url = "http://sms.sunstechit.com/app/smsapi/index.php?key=35B83F3DF27E61&campaign=0&routeid=13&type=text&contacts=".trim($to)."&senderid=SMSDMO&msg=".urlencode($message);

    }
    else if($_SERVER['HTTP_HOST'] == "www.omsoftware.us" || $_SERVER['HTTP_HOST'] == "omsoftware.us" || $_SERVER['HTTP_HOST'] == "www.myauto.co.in" || $_SERVER['HTTP_HOST'] == "myauto.co.in" )
    {
        //$to='91'.$to;
        //$to=$to;
        //$url = "http://104.156.253.108:8008/websmpp/websms?user=OMSoftD&pass=fQ4c5Gyz&sid=KWIKBL&mno=".trim($to)."&text=".urlencode($message)."&type=1";
        $url = "http://sms.sunstechit.com/app/smsapi/index.php?key=35B83F3DF27E61&campaign=0&routeid=13&type=text&contacts=".trim($to)."&senderid=MYAUTO&msg=".urlencode($message);
    }


    /*below condition is implemented so we can not send sms from local server for saving sms cost*/
    if($_SERVER['HTTP_HOST'] == "103.36.121.52:82" || $_SERVER['HTTP_HOST'] == "www.omsoftware.us" || $_SERVER['HTTP_HOST'] == "omsoftware.us" || $_SERVER['HTTP_HOST'] == "myauto.co.in" || $_SERVER['HTTP_HOST'] == "www.myauto.co.in")
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $body = $result;
        //echo $url;
    }
}

function send_push($type,$reference_id)
{
    global $db;

    $pushtemplatedata=$db->getRow("select * from push_template where push_type='".$type."' ");

    if($type=='ride_request')
    {
        $users=$db->getRows("select * from users  where  user_type=2 and lat!='' and lng!='' and isbusy=0   ");
        $requestdetail=$db->getRow("select * from bookings  where  id='".$reference_id."' ");
        if(count($users)>0)
        {
            $allusers=[];
            foreach($users as $usersi)
            {
                $distance = calc_dist($requestdetail['from_lat'],$requestdetail['from_long'] , $usersi['lat'], $usersi['lng']);

                $radius=3;

                if($distance<=$radius)
                {
                    $allusers[]=array(
                        "id"=>$usersi['id'],
                    );
                }
            }

            foreach($allusers as $allusersi)
            {
                $aryData =  array(
                                'booking_id'            => $reference_id,
                                'driver_id'             => $allusersi['id'],
                                'status'                => 0,
                            );

                $flgIn=$db->insertAry("booking_assign",$aryData);
            }
        }
    }
    else if($type=='ride_accepted')
    {
        //$userid=$db->getVal("select b.user_id from bookings b,booking_assign ba where b.id=ba.booking_id and ba.id='".$reference_id."' ");
        $userid=$db->getVal("select user_id from bookings where id='".$reference_id."' ");
        $allusers=$db->getRows("select * from users where id='".$userid."' ");
    }
    else if($type=='driver_reached')
    {
        //$userid=$db->getVal("select b.user_id from bookings b,booking_assign ba where b.id=ba.booking_id and ba.id='".$reference_id."' ");
        $userid=$db->getVal("select user_id from bookings where id='".$reference_id."' ");
        $allusers=$db->getRows("select * from users where id='".$userid."' ");
    }
    else if($type=='ride_started')
    {
        //$userid=$db->getVal("select b.user_id from bookings b,booking_assign ba where b.id=ba.booking_id and ba.id='".$reference_id."' ");
        $userid=$db->getVal("select user_id from bookings where id='".$reference_id."' ");
        $allusers=$db->getRows("select * from users where id='".$userid."' ");
    }
    else if($type=='ride_completed')
    {
        //$userid=$db->getVal("select b.user_id from bookings b,booking_assign ba where b.id=ba.booking_id and ba.id='".$reference_id."' ");
        $userid=$db->getVal("select user_id from bookings where id='".$reference_id."' ");
        $allusers=$db->getRows("select * from users where id='".$userid."' ");
    }
    else if($type=='ride_cancelled_by_driver')
    {
        //$userid=$db->getVal("select b.user_id from bookings b,booking_assign ba where b.id=ba.booking_id and ba.id='".$reference_id."' ");
        $userid=$db->getVal("select user_id from bookings where id='".$reference_id."' ");
        $allusers=$db->getRows("select * from users where id='".$userid."' ");
    }
    else if($type=='ride_cancelled_by_user')
    {
        $userid=$db->getRow("select driver_id,booking_id from booking_assign where id='".$reference_id."' ");
        $allusers=$db->getRows("select * from users where id='".$userid['driver_id']."' ");
        $reference_id=$userid['booking_id'];
    }
    else if($type=='ride_autocancel')
    {
        $userid=$db->getVal("select user_id from bookings where id='".$reference_id."' ");
        $allusers=$db->getRows("select * from users where id='".$userid."' ");
    }
    /*else if($type=='chat_message_fromuser')
    {
        $chatdetail=$db->getRow("select * from chat where id='".$reference_id."'");
        //$userid=$db->getVal("select provider_id from service_request_allot where id='".$chatdetail['to_id']."' ");
        $userid=$chatdetail['to_id'];
        $allusers=$db->getRows("select * from users where id='".$userid."' ");
    }
    else if($type=='chat_message_fromprovider')
    {
        $chatdetail=$db->getRow("select * from chat where id='".$reference_id."'");
        //$userid=$db->getVal("select user_id from service_request where id='".$chatdetail['to_id']."' ");
        $userid=$chatdetail['to_id'];
        $allusers=$db->getRows("select * from users where id='".$userid."' ");

    }*/
    if(count($allusers)>0)
    {
        foreach($allusers as $allusersi)
        {
            $uid=$allusersi['id'];
            $aryData =  array(
                        'user_id'       => $allusersi['id'],
                        'reference_id'  => $reference_id,
                        'type'          => $type,
                    );
            $flgIn=$db->insertAry("notification",$aryData);
            /*$language=$allusersi['language'];
            if($language!="en")
            {
                $title=$pushtemplatedata[$language.'_title'];
                $message=$pushtemplatedata[$language.'_message'];
            }
            else
            {
                $title=$pushtemplatedata['title'];
                $message=$pushtemplatedata['message'];
            }*/

            $title=$pushtemplatedata['title'];
            $message=$pushtemplatedata['message'];

            if($type=='ride_completed')
            {
                $ridecost=$db->getVal("select final_cost from bookings  where id='".$reference_id."' ");

                $message.=". The ride cost is Rs ".round($ridecost);

                /*$vars=array(
                    "{ride_cost}"=>$ridecost
                );*/
            }
            if(count($vars))
            {
                foreach($vars as $key => $val)
                {
                    $message=str_replace($key,$val,$message);
                }
                //$message = str_replace("{","",$message);
                //$message = str_replace("}","",$message);
            }

            $allandroiddevices=$db->getRows("select * from user_devices where user_id='".$uid."' and device_platform='android' ");
            if(count($allandroiddevices)>0)
            {
                define('API_ACCESS_KEY', 'AIzaSyDvLhY--9wQzkEcpNqUqwVLO5PpNKDo3ZU');
                //define('API_ACCESS_KEY', 'AIzaSyD61VGmrRR4kU2MlRxWGLFrMSHMyA-T12k');
                $registrationIds=[];

                foreach($allandroiddevices as $allandroiddevicesi)
                {
                    $registrationIds[]=$allandroiddevicesi['registrationid'];
                }

                /*if($type=='request_ride' || $type=='cancel_ride' || $type=='pick_me')
                {
                    $id=$allusersi['trip_id'];
                }

                if($type == 'offer_trip' || $type=='ride_with_me' || $type=='cancel_trip' || $type=='start_ride' || $type=='reject_user')
                {
                    $id=$allusersi['ride_id'];
                }*/


                $msg = array
                (
                    'title'     => $title,
                    'message' 	=> $message,
                    'vibrate'	=> 1,
                    'sound'     => 1,
                    'largeIcon'	=> 'large_icon',
                    'smallIcon'	=> 'small_icon',
                    'type'      => $type,
                    'id'        => $reference_id,
                );

                $fields = array
                (
                    'registration_ids' 	=> $registrationIds,
                    'data'		=> $msg,
                );
                $headers = array
                (
                    'Authorization: key=' . API_ACCESS_KEY,
                    'Content-Type: application/json'
                );

                $ch = curl_init();
                curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                curl_setopt( $ch,CURLOPT_POST, true );
                curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                $result = curl_exec($ch );
                //print_r($result);
                //exit;
                curl_close( $ch );
            }

            $alliosdevices=$db->getRows("select * from user_devices where user_id='".$allusersi['id']."' and device_platform='ios' ");
            if(count($alliosdevices)>0)
            {
                foreach($alliosdevices as $alliosdevicesi)
                {
                    $tHost = 'gateway.push.apple.com';
                    $tPort = 2195;
                    if($alliosdevicesi['user_type']==1)
                    {
                        $tCert = 'enkaaz.pem';
                    }
                    else
                    {
                        $tCert = 'enkaazprovider.pem';
                    }
                    $tPassphrase = '123456';
                    $tToken = $alliosdevicesi['registrationid'];
                    $tAlert = $message;
                    $tBadge = (int)$unreadcount;
                    $tSound = 'default';
                    $tPayload = 'APNS Message Handled by LiveCode';
                    $tBody['aps'] = array (
                                        'alert' => $tAlert,
                                        'badge' => $tBadge,
                                        'sound' => $tSound,
                                    );
                    $tBody ['payload'] = $tPayload;
                    $tBody = json_encode ($tBody);
                    $tContext = stream_context_create ();
                    stream_context_set_option ($tContext, 'ssl', 'local_cert', $tCert);
                    stream_context_set_option ($tContext, 'ssl', 'passphrase', $tPassphrase);
                    $tSocket = stream_socket_client ('ssl://'.$tHost.':'.$tPort, $error, $errstr, 30, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $tContext);
                    /*if (!$tSocket)
                    exit ("APNS Connection Failed: $error $errstr" . PHP_EOL);*/
                    $tMsg = chr (0) . chr (0) . chr (32) . pack ('H*', $tToken) . pack ('n', strlen ($tBody)) . $tBody;
                    $tResult = fwrite ($tSocket, $tMsg, strlen ($tMsg));

                    /*if ($tResult)
                    echo 'Delivered Message to APNS' . PHP_EOL;
                    else
                    echo 'Could not Deliver Message to APNS' . PHP_EOL;*/
                    // Close the Connection to the Server.
                    fclose ($tSocket);
                }
            }
        }
    }
}

function mail_template($to,$type,$vars=NULL,$subject=NULL)
{
    if($_SERVER['HTTP_HOST'] == "www.omsoftware.us" || $_SERVER['HTTP_HOST'] == "omsoftware.us" || $_SERVER['HTTP_HOST']=="54.209.77.253" || $_SERVER['HTTP_HOST'] == "myauto.co.in" || $_SERVER['HTTP_HOST'] == "www.myauto.co.in")
    {
        global $db;
        $emails = $db->getRow("select * from email_template where email_type = '".$type."'");
        $sub = $emails['subject'];
        if($type=='invoice')
        {
            $url = URL_ROOT . "invoice_mail_format.php?email_type=" . $type;
        }
        else
        {
            $url = URL_ROOT . "user_mail_format.php?email_type=" . $type;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $body = $result;

        if($vars!="")
        {
            if(count($vars))
            {
                foreach($vars as $key => $val)
                {
                    if($key=='url'){$val="<a href='".$val."'>Click Here</a></h1>";}
                    $body=str_replace($key,$val,$body);
                }
                $body = str_replace("{","",$body);
                $body = str_replace("}","",$body);
            }
        }

        $mail = new PHPMailer();
        if($_SERVER['HTTP_HOST'] == '192.168.0.5' || $_SERVER['HTTP_HOST'] == '103.36.121.52:82')
        {
            $mail->IsSMTP();
        }
        $arySettings=fetchSetting(array('mail_host','mail_port','mail_uname','mail_password'));
        $mail->Host = $arySettings['mail_host'];
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->Port = $arySettings['mail_port'];
        $mail->Username = $arySettings['mail_uname'];
        $mail->Password = $arySettings['mail_password'];
        $mail->SetFrom($emails['from_email'], $emails['from_name']);

        $mail->IsHTML(true);
        $mail->Subject = $sub ;
        $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
        $mail->MsgHTML($body);
        $mail->AddAddress($to, '');
        $mail->Send();
        $mail->ClearAddresses();
    }
}

function msg($msg)
{
    if(count($msg))
    foreach($msg as $type => $content)

    if($msg[$type]!='')
    {
        return '<div class="status '.$type.'">
            <p class="closestatus"><a href="javascript:void(0);" onclick="$(\'.status\').remove()" title="Close">x</a></p>
            <p><img src="'.URL_ADMIN.'images/icon_'.$type.'.png" align="absmiddle">&nbsp;&nbsp;'.$content.'</p>
        </div>';
    }
}

function validate_mobile($mobile)
{
    return preg_match('/^[0-9]{10}+$/', $mobile);
}

function validate_email($email)
{
    $result=  ereg ("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
    if (!$result)
    {
        return 0;
    }
    else
    {
        return 1;
    }
}

function validate_name($name)
{
    $result=  ereg ("^[A-Za-z\'\ ]+$", $name);
    if (!$result)
    {
        return 0;
    }
    else
    {
        return 1;
    }
}

function cost_estimation($cityid,$distance)
{
    global $db;
    $ratecard=$db->getRow("select * from ratecard where city='".$cityid."'");

    $km=$distance ;
    if(trim($km)<=trim($ratecard['baseratekm']))
    {
        return  $ratecard['baserate'];
    }
    else
    {
        $extrakm=$km-$ratecard['baseratekm'];
        $calamount=$extrakm*$ratecard['rate'];
        return  $ratecard['baserate']+$calamount+$ratecard['access_fees'];
    }
}

function redirect($url=NULL)
{
    if(is_null($url)) $url=curPageURL();
    if(headers_sent())
    {
        echo "<script>window.location='".$url."'</script>";
    }
    else
    {
        header("Location:".$url);
    }
}

function fetchSetting($mixVal)
{
    $aryReturn=array();
    $strSetting='';
    if(is_array($mixVal) && count($mixVal)>0)
    {
        $strSetting="'".implode("', '",$mixVal)."'";
    }
    elseif(trim($mixVal)!='')
    {
        $strSetting="'".$mixVal."'";
    }
    if(trim($strSetting)!='')
    {
        global $db;
        $query = "select * from settings where `field` in (".$strSetting.")";
        $arySetData = $db->getRows($query);
        if(is_array($arySetData) && count($arySetData)>0)
        {
            foreach($arySetData as $iSetData)
            {
                $aryReturn[$iSetData['field']]=$iSetData['value'];
            }
        }
    }
    return $aryReturn;
}

function calc_dist($latitude1, $longitude1, $latitude2, $longitude2)
{
    $thet = $longitude1 - $longitude2;
    $dist = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($thet)));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $kmperlat = 111.325; // Kilometers per degree latitude constant
    $dist = $dist * $kmperlat;
    return (round($dist));
}

function utf8_to_unicode($str)
{
    $unicode = array();
    $values = array();
    $lookingFor = 1;
    for ($i = 0; $i < strlen($str); $i++)
    {
        $thisValue = ord($str[$i]);
        if ($thisValue < 128)
        {
            $number = dechex($thisValue);
            $unicode[] = (strlen($number) == 1) ? '%u000' . $number : "%u00" . $number;
        }
        else
        {
            if (count($values) == 0)
                $lookingFor = ( $thisValue < 224 ) ? 2 : 3;
            $values[] = $thisValue;
            if (count($values) == $lookingFor)
            {
                $number = ( $lookingFor == 3 ) ?
                        ( ( $values[0] % 16 ) * 4096 ) + ( ( $values[1] % 64 ) * 64 ) + ( $values[2] % 64 ) :
                        ( ( $values[0] % 32 ) * 64 ) + ( $values[1] % 64
                        );
                $number = dechex($number);
                $unicode[] =
                        (strlen($number) == 3) ? "%u0" . $number : "%u" . $number;
                $values = array();
                $lookingFor = 1;
            } // if
        } // if
    }
    return implode("", $unicode);
}
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else if ($unit == "M") {
      return (($miles * 1.609344) * 1000);
  }
  else {
      return $miles;
  }
}

function chkHeader()
{
    if(strpos($_SERVER['HTTP_REFERER'],URL_ROOT)==0) return true;
    return false;
}

function setMsgPage($mod, $sec, $type, $note)
{
	//possible values for type
	//success
	//information
	//warning
	//error
	if(!isset($_SESSION['msg_er'])) $_SESSION['msg_er']=array();
	if(!isset($_SESSION['msg_er'][$mod])) $_SESSION['msg_er'][$mod]=array();
	if(!isset($_SESSION['msg_er'][$mod][$sec])) $_SESSION['msg_er'][$mod][$sec]=array();

	$_SESSION['msg_er'][$mod][$sec]['page']=array(
                                                        'type'=>$type,
                                                        'note'=>$note
                                                    );
}

function getCheckedImg($status)
{
	$aryImg=array(
				  '0'=>"cross.png",
				  '2'=>"status_reject.png",
				  '1'=>"checked.png"
				  );
	return '<img src="'.URL_ADMIN_IMG.$aryImg[$status].'" title="'.getStatusStr($status).'" />';
}

function getMsgPage($mod, $sec)
{
    $return='';
    if(isset($_SESSION['msg_er'][$mod][$sec]['page']) && is_array($_SESSION['msg_er'][$mod][$sec]['page']) && count($_SESSION['msg_er'][$mod][$sec]['page'])>0)
    {
            $class=$_SESSION['msg_er'][$mod][$sec]['page']['type'];
            $return="<div class=\"notification ".$class."\">";
            $return.=$_SESSION['msg_er'][$mod][$sec]['page']['note'];
            $return.="</div>";

            unset($_SESSION['msg_er'][$mod][$sec]['page']);
    }

    clearErMsg($mod,$sec);

    return $return;
}

function setMsgField($mod, $sec, $field, $type, $note)
{
    //possible values for type
    //success
    //information
    //warning
    //error

    if(!isset($_SESSION['msg_er'])) $_SESSION['msg_er']=array();

    if(!isset($_SESSION['msg_er'][$mod])) $_SESSION['msg_er'][$mod]=array();
    if(!isset($_SESSION['msg_er'][$mod][$sec])) $_SESSION['msg_er'][$mod][$sec]=array();

    if(!isset($_SESSION['msg_er'][$mod][$sec]['field'])) $_SESSION['msg_er'][$mod][$sec]['field']=array();

    $_SESSION['msg_er'][$mod][$sec]['field'][$field]=array(
                                                        'type'=>$type,
                                                        'note'=>$note
                                                    );
}

function getMsgField($mod, $sec, $field)
{
	$return='';
	if(isset($_SESSION['msg_er'][$mod][$sec]['field'][$field]) && is_array($_SESSION['msg_er'][$mod][$sec]['field'][$field]) && count($_SESSION['msg_er'][$mod][$sec]['field'][$field])>0)
	{
		$class=$_SESSION['msg_er'][$mod][$sec]['field'][$field]['type'];
		$return="<span class=\"notification ".$class."\">";
		$return.=$_SESSION['msg_er'][$mod][$sec]['field'][$field]['note'];
		$return.="</span>";
		unset($_SESSION['msg_er'][$mod][$sec]['field'][$field]);
	}
	if(isset($_SESSION['msg_er'][$mod][$sec]['field']) && is_array($_SESSION['msg_er'][$mod][$sec]['field']) && count($_SESSION['msg_er'][$mod][$sec]['field'])===0) unset($_SESSION['msg_er'][$mod][$sec]['field']);

	clearErMsg($mod,$sec);

	return $return;
}

function clearErMsg($mod,$sec)
{
	if(isset($_SESSION['msg_er'][$mod][$sec]) && is_array($_SESSION['msg_er'][$mod][$sec]) && count($_SESSION['msg_er'][$mod][$sec])===0) unset($_SESSION['msg_er'][$mod][$sec]);

	if(isset($_SESSION['msg_er'][$mod]) && is_array($_SESSION['msg_er'][$mod]) && count($_SESSION['msg_er'][$mod])===0) unset($_SESSION['msg_er'][$mod]);

	if(isset($_SESSION['msg_er']) && is_array($_SESSION['msg_er']) && count($_SESSION['msg_er'])===0) unset($_SESSION['msg_er']);
}

function setSort($mod,$sec,$val)
{
	if(!isset($_SESSION['sort'])) $_SESSION['sort']=array();
	if(!isset($_SESSION['sort'][$mod])) $_SESSION['sort'][$mod]=array();

	$_SESSION['sort'][$mod][$sec]=$val;
}

function getSort($mod,$sec)
{
	return $_SESSION['sort'][$mod][$sec];
}

function curPageURL()
{
	$pageURL = 'http';
 	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 	$pageURL .= "://";
 	if ($_SERVER["SERVER_PORT"] != "80")
	{
  		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 	}
	else
	{
  		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 	}
 	return $pageURL;
}

function getQueryString($aryQueryStr)
{
	$aryMatch=array();
	foreach($aryQueryStr as $opt=>$val) { $aryMatch[]=$opt.'='.urlencode($val); }
	return '?'.implode('&',$aryMatch);
}

function selected($needle,$haystack)
{
	if(is_array($haystack) && in_array($needle,$haystack)) { return 'selected="selected"'; }
	elseif(!is_array($haystack) && $needle===$haystack) { return 'selected="selected"'; }
	else { return ''; }
}

function checked($needle,$haystack)
{
	if(is_array($haystack) && in_array($needle,$haystack)) { return 'checked="checked"'; }
	elseif(!is_array($haystack) && $needle===$haystack) { return 'checked="checked"'; }
	else { return ''; }
}

function isValidDate($val)
{
	if(preg_match(REGX_DATE,$val))
	{
		list($year,$month,$date)=explode("-",$val);
		if(checkdate($month,$date,$year)) return true;
	}
	return false;
}

function isAdmin()
{
	if(isset($_SESSION[LOGIN_ADMIN]) && is_array($_SESSION[LOGIN_ADMIN]) && isset($_SESSION[LOGIN_ADMIN]['id'])) return true;
	return false;
}

function getFileSize($path)
{
	if(is_array($path) && count($path)>0)
	{
		//if(!file_exists($path)) return 0;
		//if(is_file($path)) return filesize($path);
		$ret = 0;
		foreach($path as $file)
			$ret+=getFileSize($file);
		return $ret;
	}
	else
	{
		if(!file_exists($path)) return 0;
		if(is_file($path)) return filesize($path);
	}
}

//function formatBytes($bytes, $precision = 2) {
//    $units = array('B', 'KB', 'MB', 'GB', 'TB');
//
//    $bytes = max($bytes, 0);
//    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
//    $pow = min($pow, count($units) - 1);
//
//    $bytes /= pow(1024, $pow);
//
//    return round($bytes, $precision) . ' ' . $units[$pow];
//	//return $bytes;
//}

function getRealIpAddr()
{
    if(!empty($_SERVER['HTTP_CLIENT_IP']))//check ip from share internet
    {
		$ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))//to check ip is pass from proxy
    {
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
		$ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


function getStatusImg($status)
{
	$aryImg=array(
				  '0'=>"status_inactive.png",
				  '2'=>"status_reject.png",
				  '1'=>"status_active.png"
				  );
	return '<img src="'.URL_ADMIN_IMG.$aryImg[$status].'" title="'.getStatusStr($status).'" />';
}

function getOptionImg($status)
{
	$aryImg=array(
				  '0'=>"cross.png",
				  '1'=>"tick.png"
				  );
	return '<img src="'.URL_ADMIN_IMG."icons/".$aryImg[$status].'" />';
}

function getFileIcon($file)
{
        //pdf','doc','ppt','xlsx
	$ext = strtolower(substr($file, strrpos($file, '.') + 1));
	$aryImg=array(
				  'pdf'=>"pdf_icon.png",
				  'doc'=>"word_icon.png",
					'docx'=>"word_icon.png",
					'ppt'=>"ppt_icon.png",
					'xlsx'=>"excel_icon.png",
				  );
	if(!array_key_exists($ext,$aryImg))
	{
		$aryImg[$ext]='unknown.png';
	}
	return '<img src="'.URL_IMG.$aryImg[$ext].'" height="80px" width="80px" title="'.$file.'" alt="'.$file.'" />';
}

function getStatusStr($val)
{
	if($val==0)
	{
		return "Inactive";
	}
	elseif($val==1)
	{
		return "Active";
	}
	else
	{
		return "Pending";
	}
}

function getGenderStr($val)
{
	if($val==0)
	{
		return "Male";
	}
	elseif($val==1)
	{
		return "Female";
	}
}


function getOptionStr($val)
{
	if($val==0)
	{
		return "No";
	}
	else
	{
		return "Yes";
	}
}

function getprptyfor($val)
{
	if($val==1)
	{
		return "Sell";
	}
	else if($val ==2)
	{
		return "Rent";
	}
	else
	{
		return "Building inspection";
	}
}

function delete_directory($dirname)
{
	if (is_dir($dirname))
      $dir_handle = opendir($dirname);
   if (!$dir_handle)
      return false;
   while($file = readdir($dir_handle))
   {
      if ($file != "." && $file != "..")
	  {
         if (!is_dir($dirname.DS.$file))
            @unlink($dirname.DS.$file);
         else
            delete_directory($dirname.DS.$file);
      }
   }
   closedir($dir_handle);
   @rmdir($dirname);
   return true;
}

function check_login($userType='User')
{
	if($userType=='User' && (!isset($_SESSION[LOGIN_USER]) || count($_SESSION[LOGIN_USER])==0))
		return false;
	elseif($userType=='Admin' && (!isset($_SESSION[LOGIN_ADMIN]) || count($_SESSION[LOGIN_ADMIN])==0))
		return false;

	return true;
}

function resizeVideo($markup, $dimensions)
{
    $w = $dimensions['width'];
    $h = $dimensions['height'];

    $patterns = array();
    $replacements = array();
    if( !empty($w) )
    {
        $patterns[] = '/width="([0-9]+)"/';
        $patterns[] = '/width:([0-9]+)/';
        $patterns[] = '/width="([0-9]+)px"/';

        $replacements[] = 'width="'.$w.'"';
        $replacements[] = 'width:'.$w;
		$replacements[] = 'width="'.$w.'px"';
    }

    if( !empty($h) )
    {
        $patterns[] = '/height="([0-9]+)"/';
        $patterns[] = '/height:([0-9]+)/';
        $patterns[] = '/height="([0-9]+)px"/';

        $replacements[] = 'height="'.$h.'"';
        $replacements[] = 'height:'.$h;
		$replacements[] = 'height="'.$h.'px"';
    }

    return preg_replace($patterns, $replacements, $markup);
}
function listDirs($where){
	$directoryarr=array();
    $itemHandler=opendir($where);
    $i=0;
    while(($item=readdir($itemHandler)) !== false){
	if ($item == "." || $item == "..") { }
	else {$directoryarr[]=$item;}
       }
	  return($directoryarr);
}
function recurse_copy($src,$dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}



//Calculates distance in KM between postcodes
function postcode_dist($postcode1,$postcode2, $suburb1 = '', $suburb2 = '') {
//Get lat and lon for postcode 1
$extra = "";
if ($suburb1 != '') {
$extra = " and suburb = '$suburb1'";
}
$sqlquery = "SELECT * FROM postcode_db WHERE lat <> 0 and lon <> 0 and postcode = '$postcode1'$extra";
$res = mysql_query($sqlquery);
$num = mysql_num_rows($res);


//Get lat and lon for postcode 2

$extra = "";
if ($suburb2 != '') {
$extra = " and suburb = '$suburb2'";
}
$sqlquery = "SELECT * FROM postcode_db WHERE lat <> 0 and lon <> 0 and postcode = '$postcode2'$extra";
$res1 = mysql_query($sqlquery);
$num1 = mysql_num_rows($res1);

if ($num != 0 && $num1 != 0) {
//proceed
$lat1 = mysql_result($res,0,"lat");
$lon1 = mysql_result($res,0,"lon");
$lat2 = mysql_result($res1,0,"lat");
$lon2 = mysql_result($res1,0,"lon");
$dist = calc_dist($lat1, $lon1, $lat2, $lon2);
if (is_numeric($dist)) {
return $dist;
}
else
{
return "Unknown";
}
}
else
{
return "Unknown";
}
}
function getPagingfront($refUrl,$aryOpts,$pgCnt,$curPg)
{
//	echo $aryOpts." ".$pgCnt." ".$curPg;
	$return='';
	$return.='<ul>';
	if($curPg>1)
	{
		/*$aryOpts['pg']=1;
		$return.='<li><a href="'.$refUrl.getQueryString($aryOpts).'">First</a></li>';*/

		$aryOpts['pg']=$curPg-1;
		$return.='<li class="prev"><a href="'.$refUrl.getQueryString($aryOpts).'">« Previous</a></li>';
	}
	for($i=1;$i<=$pgCnt;$i++)
	{
		$aryOpts['pg']=$i;
		$return.='<li><a href="'.$refUrl.getQueryString($aryOpts).'" class="';
		if($curPg==$i) $return.=' active';
		$return.='" >'.$i.'</a></li>';
	}
	if($curPg<$pgCnt)
	{
		$aryOpts['pg']=$curPg+1;
		$return.='<li class="nxt ml10"><a href="'.$refUrl.getQueryString($aryOpts).'">Next  »</a></li>';
		/*$aryOpts['pg']=$pgCnt;
		$return.='<li><a href="'.$refUrl.getQueryString($aryOpts).'">Last</a></li>';*/
	}
	$return.='</ul>';
	return $return;
}

function enum_select( $table , $field )
{
	$query = "SHOW COLUMNS FROM `$table` LIKE '$field' ";
	$result = mysql_query( $query ) or die( 'error getting enum field ' . mysql_error() );
	$row = mysql_fetch_array( $result , MYSQL_NUM );
	#extract the values
	#the values are enclosed in single quotes
	#and separated by commas
	$regex = "/'(.*?)'/";
	preg_match_all( $regex , $row[1], $enum_array );
	$enum_fields = $enum_array[1];
	return( $enum_fields );
}


function create_token($nm="token")
{
	$_SESSION[$nm] = time();
	echo '<input type="hidden" name="'.$nm.'"  value="'.$_SESSION[$nm].'"/>';
}

function token($nm="token")
{
 if($_SESSION[$nm]==$_POST[$nm])
	return true;
 else
 	return false;
}
function convertdatenew($date)
{
	$arrdate=explode('/',$date);
	return $arrdate[2].'-'.$arrdate[1].'-'.$arrdate[0];
}
function getPaging($refUrl,$aryOpts,$pgCnt,$curPg)
{
	if(basename($_SERVER['PHP_SELF'])=='subject.php' && $_GET['action']=='view')
	{
		$id_url='#comment_div';
		}
		elseif(basename($_SERVER['PHP_SELF'])=='department.php' && $_GET['action']=='view')
	{
		$id_url='#comment_div';
		}
		elseif(basename($_SERVER['PHP_SELF'])=='program.php' && $_GET['action']=='view')
	{
		$id_url='#comment_div';
		}
		elseif(basename($_SERVER['PHP_SELF'])=='faculty.php' && $_GET['action']=='view')
	{
		$id_url='#comment_div';

		}
	//echo $refUrl."<br /><br />".$pgCnt."<br /><br />".$curPg."<br />"."<br />";
	$maxPage = 0;
	$return='';
	if($curPg>1)
	{
		$aryOpts['pg']=1;
		$return.=' <li><a href="'.$refUrl.getQueryString($aryOpts).$id_url.'">First</a></li> ';

		$aryOpts['pg']=$curPg-1;
		$return.=' <li><a href="'.$refUrl.getQueryString($aryOpts).$id_url.'">Previous</a></li> ';
	}
	$range = $curPg;
	//echo "range : ".$range."<br />"."<br />";
	$upto = $range+2;
	//echo "upto : ".$upto."<br />"."<br />";
	$downto = $range-2;
	//echo "downto : ".$downto."<br />"."<br />";
	//echo "maxPage : ".$maxPage."<br />"."<br />";
	if($upto > $maxPage)
	{
		//$upto = $maxPage."<br />"."<br />";
		$maxPage = $upto;
	}
	if($downto<=0)
	{
		$downto = 1;
	}
	//echo "maxPage : ".$maxPage."<br />"."<br />";
	//echo "upto : ".$upto."<br />"."<br />";
	//echo "downto : ".$downto."<br />"."<br />";
	if($maxPage>1)
	{
		for($i=$downto;$i<=$upto && $i<=$pgCnt;$i++)
		{
//			for($i=1;$i<=$pgCnt;$i++)
//			{
				$aryOpts['pg']=$i;
				$return.=' <li><a href="'.$refUrl.getQueryString($aryOpts).$id_url.'" style="';
				if($curPg==$i) $return.='background-color:#65CEA7';
				$return.='" >'.$i.'</a></li> ';
//			}
		}
	}
	/*for($i=1;$i<=$pgCnt;$i++)
	{
		$aryOpts['pg']=$i;
		$return.='<li><a href="'.$refUrl.getQueryString($aryOpts).'" class="';
		if($curPg==$i) $return.=' activecls';
		$return.='" >'.$i.'</a></li>';
	}*/
	//echo "curPg : ".$curPg."<br />";
	//echo "pgCnt : ".$pgCnt."<br />";
	if($curPg<$pgCnt)
	{
		$aryOpts['pg']=$curPg+1;
		$return.=' <li><a href="'.$refUrl.getQueryString($aryOpts).$id_url.'">Next</a></li> ';
		$aryOpts['pg']=$pgCnt;
		$return.=' <li><a href="'.$refUrl.getQueryString($aryOpts).$id_url.'">Last</a></li> ';
	}
	return $return;
}

class Paging
{
	var $rowsPerPage =4;

	var $pageNum = 1;

	var $numrows = 0;

	var $maxPage = 0;

	var $offset = 0;

	function sql($fields="*",$table,$cond='')

	{

	  $this->pageNum = isset($_REQUEST['gotopage'])?$_REQUEST['gotopage']:1;

	  $this->offset = ($this->pageNum - 1) * $this->rowsPerPage;

		$query = "select $fields from $table $cond LIMIT ".$this->offset.", ".$this->rowsPerPage;

		//echo $query;

		//echo "<br />";

	  $q = mysql_query($query);

		$query2 = "select $fields from $table $cond  ";

		//echo $query2;

		//echo "<br />";

	  $q2 = mysql_query($query2);

	  $this->numrows = mysql_num_rows($q2);

 	  $this->maxPage = ceil($this->numrows/$this->rowsPerPage);

	  return $q;

	}
	function navigations($param='ser=')
	{
	//	$self = basename($_SERVER['PHP_SELF']);
    $self = $_SERVER['PHP_SELF']."?"; // edited			//$self = $self ."?".$param;
          $self = $self ."".$param;  // edited
		if ($this->pageNum > 1)
		{
			$gotopage = $this->pageNum - 1;
			$prev = "<li><a  href=\"$self&gotopage=$gotopage\">&laquo;</a></li>";
			//$first = "<li class=\"text\"><a  href=\"$self&gotopage=1\">First</a><li>";
		}
		else
		{
			$prev  = '';       // we're on page one, don't enable 'previous' link
			$first = ''; // nor 'first page' link
		}
		if ($this->pageNum < $this->maxPage)
		{
			$gotopage = $this->pageNum + 1;
			$next = "<li><a  href=\"$self&gotopage=$gotopage\">&raquo;</a><li>";
			//$last = "<li class=\"text\"><a  href=\"$self&gotopage=".$this->maxPage."\">Last</a></li>";
		}
		else
		{
			$next = '';      // we're on the last page, don't enable 'next' link
			$last = ''; // nor 'last page' link
		}
		$i=$this->pageNum;
		$upto=$i+3;
		$downto=$i-3;
		if($upto>$this->maxPage)
		{
			$upto=$this->maxPage;
		}
		if($downto<=0)
		{
			$downto=1;
		}
		if($this->maxPage>1)
		{
			for($i=$downto;$i<=$upto;$i++)
			{
				if($i==$this->pageNum)
				{
					$pages .= '<li >'."<a class='activecls' href=\"$self&gotopage=$i\">".$i.'</a><li>';
				}
				else
				{
					$pages .= "<li><a href=\"$self&gotopage=$i\">$i</a></li>";
				}
			}
		}
		return '<ul>'.$first . $prev."&nbsp;&nbsp;$pages&nbsp;&nbsp;".$next . $last.'</ul>';
	}
}

/*function resizeVideo($markup, $dimensions)
{
    $w = $dimensions['width'];
    $h = $dimensions['height'];

    $patterns = array();
    $replacements = array();
    if( !empty($w) )
    {
        $patterns[] = '/width="([0-9]+)"/';
        $patterns[] = '/width:([0-9]+)/';
        $patterns[] = '/width="([0-9]+)px"/';

        $replacements[] = 'width="'.$w.'"';
        $replacements[] = 'width:'.$w;
		$replacements[] = 'width="'.$w.'px"';
    }

    if( !empty($h) )
    {
        $patterns[] = '/height="([0-9]+)"/';
        $patterns[] = '/height:([0-9]+)/';
        $patterns[] = '/height="([0-9]+)px"/';

        $replacements[] = 'height="'.$h.'"';
        $replacements[] = 'height:'.$h;
		$replacements[] = 'height="'.$h.'px"';
    }

    return preg_replace($patterns, $replacements, $markup);
}*/

function get_youtube_video_image($youtube_code)
{
	// get the video code if this is an embed code	(old embed)
	preg_match('/youtube\.com\/v\/([\w\-]+)/', $youtube_code, $match);

	// if old embed returned an empty ID, try capuring the ID from the new iframe embed
	if($match[1] == '')
	preg_match('/youtube\.com\/embed\/([\w\-]+)/', $youtube_code, $match);

	// if it is not an embed code, get the video code from the youtube URL
	if($match[1] == '')

	preg_match('~v=([A-Za-z0-9_-]+)~',$youtube_code ,$match);
	//print_r($match);
	// get the corresponding thumbnail images
	$full_size_thumbnail_image = "http://img.youtube.com/vi/".$match[1]."/0.jpg";
	$small_thumbnail_image1 = "http://img.youtube.com/vi/".$match[1]."/1.jpg";
	$small_thumbnail_image2 = "http://img.youtube.com/vi/".$match[1]."/2.jpg";
	$small_thumbnail_image3 = "http://img.youtube.com/vi/".$match[1]."/3.jpg";
	// return whichever thumbnail image you would like to retrieve
	return $small_thumbnail_image1;
}
function get_Advertise_Banner($cookie,$page_id,$banner_area)
{
	global $db;
	if(isset($cookie) && $cookie!="" && $cookie!='All')
	{
		$getTopBanner=$db->getVal("SELECT banner_image FROM advertisement WHERE region = '".$cookie."' AND page_id='".$page_id."' AND banner_area='".$banner_area."' AND (from_date<='".date('Y-m-d')."' AND to_date>='".date('Y-m-d')."') AND payment_status=2 AND status=1");
		if(!isset($getTopBanner))
		{
				$getTopBanner=$db->getVal("SELECT banner_image FROM advertisement WHERE region = '".$cookie."' AND page_id='".$page_id."' AND banner_area='".$banner_area."' AND user_id=0 AND payment_status=2 AND status=1");
		}
	}
	else
	{
		$getTopBanner=$db->getVal("SELECT banner_image FROM advertisement WHERE region = 'All' AND page_id='".$page_id."' AND banner_area='".$banner_area."' AND (from_date<='".date('Y-m-d')."' AND to_date>='".date('Y-m-d')."') AND payment_status=2 AND status=1");
		if(!isset($getTopBanner))
		{
				$getTopBanner=$db->getVal("SELECT banner_image FROM advertisement WHERE region = 'All' AND page_id='".$page_id."' AND banner_area='".$banner_area."' AND user_id=0 AND payment_status=2 AND status=1");
		}
	}
	return $getTopBanner;
}
function getFeatureBanner($cookie,$page_id,$banner_area)
{
	global $db;
	if(isset($cookie) && $cookie!="" && $cookie!='All')
	{
		$getFeatureBanner=$db->getRows("SELECT banner_image, description FROM advertisement WHERE region = '".$cookie."' AND page_id='".$page_id."' AND banner_area='".$banner_area."' AND (from_date<='".date('Y-m-d')."' AND to_date>='".date('Y-m-d')."') AND payment_status=2 AND status=1");
		if(is_array($getFeatureBanner) && count($getFeatureBanner)==0)
		{
				$getFeatureBanner=$db->getRows("SELECT banner_image, description FROM advertisement WHERE region = '".$cookie."' AND page_id='".$page_id."' AND banner_area='".$banner_area."' AND user_id=0 AND payment_status=2 AND status=1");
		}
	}
	else
	{
		$getFeatureBanner=$db->getRows("SELECT banner_image, description FROM advertisement WHERE region = 'All' AND page_id='".$page_id."' AND banner_area='".$banner_area."' AND (from_date<='".date('Y-m-d')."' AND to_date>='".date('Y-m-d')."') AND payment_status=2 AND status=1");
		if(is_array($getFeatureBanner)  && count($getFeatureBanner)==0)
		{
				$getFeatureBanner=$db->getRows("SELECT banner_image, description FROM advertisement WHERE region = 'All' AND page_id='".$page_id."' AND banner_area='".$banner_area."' AND user_id=0 AND payment_status=2 AND status=1");
		}
	}
	return $getFeatureBanner;
}
function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

// edit by saurabh

/*function get_difftime($datefr,$dateto=-1)
{
// Defaults and assume if 0 is passed in that
// its an error rather than the epoch
$datefrom = strtotime($datefr);
if($datefrom<=0) { return "A long time ago"; }
if($dateto==-1) { $dateto = time(); }

// Calculate the difference in seconds betweeen
// the two timestamps

$difference = $dateto - $datefrom;

// If difference is less than 60 seconds,
// seconds is a good interval of choice

if($difference < 60)
{
$interval = "s";
}

// If difference is between 60 seconds and
// 60 minutes, minutes is a good interval
elseif($difference >= 60 && $difference<60*60)
{
$interval = "n";
}

// If difference is between 1 hour and 24 hours
// hours is a good interval
elseif($difference >= 60*60 && $difference<60*60*24)
{
$interval = "h";
}

// If difference is between 1 day and 7 days
// days is a good interval
elseif($difference >= 60*60*24 && $difference<60*60*24*7)
{
$interval = "d";
}

// If difference is between 1 week and 30 days
// weeks is a good interval
elseif($difference >= 60*60*24*7 && $difference <
60*60*24*30)
{
$interval = "ww";
}

// If difference is between 30 days and 365 days
// months is a good interval, again, the same thing
// applies, if the 29th February happens to exist
// between your 2 dates, the function will return
// the 'incorrect' value for a day
elseif($difference >= 60*60*24*30 && $difference <
60*60*24*365)
{
$interval = "m";
}

// If difference is greater than or equal to 365
// days, return year. This will be incorrect if
// for example, you call the function on the 28th April
// 2008 passing in 29th April 2007. It will return
// 1 year ago when in actual fact (yawn!) not quite
// a year has gone by
elseif($difference >= 60*60*24*365)
{
$interval = "y";
}

// Based on the interval, determine the
// number of units between the two dates
// From this point on, you would be hard
// pushed telling the difference between
// this function and DateDiff. If the $datediff
// returned is 1, be sure to return the singular
// of the unit, e.g. 'day' rather 'days'

switch($interval)
{
case "m":
$months_difference = floor($difference / 60 / 60 / 24 /
29);
while (mktime(date("H", $datefrom), date("i", $datefrom),
date("s", $datefrom), date("n", $datefrom)+($months_difference),
date("j", $dateto), date("Y", $datefrom)) < $dateto)
{
$months_difference++;
}
$datediff = $months_difference;

// We need this in here because it is possible
// to have an 'm' interval and a months
// difference of 12 because we are using 29 days
// in a month

if($datediff==12)
{
$datediff--;
}

$res = ($datediff==1) ? "$datediff month ago" : "$datediff
months ago";
break;

case "y":
$datediff = floor($difference / 60 / 60 / 24 / 365);
$res = ($datediff==1) ? "$datediff year ago" : "$datediff
years ago";
break;

case "d":
$datediff = floor($difference / 60 / 60 / 24);
$res = ($datediff==1) ? "$datediff day ago" : "$datediff
days ago";
break;

case "ww":
$datediff = floor($difference / 60 / 60 / 24 / 7);
$res = ($datediff==1) ? "$datediff week ago" : "$datediff
weeks ago";
break;

case "h":
$datediff = floor($difference / 60 / 60);
$res = ($datediff==1) ? "$datediff hour ago" : "$datediff
hours ago";
break;

case "n":
$datediff = floor($difference / 60);
$res = ($datediff==1) ? "$datediff minute ago" :
"$datediff minutes ago";
break;

case "s":
$datediff = $difference;
$res = ($datediff==1) ? "$datediff second ago" :
"$datediff seconds ago";
break;
}
return $res;
}*/

function time_since($time1, $time2, $precision = 6) {
	date_default_timezone_set('Africa/Niamey');
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
      $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
      $time2 = strtotime($time2);
    }

    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
      $ttime = $time1;
      $time1 = $time2;
      $time2 = $ttime;
    }

    // Set up intervals and diffs arrays
    $intervals = array('year','month','day','hour','minute','second');
    $diffs = array();

    // Loop thru all intervals
    foreach ($intervals as $interval) {
      // Set default diff to 0
      $diffs[$interval] = 0;
      // Create temp time from time1 and interval
      $ttime = strtotime("+1 " . $interval, $time1);
      // Loop until temp time is smaller than time2
      while ($time2 >= $ttime) {
	$time1 = $ttime;
	$diffs[$interval]++;
	// Create new temp time from time1 and interval
	$ttime = strtotime("+1 " . $interval, $time1);
      }
    }

    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
      // Break if we have needed precission
      if ($count >= $precision) {
	break;
      }
      // Add value and interval
      // if value is bigger than 0
      if ($value > 0) {
	// Add s if value is not 1
	if ($value != 1) {
	  $interval .= "s ago";
	}
	else
	{
		$interval .= " ago";
	}
	// Add value and interval to times array
	$times[] = $value . " " . $interval;
	$count++;
      }
    }

 $timeCount = count($times);
     if($times[0]!=''){ return $times[0]; } elseif($times[1]!=''){ return $times[1]; } elseif($times[2]!=''){ return $times[2]; }elseif($times[3]!=''){ return $times[3]; }elseif($times[4]!='') { return $times[4]; }elseif($times[5]!='') { return $times[5]; } else {  }

    // Return string with times
  //  return implode(", ", $times);
  }
  function smart_resize_image( $file, $width = 0, $height = 0, $proportional = false, $output = 'file', $delete_original = true, $use_linux_commands = false )

  {

    if ( $height <= 0 && $width <= 0 ) {

      return false;

    }



    $info = getimagesize($file);

    $image = '';



    $final_width = 0;

    $final_height = 0;

    list($width_old, $height_old) = $info;



    if ($proportional) {

      if ($width == 0) $factor = $height/$height_old;

      elseif ($height == 0) $factor = $width/$width_old;

      else $factor = min ( $width / $width_old, $height / $height_old);



      $final_width = round ($width_old * $factor);

      $final_height = round ($height_old * $factor);



    }

    else {

      $final_width = ( $width <= 0 ) ? $width_old : $width;

      $final_height = ( $height <= 0 ) ? $height_old : $height;

    }



    switch ( $info[2] ) {

      case IMAGETYPE_GIF:

        $image = imagecreatefromgif($file);

      break;

      case IMAGETYPE_JPEG:

        $image = imagecreatefromjpeg($file);

      break;

      case IMAGETYPE_PNG:

        $image = imagecreatefrompng($file);

      break;

 case IMAGETYPE_JPG:

        $image =imagecreatefromjpg($file);

      break;
      default:

        return false;

    }



    $image_resized = imagecreatetruecolor( $final_width, $final_height );



    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {

      $trnprt_indx = imagecolortransparent($image);



      // If we have a specific transparent color

      if ($trnprt_indx >= 0) {



        // Get the original image's transparent color's RGB values

        $trnprt_color    = imagecolorsforindex($image, $trnprt_indx);



        // Allocate the same color in the new image resource

        $trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);



        // Completely fill the background of the new image with allocated color.

        imagefill($image_resized, 0, 0, $trnprt_indx);



        // Set the background color for new image to transparent

        imagecolortransparent($image_resized, $trnprt_indx);





      }

      // Always make a transparent background color for PNGs that don't have one allocated already

      elseif ($info[2] == IMAGETYPE_PNG) {



        // Turn off transparency blending (temporarily)

        imagealphablending($image_resized, false);



        // Create a new transparent color for image

        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);



        // Completely fill the background of the new image with allocated color.

        imagefill($image_resized, 0, 0, $color);



        // Restore transparency blending

        imagesavealpha($image_resized, true);

      }

    }



    imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);



    if ( $delete_original ) {

      if ( $use_linux_commands )

        exec('rm '.$file);

      else

        @unlink($file);

    }



    switch ( strtolower($output) ) {

      case 'browser':

        $mime = image_type_to_mime_type($info[2]);

        header("Content-type: $mime");

        $output = NULL;

      break;

      case 'file':

        $output = $file;

      break;

      case 'return':

        return $image_resized;

      break;

      default:

      break;

    }



    switch ( $info[2] ) {

      case IMAGETYPE_GIF:

        imagegif($image_resized, $output);

      break;

      case IMAGETYPE_JPEG:

        imagejpeg($image_resized, $output);

      break;

      case IMAGETYPE_PNG:

        imagepng($image_resized, $output);

      break;

      default:

        return false;

    }



    return true;

  }
function getimg($url) {
    $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';
    $headers[] = 'Connection: Keep-Alive';
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
    $user_agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)';
    $process = curl_init($url);
    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($process, CURLOPT_HEADER, 0);
    curl_setopt($process, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($process, CURLOPT_TIMEOUT, 30);
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
    $return = curl_exec($process);
    curl_close($process);
    return $return;
}

/*function ticketId($email,$count)
{
	$id = $count+1;
	$length = strlen($id);

	$start = '';

	if($length == 1)
	{
		$start = '00';
		$ticket_no = $email.$start.$id;
	}
	elseif($length == 2)
	{
		$start = '0';
		$ticket_no = $email.$start.$id;
	}
	elseif($length == 3)
	{
		$data = str_split($count,"1");
		$n = 1;
		for($i = 1; $i <= $length; $i++)
		{
			if($data[$i] == '9')
			{
				$n = $n + 1;
			}
		}
		if($n == 3)
		{
			$start = '000';
			$ticket_no = $email.$start.'1';
		}
		else
		{
			$ticket_no = $email.$start.$id;
		}
	}
	elseif($length == 4 && $id == 999)
	{
		$start = '000';
		$ticket_no = $email.$start.'1';
	}
	elseif($length == 4 && $id > 999)
	{
		$id = $id-1000;
		$start = '000';
		$ticket_no = $email.$start.$id;
	}
	return $ticket_no;
}*/

function mailBoxId($warehouse_id,$count,$lastMailBoxId=NULL)
{
	$n = 0;
	$id = $count+1;
	//echo "id : ".$id;
	//echo "<br />";
	$num = 0;
	$mailbox_no = '';
	if($id < 25975)
	{
		$num = ceil($id/999);
		$remainder = $id % 999;
		//echo "num : ".$num;
		//echo "<br />";
		//echo "remainder : ".$remainder;
		//echo "<br />";
		$alpha = '';
		if($num>0)
		{
			$alpha = 64+(int)$num;
		}
		//echo "alpha : ".$alpha;
		//echo "<br />";
		$alphabet = chr($alpha);
		//echo "alphabet : ".$alphabet;
		//echo "<br />";
		if($remainder == 0)
		{
			$id = $id - (999*$num);
			if($id == 0)
			{
				$id = '0000';
			}
		}
		else
		{
			$id = $id - (999*($num-1));
		}
		//echo "id : ".$id;
		//echo "<br />";
		$length = strlen($id);
		$start = '';
		//echo "warehouse_id : ".$warehouse_id;
		//echo "<br />";
		//echo "alphabet : ".$alphabet;
		//echo "<br />";
		//echo "count : ".$count;
		//echo "<br />";
		//echo "id : ".$id;
		//echo "<br />";
		//echo "length : ".$length;
		//echo "<br />";
		$last_mailbox_no = 'A10A999';
		$start = '';
		$mailbox_no = '';
		$alpha = 0;

		if($length == 1)
		{
			// //echo "1";
			$start = '00';
			$mailbox_no = $warehouse_id.$alphabet.$start.$id;
		}
		elseif($length == 2)
		{
			// //echo "2";
			$start = '0';
			$mailbox_no = $warehouse_id.$alphabet.$start.$id;
		}
		elseif($length == 3)
		{
			// //echo "3";
			$data = str_split($count,"1");
			$n = 0;
			for($i = 1; $i <= $length; $i++)
			{
				if($data[$i] == '9')
				{
					// //echo "<br />";
					// //echo $data[$i];
					$n = $n + 1;
				}
			}
			// //echo "<br />";
			// //echo $n;
			if($n == 3)
			{
				// //echo "<br />";
				// //echo "4";
				$start = '000';
				$mailbox_no = $warehouse_id.$alphabet.$start.'1';
			}
			/*elseif($n == 3)
			{
				// //echo "4";
				$start = '000';
				$mailbox_no = $warehouse_id.$alphabet.$start.'1';
			}*/
			else
			{
				// //echo "5";
				$mailbox_no = $warehouse_id.$alphabet.$start.$id;
			}
		}
		elseif($length == 4 && $id == 999)
		{
			// //echo "6";
			$start = '000';
			$mailbox_no = $warehouse_id.$alphabet.$start.'1';
		}
		elseif($length == 4 && $id > 999)
		{
			// //echo "7";
			$id = $id-1000;
			$id = $id + 1;
			$start = '000';
			$mailbox_no = $warehouse_id.$alphabet.$start.$id;
		}
		else
		{
			$mailbox_no = $warehouse_id.$alphabet.$start.$id;
		}
	}
	elseif($id >= 25975)
	{
		$newLength = strlen($id);
		//echo $newLength;
		//echo "<br />";
		if($newLength > 4)
		{
			$id = $id - 25973;
			//echo "id : ".$id;
			//echo "<br />";
		}
		$length = strlen($id);
		//echo "length : ".$length;
		//echo "<br />";
		if($length == 1)
		{
			//echo "1";
			//echo "<br />";
			$start = '000';
			$mailbox_no = $warehouse_id.$alphabet.$start.$id;
		}
		elseif($length == 2)
		{
			//echo "2";
			$start = '00';
			$mailbox_no = $warehouse_id.$alphabet.$start.$id;
		}
		elseif($length == 3)
		{
			// //echo "2";
			$start = '0';
			$mailbox_no = $warehouse_id.$alphabet.$start.$id;
		}
		elseif($length == 4)
		{
			// //echo "3";
			$data = str_split($count,"1");
			$n = 0;
			for($i = 1; $i <= $length; $i++)
			{
				if($data[$i] == '9')
				{
					// //echo "<br />";
					// //echo $data[$i];
					$n = $n + 1;
				}
			}
			// //echo "<br />";
			// //echo $n;
			if($n == 3)
			{
				// //echo "<br />";
				// //echo "4";
				$start = '000';
				$mailbox_no = $warehouse_id.$alphabet.$start.'1';
			}
			/*elseif($n == 3)
			{
				// //echo "4";
				$start = '000';
				$mailbox_no = $warehouse_id.$alphabet.$start.'1';
			}*/
			else
			{
				// //echo "5";
				$mailbox_no = $warehouse_id.$alphabet.$start.$id;
			}
		}
		elseif($length == 4 && $id == 999)
		{
			// //echo "6";
			$start = '000';
			$mailbox_no = $warehouse_id.$alphabet.$start.'1';
		}
		elseif($length == 4 && $id > 999)
		{
			// //echo "7";
			$id = $id-1000;
			$id = $id + 1;
			$start = '000';
			$mailbox_no = $warehouse_id.$alphabet.$start.$id;
		}
	}
	return $mailbox_no;
}

function ticketId($email,$count,$type=0)
{
	$id = $count+1;
	$length = strlen($id);

	$start = '';

	if($length == 1)
	{
		$start = '00';
		$ticket_no = $email.$start.$id;
	}
	elseif($length == 2)
	{
		$start = '0';
		$ticket_no = $email.$start.$id;
	}
	elseif($length == 3)
	{
		$data = str_split($count,"1");
		$n = 1;
		for($i = 1; $i <= $length; $i++)
		{
			if($data[$i] == '9')
			{
				$n = $n + 1;
			}
		}
		if($n == 3)
		{
			$start = '000';
			$ticket_no = $email.$start.'1';
		}
		else
		{
			$ticket_no = $email.$start.$id;
		}
	}
	elseif($length == 4 && $id == 999)
	{
		$start = '000';
		$ticket_no = $email.$start.'1';
	}
	elseif($length == 4 && $id > 999)
	{
		$id = $id-1000;
		$start = '000';
		$ticket_no = $email.$start.$id;
	}
	return $ticket_no;
}

function resizeBySize($file,$width,$height,$path,$proportional)
{
	$imgData = getimagesize($path.$file);

	$imgReturn = '';
	if($imgData[0] > $width && $imgData[1] > $height)
	{
		$imgReturn = smart_resize_image($path.$file.'',$width,$height,$proportional);
	}
	elseif($imgData[0] > $width && $imgData[1] < $height)
	{
		$imgReturn = smart_resize_image($path.$file.'',$width,$imgData[1],$proportional);
	}
	elseif($imgData[0] < $width && $imgData[1] > $height)
	{
		$imgReturn = smart_resize_image($path.$file.'',$imgData[0],$height,$proportional);
	}
	return $imgReturn;
}

function href($page,$param="")
{
	$linkParam = explode("=",$param);
	$page = explode("?",$page);
	$sef = 1;
	if($sef=="1")
	{
		$x = explode("&",$param);
		$var = array();
		foreach($x as $k1 => $v1)
		{
			$x2 = explode("=",$v1);
			$var[$x2[0]]=$x2[1];
		}
		switch($page[0])
		{
                        case 'login.php' :
			{
                            return URL_ROOT.'login/';
                            break;
			}
                        case 'forgot_password.php' :
			{
                            return URL_ROOT.'forgot-password/';
                            break;
			}
                        case 'signup.php' :
			{
                            return URL_ROOT.'signup/';
			    break;
			}
                        case 'aboutus.php' :
			{
                            return URL_ROOT.'about-us/';
                            break;
			}

                        case 'how_it_works.php' :
			{
                            return URL_ROOT.'how-it-works/';
                            break;
			}
                        case 'faq.php' :
			{
                            return URL_ROOT.'faq/';
                            break;
			}
                        case 'contact.php' :
			{
                            return URL_ROOT.'contact-us/';
                            break;
			}
                        case 'cms.php' :
			{
                            if($var['linkname']!='')
                            {
                                return URL_ROOT.'content/'. $var['linkname'];
                                break;
                            }
                        }
                        case 'blog.php' :
			{

                            return URL_ROOT.'blogs/';

                            break;
			}
                        case 'blogdetail.php' :
			{
                            if($var['id']!='')
                            {
                                return URL_ROOT.'blog-details/'. $var['id'] ;
                                break;
                            }

                            break;
			}

                        /*---------------Neelesh Start------------------------------------*/
                        case 'business_profile.php' :
			{

                            return URL_ROOT.'business-profile/';
                            break;
			}
                        case 'business_dashboard.php' :
			{

                            return URL_ROOT.'business-dashboard/';
                            break;
			}
                        case 'business_myproject.php' :
			{
                           if($var['projectname']!='')
                            {
                                return URL_ROOT.'business-myproject/'.$var['projectname'];
                                break;
                            }
                            else
                            {
                                return URL_ROOT.'business-myproject/';
                                break;
                            }
                            break;
			}
                        case 'postproject.php' :
			{

                            return URL_ROOT.'postproject/';
                            break;
			}
                        case 'business_projectdetail.php' :
			{
                            if($var['id']!='')
                            {
                                return URL_ROOT.'business-projectdetail/'. $var['id'] ;
                                break;
                            }

                            break;
			}
                        case 'business_settings.php' :
			{

                            return URL_ROOT.'business-settings/';
                            break;
			}
                        case 'consultant_profile.php' :
			{

                            return URL_ROOT.'consultant-profile/';
                            break;
			}
                        case 'consultant_dashboard.php' :
			{

                            return URL_ROOT.'consultant-dashboard/';
                            break;
			}
                        case 'consultant_browseproject.php' :
			{
                            if($var['category']!='')
                            {
                                return URL_ROOT.'consultant-browseproject/'. $var['category'] ;
                                break;
                            }

                            break;
			}
                        case 'consultant_myproject.php' :
			{

                            if($var['projectname']!='')
                            {
                                return URL_ROOT.'consultant-myproject/'.$var['projectname'];
                                break;
                            }
                            else
                            {
                                return URL_ROOT.'consultant-myproject/';
                                break;
                            }
                            break;
			}

                        case 'consultant_settings.php' :
			{

                            return URL_ROOT.'consultant-settings/';
                            break;
			}
                        /*---------------Neelesh End------------------------------------*/

			default:
			{
				if($param=="")
				{
				  return URL_ROOT.$page[0];
				}
				else
				{
				  return URL_ROOT.$page[0].'?'.$param;
				}
			}

		}
	}
	else
	{
		if($param=="")
		{
		  return URL_ROOT.$page;
		}
		else
		{
		  return URL_ROOT.'/'.$page.'?'.$param;
		}
	}
}




function convertToFlv( $input, $output )
{
    $input = escapeshellarg($input);
    $output = escapeshellarg($output);
    //$command = "ffmpeg -i $input -sameq -ar 44100 $output";
    $command = "ffmpeg -i $input -ar 44100 -ab 32 -f flv -s 640×380 $output";
    //shell_exec( $command );

}

function upload($src,$dest,$fname)
{
    $fx = 1;
    if(!empty($fname))
    {
            while($fx == 1)
            {
                    if(file_exists($dest.$fname))
                    {
                    $newname = substr($fname,0,strpos($fname,'.'));
                    $ext = substr($fname,strpos($fname,'.'),strlen($fname));
                    $fname =$newname."_".rand(0,99999).$ext;
                    }
                    else
                    {
                    $fx=0;
                    @move_uploaded_file($src,$dest.$fname);
                    }
            }
            return $fname;
    }
    else
    {
            return "";
    }

}

function createThumbnail($video,$thumbName)
{
	echo "video : ".$video;
	echo "<br />";
	echo "thumbName : ".$thumbName;
	echo "<br />";
	$mov = new ffmpeg_movie($video);
	$img = $thumbName;
	$frame_no = $mov->getFrameCount();
	$frame = rand(1,$frame_no);
	$ff_frame = $mov->getFrame($frame);
	if($ff_frame)
	{
		$gd_image = $ff_frame->toGDImage();
		if($gd_image)
		{
			imagepng($gd_image, PATH_UPLOAD_HOM_VID_THUMB.$img);
			imagedestroy($gd_image);
			//echo '<center><img src="'.$img.'" border="1" alt="Screen Capture" /></center>';
		}
	}
}

function GetStateFromIPAddress($ip)
{
    if(empty($ip)&&$ip=='')
    {
            $ip="146.195.135.130";
    }
    // URL for  http://omsoftware.us/theplayers/vendorBid/
    // http://api.netimpact.com/qv1.php?key=QgAxGjHzjHrQV8j1&qt=geoip&d=json&q=$ip

    // URL for  http://www.vendorbid.com.au/
    // http://api.netimpact.com/qv1.php?key=U6yHx8AascnPhH49&qt=geoip&d=json&q=$ip

    // Local
    $url="http://api.netimpact.com/qv1.php?key=WfIupmQp8fsiGZ47&qt=geoip&d=json&q=$ip";
    //$url="http://api.netimpact.com/qv1.php?key=QgAxGjHzjHrQV8j1&qt=geoip&d=json&q=$ip";
    $d = file_get_contents($url);
    if(isset($d)&&$d!='')
    {
    $data = explode(',' , $d);
    return $data[1];
    }
    else
    {
            return 6;
    }
}

function stripslashes_deep($value)
{
    $value = is_array($value) ?
                array_map('stripslashes_deep', $value) :
                stripslashes($value);

    return $value;
}

function getAllDates($fromDate, $toDate)
{
	if(!$fromDate || !$toDate ) {return false;}

	$dateMonthYearArr = array();
	$fromDateTS = strtotime($fromDate);
	$toDateTS = strtotime($toDate);
	for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24))
	{
		$currentDateStr = date("Y-m-d",$currentDateTS);
		$dateMonthYearArr[] = $currentDateStr;
	}
	return $dateMonthYearArr;
}

function getEventString($val)
{
	if($val==1)
	{
		return "clicked but didn't updated anything in profile";
	}
	else if($val ==2)
	{
		return "updated  profile";
	}
	else if($val ==3)
	{
		return "changed password";
	}
	else if($val ==4)
	{
		return "requested admin";
	}
	else if($val ==5)
	{
		return "added quote";
	}
	else if($val ==6)
	{
		return "uploaded new video ";
	}
	else if($val ==7)
	{
		return "send add request ";
	}

	else if($val ==8)
	{
		return "approved add request";
	}

	else if($val ==9)
	{
		return "rejected  add request";
	}
	else if($val ==10)
	{
		return "posted new comment ";
	}
	else if($val ==11)
	{
		return "reported  a comment as abuse";
	}
	else if($val ==12)
	{
		return "abuse report approved";
	}
	else if($val ==13)
	{
		return "abuse report rejected";
	}

	else if($val ==14)
	{
		return "answerd on a question";
	}
	else if($val ==15)
	{
		return "question posted";
	}
	else if($val ==16)
	{
		return "answer marked as";
	}
	else if($val ==17)
	{
		return "watched video";
	}

	else
	{
		return "Noting";
	}
}

function getCommentPostType($val)
{
    $aryStr=array(

                '1' 	=>	'Question',
                '2' 	=>	'Comment',
                '3'		=>	'Answer',
            );
    $string=$aryStr[$val];
    return  $string;
}

function userAccessAuthority($needle,$haystack)
{
    if(is_array($haystack) && in_array($needle,$haystack)) { return ''; }
    elseif(!is_array($haystack) && $needle===$haystack) { return ''; }
    else { return redirect(URL_ADMIN); }
}

function displayLink($needle,$haystack)
{
    if(is_array($haystack) && in_array($needle,$haystack)) { return ''; }
    elseif(!is_array($haystack) && $needle===$haystack) { return ''; }
    else { return 'hide'; }
}

function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}

function getXpPointRank($total_xp_point)
{
    if($total_xp_point>0 && $total_xp_point<=400 )
    {
        echo "Newbie";
    }
    elseif($total_xp_point>=400 && $total_xp_point<=1000 )
    {
        echo "Starter";
    }
    elseif($total_xp_point>=1000 && $total_xp_point<=1800 )
    {
        echo "Beginner";
    }
    elseif($total_xp_point>=1800 && $total_xp_point<=3500 )
    {
        echo "Intermediate";
    }
    elseif($total_xp_point>=3500 && $total_xp_point<=5500 )
    {
        echo "Advance";
    }
    elseif($total_xp_point>=5500 && $total_xp_point<=9500 )
    {
        echo "Expert";
    }
    elseif($total_xp_point>=9500 && $total_xp_point<=14000 )
    {
        echo "Expert 2";
    }
    elseif($total_xp_point>=14000)
    {
        echo "Genius";
    }
}
function checkLinkName($linkname)
{
    global $db;
    $chkBlogLink = $db->getVal("select count(blog_id) from blog where linkname ='".$linkname."'");
    echo $db->getErMsg();

    if($chkBlogLink == 0)
    {
        $chkBlogCategoryLink = $db->getVal("select count(blog_category_id) from  blog_category where linkname ='".$linkname."'");
        echo $db->getErMsg();
        if($chkBlogCategoryLink == 0)
        {
            $chkCMSLink = $db->getVal("select count(link_id) from cms where linkname ='".$linkname."'");
            echo $db->getErMsg();
            if($chkCMSLink == 0)
            {
                $chkAlbumLink = $db->getVal("select count(album_id) from album where linkname ='".$linkname."'");
                echo $db->getErMsg();

                if($chkBlogLink == 0)
                {
                    $linkname = $linkname;
                }
                else
                {
                    $linkname = $linkname.$chkBlogLink;
                }
            }
            else
            {
                $linkname = $linkname.$chkBlogLink;
            }
        }
        else
        {
            $linkname = $linkname.$chkBlogLink;
        }
    }
    else
    {
        $linkname = $linkname.$chkBlogLink;
    }
    return $linkname;
}

function subcomment($n)
{
    global $db;
    $SubComment = $db->getRows("select * from blog_comment where parent = ".$n);
    echo $db->getErMsg();
    //echo $db->getLastQuery();
    foreach( $SubComment as $isub)
    {
        $chkSubComment = $db->getVal("SELECT count(comment_id) FROM blog_comment WHERE parent = ".$isub['comment_id']);
        echo $db->getErMsg();
        if($chkSubComment > 0)
        {
            return subcomment($isub['comment_id']);
        }
        else
        {
            return $isub;
        }
    }
}

function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

function seo_url($title)
{
    $replace = array(" ",",",".","'","&","-","_",":","(",")","+",";","#","!","*","{","}","[","]","?","/","\"","|","@","%","$");
    $linkStr_Replace = str_replace($replace,"-",trim($title));
    $linkStr_Replace = str_replace("----","-",$linkStr_Replace);
    $linkStr_Replace = str_replace("---","-",$linkStr_Replace);
    $linkStr_Replace = str_replace("--","-",$linkStr_Replace);
    return $linkname = $linkStr_Replace;
}

//function getpagingsearch($refUrl,$aryOpts,$pgCnt,$curPg)
//{
// 	$maxPage = 0;
//    $return='';
//	if($curPg>1)
//	{
//		$aryOpts['pg']=1;
//
//		$return.='<span class="lft-arrow"><a href="javascript:void(0)" onclick="changepaging('.$aryOpts['pg'].')<i class="fa fa-angle-left" aria-hidden="true"></i></a></span> ';
//		$aryOpts['pg']=$curPg-1;
//                $return.='<span class="rth-arrow"><a href="javascript:void(0)" onclick="changepaging('.$aryOpts['pg'].')"><i class="fa fa-angle-right" aria-hidden="true"></i></a></span>';
//////		$return.='<span class="value">1 of <span style="color: #ecba3b;">20</span></span>';
//	}
//	$range = $curPg;
//	$upto = $range+2;
//	$downto = $range-2;
//	if($upto > $maxPage)
//	{
//		$maxPage = $upto;
//	}
//	if($downto<=0)
//	{
//		$downto = 1;
//	}
//        if($maxPage>1)
//	{
//
//		for($i=$downto;$i<=$upto && $i<=$pgCnt;$i++)
//		{
//			$aryOpts['pg']=$i;
//            $return.='<div class="lft-arrow"> <a href="javascript:void(0)" onclick="changepaging('.$i.')" p="'.$i.'" class="';
//			if($curPg==$i) $return.='active';
//            $return.='" style="';
//            if($curPg==$i) $return.='background-color:#65CEA7';
//            $return.='" >'.$i.'</a></div> ';
//
//		}
//	}
//
//	if($curPg<=$pgCnt)
//	{
//		$aryOpts['pg']=$pgCnt-1;
//
//		$return.='<span class="lft-arrow"><a href="javascript:void(0)" onclick="changepaging('.$aryOpts['pg'].')"><i class="fa fa-angle-left" aria-hidden="true"></i>Next</a></span>';
//		$aryOpts['pg']=$pgCnt;
//		$return.='<span class="rth-arrow"><a href="javascript:void(0)" onclick="changepaging('.$aryOpts['pg'].')"><i class="fa fa-angle-right" aria-hidden="true"></i>Last</a></span> ';
//
//		$return.='<span class="value">'.$aryOpts['pg'].' of <span style="color: #ecba3b;">'.$pgCnt.'</span></span>';
//
//	}
//	return $return;
//}

function getpagingsearch($refUrl,$aryOpts,$pgCnt,$curPg)
{

    $maxPage = 0;
    $return='';
    $return.='';
    if($curPg>1)
    {
        $aryOpts['pg']=1;

        $return.='<span style="background-color:#000;padding:6px 17px;text-align:center;border:1px solid #fff; font-weight:bold"><a href="javascript:void(0)" onclick="changepaging('.$aryOpts['pg'].')" style="color:#ECBA3B; text-decoration:none;">First</a></span>';
        $aryOpts['pg']=$curPg-1;
        $return.='<span style="background-color:#000;color:#231f20;padding:6px 17px;border:1px solid #fff;text-align:center;font-weight:bold;"><a href="javascript:void(0)" onclick="changepaging('.$aryOpts['pg'].')" style="color:#ECBA3B;text-decoration:none;">Previous</a></span>';
    }

    $range = $curPg;
    $upto = $range+2;
    $downto = $range-2;
    if($upto > $maxPage)
    {
        $maxPage = $upto;
    }
    if($downto<=0)
    {
        $downto = 1;
    }
    if($maxPage>1)
    {

        for($i=$downto;$i<=$upto && $i<=$pgCnt;$i++)
        {
            $aryOpts['pg']=$i;
            $return.='<span style="border:1px solid #fff;background:#ecba3b;padding:6px 7px; text-decoration:none"><a id="main" href="javascript:void(0)" onclick="changepaging('.$i.')" p="'.$i.'" class="';
            if($curPg==$i) $return.='active';
            $return.='" style="';
            if($curPg==$i) $return.='color:#000;display:inline-block;text-decoration:none;';
            $return.='">'.$i.'</a></span>';

        }
    }
    if($curPg<$pgCnt)
    {

        $aryOpts['pg']=$curPg+1;
        $return.='<span style="border:1px solid #fff;background-color:#000;color:#231f20;padding:6px 17px;text-align:center;font-weight:bold"> <a href="javascript:void(0)" onclick="changepaging('.$aryOpts['pg'].')" style="color:#ECBA3B; text-decoration:none;">Next</a> </span> ';
        $aryOpts['pg']=$pgCnt;
        $return.='<span style="border:1px solid #fff;background-color:#000;color:#231f20;padding:6px 17px;text-align:center;font-weight:bold"> <a href="javascript:void(0)" onclick="changepaging('.$aryOpts['pg'].')" style="color:#ECBA3B; text-decoration:none;">Last</a> </span> ';
    }
    $return.='<div class="clearfix"></div>';
    return $return;
}

function send_notification($type,$referenceid)
{
    global $db;
    if ($type == 'post_project_business')
    {
        $projectdetail = $db->getRow("select user_id,title,bid_end_date from project where id='".$referenceid."'");
        $bussinessDetails = $db->getRow("select * from users where id='".$projectdetail['user_id']."'");

        $aryData = array(
                            'user_id'       => $bussinessDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                'user'          => ucwords($bussinessDetails['first_name']." ".$bussinessDetails['last_name']),
                                'project_name'  => ucfirst($projectdetail['title']),
                                'bid_end_date'  => date("d-M-Y",strtotime($projectdetail['bid_end_date'])),
                            );

        mail_template($bussinessDetails['email'],'post_project_business',$aryDataMail);

    }
    elseif ($type == 'post_project_consultant')
    {
        $post_project_skill = $db->getRows("SELECT * FROM project_skills WHERE project_id='" .$referenceid. "' ");
        $projectdetail = $db->getRow("select title,bid_end_date from project where id='".$referenceid."'");
        $skillcheck=array();
        foreach($post_project_skill as $post_project_skilli)
        {
           $skillcheck[] = $post_project_skilli['skill_id'];
        }
        $users = $db->getRows("select * from users where user_type=1");
        foreach($users as $usersi)
        {
            $userSkill=$db->getRows("select * from user_skills where user_id='".$usersi['id']."' ");
            foreach($userSkill as $userSkilli)
            {
                if(in_array($userSkilli['skill_id'],$skillcheck))
                {

                    $aryData = array(
                                        'user_id'       => $usersi['id'],
                                        'type'          => $type,
                                        'reference_id'  => $referenceid,
                                        'status'        => 1,
                    );
                    $aryDataMail = array(
                        'user'          => ucwords($usersi['first_name']." ".$usersi['last_name']),
                        'project_name'  => ucfirst($projectdetail['title']),
                        'bid_end_date'  => date("d-M-Y",strtotime($projectdetail['bid_end_date'])),
                    );

                }
            }
            $flgIn = $db->insertAry("notification", $aryData);
            mail_template($usersi['email'],'post_project_consultant',$aryDataMail);
        }
    }
    if ($type == 'post_project_business_to_consult')
    {
        $projectdetail = $db->getRow("select user_id,title,bid_end_date from project where id='".$referenceid."'");
        $bussinessDetails = $db->getRow("select * from users where id='".$projectdetail['user_id']."'");

        $aryData = array(
                            'user_id'       => $bussinessDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                'user'          => ucwords($bussinessDetails['first_name']." ".$bussinessDetails['last_name']),
                                'project_name'  => ucfirst($projectdetail['title']),
                                'bid_end_date'  => date("d-M-Y",strtotime($projectdetail['bid_end_date'])),
                            );

        mail_template($bussinessDetails['email'],'post_project_business_to_consult',$aryDataMail);

    }
    elseif ($type == 'post_project_consultant_to_you')
    {
        $post_project_skill = $db->getRows("SELECT * FROM project_skills WHERE project_id='" .$referenceid. "' ");
        $projectdetail = $db->getRow("select title,bid_end_date from project where id='".$referenceid."'");
        $skillcheck=array();
        foreach($post_project_skill as $post_project_skilli)
        {
           $skillcheck[] = $post_project_skilli['skill_id'];
        }
        $users = $db->getRows("select * from users where user_type=1");
        foreach($users as $usersi)
        {
            $userSkill=$db->getRows("select * from user_skills where user_id='".$usersi['id']."' ");
            foreach($userSkill as $userSkilli)
            {
                if(in_array($userSkilli['skill_id'],$skillcheck))
                {

                    $aryData = array(
                                        'user_id'       => $usersi['id'],
                                        'type'          => $type,
                                        'reference_id'  => $referenceid,
                                        'status'        => 1,
                    );
                    $aryDataMail = array(
                        'user'          => ucwords($usersi['first_name']." ".$usersi['last_name']),
                        'project_name'  => ucfirst($projectdetail['title']),
                        'bid_end_date'  => date("d-M-Y",strtotime($projectdetail['bid_end_date'])),
                    );

                }
            }
            $flgIn = $db->insertAry("notification", $aryData);
            mail_template($usersi['email'],'post_project_consultant_to_you',$aryDataMail);
        }
    }
    elseif($type == 'bid_submit_business')
    {
        $IDS = $db->getRow("select b.*,u.first_name as first_name,u.last_name as last_name,u.email as email from bid b ,users u where b.id='".$referenceid."' and b.bid_by=u.id");
        $ID_S = $db->getRow("select user_id,title from project where id='".$IDS['project_id']."'");

        //$consultantDetails = $db->getRow("select * from users where id='".$IDS['bid_by']."'");
        $bussinessDetails = $db->getRow("select * from users where id='".$ID_S['user_id']."'");
        if($bussinessDetails['new_bid_notification']==1)
        {
            $aryData = array(
                                'user_id'       => $bussinessDetails['id'],
                                'type'          => $type,
                                'reference_id'  => $referenceid,
                                'status'        => 1,
                             );
            $flgIn = $db->insertAry("notification", $aryData);

            $aryDataMail = array(
                'user'              => $bussinessDetails['first_name']." ".$bussinessDetails['last_name'],
                'project_name'      => $ID_S['title'],
                'consultant_name'   => ucwords($IDS['first_name']." ".$IDS['last_name']),
                'consultant_email'  => $IDS['email'],
                'bid_amount'        => $IDS['bid_amount'],
            );

            mail_template($bussinessDetails['email'],'bid_submit_business',$aryDataMail);
        }
    }
    elseif($type == 'bid_submit_consultant')
    {
        $IDS = $db->getRow("select b.*,p.title from bid b,project p where b.id='".$referenceid."' and b.project_id=p.id");

        $consultantDetails = $db->getRow("select * from users where id='".$IDS['bid_by']."'");
        if($consultantDetails['new_bid_notification']==1)
        {
            $aryData = array(
                                'user_id'       => $consultantDetails['id'],
                                'type'          => $type,
                                'reference_id'  => $referenceid,
                                'status'        => 1,
                            );
            $flgIn = $db->insertAry("notification", $aryData);

            $aryDataMail = array(
                                    'user'              => ucwords($consultantDetails['first_name']." ".$consultantDetails['last_name']),
                                    'project_name'      => $IDS['title'],
                                    'bid_amount'        => $IDS['bid_amount'],
                                );
            mail_template($consultantDetails['email'],'bid_submit_consultant',$aryDataMail);
        }
    }
    elseif($type == 'assign_project_business')
    {
        $ID_S = $db->getRow("select p.user_id,p.title,b.bid_by,u.first_name,u.last_name from project p,users u,bid b where p.id='".$referenceid."' and p.awarded_bid_id=b.id and b.bid_by=u.id");

        $bussinessDetails = $db->getRow("select * from users where id='".$ID_S['user_id']."'");
        if($bussinessDetails['project_awarded_notification']==1)
        {
            $aryData = array(
                                'user_id'       => $bussinessDetails['id'],
                                'type'          => $type,
                                'reference_id'  =>$referenceid,
                                'status'        => 1,
                            );
            $flgIn = $db->insertAry("notification", $aryData);

            $aryDataMail = array(
                                    'user'              => ucwords($bussinessDetails['first_name']." ".$bussinessDetails['last_name']),
                                    'project_name'      => ucfirst($ID_S['title']),
                                    'consultant_name'   => ucwords($ID_S['first_name']." ".$ID_S['last_name']),
                                );
            mail_template($bussinessDetails['email'],'assign_project_business',$aryDataMail);
        }
    }
    elseif($type == 'assign_project_consultant')
    {
        $IDS = $db->getRow("select b.*,p.title from bid b,project p where b.project_id='".$referenceid."' and b.project_id=p.id and b.status=1");

        $consultantDetails = $db->getRow("select * from users where id='".$IDS['bid_by']."'");

        if($consultantDetails['project_awarded_notification']==1)
        {
            $aryData = array(
                                'user_id'       => $consultantDetails['id'],
                                'type'          => $type,
                                'reference_id'  => $referenceid,
                                'status'        => 1,
                            );
            $flgIn = $db->insertAry("notification", $aryData);

            $aryDataMail = array(
                                    'user'          => ucwords($consultantDetails['first_name']." ".$consultantDetails['last_name']),
                                    'project_name'  => ucfirst($IDS['title']),
                                );
            mail_template($consultantDetails['email'],'assign_project_consultant',$aryDataMail);
        }
    }
    elseif($type == 'bid_rejected')
    {
        $ID = $db->getRows("select b.*,p.title from bid b,project p where b.project_id='".$referenceid."' and b.project_id=p.id and status!=1");
        if($ID!='')
        {
            foreach($ID as $IDs)
            {
                $consultantDetails = $db->getRow("select * from users where id='" . $IDs['bid_by'] . "'");

                $aryData = array(
                    'user_id'       => $consultantDetails['id'],
                    'type'          => $type,
                    'reference_id'  => $referenceid,
                    'status'        => 1,
                );
                $flgIn = $db->insertAry("notification", $aryData);

                $aryDataMail = array(
                    'user'          => ucwords($consultantDetails['first_name'] . " " . $consultantDetails['last_name']),
                    'project_name'  => ucfirst($IDs['title']),
                );
                mail_template($consultantDetails['email'], 'bid_rejected', $aryDataMail);
            }
        }

     }
    elseif ($type == 'bid_changed_business')
    {
        $projectdetails = $db->getRow("select user_id,title from project where id='".$referenceid."'");
        $userdetails = $db->getRow("select * from users where id='".$projectdetails['user_id']."'");

        $aryData = array(
                            'user_id'       => $userdetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);


        $aryDataMail = array(
                                'user'              => ucwords($userdetails['first_name']." ".$userdetails['last_name']),
                                'project_name'      => ucfirst($projectdetails['title']),
                            );
        mail_template($userdetails['email'],'bid_changed_business',$aryDataMail);
    }
    elseif ($type == 'bid_changed_consultant')
    {
        $post_project_skill = $db -> getRows("SELECT * FROM project_skills WHERE project_id='".$referenceid."'");
        $projectdetail = $db->getRow("select title from project where id='".$referenceid."'");
        $skillcheck=array();
        foreach($post_project_skill as $post_project_skilli)
        {
           $skillcheck[] = $post_project_skilli['skill_id'];
        }
        $users = $db->getRows("select * from users where user_type=1");
        foreach($users as $usersi)
        {
            $userSkill=$db->getRows("select * from user_skills where user_id='".$usersi['id']."' ");
            foreach($userSkill as $userSkilli)
            {
                if(in_array($userSkilli['skill_id'],$skillcheck))
                {
                    $aryData = array(
                                        'user_id'       => $usersi['id'],
                                        'type'          => $type,
                                        'reference_id'  => $referenceid,
                                        'status'        => 1,
                                    );
                    $aryDataMail = array(
                                            'user'          => ucwords($usersi['first_name']." ".$usersi['last_name']),
                                            'project_name'  => ucfirst($projectdetail['title']),

                                        );
                }
            }
            $flgIn = $db->insertAry("notification", $aryData);
            mail_template($usersi['email'],'bid_changed_consultant',$aryDataMail);
        }
    }

    elseif($type == 'project_completed_business')
    {
        $IDS = $db->getRow("select user_id,title from project where id='".$referenceid."'");
        $userDetails = $db->getRow("select * from users where id='".$IDS['user_id']."'");
        $aryData = array(
                                'user_id'       => $userDetails['id'],
                                'type'          => $type,
                                'reference_id'  => $referenceid,
                                'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                'user' => ucwords($userDetails['first_name']." ".$userDetails['last_name']),
                                'project_name' => ucfirst($IDS['title']),
                            );
        mail_template($userDetails['email'],'project_completed_business',$aryDataMail);

    }
    elseif($type == 'project_completed_consultant')
    {
        $IDS = $db->getRow("select b.bid_by,p.title from bid b,project p where b.project_id='".$referenceid."' and b.status=1 and p.id=b.project_id and p.status=3");
        $consultantDetails = $db->getRow("select * from users where id='".$IDS['bid_by']."'");
        $aryData = array(
                            'user_id'       => $consultantDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                'user'          => ucwords($consultantDetails['first_name']." ".$consultantDetails['last_name']),
                                'project_name'  => ucfirst($IDS['title']),
                            );
        mail_template($consultantDetails['email'],'project_completed_consultant',$aryDataMail);
    }
    elseif($type == 'payment_business')
    {
        $details=$db->getRow("select m.*,p.user_id as projectuserid,p.title as projecttitle from milestone m,project p where m.id='".$referenceid."' and p.id=m.project_id");

        $userDetails = $db->getRow("select * from users where id='".$details['projectuserid']."'");
        if($userDetails['milestone_created_notification']==1)
        {
            $aryData = array(
                'user_id'       => $userDetails['id'],
                'type'          => $type,
                'reference_id'  => $referenceid,
                'status'        => 1,
            );
            $flgIn = $db->insertAry("notification", $aryData);

            $aryDataMail = array(
                                    'user'                  => ucwords($userDetails['first_name']." ".$userDetails['last_name']),
                                    'project_name'          => ucfirst($details['projecttitle']),
                                    'milestone_amount'      => $details['amount'],
                                    'milestone_description' => ucfirst($details['title']),
                                );

            mail_template($userDetails['email'],'payment_business',$aryDataMail);
        }

    }
    elseif($type == 'payment_consultant')
    {
        $details=$db->getRow("select m.*,p.title as projecttitle from milestone m,project p where m.id='".$referenceid."' and p.id=m.project_id");
        $consultantDetails = $db->getRow("select * from users where id='".$details['user_id']."'");
        if($consultantDetails['milestone_created_notification']==1)
        {
            $aryData = array(
                                    'user_id'       => $consultantDetails['id'],
                                    'type'          => $type,
                                    'reference_id'  => $referenceid,
                                    'status'        => 1,
                                 );
                $flgIn = $db->insertAry("notification", $aryData);

                $aryDataMail = array(
                                        'user'                  => ucwords($consultantDetails['first_name']." ".$consultantDetails['last_name']),
                                        'project_name'          => ucfirst($details['projecttitle']),
                                        'milestone_amount'      => $details['amount'],
                                        'milestone_description' => ucfirst($details['title']),
                                    );
                mail_template($consultantDetails['email'],'payment_consultant',$aryDataMail);
        }
    }
    elseif($type == 'payment_failed_business')
    {
        $details = $db->getRow("select m.*,p.user_id as projectuserid,p.title as projecttitle from milestone m,project p where m.id='".$referenceid."' and p.id=m.project_id");
        $userDetails = $db->getRow("select * from users where id='".$details['projectuserid']."'");
        $aryData = array(
                            'user_id'       => $userDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                    'user'                  => ucwords($userDetails['first_name']." ".$userDetails['last_name']),
                                    'project_name'          => ucfirst($details['projecttitle']),
                                    'milestone_amount'      => $details['amount'],
                                    'milestone_description' => ucfirst($details['title']),
                                );
        mail_template($userDetails['email'],'payment_failed_business',$aryDataMail);
    }
    elseif($type == 'payment_cancel_business')
    {
        $details = $db->getVal("select m.*,p.user_id as projectuserid,p.title as projecttitle from milestone m,project p where m.id='".$referenceid."' and p.id=m.project_id");
        $userDetails = $db->getRow("select * from users where id='".$details['projectuserid']."'");
        $aryData = array(
                            'user_id'       => $userDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                    'user'                  => ucwords($userDetails['first_name']." ".$userDetails['last_name']),
                                    'project_name'          => ucfirst($details['projecttitle']),
                                    'milestone_amount'      => $details['amount'],
                                    'milestone_description' => ucfirst($details['title']),
                                );
        mail_template($userDetails['email'],'payment_cancel_business',$aryDataMail);
    }
    elseif($type == 'create_milestone_business')
    {
        $details = $db->getRow("select user_id,title from project where id='".$referenceid."'");
        $businessDetails = $db->getRow("select * from users where id='".$details['user_id']."'");

            $aryData = array(
                                'user_id'       => $businessDetails['id'],
                                'type'          => $type,
                                'reference_id'  => $referenceid,
                                'status'        => 1,
                            );
            $flgIn = $db->insertAry("notification", $aryData);

            $aryDataMail = array(
                                    'user'          => ucwords($businessDetails['first_name']." ".$businessDetails['last_name']),
                                    'project_name'  => ucfirst($details['title']),
                                );
            mail_template($businessDetails['email'],'create_milestone_business',$aryDataMail);

    }
    elseif($type == 'create_milestone_consultant')
    {
        $details = $db->getRow("select b.bid_by,p.title from bid b,project p where b.project_id='".$referenceid."' and b.status=1 and b.project_id=p.id");
        $consultantDetails = $db->getRow("select * from users where id='".$details['bid_by']."'");

            $aryData = array(
                            'user_id'       => $consultantDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
            );
            $flgIn = $db->insertAry("notification", $aryData);

            $aryDataMail = array(
                                    'user'      => ucwords($consultantDetails['first_name']." ".$consultantDetails['last_name']),
                                    'project_name'    => ucfirst($details['title']),
                                );
            mail_template($consultantDetails['email'],'create_milestone_consultant',$aryDataMail);

    }
    elseif($type == 'provide_feedback_business')
    {
        $IDS = $db->getRow("select * from rating where id='".$referenceid."'");

        $userDetails = $db->getRow("select * from users where id='".$IDS['rate_by']."'");
        $aryData = array(
                            'user_id'       => $userDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                'user'      => ucwords($userDetails['first_name']." ".$userDetails['last_name']),
                                'status'    => 1,
        );
        mail_template($userDetails['email'],'provide_feedback_business',$aryDataMail);
    }
    elseif($type == 'provide_feedback_consultant')
    {
        $IDS = $db->getRow("select * from rating where id='".$referenceid."'");

        $consultantDetails = $db->getRow("select * from users where id='".$IDS['rate_to']."'");

        $aryData = array(
                            'user_id'       => $consultantDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);


        $aryDataMail = array(
                                'user'      => ucwords($consultantDetails['first_name']." ".$consultantDetails['last_name']),
                                'status'    => 1,
                            );
        mail_template($consultantDetails['email'],'provide_feedback_consultant',$aryDataMail);
    }
    elseif($type == 'refund_request_business')
    {
        $details = $db->getRow("select m.*,p.user_id as projectuserid,p.title as projecttitle,rr.refund_amount from milestone m,project p,refund_request rr where m.id='".$referenceid."' and p.id=m.project_id and m.id=rr.milestone_id");
        $userDetails = $db->getRow("select * from users where id='".$details['projectuserid']."'");
        $aryData = array(
                            'user_id'       => $userDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                'user'                  => ucwords($userDetails['first_name']." ".$userDetails['last_name']),
                                'project_name'          => ucfirst($details['projecttitle']),
                                'milestone_amount'      => $details['amount'],
                                'milestone_description' => ucfirst($details['title']),
                                'refund_amount'         => $details['refund_amount'],
                            );
        mail_template($userDetails['email'],'refund_request_business',$aryDataMail);
    }
    elseif($type == 'refund_request_consultant')
    {
        $details=$db->getRow("select m.*,p.title as projecttitle,rr.refund_amount from milestone m,project p,refund_request rr where m.id='".$referenceid."' and p.id=m.project_id and m.id=rr.milestone_id ");
        $userDetails = $db->getRow("select * from users where id='".$details['user_id']."'");
        $aryData = array(
                            'user_id'       => $userDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                'user'                  => ucwords($consultantDetails['first_name']." ".$consultantDetails['last_name']),
                                'project_name'          => ucfirst($details['projecttitle']),
                                'milestone_amount'      => $details['amount'],
                                'milestone_description' => ucfirst($details['title']),
                                'refund_amount'         => $details['refund_amount'],
                            );
        mail_template($userDetails['email'],'refund_request_consultant',$aryDataMail);

    }
    elseif($type == 'refund_request_business_approve')
    {
        $details = $db->getRow("select rr.refund_amount,rr.project_id,p.title,p.user_id from refund_request rr,project p where rr.id='".$referenceid."' and rr.project_id=p.id");
        $userDetails = $db->getRow("select * from users where id='".$details['user_id']."'");
        $aryData = array(
                            'user_id'       => $userDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                'user'              => ucwords($userDetails['first_name']." ".$userDetails['last_name']),
                                'project_name'      => ucfirst($details['title']),
                                'refund_amount'     => $details['refund_amount'],
                            );
        mail_template($userDetails['email'],'refund_request_business_approve',$aryDataMail);
    }
    elseif($type == 'refund_request_consultant_approve')
    {
       $details = $db->getRow("select rr.refund_amount,rr.project_id,p.title,m.user_id from refund_request rr,project p,milestone m where rr.id='".$referenceid."' and rr.project_id=p.id and rr.milestone_id=m.id");
       $userDetails = $db->getRow("select * from users where id='".$details['user_id']."'");
        $aryData = array(
                            'user_id'       => $userDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                'user'              => ucwords($userDetails['first_name']." ".$userDetails['last_name']),
                                'project_name'      => ucfirst($details['title']),
                                'refund_amount'     => $details['refund_amount'],
                            );
        mail_template($userDetails['email'],'refund_request_consultant_approve',$aryDataMail);
    }
    elseif($type == 'refund_request_business_paid')
    {
        $IDS = $db->getVal("select user_id from project where id='".$referenceid."'");
        $userDetails = $db->getRow("select * from users where id='".$IDS."'");
        $aryData = array(
            'user_id' => $userDetails['id'],
            'type' => $type,
            'reference_id'=>$referenceid,
            'status' => 1,
        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
            'user' => $userDetails['first_name']." ".$userDetails['last_name'],
            'status' => 1,
        );
        mail_template($userDetails['email'],'refund_request_business_paid',$aryDataMail);
    }
    elseif($type == 'refund_request_consultant_paid')
    {
        $IDS = $db->getVal("select user_id from project where id='".$referenceid."'");
        $userDetails = $db->getRow("select * from users where id='".$IDS."'");
        $aryData = array(
            'user_id' => $userDetails['id'],
            'type' => $type,
            'reference_id'=>$referenceid,
            'status' => 1,
        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
            'user' => $userDetails['first_name']." ".$userDetails['last_name'],
            'status' => 1,
        );
        mail_template($userDetails['email'],'refund_request_consultant_paid',$aryDataMail);
    }
    elseif($type == 'refund_request_business_reject')
    {
        $details = $db->getRow("select rr.refund_amount,rr.project_id,p.title,p.user_id from refund_request rr,project p where rr.id='".$referenceid."' and rr.project_id=p.id");
        $userDetails = $db->getRow("select * from users where id='".$details['user_id']."'");
        $aryData = array(
                            'user_id'       => $userDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                'user'              => ucwords($userDetails['first_name']." ".$userDetails['last_name']),
                                'project_name'      => ucfirst($details['title']),
                                'refund_amount'     => $details['refund_amount'],
                            );
        mail_template($userDetails['email'],'refund_request_business_reject',$aryDataMail);

    }
    elseif($type == 'refund_request_consultant_reject')
    {
        $details = $db->getRow("select rr.refund_amount,rr.project_id,p.title,m.user_id from refund_request rr,project p,milestone m where rr.id='".$referenceid."' and rr.project_id=p.id and rr.milestone_id=m.id");
        $userDetails = $db->getRow("select * from users where id='".$details['user_id']."'");
        $aryData = array(
                            'user_id'       => $userDetails['id'],
                            'type'          => $type,
                            'reference_id'  => $referenceid,
                            'status'        => 1,
                        );
        $flgIn = $db->insertAry("notification", $aryData);

        $aryDataMail = array(
                                'user'              => ucwords($userDetails['first_name']." ".$userDetails['last_name']),
                                'project_name'      => ucfirst($details['title']),
                                'refund_amount'     => $details['refund_amount'],
                            );
        mail_template($userDetails['email'],'refund_request_consultant_reject',$aryDataMail);
    }
    elseif($type == 'bank_transfer_consultant')
    {
        $IDS = $db->getVal("select user_id from wallet where id='".$referenceid."'");
        $userDetails = $db->getRow("select * from users where id='".$IDS."'");
        $aryData = array(
            'user_id' => $userDetails['id'],
            'type' => $type,
            'reference_id'=>$referenceid,
            'status' => 1,
        );
        $flgIn = $db->insertAry("notification", $aryData);

       $aryDataMail = array(
            'user' => $userDetails['first_name']." ".$userDetails['last_name'],
            'status' => 1,
        );
        mail_template($userDetails['email'],'bank_transfer_consultant',$aryDataMail);
    }
}
?>
