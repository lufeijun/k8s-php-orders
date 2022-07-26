<?php
namespace App\Tools\Curl;


class Curl {
  public static function httpPost( $url, $data = [] )
  {
    $header   = [
      'Content-type: application/json; charset=UTF-8',
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);

    $result = curl_exec($ch);
    curl_close($ch);

    $result = json_decode( $result, true );
    
    if( is_array( $result ) && isset( $result['status'] ) && isset( $result['values'] ) &&  ! $result['status']  ) {
      $result = $result['values'];
    } else {
      $result = [];
    }

    return $result;
  }

}