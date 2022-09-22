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
    $lets_go = array('ls', 'whoami', 'mkdir', 'cd', 'ps', 'id');
    $com = explode(' ', $string);
    if (in_array($com[0],  $lets_go)) {
        echo shell_exec($string);
    } else {
        echo 'bad input';
    }
}
cmd($string);
?>