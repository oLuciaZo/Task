<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
//define('NET_SSH2_LOGGING', NET_SSH2_LOG_COMPLEX);
require_once "PHPTelnet.php";
error_reporting(0);
    include('Net/SSH2.php');
    include('Crypt/RSA.php');
    include('Math/BigInteger.php');
    include('Crypt/Base.php');
    $key = new Crypt_RSA();
    //$key->setPassword('whatever');
    $key->loadKey(file_get_contents('private-key.txt'));
    $secretkey = randomPassword();

    $hq_status1 = 0;
    $hq_status2 = 0;
    $branch_status = 0;
    $count_lan = 0;

    if(isset($branch)){
    foreach ($branch as $object) {
      $wan1 = $object->ipwan1;
      $wan2 = $object->ipwan2;
      $branch_username = $object->username;
      $branch_password = $object->password;
      $group_device = $object->group_device;
      $previouskey = $object->ipseckey;
      $siteid_branch = $object->siteid;
      $branch_status = check_connection_Branch($wan1,$wan2,$branch_username,$branch_password);
      write_log("check branch end");
    }}
    if($branch_status != 4){
      write_log("start check hq connection");
    if(isset($hq)){
    foreach ($hq as $object) {
      $hq_username = $object->username;
      $hq_password = $object->password;
      $lan[$count_lan] = $object->lan1;
      $count_lan++;
      $hq_status1 = check_connection_HQ1($lan1,$wan1,$username,$password);
      if($hq_status1!=0){
      hq_telnet1($object->lan1,$wan1,$hq_username,$hq_password,$secretkey,$previouskey);
      }
      $lan[$count_lan] = $object->lan2;
      $hq_status2 = check_connection_HQ1($lan2,$wan2,$username,$password);
      if($hq_status2!=0){
      hq_telnet2($object->lan2,$wan2,$hq_username,$hq_password,$secretkey,$previouskey);
      }
      $count_lan++;
    }}
  }else{
    echo '<script type="text/javascript"> alert("Deployment not complete Branch connection is failed");window.history.back();</script>';
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
    //exit;
  }

if($branch_status != 4 && ($hq_status1!=0 || $hq_status2!=0)){
branch_ssh1($wan1,$wan2,$lan,$count_lan,$branch_username,$branch_password,$secretkey);
update_db($group_device,$siteid_branch,$secretkey,$previouskey);
}
//hq_telnet1($lan1,$wan1,$username,$password,$secretkey);
//hq_telnet2($lan2,$wan2,$username,$password,$secretkey);

//test();
//deploy_branch($hq,$branch,$secretkey);
//deploy_hq($hq,$branch,$secretkey);
/*if(isset($branch)){
foreach ($branch as $object) {
  echo $wan1 = $object->ipwan1."<br>";
  echo $wan2 = $object->ipwan2."<br>";

}}
if(isset($hq)){
foreach ($hq as $object) {
  echo $wan1 = $object->lan1."<br>";
  echo $wan2 = $object->lan2;

}}*/
/*################################Check WAN####################################*/
function check_connection_HQ1($lan1,$wan1,$username,$password){
  try{
  $telnet = new PHPTelnet();
  $result = $telnet->Connect("$lan1","$username","$password");
  write_log($result);
  if ($result == 0) {
          // say Disconnect(0); to break the connection without explicitly logging out
  $telnet->Disconnect();
  return 1;
    }else{
  return 0;
  }
    }catch(Exception $e){
      write_log($lan1."  ".$e);
    }
}


function check_connection_HQ2($lan2,$wan2,$username,$password){
  try{
  $telnet = new PHPTelnet();
  $result = $telnet->Connect("$lan2","$username","$password");
  write_log($result);
  if ($result == 0) {
          // say Disconnect(0); to break the connection without explicitly logging out
  $telnet->Disconnect();
  return 1;
    }else{
  return 0;
  }

    }catch(Exception $e){
      write_log($lan2."  ".$e);
    }
}


function check_connection_Branch($wan1,$wan2,$branch_username,$branch_password){
  $ssh1 = new Net_SSH2($wan1);
  $ssh2 = new Net_SSH2($wan2);
  $status = 0;

  if (!$ssh1->login($branch_username,$branch_password)) {
      write_log($wan1." Login Failed Check Connection");
      $status = 1;
  }

  $status = $status +1;
  if (!$ssh2->login($branch_username,$branch_password)) {
      write_log($wan2." Login Failed Check Connection");
      $status = $status +1;
  }

  $status = $status +1;
      return $status;
}

/*################################Check WAN####################################*/

