<?php
header("Content-Type: text/html; charset=utf-8");
$filename = basename($_GET['file']);
// Specify file path.
$path = ''; // '/uplods/'
$download_file =  $path.$filename;

if(!empty($filename)){
    // Check file is exists on given path.
    if(file_exists($download_file))
    {
      header('Content-Disposition: attachment; filename=' . $filename);
      readfile($download_file);
      exit;
    }
    else
    {
      echo 'Файл не найден по указанному пути';
    }
 }
