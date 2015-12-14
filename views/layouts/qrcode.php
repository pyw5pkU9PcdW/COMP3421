<?php
/**
 * Created by PhpStorm.
 * User: patrina
 * Date: 12/12/15
 * Time: 8:13 PM
 */

include "qrlib.php";

QRcode::png('abc', 'filename.png'); // creates files
QRcode::png($_POST['text1']);
//directly into browser


?>