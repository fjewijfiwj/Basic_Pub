<?php
/**
 * wechat php test
 */

//define your token
define("TOKEN", "honghong");
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj->responseMsg();//调用回复信息

class wechatCallbackapiTest
{
    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        //extract post data
        if (!empty($postStr)){
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $type=$postObj->MsgType;
            $latitude=$postObj->Location_X;
            $longitude=$postObj->Location_Y;
            $customevent=$postObj->Event;
            $time = time();
            $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
            $newsTpl="<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[news]]></MsgType>
							<ArticleCount>1</ArticleCount>
						    <Articles>
						    <item>
						    <Title><![CDATA[企业文化]]></Title>
						    <Description><![CDATA[try it]]></Description>
						    <PicUrl><!CDATA[http://qqfood.tc.qq.com/meishio/16/7ad4623b-0428-4917-a1c4-ccdd0b355c3a/0?rnd=1412488282]]></PicUrl>
						    <Url><![CDATA[http://www.haidilao.com/index.html]]></Url>
						    </item>
						    </Articles>
							</xml>";

            if($type=="event" && $customevent=="subscribe")
            {
                $contentStr="hello";
                $msgType = "text";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }

            if($type=="image"){
                $contentStr="beautiful image";
                $msgType = "text";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }

            if($type=="location"){
                $contentStr="你的经度是{$latitude}，你的维度是{$longitude}";
                $msgType = "text";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }
            if(!empty( $keyword ))
            {
                $msgType = "text";
                switch($keyword)
                {
                    case "1": $contentStr=$keyword;
                        break;
                    case "2":$contentStr="fu";
                        break;
                    case "3":
                        $resultStr=sprintf($newsTpl,$fromUsername,$toUsername,$time);
                        break;
                    default: $contentStr="good";
                    break;
                }

                if($keyword!="3"){
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                }
                echo $resultStr;
            }else{
                echo "Input something...";
            }

        }else{
            echo "";
            exit;
        }
    }

    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}

?>