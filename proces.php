<?php
$msg='';
date_default_timezone_set('Asia/tbilisi');
$t = date('h:i:s');
$d = date('Y-m-d');
if(isset($_POST['save'])){
    $saxeli = mysqli_real_escape_string($con,$_POST['saxeli']);
    $mobiluri = mysqli_real_escape_string($con,$_POST['mobiluri']);

    if(empty($saxeli)){
        array_push($errors,'სახელის ველი ცარიელია');
    }

    if(empty($mobiluri)){
        array_push($errors,'მობილურის ველი ცარიელია');
    }

    if(strlen($mobiluri) != 9 ){
        array_push($errors,'მობილური უნდა შედგებოდეს 9 რიცხვისგან');
    }

    $sql = "SELECT * FROM phones WHERE mobiluri='$mobiluri'";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)){
        array_push($errors,'ესეთი მობილურით პიროვნება უკვე დამატებულია');
    }

    if(count($errors) == 0 ){
        $sql = "INSERT INTO phones (saxeli,mobiluri,saati,dge) VALUES ('$saxeli','$mobiluri','$t','$d')";
        if(mysqli_query($con,$sql)){
            $msg='წარმატებით მოხდა შენახვა<br><img src="img/corect.gif" style="width: 50px; margin-top: 5px;">';
        }
    }
}

$msgs='';
if(isset($_POST['saxsearch'])){
    $sax = mysqli_real_escape_string($con,$_POST['sax']);

    if(empty($sax)){
        array_push($errors,'სახელის ველი ცარიელია');
    }

    if(count($errors) == 0 ){
        $sql = "SELECT * FROM phones WHERE saxeli='$sax'";
        $res = mysqli_query($con,$sql);
        if(mysqli_num_rows($res)){
            $row = mysqli_fetch_assoc($res);
            $msgs= 'ნომერი: '.$row['mobiluri'];
        }else{
            array_push($errors,'ესეთი სახელით მობილური ვერ იძებნება');
        }
    }
}

if(isset($_POST['mobsearch'])){
    $mob = mysqli_real_escape_string($con,$_POST['mob']);

    if(empty($mob)){
        array_push($errors,'მობილურის ველი ცარიელია');
    }

    if(count($errors) == 0 ){
        $sql = "SELECT * FROM phones WHERE mobiluri='$mob'";
        $res = mysqli_query($con,$sql);
        if(mysqli_num_rows($res)){
            $row = mysqli_fetch_assoc($res);
            $msgs= 'მეპატრონე: '.$row['saxeli'];
        }else{
            array_push($errors,'ესეთი მობილურის ნომრით პიროვნება ვერ იძებნება');
        }
    }
}

?>