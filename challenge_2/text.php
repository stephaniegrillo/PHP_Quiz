<?php
// echo 'Hola mundo\n';
// puts 'hola mundo'

function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();
    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

$my_var =  CallAPI("GET","http://www.cartoonnetwork.com/test/backend-quiz/shows.json");
// $my_var =  var_dump(json_decode($my_var->shows));
// echo $my_var->{'shows'};
$my_var = json_decode($my_var, true);

echo $my_var['shows'][0]['id'];
echo $my_var['shows'][0]['show'];
echo $my_var['shows'][0]['episode'];


?>

<div><?php  $my_var ?></div>
