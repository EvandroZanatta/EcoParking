<?php

global $smarty;

include('functions/site_data.php');

/* About page */
$smarty->assign('page', 'login');
$smarty->assign('page_name', 'Login');

$smarty->assign('name', 'Ned');
$smarty->display('index.tpl');