<?php

$this->title = 'Applications & License Managent'

?>

<div class="licman-default-index">
    <h3>Licence Manager <span class="pull-right float-right badge bg-warning text-md text-mute">V1.0</span></h3>
    <div class="row">
        <div class="col-md-4 col-sm-12 col-lg-4">
            <div class="card m-3">
                <div class="card-header bg-info">
                    Manage Applications & License Activation
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="/LICMAN/lic-org8n/index">Orgainizations</a></li>
                    <li class="list-group-item"><a href="/LICMAN/lic-app/index">Applications</a></li>
                    <li class="list-group-item"><a href="/LICMAN/lic-activation/index">Activation</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8  col-sm-12 col-lg-8" id="lic-root">

        </div>
    </div>
</div>

<script>
    window.loadOrgs = () => {
        $("#lic-root").html('Loading organizations...');
        $.get('/LICMAN/lic-org8n/index')
    }
</script>