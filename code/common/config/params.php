<?php

$url = "http://" . $_SERVER['SERVER_NAME'] . '/projects/yii2/code/';
return [
    'adminEmailUser' => 'bhargav.gohel@hodusoft.com',
    'adminEmailPassword' => 'bhargav@123',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'myuploads' => $url . "uploads/users/",
];
