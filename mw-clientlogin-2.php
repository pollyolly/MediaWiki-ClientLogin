error_reporting(E_ALL); ini_set('display_errors', 1);


function getAuthToken(){

    $url = ''; //http://sample.com/api.php?
    $curlPost = array(
        'action'=>'query',
        'meta'=>'tokens',
        'format'=>'json',
        'type'=>'login'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_ENCODING, "UTF-8");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIEFILE, ''); //store cookie somewhere in the memory
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($curlPost));
    $data = json_decode(curl_exec($ch));
    $curlPost2 = array(
        'action'=>'clientlogin',
        'loginreturnurl'=>'', //http://sample.com
        'logintoken'=> trim($data->query->tokens->logintoken),
        'format'=>'json',
        'username'=>'dummy',
        'password'=>'Iamadummyuser05'
    );
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_ENCODING, "UTF-8");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIEFILE, ''); //store cookie somewhere in the memory
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($curlPost2));
    $data2 = json_decode(curl_exec($ch));
    curl_close($ch); //this will close the cookie sessions
    var_dump($data2);

}

getAuthToken();
