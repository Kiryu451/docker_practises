<form name="form" action="" method="get">
  <input type="text" name="subject" id="subject">
</form>
<?php

if (isset($_GET['subject'])) {
    $string = $_GET['subject'];
}
else {
    $string = 'ls';
}
function cmd($string)
{
    $good_list = array('ls', 'whoami', 'ps', 'id', 'cd', 'mkdir', 'cat');
    $comm = explode(' ', $string);
    if (in_array($comm[0],  $good_list)) {
        echo shell_exec($string);
    } else {
        echo 'bad input';
    }
}
cmd($string);
?>