<?php

if(isset($_POST['language'])){
  $language  = strtolower($_POST['language']);
}

    if(isset($_POST['code'])){
        $code = $_POST['code'];
    




    $random = substr(md5(mt_rand()), 0, 7);
    $filePath = "temp/" . $random . "." . $language;
    $programFile = fopen($filePath, "w");
    fwrite($programFile, $code);
    fclose($programFile);

    if($language == "php") {
        $output = shell_exec("C:\wamp64\bin\php\php5.6.40\php.exe  $filePath  2>&1");
        echo $output;
    }
    if($language == "python") {
        $output = shell_exec("C:\Users\har20\AppData\Local\Programs\Python\Python310\python.exe  $filePath  2>&1");
        echo $output;
    }
    if($language == "node") {
        rename($filePath, $filePath.".js");
        $output = shell_exec("node $filePath.js 2>&1");
        echo $output;
    }
    if($language == "c") {
        $outputExe = $random . ".c";
        shell_exec("gcc $filePath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }
    if($language == "cpp") {
        $outputExe = $random . ".cpp";
        shell_exec("g++ $filePath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }

}

