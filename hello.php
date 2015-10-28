<?php
require_once("Snow.php");

$snow = new Snow();
echo $snow->GetOS();
echo "<br />";
echo $snow->GetBrowser();
echo "<br />";
echo $snow->GetBrowserLang();
echo "<br />";
echo $snow->GetIP();
echo "<br />";
echo $snow->GetAddress();
//echo str_replace('	','',$snow->GetAddress("120.25.69.157"));

echo "<hr />";
echo date('Y-m-d H:i:s',time());
