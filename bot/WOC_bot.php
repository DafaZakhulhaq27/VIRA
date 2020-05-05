<?php

require_once 'Token.php';
define('BOT_TOKEN', $token);
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

$debug = false;

require_once 'WOC_model.php';
function exec_curl_request($handle)
{
    $response = curl_exec($handle);

    if ($response === false) {
        $errno = curl_errno($handle);
        $error = curl_error($handle);
        error_log("Curl returned error $errno: $error\n");
        curl_close($handle);

        return false;
    }

    $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
    curl_close($handle);

    if ($http_code >= 500) {
        // do not wat to DDOS server if something goes wrong
        sleep(10);

        return false;
    } elseif ($http_code != 200) {
        $response = json_decode($response, true);
        error_log("Request has failed with error {$response['error_code']}: {$response['description']}\n");
        if ($http_code == 401) {
            throw new Exception('Invalid access token provided');
        }

        return false;
    } else {
        $response = json_decode($response, true);
        if (isset($response['description'])) {
            error_log("Request was successfull: {$response['description']}\n");
        }
        $response = $response['result'];
    }

    return $response;
}

function apiRequest($method, $parameters = null)
{
    if (!is_string($method)) {
        error_log("Method name must be a string\n");

        return false;
    }

    if (!$parameters) {
        $parameters = [];
    } elseif (!is_array($parameters)) {
        error_log("Parameters must be an array\n");

        return false;
    }

    foreach ($parameters as $key => &$val) {
        // encoding to JSON array parameters, for example reply_markup
        if (!is_numeric($val) && !is_string($val)) {
            $val = json_encode($val);
        }
    }
    $url = API_URL.$method.'?'.http_build_query($parameters);

    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($handle, CURLOPT_TIMEOUT, 60);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

    return exec_curl_request($handle);
}

function apiRequestJson($method, $parameters)
{
    if (!is_string($method)) {
        error_log("Method name must be a string\n");

        return false;
    }

    if (!$parameters) {
        $parameters = [];
    } elseif (!is_array($parameters)) {
        error_log("Parameters must be an array\n");

        return false;
    }

    $parameters['method'] = $method;

    $handle = curl_init(API_URL);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($handle, CURLOPT_TIMEOUT, 60);
    curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($parameters));
    curl_setopt($handle, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    return exec_curl_request($handle);
}

// jebakan token, klo ga diisi akan mati
if (strlen(BOT_TOKEN) < 20) {
    die(PHP_EOL."-> -> Token BOT API nya mohon diisi dengan benar!\n");
}

function getUpdates($last_id = null)
{
    $params = [];
    if (!empty($last_id)) {
        $params = ['offset' => $last_id + 1, 'limit' => 1];
    }
    //echo print_r($params, true);
    return apiRequest('getUpdates', $params);
}
function sendMessage($idpesan, $idchat, $pesan)
{
    $data = [
        'chat_id'             => $idchat,
        'text'                => $pesan,
        'parse_mode'          => 'Markdown',
        'reply_to_message_id' => $idpesan,
    ];

    return apiRequest('sendMessage', $data);
}
function getfile($file_id)
{
    $data = [
        'file_id'             => $file_id,
    ];

    return apiRequest('getFile', $data);
}


