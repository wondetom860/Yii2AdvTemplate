<?php


if (isset($model)) {
    $createBtn = "<button class='btn btn-xs btn-warning pull-right float-right' title='Create New License Entery for this organization' onclick='createLicenceActivation({$model->id});return false;'>Grant New Licence</button>";
    echo "<h5 style='text-align: center;'>Licenses and Activation of <i><u>{$model->name}</u></i> for <u><i>{$model->orgRel->name}</i></u>{$createBtn}</h5>";
    echo "<table class='table table-sm table-condensed table-hover' style='font-size: 9pt;'>
            <thead>
                <tr style='background-color: #DFD;'>
                    <th>#</th>
                    <th>License Entery</th>
                    <th>Activation Date</th>
                    <th>Duration(days)</th>
                    <th>Active Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>";
    $count = 0;
    foreach ($model->licActivations as $lc) {
        $extendActivation = "";
        $lcActivationDate = date('dMY@h:iA', $lc->activation_date);
        echo "
            <tr>
                <td>" . ++$count . "</td>
                <td><a href='/LICMAN/lic-activation/view?id={$lc->id}'>{$lc->activation_code}</a></td>
                <td>{$lcActivationDate}</td>
                <td>{$lc->active_duration}</td>
                <td>{$lc->getStatusText()}</td>
                <td>{$extendActivation}</td>
            </tr>
        ";
    }
    echo " </tbody>
        </table>";
} else {
    echo "<p>Invalid requeSt</p>";
    return;
}
