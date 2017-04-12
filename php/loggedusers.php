<?php
session_start();

echo "Branza";
if(isset($_SESSION["username"])){
    $text = $_POST['text'];
     
    $fp = fopen("loggedusers.html", 'a');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION["username"]."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}
?>