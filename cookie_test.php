<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<?php
header("Pragma: no-cache");
header("Cache-Control: no-store, no-cache, must-revalidate"); 


if (isset($_GET["expire"])) {
    $expire = $_GET["expire"];
}
else{
    //setcookie("cookie_test"); 
}

setcookie("cookie_test", "setcookie", time() + ($expire * 3600), "/");

setcookie("cookie_test_msg", "This is a server set cookie expire ".$expire, time() + ($expire * 3600), "/");

echo 'REQUEST SERVER COOKIE<br/>';
if (isset($_COOKIE['cookie_test'])) {
    //echo '설정:' + time() + ($expire * 3600); 
    echo 'time()+($expire*3600) : ';
    echo time()+($expire*3600);
    echo ' / time() : ';
    echo time();
}
else{
    echo 'Expires';    
}


?>



<form action="cookie_test.php">
<input type="text" name="expire" value="<?=$expire?>"/>
<input type="submit" value="getCookie"/>
</form>

<script>

function getCookie(key) {
    var result = null;
    var cookie = document.cookie.split(';');
    cookie.some(function (item) {
        item = item.replace(' ', '');
 
        var dic = item.split('=');
 
        if (key === dic[0]) {
            console.log(document.cookie);
            console.log(item);
            console.log(dic);
            result = dic[0] + ":" + dic[1];
            return true;    // break;
        }
    });
    return result;
}
document.write("RESPONSE CLIENT COOKIE <br/>");
document.write(getCookie('cookie_test'));
document.write(" <br/>");
document.write(getCookie('cookie_test_msg'));
document.write(" <br/>");
document.write(" <br/>");
document.write(" <br/>");
document.write("document.cookie <br/>");
document.write(document.cookie);
</script>
