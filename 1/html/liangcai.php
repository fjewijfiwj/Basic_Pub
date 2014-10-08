<?php
header("Content-type: text/html; charset=utf-8");
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no' />";


?>

<div>
    <?php
    $type=$_GET['type'];
    for ($x=0; $x<=15; $x++){
        ?>
        <div style="height: auto; border-bottom: gray 1px solid; width: 100%; padding: 0.5% 0% 0.25% 0.5%;" >
            <div style="float: left; max-width: 30%;height: auto;"><img src="http://caihonghuagong-resoucre.stor.sinaapp.com/Pic/Qiyewenhua/1.jpg" style="width: 100%;"></div>
            <div style="float: left;width: 50%;">
                <p style="font-size: 150%;padding-left: 2%;margin-top: 0.5%;"><?php echo $type?><p>
                <p style="font-size: 100%;padding-left: 2%;">售价：9</p>
            </div>
            <div style="clear: both;"></div>
        </div>

    <?php
    }

    ?>



</div>