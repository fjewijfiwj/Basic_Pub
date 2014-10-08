<?php

$access_token = "gW6hvqfmQ6vrXCuk6VUW5tGl-Wim85VNGiVSVQ2PGG3LAIgQdUOZc3uK4IQmrc2H7qI-6lqHsl907drgWJtKEQ";

$jsonmenu = '{
      "button":[
      {
            "name":"企业信息",
           "sub_button":[
            {
               "type":"view",
               "name":"企业文化",
               "url":"http://1.caihonghuagong.sinaapp.com/qiye/qiyewenhua.html"
            },
            {
               "type":"view",
               "name":"导航",
               "url":"http://1.caihonghuagong.sinaapp.com/qiye/qiyewenhua.html"
            }]
      

       },
       {
           "name":"菜品",
           "sub_button":[
            {
               "type":"view",
               "name":"全部菜品",
               "url":"http://1.caihonghuagong.sinaapp.com/meishi/quanbucaipin.html"
            },
            {
               "type":"view",
               "name":"凉菜",
               "url":"http://1.caihonghuagong.sinaapp.com/meishi/liangcai.php?type=liangcai"
            },
            {
               "type":"view",
               "name":"烧烤",
               "url":"http://1.caihonghuagong.sinaapp.com/meishi/liangcai.php?type=shaokao"
            }]
       

       }]
 }';


$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
$result = https_request($url, $jsonmenu);
var_dump($result);

function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}

?>