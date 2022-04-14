<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!doctype html>
<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Zagolovok saita</title>
    <link rel="stylesheet" href="main2.css">
</head>
<body>
    <form action="./" method="post">
      <label>Фамилия</label>
      <input type="text" class="input_lastname"  name="lastname" placeholder="Введите фамилию">
      <label>Имя</label>
      <input type="text"class="input_firstname"  name="firstname" placeholder="Введите имя">
      <label>Отчество</label>
      <input type="text" class="input_middlename"  name="middlename" placeholder="Введите отчество">
      <label>Номер документа</label>
      <input type="text" class="input_document"  name="document" placeholder="Введите номер документа">
      <button>Получить файл</button>
    </form>
    <script>
       $('body').on('input', '.input_lastname', function(){
       this.value = this.value.replace(/[^а-яё-\s]/gi, '');
     });
     </script>
     <script>
        $('body').on('input', '.input_firstname', function(){
        this.value = this.value.replace(/[^а-яё-\s]/gi, '');
      });
      </script>
      <script>
         $('body').on('input', '.input_middlename', function(){
         this.value = this.value.replace(/[^а-яё-\s]/gi, '');
       });
       </script>
    <script>
       $('body').on('input', '.input_document', function(){
       this.value = this.value.replace(/[^0-9]/g, '');
     });
    </script>
</body>
</html>
<?php require_once "form.php" ?>
<?php unset($_POST); ?>
