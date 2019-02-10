<?php

// ბაზასთან დაკავშირება
$con = mysqli_connect('localhost','root','','phonedatabase');

// შეცდომების მახივი
$errors = array();

// ქართული შრიფტრების წაკითხვადობა ატვირთვისას
$con ->set_charset('utf8');

// თუ ბაზასთან დაკავშირება ვერ ხეხდება გამოიტანოს შეცდომა
if(!$con){
    echo 'Database Not Connected Error !!!';
}

?>