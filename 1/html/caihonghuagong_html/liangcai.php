<?php
header("Content-type: text/html; charset=utf-8");
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no' />";


?>

<div>
    <?php
    $type=$_GET['type'];
    $picture="http://caihonghuagong-resoucre.stor.sinaapp.com/Pic/meishi/".$type .".jpg";
    //echo $picture;
    switch($type){
        case "liangcai": $food="凉菜";
        break;
        case "jingdiancai": $food="经典菜";
        break;
        case "shaokao": $food="烧烤";
        break;
        case "kaiweicai";$food="开胃菜";
        break;
        default:$food="凉菜";

    }

    for ($x=0; $x<=15; $x++){
        ?>
        <div style="height: auto; border-bottom: gray 1px solid; width: 100%; padding: 0.5% 0% 0.25% 0.5%;" >
            <div style="float: left; max-width: 30%;height: auto;"><img style="width:100%;height:100%" src=<?php echo $picture ?> ></div>
            <div style="float: left;width: 50%;">
                <p style="font-size: 150%;padding-left: 2%;margin-top: 0.5%;"><?php echo $food ?><p>
                <p style="font-size: 100%;padding-left: 2%;">售价：9</p>
            </div>
            <div style="clear: both;"></div>
        </div>

    <?php
    }

    ?>


</div>