<?php

function get_pip_packages() {
    $pipExecutable = __DIR__ . '/env/Scripts/pip3.exe';
    exec($pipExecutable . ' list --format=json > list.json"', $output, $exitCode);

    if ($exitCode === 0) {
        $fileContents = file_get_contents(__DIR__ . '/list.json');
        unlink("list.json");
        return json_decode($fileContents);
    } else {
        return array('error' => 'Failed to list pip packages');
    }
}

if (isset($_POST['list_packages'])) {
    $pipPackages = get_pip_packages();

    if (isset($pipPackages['error'])) {
        echo json_encode($pipPackages);
    } else {
        echo json_encode($pipPackages);
    }
}
?>