function processMessage($message)
{
    global $database;
    if ($GLOBALS['debug']) {
        print_r($message);
    }

    if (isset($message['message'])) {
        $sumber = $message['message'];
        $idpesan = $sumber['message_id'];
        $idchat = $sumber['chat']['id'];
        $title = $sumber['chat']['id'];
        $title1 = $sumber['chat']['title'] ;
        $namamu = $sumber['from']['first_name'];
        $username = $sumber['from']['username'];
        $iduser = $sumber['from']['id'];
        $pesan = $sumber['caption'];
        $surat = $sumber['text'];
        $file_id = $sumber['photo']['2']['file_id'];
        $getfile = getfile($file_id) ;
        $file_path = $getfile['file_path'] ;
        if(isset($title)){
          if($title == "-1001411671861" || $title == "-1001151807760" || $title == "-1001233096899" || $title == "-1001477571060" || $title1 == "CEK PS BY VIRA" || $title1 == "GERBANG SEKARTAJI" || $title == "-297596787" || $title == "-1001226351211" || $title == "-1001307290716") {
            if (isset($pesan)) {
                            $pisah = explode(" ",$pesan, 3) ;
                            $pisah1 = strtolower($pisah[0]);
                            $pecah = preg_split("/\\r\\n|\\r|\\n/", $pesan);
                            $katapertama1 = strtolower($pecah[0]);
                            $katapertama = trim($katapertama1) ;
                            switch ($katapertama) {
                                case '#psb':
                                    // if (isset($pecah[1])) {
                                      if (isset($pecah[1])) {

                                        $nama_tim3 =  explode("NAMA TIM",$pecah[1]  , 2) ;
                                        $nama_pelanggan3 = explode("NAMA",$pecah[2] , 2) ;
                                        $alamat3 = explode("ALAMAT",$pecah[3] , 2) ;
                                        $sc3 = explode("SC",$pecah[4] , 2) ;
                                        $inet3 = explode("USER INET",$pecah[5] , 2) ;
                                        $voip3 = explode("NO TELP",$pecah[6] , 2);
                                        $sn3 = explode("SN ONT",$pecah[7] , 2) ;
                                        $mac3 = explode("MAC STB",$pecah[8] ,2) ;
                                        $odp3 = explode("ODP",$pecah[9] , 2) ;
                                        $port3 = explode("PORT",$pecah[10] , 2) ;
                                        $red3 = explode("RED",$pecah[11] , 2) ;
                                        $dc3 = explode("DC",$pecah[12] , 2) ;
                                        $tr_code3 = explode("TR CODE",$pecah[13] , 2) ;
                                        $tag_odp3 = explode("TAG ODP",$pecah[14] , 2) ;
                                        $tag_pelanggan3 = explode("TAG PELANGGAN",$pecah[15] , 2) ;
                                        $layanan3 = explode("LAYANAN",$pecah[16] , 2) ;
                                        $hp3 = explode("NO HP PLG",$pecah[17] , 2) ;
                                        $konde3 = explode("KONDE",$pecah[18] , 2) ;


                                        $nama_tim1 = str_replace(":","",''.$nama_tim3[1].'');
                                        $nama_pelanggan1 = str_replace(":","",''.$nama_pelanggan3[1].'');
                                        $alamat1 = str_replace(":","",''.$alamat3[1].'');
                                        $sc1 = str_replace(":","",''.$sc3[1].'');
                                        $inet1 = str_replace(":","",''.$inet3[1].'');
                                        $voip1 = str_replace(":","",''.$voip3[1].'');
                                        $sn1 = str_replace(":","",''.$sn3[1].'');
                                        $mac1 = str_replace(":","",''.$mac3[1].'');
                                        $odp1 = str_replace(":","",''.$odp3[1].'');
                                        $port1 = str_replace(":","",''.$port3[1].'');
                                        $red1 = str_replace(":","",''.$red3[1].'');
                                        $dc1 = str_replace(":","",''.$dc3[1].'');
                                        $tr_code1 = str_replace(":","",''.$tr_code3[1].'');
                                        $tag_odp1 = str_replace(":","",''.$tag_odp3[1].'');
                                        $tag_pelanggan1 = str_replace(":","",''.$tag_pelanggan3[1].'');
                                        $layanan1 = str_replace(":","",''.$layanan3[1].'');
                                        $hp1 = str_replace(":","",''.$hp3[1].'');
                                        $konde1 = str_replace(":","",''.$konde3[1].'');


                                        $nama_tim = trim($nama_tim1) ;
                                        $nama_pelanggan = trim($nama_pelanggan1) ;
                                        $alamat = trim($alamat1) ;
                                        $sc = trim($sc1) ;
                                        $inet = trim($inet1) ;
                                        $voip = trim($voip1) ;
                                        $sn = trim($sn1) ;
                                        $mac = trim($mac1) ;
                                        $odp = trim($odp1) ;
                                        $port = trim($port1) ;
                                        $red = trim($red1) ;
                                        $dc = trim($dc1) ;
                                        $tr_code = trim($tr_code1) ;
                                        $tag_odp = trim($tag_odp1) ;
                                        $tag_pelanggan = trim($tag_pelanggan1) ;
                                        $layanan = trim($layanan1) ;
                                        $hp = trim($hp1) ;
                                        $konde5 = trim($konde1) ;
                                        $konde = strtolower($konde5);

                                        // if(isset($nama_tim,$nama_pelanggan,$alamat,$sc,$sn,$odp,$port,$red,$dc,$tr_code,$tag_odp,$tag_pelanggan,$layanan,$file_path)){
                                          if(true){
                                            if($hp != NULL && $nama_tim != NULL && $nama_pelanggan != NULL && $alamat != NULL && $sc != NULL && $sn != NULL  ){
                                              if( $odp != NULL && $port != NULL && $red != NULL && $dc != NULL && $tr_code != NULL && $tag_odp != NULL && $tag_pelanggan != NULL && $layanan != NULL && $konde != NULL){
                                                if($konde == "ya" || $konde == "tidak"){
                                                                      if($voip != NULL || $inet != NULL){
                                                                        if(strpos($odp, 'ODP') !== FALSE && strpos($odp, '-') !== FALSE){
                                                                              if(cek_tim($nama_tim) == TRUE){
                                                                                  if(strpos($sc, "SC") !== false ) {
                                                                                      if(cek_inet($sc) == TRUE)
                                                                                      {

                                                                                          $file = str_replace("photos/","",''.$file_path.'');
                                                                                          $letak_file = 'gambar/'.$file.'' ;
                                                                                          $url = 'https://api.telegram.org/file/bot782944562:AAH91ax9AM6PCQQdheFr_I16RNEbnRV211U/'.$file_path.'';
                                                                                          $isi = file_get_contents($url);
                                                                                          file_put_contents($letak_file , $isi);
                                                                                          // $sc1 = str_replace("SC","",''.$sc.'');
                                                                                          // $statussc = getsc($sc1) ;
                                                                                          // $getdate = getdateps($sc1) ;

                                                                                          if(tambah_psb($namamu,$iduser,$username,$nama_tim,$nama_pelanggan,$alamat,$sc,$inet,$voip,$sn,$mac,$odp,$port,$red,$dc,$tr_code,$tag_odp,$tag_pelanggan,$layanan,$file,$hp) == TRUE)
                                                                                          {
                                                                                              $text = "Format yang bagus 😊, data berhasil di kirim oleh tim $nama_tim \n";
                                                                                              $text .= "Terima kasih rekan $namamu  \n";
                                                                                              // $text = "Status $sc = $statussc || tanggal PS = $getdate \n";
                                                                                          }else{
                                                                                              $text = "🙏 Mohon maaf data gagal dikirim \n";
                                                                                              $text .= "Mohon cek kembali data kiriman anda lalu kirim ulang\n";
                                                                                              // $text .= "Status $sc = $statussc \n";

                                                                                          }
                                                                                      }else{
                                                                                          $text = "🙏 Mohon sc anda sudah diinput sebelumnya \n";

                                                                                      }
                                                                                  }else{
                                                                                      $text1 = "🙏 Mohon maaf, cek kembali sc anda '.$sc.'\n";
                                                                                      $text = "Seperti ini format yang benar : SC14190972  \n";
                                                                                  }
                                                                              }else{
                                                                                  $text1 = "🙏 Mohon maaf, cek kembali nama tim anda \n";
                                                                                  $text1 .= "nama tim harus ada dalam daftar di bawah ini \n";
                                                                                  $text = data_crew();
                                                                                  if ($GLOBALS['debug']) {
                                                                                      print_r($text);
                                                                                  }
                                                                              }
                                                                          }else{
                                                                              $text1 = "🙏 Mohon maaf format ODP anda salah    \n";
                                                                              $text = "Seperti ini format yang benar : ODP-NJK-FB/11  \n";
                                                                          }
                                                                      }else{
                                                                          $text = "🙏 Mohon maaf, harap salah satu inet / voip diisi   \n";
                                                                      }
                                                      }else{
                                                        $text = "🙏 Mohon maaf, isi dari konde hanyalah 'ya' atau 'tidak' \n";
                                                      }

                                              }else{
                                                $text1 = 'Mohon maaf data anda kurang lengkap / format anda salah 🙏, mohon di cek kembali ';
                                                $text1 .= "Berikut Format yang benar \n";
                                                $text  = "#psb\n";
                                                $text .= "NAMA TIM : TUL MAN 02\n";
                                                $text .= "NAMA : H. IMAM BASHORI\n";
                                                $text .= "ALAMAT : NGANJUK (50084); PAYAMAN (64418); PANJAITAN (0015); 46\n";
                                                $text .= "SC : SC15196233\n";
                                                $text .= "USER INET : 152611215050\n";
                                                $text .= "NO TELP : 03554321234\n";
                                                $text .= "SN ONT : ZTEGC87277DF\n";
                                                $text .= "MAC STB : \n";
                                                $text .= "ODP : ODP-NJK-FB/11\n";
                                                $text .= "PORT : 4\n";
                                                $text .= "RED : 15.35\n";
                                                $text .= "DC : 300\n";
                                                $text .= "TR CODE : T8J0CKUTF38N\n";
                                                $text .= "TAG ODP :  7.608408,111.099757\n";
                                                $text .= "TAG PELANGGAN : 7.608383,111.898964\n";
                                                $text .= "LAYANAN : 2P\n";
                                                $text .= "NO HP PLG : 0812345598\n";
                                                $text .= "KONDE : tidak\n";
                                              }
                                        }else{
                                          $text1 = 'Mohon maaf data anda kurang lengkap / format anda salah 🙏, mohon di cek kembali ';
                                          $text1 .= "Berikut Format yang benar \n";
                                          $text  = "#psb\n";
                                          $text .= "NAMA TIM : TUL MAN 02\n";
                                          $text .= "NAMA : H. IMAM BASHORI\n";
                                          $text .= "ALAMAT : NGANJUK (50084); PAYAMAN (64418); PANJAITAN (0015); 46\n";
                                          $text .= "SC : SC15196233\n";
                                          $text .= "USER INET : 152611215050\n";
                                          $text .= "NO TELP : 03554321234\n";
                                          $text .= "SN ONT : ZTEGC87277DF\n";
                                          $text .= "MAC STB : \n";
                                          $text .= "ODP : ODP-NJK-FB/11\n";
                                          $text .= "PORT : 4\n";
                                          $text .= "RED : 15.35\n";
                                          $text .= "DC : 300\n";
                                          $text .= "TR CODE : T8J0CKUTF38N\n";
                                          $text .= "TAG ODP :  7.608408,111.099757\n";
                                          $text .= "TAG PELANGGAN : 7.608383,111.898964\n";
                                          $text .= "LAYANAN : 2P\n";
                                          $text .= "NO HP PLG : 0812345598\n";
                                          $text .= "KONDE : tidak\n";
                                        }
                                        }else{
                                            $text1 = 'Mohon maaf data anda kurang lengkap / format anda salah 🙏, mohon di cek kembali ';
                                            $text1 .= "Berikut Format yang benar \n";
                                            $text  = "#psb\n";
                                            $text .= "NAMA TIM : TUL MAN 02\n";
                                            $text .= "NAMA : H. IMAM BASHORI\n";
                                            $text .= "ALAMAT : NGANJUK (50084); PAYAMAN (64418); PANJAITAN (0015); 46\n";
                                            $text .= "SC : SC15196233\n";
                                            $text .= "USER INET : 152611215050\n";
                                            $text .= "NO TELP : 03554321234\n";
                                            $text .= "SN ONT : ZTEGC87277DF\n";
                                            $text .= "MAC STB : \n";
                                            $text .= "ODP : ODP-NJK-FB/11\n";
                                            $text .= "PORT : 4\n";
                                            $text .= "RED : 15.35\n";
                                            $text .= "DC : 300\n";
                                            $text .= "TR CODE : T8J0CKUTF38N\n";
                                            $text .= "TAG ODP :  7.608408,111.099757\n";
                                            $text .= "TAG PELANGGAN : 7.608383,111.898964\n";
                                            $text .= "LAYANAN : 2P\n";
                                            $text .= "NO HP PLG : 0812345598\n";
                                            $text .= "KONDE : tidak\n";
                                        }
                                    } else {
                                        $text1 = '🙏 maaf, format anda salah ';
                                        $text1 .= "Berikut Formatnya \n";
                                        $text  = "#psb\n";
                                        $text .= "NAMA TIM : TUL MAN 02\n";
                                        $text .= "NAMA : H. IMAM BASHORI\n";
                                        $text .= "ALAMAT : NGANJUK (50084); PAYAMAN (64418); PANJAITAN (0015); 46\n";
                                        $text .= "SC : SC15196233\n";
                                        $text .= "USER INET : 152611215050\n";
                                        $text .= "NO TELP : 03554321234\n";
                                        $text .= "SN ONT : ZTEGC87277DF\n";
                                        $text .= "MAC STB : \n";
                                        $text .= "ODP : ODP-NJK-FB/11\n";
                                        $text .= "PORT : 4\n";
                                        $text .= "RED : 15.35\n";
                                        $text .= "DC : 300\n";
                                        $text .= "TR CODE : T8J0CKUTF38N\n";
                                        $text .= "TAG ODP :  7.608408,111.099757\n";
                                        $text .= "TAG PELANGGAN : 7.608383,111.898964\n";
                                        $text .= "LAYANAN : 2P\n";
                                        $text .= "NO HP PLG : 0812345598\n";
                                        $text .= "KONDE : tidak\n";

                                    }
                                    break;
                                    case '#usee' :
                                    if (isset($pecah[1])) {
                                        $sc3 =  explode("SC",$pecah[1]  , 2) ;
                                        $inet3 =  explode("NO INET",$pecah[2]  , 2) ;
                                        $mac3 =  explode("MAC",$pecah[3]  , 2) ;
                                        $live3 =  explode("LIVE",$pecah[4]  , 2) ;
                                        $kendala3 =  explode("KENDALA",$pecah[5]  , 2) ;

                                        $sc2 =  str_replace(":","", $sc3[1]) ;
                                        $inet2 = str_replace(":","", $inet3[1]) ;
                                        $mac2 =  str_replace(":","", $mac3[1]) ;
                                        $live2 =  str_replace(":","", $live3[1]) ;
                                        $kendala2 = str_replace(":","", $kendala3[1]) ;

                                        $sc = trim($sc2) ;
                                        $inet = trim($inet2) ;
                                        $mac = trim($mac2) ;
                                        $live = trim($live2) ;
                                        $kendala = trim($kendala2) ;
                                        if($sc != NULL || $inet != NUL || $mac != NUL || $live != NUL || $sc !='' || $inet !='' || $mac !='' || $live !=''){
                                          if(strpos($sc, "SC") == FALSE) {
                                            if(strtolower($live) == "ya" || strtolower($live) == "tidak" ){
                                              if(strtolower($live) == "tidak" ){
                                                if($kendala != NUL && $kendala !=''){
                                                  $file = str_replace("photos/","",''.$file_path.'');
                                                  $letak_file = 'gambar/'.$file.'' ;
                                                  $url = 'https://api.telegram.org/file/bot782944562:AAH91ax9AM6PCQQdheFr_I16RNEbnRV211U/'.$file_path.'';
                                                  $isi = file_get_contents($url);
                                                  file_put_contents($letak_file , $isi);
                                                  if(tambah_live($file,$sc,$inet,$mac,$live,$kendala) == TRUE)
                                                  {
                                                      $text1 = "Format yang bagus 😊, data berhasil di kirim oleh rekan $namamu \n";
                                                      $text = "Terima kasih rekan $namamu";
                                                  }else{
                                                      $text1 = "🙏 Mohon maaf data gagal dikirim \n";
                                                      $text = "Mohon cek kembali data kiriman anda lalu kirim ulang\n";
                                                  }
                                                }else{
                                                  $text = "🙏 Mohon maaf ,jika live diisi tidak maka kendala harus diisi\n";
                                                }
                                              }else{
                                                $file = str_replace("photos/","",''.$file_path.'');
                                                $letak_file = 'gambar/'.$file.'' ;
                                                $url = 'https://api.telegram.org/file/bot782944562:AAH91ax9AM6PCQQdheFr_I16RNEbnRV211U/'.$file_path.'';
                                                $isi = file_get_contents($url);
                                                file_put_contents($letak_file , $isi);
                                                if(tambah_live($file,$sc,$inet,$mac,$live,$kendala) == TRUE)
                                                {
                                                    $text1 = "Format yang bagus 😊, data berhasil di kirim oleh rekan $namamu \n";
                                                    $text = "Terima kasih rekan $namamu";
                                                }else{
                                                    $text1 = "🙏 Mohon maaf data gagal dikirim \n";
                                                    $text = "Mohon cek kembali data kiriman anda lalu kirim ulang\n";
                                                }
                                              }
                                            }else{
                                              $text = "🙏 Mohon maaf , live hanya boleh diisi YA/TIDAK\n";
                                            }
                                          }else{
                                            $text = "🙏 Mohon maaf , seperti ini format sc yang benar SC : 503223123\n";
                                          }
                                        }else{
                                          $text = "🙏 Mohon maaf data harus lengkap \n";
                                        }
                                    }else {
                                        $text1 = '🙏 maaf, format anda salah ';
                                        $text1 .= "Berikut Formatnya \n";
                                        $text  = "#usee\n";
                                        $text .= "SC : 503223123\n";
                                        $text .= "NO INET : 152611215050\n";
                                        $text .= "MAC : 10DC4AE732BA\n";
                                        $text .= "LIVE : YA/TIDAK\n";
                                        $text .= "KENDALA : LISTRIK MATI (TIDAK PERLU DIISI JIKA TIDAK ADA KENDALA)\n";
                                    }
                                    break;
                                    case '#ggn' :
                                    if (isset($pecah[1])) {
                                      $crew3 =  explode("NAMA CREW",$pecah[1]  , 2) ;
                                      $in3 = explode("IN",$pecah[2] , 2) ;
                                      $inettelp3 =  explode("INET atau TELP",$pecah[3]  , 2) ;
                                      $solusi3 = explode("SOLUSI",$pecah[4] , 2) ;
                                      $ont3 =  explode("1.ONT",$pecah[6]  , 2) ;
                                      $dc3 = explode("2.DC",$pecah[7] , 2) ;
                                      $soc3 =  explode("3.SOC",$pecah[8]  , 2) ;
                                      $ps3 = explode("4.PS",$pecah[9] , 2) ;

                                      $crew1 = str_replace(":","",''.$crew3[1].'');
                                      $in1 = str_replace(":","",''.$in3[1].'');
                                      $inettelp1 = str_replace(":","",''.$inettelp3[1].'');
                                      $solusi1 = str_replace(":","",''.$solusi3[1].'');
                                      $ont1 = str_replace(":","",''.$ont3[1].'');
                                      $dc1 = str_replace(":","",''.$dc3[1].'');
                                      $soc1 = str_replace(":","",''.$soc3[1].'');
                                      $ps1 = str_replace(":","",''.$ps3[1].'');

                                      $crew = trim($crew1);
                                      $in = trim($in1);
                                      $inettelp = trim($inettelp1);
                                      $solusi = trim($solusi1);
                                      $ont = trim($ont1);
                                      $dc = trim($dc1);
                                      $soc = trim($soc1);
                                      $ps = trim($ps1);
                                      if($crew != NULL && $crew != '' && $in != NULL && $in != '' && $inettelp != NULL && $inettelp != '' && $solusi != NULL && $solusi != ''){
                                          if($ont != NULL && $ont != '' && $dc != NULL && $dc != '' && $soc != NULL && $soc != '' && $ps != NULL && $ps != '' ){
                                            if(strpos($in, 'IN') !== FALSE || strtolower($in) == "manual"){
                                              if(cek_tim_ass($crew) == TRUE){
                                                  $file = str_replace("photos/","",''.$file_path.'');
                                                  $letak_file = 'gambar/'.$file.'' ;
                                                  $url = 'https://api.telegram.org/file/bot782944562:AAH91ax9AM6PCQQdheFr_I16RNEbnRV211U/'.$file_path.'';
                                                  $isi = file_get_contents($url);
                                                  file_put_contents($letak_file , $isi);
                                                  if(tambah_ggn($crew,$in,$inettelp,$solusi,$ont,$dc,$soc,$ps,$file) == TRUE)
                                                  {
                                                      $text1 = "Format yang bagus 😊, data berhasil di kirim oleh rekan $namamu \n";
                                                      $text = "Terima kasih rekan $namamu";
                                                  }else{
                                                      $text1 = "🙏 Mohon maaf data gagal dikirim $in\n";
                                                      $text = "Mohon cek kembali data kiriman anda lalu kirim ulang  \n";
                                                  }
                                              }else{
                                                $text1 = "🙏 Mohon maaf, cek kembali nama crew anda \n";
                                                $text1 .= "nama tim harus ada dalam daftar di bawah ini \n";
                                                $text = data_crew_ass();
                                                if ($GLOBALS['debug']) {
                                                    print_r($text);
                                                }
                                              }
                                            }else{
                                              $text1 = '🙏 maaf, fomat in salah ';
                                              $text1 .= "Berikut Formatnya \n";
                                              $text  = "#ggn\n";
                                              $text .= "NAMA CREW : F5BLR011\n";
                                              $text .= "IN : IN66438996 / manual\n";
                                              $text .= "INET atau TELP : 152730200711\n";
                                              $text .= "SOLUSI : Ku kena \n";
                                              $text .= "MATERIAL\n";
                                              $text .= "1.ONT : 1 (0 jika tidak ada)\n";
                                              $text .= "2.DC : 10 (0 jika tidak ada)\n";
                                              $text .= "3.SOC : 10 (0 jika tidak ada)\n";
                                              $text .= "4.PS : 10 (0 jika tidak ada)\n";
                                            }
                                          }else{
                                            $text1 = '🙏 maaf, material harus diisi ';
                                            $text1 .= "Berikut Formatnya \n";
                                            $text  = "#ggn\n";
                                            $text .= "NAMA CREW : F5BLR011\n";
                                            $text .= "IN : IN66438996 / manual\n";
                                            $text .= "INET atau TELP : 152730200711\n";
                                            $text .= "SOLUSI : Ku kena \n";
                                            $text .= "MATERIAL\n";
                                            $text .= "1.ONT : 1 (0 jika tidak ada)\n";
                                            $text .= "2.DC : 10 (0 jika tidak ada)\n";
                                            $text .= "3.SOC : 10 (0 jika tidak ada)\n";
                                            $text .= "4.PS : 10 (0 jika tidak ada)\n";
                                          }
                                      }else{
                                        $text1 = '🙏 maaf, data anda kurang lengkap ';
                                        $text1 .= "Berikut Formatnya $crew $in $telp $solusi \n";
                                        $text  = "#ggn\n";
                                        $text .= "NAMA CREW : F5BLR011\n";
                                        $text .= "IN : IN66438996 / manual\n";
                                        $text .= "INET atau TELP : 152730200711\n";
                                        $text .= "SOLUSI : Ku kena \n";
                                        $text .= "MATERIAL\n";
                                        $text .= "1.ONT : 1 (0 jika tidak ada)\n";
                                        $text .= "2.DC : 10 (0 jika tidak ada)\n";
                                        $text .= "3.SOC : 10 (0 jika tidak ada)\n";
                                        $text .= "4.PS : 10 (0 jika tidak ada)\n";
                                      }
                                    }else{
                                      $text1 = '🙏 maaf, format anda salah ';
                                      $text1 .= "Berikut Formatnya \n";
                                      $text  = "#ggn\n";
                                      $text .= "NAMA CREW : F5BLR011\n";
                                      $text .= "IN : IN66438996 / manual\n";
                                      $text .= "INET atau TELP : 152730200711\n";
                                      $text .= "SOLUSI : Ku kena \n";
                                      $text .= "MATERIAL\n";
                                      $text .= "1.ONT : 1 (0 jika tidak ada)\n";
                                      $text .= "2.DC : 10 (0 jika tidak ada)\n";
                                      $text .= "3.SOC : 10 (0 jika tidak ada)\n";
                                      $text .= "4.PS : 10 (0 jika tidak ada)\n";

                                    }

                                    break;
                                    case '#terbuka':
                                    if (isset($pecah[1])) {
                                      $odp3 =  explode("ODP",$pecah[1]  , 2) ;
                                      $mitra3 = explode("MITRA",$pecah[2] , 2) ;

                                      $odp1 = str_replace(":","",''.$odp3[1].'');
                                      $mitra1 = str_replace(":","",''.$mitra3[1].'');

                                      $odp = trim($odp1) ;
                                      $mitra = trim($mitra1) ;
                                      if($odp != NULL || $mitra != NULL){
                                        if(strpos($odp, 'ODP') !== FALSE && strpos($odp, '-') !== FALSE){
                                          if(cek_odp($odp) == TRUE)
                                          {
                                            $file = str_replace("photos/","",''.$file_path.'');
                                            $letak_file = 'gambar/'.$file.'' ;
                                            $url = 'https://api.telegram.org/file/bot782944562:AAH91ax9AM6PCQQdheFr_I16RNEbnRV211U/'.$file_path.'';
                                            $isi = file_get_contents($url);
                                            file_put_contents($letak_file , $isi);

                                            if(tambah_odp_terbuka($file,$odp,$username,$namamu,$mitra) == TRUE)
                                            {
                                                $text1 = "Format yang bagus 😊, data berhasil di kirim oleh rekan $namamu \n";
                                                $text = "Terima kasih rekan $namamu , silahkan kirim eviden ODP tertutup untuk melengkapi data 😊  \n";
                                            }else{
                                                $text1 = "🙏 Mohon maaf data gagal dikirim \n";
                                                $text = "Mohon cek kembali data kiriman anda lalu kirim ulang\n";
                                            }
                                          }else{
                                            $text = "🙏 Mohon data odp anda sudah terinput \n";
                                          }
                                        }else{
                                          $text1 = "🙏 Mohon maaf format ODP anda salah    \n";
                                          $text = "Seperti ini format yang benar : ODP-NJK-FB/11  \n";
                                        }
                                      }else{
                                        $text = "🙏 Mohon data harus lengkap \n";
                                      }
                                    } else {
                                        $text1 = '🙏 maaf, format anda salah ';
                                        $text1 .= "Berikut Formatnya \n";
                                        $text  = "#terbuka\n";
                                        $text .= "ODP : ODP-MJT-FY/02\n";
                                        $text .= "MITRA : UAP\n";
                                    }
                                    break;
                                    case '#tertutup':
                                    if (isset($pecah[1])) {
                                      $odp3 =  explode("ODP",$pecah[1]  , 2) ;
                                      $mitra3 = explode("MITRA",$pecah[2] , 2) ;

                                      $odp1 = str_replace(":","",''.$odp3[1].'');
                                      $mitra1 = str_replace(":","",''.$mitra3[1].'');

                                      $odp = trim($odp1) ;
                                      $mitra = trim($mitra1) ;
                                      if($odp != NULL || $mitra != NULL){
                                        if(strpos($odp, 'ODP') !== FALSE && strpos($odp, '-') !== FALSE){
                                          if(cek_odp($odp) == FALSE)
                                          {
                                            $file = str_replace("photos/","",''.$file_path.'');
                                            $letak_file = 'gambar/'.$file.'' ;
                                            $url = 'https://api.telegram.org/file/bot782944562:AAH91ax9AM6PCQQdheFr_I16RNEbnRV211U/'.$file_path.'';
                                            $isi = file_get_contents($url);
                                            file_put_contents($letak_file , $isi);

                                            if(tambah_odp_tertutup($file,$odp) == TRUE)
                                            {
                                                $text1 = "Format yang bagus 😊, data anda sudah lengkap \n";
                                                $text = "Terima kasih rekan $namamu  \n";
                                            }else{
                                                $text1 = "🙏 Mohon maaf data gagal dikirim \n";
                                                $text = "Mohon cek kembali data kiriman anda lalu kirim ulang\n";
                                            }
                                          }else{
                                            $text = "🙏 Mohon data odp anda belum ada, mohon input data odp yang terbuka terlebih dahulu \n";
                                          }
                                        }else{
                                          $text1 = "🙏 Mohon maaf format ODP anda salah    \n";
                                          $text = "Seperti ini format yang benar : ODP-NJK-FB/11  \n";
                                        }
                                      }else{
                                        $text = "🙏 Mohon data harus lengkap \n";
                                      }
                                    } else {
                                        $text1 = '🙏 maaf, format anda salah ';
                                        $text1 .= "Berikut Formatnya \n";
                                        $text  = "#terbuka\n";
                                        $text .= "ODP : ODP-MJT-FY/02\n";
                                        $text .= "MITRA : UAP\n";
                                    }
                                    break ;
                                    // case '#kendalapsb':
                                    //
                                    // if (isset($pecah[1])) {
                                    //   $nama3 =  explode("NAMA",$pecah[1]  , 2) ;
                                    //   $nohp3 = explode("NO HP",$pecah[2] , 2) ;
                                    //   $kcontact3 =  explode("K-CONTACT",$pecah[3]  , 2) ;
                                    //   $tag3 = explode("TAGGING LOKASI",$pecah[4] , 2) ;
                                    //   $alamat3 =  explode("ALAMAT",$pecah[5]  , 2) ;
                                    //   $odp3 = explode("ODP",$pecah[6] , 2) ;
                                    //   $odp_penuh3 =  explode("ODP PENUH",$pecah[8]  , 2) ;
                                    //   $tambah_tiang3 = explode("TAMBAH TIANG",$pecah[9] , 2) ;
                                    //   $tidak_ada_jaringan3 = explode("TIDAK ADA JARINGAN",$pecah[10] , 2) ;
                                    //
                                    //   $nama2 = str_replace(":","",''.$nama3[1].'');
                                    //   $nohp2 = str_replace(":","",''.$nohp3[1].'');
                                    //   $kcontact2 = str_replace(":","",''.$kcontact3[1].'');
                                    //   $tag2 = str_replace(":","",''.$tag3[1].'');
                                    //   $alamat2 = str_replace(":","",''.$alamat3[1].'');
                                    //   $odp2 = str_replace(":","",''.$odp3[1].'');
                                    //   $odp_penuh2 = str_replace(":","",''.$odp_penuh3[1].'');
                                    //   $tambah_tiang2 = str_replace(":","",''.$tambah_tiang3[1].'');
                                    //   $tidak_ada_jaringan2 = str_replace(":","",''.$tidak_ada_jaringan3[1].'');
                                    //
                                    //   $nama = trim($nama2) ;
                                    //   $nohp = trim($nohp2) ;
                                    //   $kcontact = trim($kcontact2) ;
                                    //   $tag = trim($tag2) ;
                                    //   $alamat = trim($alamat2) ;
                                    //   $odp = trim($odp2) ;
                                    //   $odp_penuh = trim($odp_penuh2) ;
                                    //   $tambah_tiang = trim($tambah_tiang2) ;
                                    //   $tidak_ada_jaringan = trim($tidak_ada_jaringan2) ;
                                    //
                                    //
                                    //   if($nama != NULL && $nohp !== NULL && $kcontact !== NULL && $tag !== NULL && $alamat !== NULL && $odp !== NULL || $odp_penuh !== NULL || $tambah_tiang !== NULL || $tidak_ada_jaringan !== NULL   ){
                                    //     if(strpos($odp, 'ODP-') !== FALSE && strpos($odp, '-') !== FALSE && strpos($odp, '/') !== FALSE){
                                    //       if(strtolower($odp_penuh) == "iya" || strtolower($odp_penuh) == NULL){
                                    //         if(strtolower($tidak_ada_jaringan) == "iya" || strtolower($tidak_ada_jaringan) == NULL){
                                    //           // $file = str_replace("photos/","",''.$file_path.'');
                                    //           // $letak_file = 'gambar/'.$file.'' ;
                                    //           // $url = 'https://api.telegram.org/file/bot782944562:AAH91ax9AM6PCQQdheFr_I16RNEbnRV211U/'.$file_path.'';
                                    //           // $isi = file_get_contents($url);
                                    //           // file_put_contents($letak_file , $isi);
                                    //
                                    //           if(tambah_kendala_psb($nama,$nohp,$kcontact,$tag,$alamat,$odp,$odp_penuh,$tambah_tiang,$tidak_ada_jaringan,$username,$namamu) == TRUE)
                                    //           {
                                    //               $text1 = "Format yang bagus 😊, kendala anda sudah kami rekap \n";
                                    //               $text = "Terima kasih rekan $namamu  \n";
                                    //           }else{
                                    //               $text1 = "🙏 Mohon maaf data gagal dikirim \n";
                                    //               $text = "Mohon cek kembali data kiriman anda lalu kirim ulang\n";
                                    //           }
                                    //         }else{
                                    //           $text1 = "🙏 Mohon maaf format kolom TIDAK ADA JARINGAN anda salah    \n";
                                    //           $text = "Harap isi kolom  TIDAK ADA JARINGAN diisi (IYA) / dikosongi \n";
                                    //         }
                                    //       }else{
                                    //         $text1 = "🙏 Mohon maaf format ODP anda salah    \n";
                                    //         $text = "Harap isi kolom  ODP PENUH diisi (IYA) / dikosongi \n";
                                    //       }
                                    //
                                    //     }else{
                                    //       $text1 = "🙏 Mohon maaf format ODP anda salah    \n";
                                    //       $text = "Seperti ini format yang benar : ODP-NJK-FB/11  \n";
                                    //     }
                                    //   }else{
                                    //     $text = "🙏 Mohon data harus lengkap \n";
                                    //   }
                                    // } else {
                                    //     $text1 = '🙏 maaf, format anda salah ';
                                    //     $text1 .= "Berikut Formatnya \n";
                                    //     $text  = "#kendalapsb\n";
                                    //     $text .= "NAMA : Dafa Zakhulhaq\n";
                                    //     $text .= "NO HP : 085100711599\n";
                                    //     $text .= "K-CONTACT : fachrudin | 081234231423\n";
                                    //     $text .= "ALAMAT : desa ringinpitu rt 4 rw 1\n";
                                    //     $text .= "**KENDALA**\n";
                                    //     $text .= "ODP PENUH : IYA / TIDAK\n";
                                    //     $text .= "TAMBAH TIANG : 5\n";
                                    //     $text .= "TIDAK ADA JARINGAN : \n";
                                    //
                                    // }
                                    // break ;


                                    }
                            if($pisah1 == '#tamkap_request'){
                              if($pisah[0] == '#tamkap_request'){
                                $odp1 = explode("#tamkap_request",$pesan, 2) ;
                              }elseif ($pisah[0] == '#TAMKAP_REQUEST') {
                                $odp1 = explode("#TAMKAP_REQUEST",$pesan, 2) ;
                              }
                              $odp = trim($odp1[1]) ;

                              if($odp != NULL)
                              {
                                if(strpos($odp, 'ODP') !== FALSE){
                                  if(cek_nodeb($odp) == TRUE){
                                    $text = "Silakan TAMKAP, $odp aman dari NODE-B , Terima kasih  😊\n";
                                  }else{
                                    $text = "🙏 Mohon maaf, anda TIDAK diperbolehkan TAMKAP karena ODP terhubung ke NODE-B\n";
                                  }
                                }else{
                                  $text1 = "🙏 Mohon maaf format ODP anda salah    \n";
                                  $text = "Seperti ini format yang benar : ODP-NJK-FB/11  \n";
                                }
                              }else{
                                $text = "🙏 Mohon maaf ODP harus diisi   \n";
                              }
                            }
                          }else{
                            $sumber = $message['message'];
                            $idpesan = $sumber['message_id'];
                            $idchat = $sumber['chat']['id'];
                            $namamu = $sumber['from']['first_name'];
                            $iduser = $sumber['from']['id'];
                            if (isset($sumber['text'])) {
                            $pesan = $sumber['text'];
                            $pesan1 = strtolower($pesan);

                            $pisah = explode(" ",$pesan, 3) ;
                            $pisah1 = strtolower($pisah[0]);
                            $pecah = preg_split("/\\r\\n|\\r|\\n/", $pesan);
                            $katapertama1 = strtolower($pecah[0]);
                            $katapertama = trim($katapertama1) ;

                            if($pesan1 == '/kenalan@woc125_bot'){
                              $text1 = "Assalamualaikum rekan $namamu ☺️ , kenalin nih Namaku VIRA 👩🏻 kepanjangan dari (ValidatIon kediRi Area) \n";
                              $text = "Aku adalah bot yang dibuat untuk mempermudah pekerjaan di TELKOM KEDIRI 😁 \n";
                            }elseif($pesan1 == '/inputpsb@woc125_bot'){
                              $text1 = "Berikut Formatnya input PSB \n";
                              $text  = "#psb\n";
                              $text .= "NAMA TIM : TUL MAN 02\n";
                              $text .= "NAMA : H. IMAM BASHORI\n";
                              $text .= "ALAMAT : NGANJUK (50084); PAYAMAN (64418); PANJAITAN (0015); 46\n";
                              $text .= "SC : SC15196233\n";
                              $text .= "USER INET : 152611215050\n";
                              $text .= "NO TELP : 03554321234\n";
                              $text .= "SN ONT : ZTEGC87277DF\n";
                              $text .= "MAC STB : \n";
                              $text .= "ODP : ODP-NJK-FB/11\n";
                              $text .= "PORT : 4\n";
                              $text .= "RED : 15.35\n";
                              $text .= "DC : 300\n";
                              $text .= "TR CODE : T8J0CKUTF38N\n";
                              $text .= "TAG ODP :  7.608408,111.099757\n";
                              $text .= "TAG PELANGGAN : 7.608383,111.898964\n";
                              $text .= "LAYANAN : 2P\n";
                              $text .= "NO HP PLG : 0812345598\n";
                              $text .= "KONDE : tidak\n";
                            }elseif($pesan1 == '/input_live_usee@woc125_bot'){
                              $text1 = "Berikut Formatnya input live usee \n";
                              $text  = "#usee\n";
                              $text .= "SC : 503223123\n";
                              $text .= "NO INET : 152611215050\n";
                              $text .= "MAC : 10DC4AE732BA\n";
                              $text .= "LIVE : YA/TIDAK\n";
                              $text .= "KENDALA : LISTRIK MATI (TIDAK PERLU DIISI JIKA TIDAK ADA KENDALA)\n";
                            }elseif($pesan1 == '/input_ggn@woc125_bot'){
                              $text1 = "Berikut Formatnya \n";
                              $text  = "#ggn\n";
                              $text .= "NAMA CREW : F5BLR011\n";
                              $text .= "IN : IN66438996 / manual\n";
                              $text .= "INET atau TELP : 152730200711\n";
                              $text .= "SOLUSI : Ku kena \n";
                              $text .= "MATERIAL\n";
                              $text .= "1.ONT : 1 (0 jika tidak ada)\n";
                              $text .= "2.DC : 10 (0 jika tidak ada)\n";
                              $text .= "3.SOC : 10 (0 jika tidak ada)\n";
                              $text .= "4.PS : 10 (0 jika tidak ada)\n";
                            }
                            elseif($pesan1 == '/inputkendalapsb@woc125_bot'){
                            $text1 = "Berikut Formatnya input kendala PSB \n";
                            $text  = "#kendalapsb\n";
                            $text .= "Nama : Dafa Zakhulhaq\n";
                            $text .= "No HP : 085100711599\n";
                            $text .= "Kcontact : fachrudin | 081234231423\n";
                            $text .= "Tag Loc calang : -8.06106,111.93183\n";
                            $text .= "Alamat : desa ringinpitu rt 4 rw 1\n";
                            $text .= "ODP : ODP-KDI-FA/19\n";
                            $text .= "**KENDALA**\n";
                            $text .= "1.ODP PENUH : YA / TIDAK\n";
                            $text .= "2.TAMBAH TIANG : 5 (JUMLAH TIANG) Bisa dikosongi kalo tidak ada \n";
                            $text .= "3.TIDAK ADA JARINGAN : 30m (JARAK DENGAN ODP TERDEKAT) Bisa dikosongi kalo tidak ada \n";
                            $text .= "4.ODP UNSPEC : YA / TIDAK\n";
                            }
                            elseif($katapertama1 == '#kendalapsb'){
                              if (isset($pecah[1])) {
                                $nama3 =  explode("Nama",$pecah[1]  , 2) ;
                                $nohp3 = explode("No HP",$pecah[2] , 2) ;
                                $kcontact3 =  explode("Kcontact",$pecah[3]  , 2) ;
                                $tag3 = explode("Tag Loc calang",$pecah[4] , 2) ;
                                $alamat3 =  explode("Alamat",$pecah[5]  , 2) ;
                                $odp3 = explode("ODP",$pecah[6] , 2) ;
                                $odp_penuh3 =  explode("1.ODP PENUH",$pecah[8]  , 2) ;
                                $tambah_tiang3 = explode("2.TAMBAH TIANG",$pecah[9] , 2) ;
                                $tidak_ada_jaringan3 = explode("3.TIDAK ADA JARINGAN",$pecah[10] , 2) ;
                                $odp_unspec3 = explode("4.ODP UNSPEC",$pecah[11] , 2) ;

                                $nama2 = str_replace(":","",''.$nama3[1].'');
                                $nohp2 = str_replace(":","",''.$nohp3[1].'');
                                $kcontact2 = str_replace(":","",''.$kcontact3[1].'');
                                $tag2 = str_replace(":","",''.$tag3[1].'');
                                $alamat2 = str_replace(":","",''.$alamat3[1].'');
                                $odp2 = str_replace(":","",''.$odp3[1].'');
                                $odp_penuh2 = str_replace(":","",''.$odp_penuh3[1].'');
                                $tambah_tiang2 = str_replace(":","",''.$tambah_tiang3[1].'');
                                $tidak_ada_jaringan2 = str_replace(":","",''.$tidak_ada_jaringan3[1].'');
                                $odp_unspec2 = str_replace(":","",''.$odp_unspec3[1].'');


                                $nama = trim($nama2) ;
                                $nohp = trim($nohp2) ;
                                $kcontact = trim($kcontact2) ;
                                $tag = trim($tag2) ;
                                $alamat = trim($alamat2) ;
                                $odp = trim($odp2) ;
                                $odp_penuh = trim($odp_penuh2) ;
                                $tambah_tiang = trim($tambah_tiang2) ;
                                $tidak_ada_jaringan = trim($tidak_ada_jaringan2) ;
                                $odp_unspec = trim($odp_unspec2) ;


                                if($nama != '' && $nama != NULL && $nohp != '' && $nohp != NULL && $kcontact != '' && $kcontact != NULL  && $tag != '' && $tag != NULL && $alamat != '' && $alamat != NULL ){
                                  if($odp != '' && $odp != NULL && $odp_penuh != '' && $odp_penuh != NULL || $$tambah_tiangodp != '' && $tambah_tiang != NULL || $tidak_ada_jaringan != '' && $tidak_ada_jaringan != NULL && $odp_unspec != '' && $odp_unspec != NULL){
                                    if(strpos($odp, 'ODP-') !== FALSE || strpos($odp, 'GCL-') !== FALSE && strpos($odp, '-') !== FALSE && strpos($odp, '/') !== FALSE){
                                      if(strtolower($odp_penuh) == "ya" || strtolower($odp_penuh) == "tidak" ){
                                        if(strtolower($odp_unspec) == "ya" || strtolower($odp_unspec) == "tidak"){
                                          // $file = str_replace("photos/","",''.$file_path.'');
                                          // $letak_file = 'gambar/'.$file.'' ;
                                          // $url = 'https://api.telegram.org/file/bot782944562:AAH91ax9AM6PCQQdheFr_I16RNEbnRV211U/'.$file_path.'';
                                          // $isi = file_get_contents($url);
                                          // file_put_contents($letak_file , $isi);

                                          if(tambah_kendala_psb($nama,$nohp,$kcontact,$tag,$alamat,$odp,$odp_penuh,$tambah_tiang,$tidak_ada_jaringan,$odp_unspec,$username,$namamu) == TRUE)
                                          {
                                              $text1 = "Format yang bagus 😊, kendala anda sudah kami rekap \n";
                                              $text = "Terima kasih rekan $namamu  \n";
                                          }else{
                                              $text1 = "🙏 Mohon maaf data gagal dikirim \n";
                                              $text = "Mohon cek kembali data kiriman anda lalu kirim ulang\n";
                                          }
                                        }else {
                                          $text1 = "🙏 Mohon maaf format kolom salah    \n";
                                          $text = "Harap isi kolom  ODP UNSPEC (YA) / (TIDAK).  \n";

                                        }

                                      }else{
                                        $text1 = "🙏 Mohon maaf format kolom salah    \n";
                                        $text = "Harap isi kolom  ODP PENUH diisi (YA) / (TIDAK) \n";
                                      }

                                    }else{
                                      $text1 = "🙏 Mohon maaf format ODP anda salah    \n";
                                      $text = "Seperti ini format yang benar : ODP-NJK-FB/11  \n";
                                    }
                                  }else{
                                    $text1 = "🙏 Mohon data harus lengkap \n";
                                    $text1 .= "Berikut Formatnya \n";
                                    $text  = "#kendalapsb\n";
                                    $text .= "Nama : Dafa Zakhulhaq\n";
                                    $text .= "No HP : 085100711599\n";
                                    $text .= "Kcontact : fachrudin | 081234231423\n";
                                    $text .= "Tag Loc calang : -8.06106,111.93183\n";
                                    $text .= "Alamat : desa ringinpitu rt 4 rw 1\n";
                                    $text .= "ODP : ODP-KDI-FA/19\n";
                                    $text .= "**KENDALA**\n";
                                    $text .= "1.ODP PENUH : YA \n";
                                    $text .= "2.TAMBAH TIANG : 5\n";
                                    $text .= "3.TIDAK ADA JARINGAN : 50m\n";
                                    $text .= "4.ODP UNSPEC : TIDAK\n";
                                    $text .= "\n";
                                    $text .= "CATATAN\n";
                                    $text .= "1.ODP PENUH : YA / TIDAK\n";
                                    $text .= "2.TAMBAH TIANG : 5 (JUMLAH TIANG) Bisa dikosongi kalo tidak ada \n";
                                    $text .= "3.TIDAK ADA JARINGAN : 30m (JARAK DENGAN ODP TERDEKAT) Bisa dikosongi kalo tidak ada \n";
                                    $text .= "4.ODP UNSPEC : YA / TIDAK\n";
                                  }
                                }else{
                                  $text1 = "🙏 Mohon data harus lengkap \n";
                                  $text1 .= "Berikut Formatnya : \n";
                                  $text  = "#kendalapsb\n";
                                  $text .= "Nama : Dafa Zakhulhaq\n";
                                  $text .= "No HP : 085100711599\n";
                                  $text .= "Kcontact : fachrudin | 081234231423\n";
                                  $text .= "Tag Loc calang : -8.06106,111.93183\n";
                                  $text .= "Alamat : desa ringinpitu rt 4 rw 1\n";
                                  $text .= "ODP : ODP-KDI-FA/19\n";
                                  $text .= "**KENDALA**\n";
                                  $text .= "1.ODP PENUH : YA \n";
                                  $text .= "2.TAMBAH TIANG : 5\n";
                                  $text .= "3.TIDAK ADA JARINGAN : 50m\n";
                                  $text .= "4.ODP UNSPEC : TIDAK\n";
                                  $text .= "\n";
                                  $text .= "CATATAN\n";
                                  $text .= "1.ODP PENUH : YA / TIDAK\n";
                                  $text .= "2.TAMBAH TIANG : 5 (JUMLAH TIANG) Bisa dikosongi kalo tidak ada \n";
                                  $text .= "3.TIDAK ADA JARINGAN : 30m (JARAK DENGAN ODP TERDEKAT) Bisa dikosongi kalo tidak ada \n";
                                  $text .= "4.ODP UNSPEC : YA / TIDAK\n";

                                }
                              } else {
                                  $text1 = '🙏 maaf, format anda salah ';
                                  $text1 .= "Berikut Formatnya \n";
                                  $text  = "#kendalapsb\n";
                                  $text .= "Nama : Dafa Zakhulhaq\n";
                                  $text .= "No HP : 085100711599\n";
                                  $text .= "Kcontact : fachrudin | 081234231423\n";
                                  $text .= "Tag Loc calang : -8.06106,111.93183\n";
                                  $text .= "Alamat : desa ringinpitu rt 4 rw 1\n";
                                  $text .= "ODP : ODP-KDI-FA/19\n";
                                  $text .= "**KENDALA**\n";
                                  $text .= "1.ODP PENUH : YA \n";
                                  $text .= "2.TAMBAH TIANG : 5\n";
                                  $text .= "3.TIDAK ADA JARINGAN : 50m\n";
                                  $text .= "4.ODP UNSPEC : TIDAK\n";
                                  $text .= "\n";
                                  $text .= "CATATAN\n";
                                  $text .= "ODP PENUH : YA / TIDAK\n";
                                  $text .= "TAMBAH TIANG : 5 (JUMLAH TIANG)\n";
                                  $text .= "TIDAK ADA JARINGAN : 30m (JARAK DENGAN ODP TERDEKAT)\n";
                                  $text .= "ODP UNSPEC : YA / TIDAK\n";


                              }
                            }
                            elseif($pesan1 == '/lihat_odp_nodeb@woc125_bot'){
                              $text1 = "berikut data ODP yang terhubung nodeB \n";
                              $text = data_nodeb();
                              if ($GLOBALS['debug']) {
                                  print_r($text);
                              }
                            }elseif($pesan1 == '/lihat_kode_teknisi@woc125_bot'){
                              $text1 = "berikut data crew teknisi yang terdaftar \n";
                              $text = data_crew();
                              if ($GLOBALS['debug']) {
                                  print_r($text);
                              }
                            }elseif($pesan1 == '/lihat_kode_teknisi_ass@woc125_bot'){
                              $text1 = "berikut data crew teknisi assurance yang terdaftar \n";
                              $text = data_crew_ass();
                              if ($GLOBALS['debug']) {
                                  print_r($text);
                              }
                            }elseif(strpos($pesan1, 'vir') || $pesan1 == 'vira'){
                                if (strpos($pesan1,'semangat')) {
                                  $text = "uh so sweet ☺️ ,  terima kasih rekan $namamu  \n";
                                }elseif (strpos($pesan1,'terima') || strpos($pesan1,'kasih') || strpos($pesan1,'makasih')) {
                                  $text = "sama - sama rekan $namamu ☺️ \n";
                                }elseif (strpos($pesan1,'makan') || strpos($pesan1,'sudah') || strpos($pesan1,'traktir')) {
                                  $text = "wah kebetulan belum nih , mau dong ditraktir rekan $namamu ☺️ \n";
                                }else{
                                  $text = "ada yang bisa dibantu rekan  $namamu  \n";
                                }
                            }
                            }
                          }


          }else{

            $text  = "mohon maaf rekan $namamu 🙏 ,  sekarang vira nggak melayani grup lain selain PROVISIONING DHOHO ☺️";
          }
        }else{
            $text  = "mohon maaf rekan $namamu 🙏 ,  sekarang vira nggak menerima japri";
        }

        if(isset($text1))
        {
            $hasil1 = sendMessage($idpesan, $idchat, $text1);
            $hasil = sendMessage($idpesan, $idchat, $text);
        }elseif(isset($text)){
            $hasil = sendMessage($idpesan, $idchat, $text);
        }


        if ($GLOBALS['debug']) {
            // hanya nampak saat metode poll dan debug = true;
            echo 'Pesan yang dikirim: '.$text.PHP_EOL;

            print_r($hasil);
            print_r($hasil1);

        }
    }
  }

function printUpdates($result)
{
    foreach ($result as $obj) {
        // echo $obj['message']['text'].PHP_EOL;
        processMessage($obj);
        $last_id = $obj['update_id'];
    }

    return $last_id;
}

// AKTIFKAN INI jika menggunakan metode poll
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$last_id = null;
while (true) {
    $result = getUpdates($last_id);
    if (!empty($result)) {
        echo '+';
        $last_id = printUpdates($result);
    } else {
        echo '-';
    }

    sleep(1);
}

// AKTIFKAN INI jika menggunakan metode webhook
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//$content = file_get_contents("php://input");
//$update = json_decode($content, true);
//
//if (!$update) {
//  // ini jebakan jika ada yang iseng mengirim sesuatu ke hook
//  // dan tidak sesuai format JSON harus ditolak!
//  exit;
//} else {
//  // sesuai format JSON, proses pesannya
//  processMessage($update);
//}

/*

Sekian.

*/
