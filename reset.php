#!/usr/bin/php
<?php
/**
 * Reset file in demo folder
 */
unlink('demo/test1.php');
unlink('demo/test2.php');
unlink('demo/test3.php');
unlink('demo/test4.php');

file_put_contents('demo/test1.php', '<?var_dump(0);');
file_put_contents('demo/test2.php', '<? var_dump(0);');
file_put_contents('demo/test3.php', '<?');
file_put_contents('demo/test4.php', '<? ');
