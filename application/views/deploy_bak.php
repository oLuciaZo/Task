<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
//define('NET_SSH2_LOGGING', NET_SSH2_LOG_COMPLEX);
require_once "PHPTelnet.php";

    include('Net/SSH2.php');
    include('Crypt/RSA.php');
    include('Math/BigInteger.php');
    include('Crypt/Base.php');
    $key = new Crypt_RSA();
    //$key->setPassword('whatever');
    $key->loadKey(file_get_contents('private-key.txt'));
$secretkey = randomPassword();
//test();
deploy_branch($hq,$branch,$secretkey);
deploy_hq($hq,$branch,$secretkey);


    function deploy_branch($hq,$branch,$secretkey){
      if(isset($branch)){
      foreach ($branch as $object) {
        $wan1 = $object->ipwan1;
        $wan2 = $object->ipwan2;
        $username = $object->username;
        $password = $object->password;
      }}


      try{
          $ssh = new Net_SSH2($wan1);
          if (!$ssh->login($username,$password)) {
              //exit('Login Failed');
              echo "Login Failed";

          }
      }catch(Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
      try{

       echo $ssh->exec("/ip ipsec peer remove 4");
       //echo "<br>";
       //sleep(1);
       echo $ssh->exec("/ip ipsec peer remove 3");
       //echo "<br>";
       //sleep(1);
       echo $ssh->exec("/ip ipsec peer remove 2");
       //echo "<br>";
       //sleep(1);
       echo $ssh->exec("/ip ipsec peer remove 1");
       //echo "<br>";
       //sleep(1);
       echo $ssh->exec("/ip ipsec peer remove 0");
       //echo "<br>";
       //sleep(1);
       if(isset($hq)){
       foreach ($hq as $object) {
         $lan1 = $object->lan1;
         $lan2 = $object->lan2;

       echo $ssh->exec("/ip ipsec peer add address=$lan1/32 dh-group=modp1024 secret=$secretkey");
       //echo "<br>";
       //sleep(1);
       echo $ssh->exec("/ip ipsec peer add address=$lan2/32 dh-group=modp1024 secret=$secretkey");
       //echo "<br>";
       }}
    }catch(Exception $e){
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

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
      update_db($siteid_hq,$siteid_branch,$secretkey);
}

  function update_db($siteid_hq,$siteid_branch,$secretkey){


    redirect('Welcome/updatedb/'.$siteid_hq."/".$siteid_branch."/".$secretkey);
    /*echo form_open('Welcome/updatedb');
    echo form_input('siteid', isset($siteid) ? $siteid : NULL);
    echo form_input('ipseckey', isset($secretkey) ? $secretkey : NULL);
    echo form_submit('Submit', 'Submit');
    echo form_close();*/
  }

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


 ?>
