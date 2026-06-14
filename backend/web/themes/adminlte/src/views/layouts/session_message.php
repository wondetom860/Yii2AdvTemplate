<div class="row">
    <div class="col-md-12">
        <?php if (Yii::$app->session->hasFlash('message')) { ?>
            <div class="alert alert-<?= Yii::$app->session->getFlash('type') ?>  alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?= Yii::$app->session->getFlash('message'); ?>
            </div>
        <?php } ?>
    </div>
</div>