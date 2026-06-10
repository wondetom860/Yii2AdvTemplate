<?php


Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

// Initialize vlucas/phpdotenv
// This assumes your .env file sits in the root directory of your Yii2 Advanced project
if (file_exists(dirname(dirname(__DIR__)) . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(dirname(__DIR__)));
    $dotenv->load();

    // Optional: Enforce that critical crypto variables are present
    $dotenv->required(['RSA_PRIVATE_KEY_BASE64', 'RSA_PUBLIC_KEY_BASE64']);

    // Yii::$app->controller->stdout("Environment variables loaded successfully.\n", yii\helpers\Console::FG_GREEN);
}
