<?php
session_start();

spl_autoload_register('myAutoloader');

function myAutoloader($className){
  $fullPath = $className.".php";
  include_once $fullPath;
}
