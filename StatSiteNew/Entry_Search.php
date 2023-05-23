<?php include 'Header_Admin.php'; ?>
<?php
    $FormType = $_GET['FormType'];
    $msg1 = $_GET['msg1'];
?>
<div class="p-4 bg-gray-900">
    <h1 class="text-white text-center mb-4 text-3xl font-bold">ПОИСК ПО БАЗЕ ПОСЕЩЕНИЙ!</h1>
    <div class="flex items-center justify-center mb-4">
        <img src="search.png" class="w-6 h-6 mr-2">
        <strong class="text-white">ПОИСК ПО БАЗЕ ПОСЕЩЕНИЙ!</strong>
    </div>
    <?php if ($msg1) { ?>
        <p class="text-red-500 text-center font-semibold mb-4"><?= $msg1 ?></p>
    <?php } ?>
    <?php include 'Form_Buttons_Search.php'; ?>
    <p class="text-gray-400 mt-4">
        Примеры, часть слова, НАПРИМЕР:  2022 - за год, 2022-12 за месяц, 2022-12-04 - за конкретную дату<br>
        Если вводим первое и второе, то по этой дате (месяцу, году) все IP и все страницы<br>
        Если вводим первое, второе и третье поля, то получим все посещения этой страницы на дату с IP
    </p>
</div>
<?php // include 'Footer.php'; ?>
