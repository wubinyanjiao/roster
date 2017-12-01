<?php
function getMonthName($m)
{
    return date('F', mktime(0, 0, 0, $m, 10));
}
?>