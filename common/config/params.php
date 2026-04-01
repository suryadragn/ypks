<?php

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
    // Nama Aplikasi & Yayasan (Dinamis dari .env)
    'appName' => getenv('APP_NAME') ?: 'Yapendikra',
    'appShortName' => getenv('APP_SHORT_NAME') ?: 'YPKS',
    'appFullName' => getenv('APP_FULL_NAME') ?: 'Yayasan Pendidikan Karanganyar Surakarta',
];