/*################################Branch Deployment####################################*/
function branch_ssh1($wan1,$wan2,$lan,$count_lan,$username,$password,$secretkey){
write_log($wan1."branch1");
      try{
          $ssh = new Net_SSH2($wan1);
      if (!$ssh->login($username,$password)) {
          write_log($wan1." Login Failed");
          branch_ssh2($wan2,$lan,$count_lan,$username,$password,$secretkey);
      }
      }catch(Exception $e){
          write_log($wan1."  ".$e);
      }
      try{
        write_log($ssh->exec("/ip ipsec peer print"));
      for($i=0; $i<$count_lan; $i++){
       echo $ssh->exec("/ip ipsec peer remove $i");
       //$ssh->exec('/ip ipsec peer remove 1');
       write_log("/ip ipsec peer remove $i");
      }

       //sleep(1);
       for($i=0; $i<$count_lan; $i++){
         $ip = $lan[$i];
       $ssh->exec("/ip ipsec peer add address=$ip/32 dh-group=modp1024 secret=$secretkey generate-policy=port-override nat-traversal=no enc-algorithm=3des dpd-interval=5s dpd-maximum-failures=2");
       write_log("/ip ipsec peer add address=$ip/32 dh-group=modp1024 secret=$secretkey generate-policy=port-override nat-traversal=no enc-algorithm=3des dpd-interval=5s dpd-maximum-failures=2");
        }
       //echo "<br>";
       //sleep(1);
       //echo "<br>";


     }catch(Exception $e){
      write_log($wan1."  ".$e);
      }
    }

    function branch_ssh2($wan2,$lan,$count_lan,$username,$password,$secretkey){
      write_log("branch2");
          try{
              $ssh = new Net_SSH2($wan2);
          if (!$ssh->login($username,$password)) {
              write_log($wan2." Login Failed");
          }
          }catch(Exception $e){
              write_log($wan2."  ".$e);
          }
          try{

            for($i=0; $i<$count_lan; $i++){
             echo $ssh->exec("/ip ipsec peer remove $i");
            }

             //sleep(1);
             for($i=0; $i<$count_lan; $i++){
             echo $ssh->exec("/ip ipsec peer add address=$lan[$i]/32 dh-group=modp1024 secret=$secretkey");
              }

        }catch(Exception $e){
          write_log($wan2."  ".$e);
        }
    }
/*################################Branch Deployment####################################*/

/*################################HQ Deployment####################################*/
function hq_telnet1($lan1,$wan1,$username,$password,$secretkey,$previouskey){
  write_log("telnet1");
  try{
  $telnet = new PHPTelnet();
  $result = $telnet->Connect("$lan1","$username","$password");
  write_log($result);
  if ($result == 0) {
  $telnet->DoCommand('conf t', $result);
  // NOTE: $result may contain newlines
  write_log($result);
  sleep(1);
  $telnet->DoCommand("no crypto isakmp key $previouskey address $wan1", $result);
  write_log($result);
  $telnet->DoCommand("crypto isakmp key $secretkey address $wan1", $result);
  write_log($result);
          // say Disconnect(0); to break the connection without explicitly logging out
  $telnet->Disconnect();

      }
    }catch(Exception $e){
      write_log($lan1."  ".$e);
    }
}
function hq_telnet2($lan2,$wan2,$username,$password,$secretkey,$previouskey){
  write_log("telnet2");
  try{
  $telnet = new PHPTelnet();
  $result = $telnet->Connect("$lan2","$username","$password");
  write_log($result);
  if ($result == 0) {
  $telnet->DoCommand('conf t', $result);
  // NOTE: $result may contain newlines
  write_log($result);
  sleep(1);
  $telnet->DoCommand("no crypto isakmp key $previouskey address $wan2", $result);
  write_log($result);
  $telnet->DoCommand("crypto isakmp key $secretkey address $wan2", $result);
  write_log($result);
          // say Disconnect(0); to break the connection without explicitly logging out
  $telnet->Disconnect();

      }
    }catch(Exception $e){
      write_log($lan1."  ".$e);
    }
}


/*################################HQ Deployment####################################*/


    function deploy_hq($hq,$branch,$secretkey){
      if(isset($branch)){
      foreach ($branch as $object) {
        $wan1 = $object->ipwan1;
        $wan2 = $object->ipwan2;
        $ipseckey = $object->ipseckey;
        $siteid_branch = $object->siteid;

      }}
      if(isset($hq)){
      foreach ($hq as $object) {
        $lan1 = $object->lan1;
        $lan2 = $object->lan2;
        $username = $object->username;
        $password = $object->password;
        $siteid_hq = $object->siteid;


      try{
          $telnet = new PHPTelnet();
          $result = $telnet->Connect("$lan1","$username","$password");
          echo $result;
          if ($result == 0) {
          $telnet->DoCommand('conf t', $result);
          // NOTE: $result may contain newlines
          echo $result;
          sleep(1);
          $telnet->DoCommand("no crypto isakmp key $ipseckey address $wan1", $result);
          echo $result;
          $telnet->DoCommand("no crypto isakmp key $ipseckey address $wan2", $result);
          echo $result;
          $telnet->DoCommand("crypto isakmp key $secretkey address $wan1", $result);
          echo $result;
          $telnet->DoCommand("crypto isakmp key $secretkey address $wan2", $result);
          echo $result;
                  // say Disconnect(0); to break the connection without explicitly logging out
          $telnet->Disconnect();

          }

      }catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
      }}
      //update_db($siteid_hq,$siteid_branch,$secretkey);
}

  function update_db($group_device,$siteid_branch,$secretkey,$previouskey){


    redirect('Welcome/updatedb/'.$group_device."/".$siteid_branch."/".$secretkey."/".$previouskey);
    /*echo form_open('Welcome/updatedb');
    echo form_input('siteid', isset($siteid) ? $siteid : NULL);
    echo form_input('ipseckey', isset($secretkey) ? $secretkey : NULL);
    echo form_submit('Submit', 'Submit');
    echo form_close();*/
  }

/*################################SecretKey####################################*/
    function randomPassword() {
      $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      $pass = array(); //remember to declare $pass as an array
      $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
      for ($i = 0; $i < 8; $i++) {
          $n = rand(0, $alphaLength);
          $pass[] = $alphabet[$n];
      }
      return implode($pass); //turn the array into a string
    }
/*################################SecretKey####################################*/
/*################################Logging####################################*/
function write_log($message){
    $file = 'log.log';
    // Open the file to get existing content
    $current = file_get_contents($file);
    // Append a new person to the file
    $current .= date('d-m-Y H:i:s')."  -  ".$message. "\r\n";
    // Write the contents back to the file
    file_put_contents($file, $current);
}
/*################################Logging####################################*/
 ?>
