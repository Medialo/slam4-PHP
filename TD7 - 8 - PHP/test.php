<?php

setcookie("TestCookie", "OK", time()+3600);

echo $_COOKIE["TestCookie"];


setcookie("TestCookie", "OK", time()-1);

if($_COOKIE["TestCookie"]){
    echo $_COOKIE["TestCookie"];
} else {
    echo "le cookie à été mangé !";
}


$tab = array("un","message","dans","un","tableau");

setcookie("tab",serialize($tab), time() + 3600);

echo $_COOKIE["tab"];