<?php

// Sembolik bağlantı oluşturulacak hedef dizin
$target = __DIR__.'/../storage/app/public';

// Sembolik bağlantının oluşturulacağı yer
$link = __DIR__.'/storage';

// Sembolik bağlantıyı oluştur
symlink($target, $link);

?>