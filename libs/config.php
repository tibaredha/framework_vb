<?php
//define('msp', 'Ministère de la santé et de la population et de la réforme hospitalière');
define('msp', 'Système électronique d\'enregistrement des décès et des naissances ');
define('version', 'v2.0.1-beta1');
define('logod', 'demographie.jpg?t='.time());
define('logo', 'index.jpg?t='.time());
define('logon', 'naissance.png?t='.time());
define('URL', 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');
define('logolab', 'd:\\framework/public/images/logolab/logolab');
define('LIBS', 'libs/');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'framework');
define('DB_USER', 'root');
define('DB_PASS', '');
define('title', '??????');
define('sujet', 'deces');
define('admin', 'admin');
define('sadmin', 'tibaredha');
define('dsp', 'DSP-DJELFA');
define('wilaya','DJELFA');
define('Copyright', '&copy;  Copyright '.date('Y').' Designed by  Dr R.TIBA  - Tél : 07.72.71.80.59  - Email : tibaredha@yahoo.fr  -  DSP Djelfa');
define('HASH_GENERAL_KEY', 'MixitUp200');
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');

define('EDRSFR', 'Système électronique d\'enregistrement des décès et des naissances');
define('EDRSUS', 'Electronic Death and Birth Registration System');



function ajax($id,$tbl,$col,$order)
{
$cnx = mysql_connect(DB_HOST,DB_USER,DB_PASS)or die('I cannot connect to the database because: ' . mysql_error());
$db = mysql_select_db(DB_NAME);
mysql_query("SET NAMES 'UTF8' ");
if($id)
{
$sql=mysql_query("select * from $tbl where $col='$id'  order by $order");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row[0].'">'.$row[1].'</option>';
}
}
}