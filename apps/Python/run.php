<?php
function run_python_code($code){
    $scriptFilename = tempnam(sys_get_temp_dir(), 'python_script_');
    file_put_contents($scriptFilename, $code);
    $pythonExecutable = __DIR__ . '/env/Scripts/python.exe';
    exec("$pythonExecutable $scriptFilename 2>&1", $output, $exitCode);
    unlink($scriptFilename);
    $result = array(
        'output' => implode("\n", $output),
        'exitCode' => $exitCode
    );
    return $result;
}

if (isset($_POST['python_code'])) {
    $pythonCode = $_POST['python_code'];
    $result = run_python_code($pythonCode);
    echo json_encode($result);
}
?>
