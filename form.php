<?php

    $host = 'localhost';
    $dbname = 'rs';
    $port = '5432';
    $user = 'admin';
    $password = 'admin';

    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $document = $_POST['document'];

    $user_lastname = trim($lastname);
    $user_firstname = trim($firstname);
    $user_middlename = trim($middlename);
    $user_document = trim($document);

    $mysqli = new mysqli($host, $user, $password, $dbname);

    mysqli_set_charset($mysqli, 'utf8');
    mysqli_query($mysqli,"SET CHARACTER SET utf8");

    $kolvorezultatov = 0;

    $sql = "SELECT filename FROM table_files WHERE firstname='{$user_firstname}' AND lastname='{$user_lastname}' AND middlename='{$user_middlename}' AND document={$user_document}";
    if ($result = $mysqli -> query($sql)) {
  while ($row = $result -> fetch_row()) {
      $kolvorezultatov = $kolvorezultatov + count($result);
      $imyafaila = $row[0];
        }
  $result -> free_result();
  }
  $mysqli -> close();

      $imyafailapdf = $imyafaila . '.pdf';
    //  $putkfailu1 = '\Files\ ' . $imyafailapdf;
    //  $putkfailu = str_replace(' ', '', trim($putkfailu1));

        if (empty($lastname) || empty($firstname) || empty($middlename) || empty($document)) {
    //    echo "<div class='msg'>Введены не все данные<br></div>";
        }

        if ($kolvorezultatov > 1) {
        echo "<div class='msg'>ОШИБКА! БОЛЬШЕ ОДНОГО РЕЗУЛЬТАТА!<br></div>";
      } elseif ($kolvorezultatov == 0) {
    //    echo "<div class='msg'>ОШИБКА! НЕ НАЙДЕНО НИ ОДНОГО РЕЗУЛЬТАТА<br></div>";
      } else {
        echo "<div class='msg'>Файл: $imyafailapdf<br></div>";
    //  echo  "Путь к файлу PDF: $putkfailu<br>";
        echo "<div class='msg'><a href='", $imyafailapdf, "'>Открыть</a><br></div>";
    //  echo "<a href='download.php?file=".$putkfailu."'>".$imyafailapdf."</a><br>";
        echo "<div class='msg'><a href='download.php?file=".$imyafailapdf."'>Скачать</a><br></div>";
      }
