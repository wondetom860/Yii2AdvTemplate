<footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y') ?> <a href="https://github.com/wondetom860/<?= Yii::$app->params['APP_NAME'] ?>.git"><?= Yii::$app->params['APP_NAME'] ?></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> <?= Yii::$app->params['APP_VERSION'] ?>
    </div>
</footer>

<?php
// $y = \Yii::$app->user->isGuest;
use yii\bootstrap4\Modal;

Modal::begin([
    'title' => '<h4>License Management</h4>',
    'id' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div id='modalContent'>Loading form...</div>";
Modal::end();
?>