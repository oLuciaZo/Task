<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
//define('NET_SSH2_LOGGING', NET_SSH2_LOG_COMPLEX);

    include('Net/SSH2.php');
    include('Crypt/RSA.php');
    include('Math/BigInteger.php');
    include('Crypt/Base.php');

    $server = "172.29.12.113";
    $username = "task";
    $password = "task!@12";
    $secretkey = randomPassword();
    $command1 = "show run";
    $command2 = "show ip int brie";
    $command3 = "no crypto isakmp key p@ssw0rd address 10.11.83.29";
    $command4 = "/ip ipsec peer add address=122.155.205.15/32 dh-group=modp1024 secret=$secretkey";
    #$command2 = "enable";
    #$command3 = "local-userdb add username abcde11 password abcde11 guest-fullname abcde11";

    //$key = new Crypt_RSA();
    //$key->setPassword('whatever');
    //$key->loadKey(file_get_contents('/Users/sitita/.ssh/id_rsa.pub'));

try{

    $ssh = new Net_SSH2($server);
    if (!$ssh->login($username,$password)) {
        exit('Login Failed');
        echo "Login Failed";
    }
}catch(Exception $e){
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}
    //sleep(2);
    //echo "Query";
    try{

    echo $ssh->exec($command1);
    sleep(1);
    $ssh->read('VPN_G1_AIS#');
    $ssh->wrie("password\m");
    //sleep(1);


    sleep(1);
    echo $ssh->exec("do show ip int brie");
    #sleep(1);
     #$ssh->exec($command3);
     echo "Completely";


    #echo $ssh->exec($command2);
    #echo $ssh->exec($command3);
  }catch(Exception $e){
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }

  function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()_+';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 16; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
/*
    echo $ssh->exec($command2);

    echo $ssh->exec($command3);
    echo $ssh->getLog();*/
?>
