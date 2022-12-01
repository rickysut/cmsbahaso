<?php


class Auth{
  public function login($email, $password){
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://bahasoweb.test/api/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('email' => $email,'password' => $password),
        CURLOPT_HTTPHEADER => array(
          'Accept: application/json '
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);

      return json_decode($response);
  }

  public function register($email, $password, $name, $role, $avatar){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://bahasoweb.test/api/register',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('email' => $email,'password' => $password,'role' => $role ,'avatar'=> new CURLFILE($avatar),'name' => $name),
      CURLOPT_HTTPHEADER => array(
        'Accept: application/json '
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return json_decode($response);
}


}