<?php
//A PHP array containing the data that we want to log.
$dataToLog = array(
    date("Y-m-d H:i:s"),
    $_SERVER['REMOTE_ADDR'], //IP address
    'Clicked on item 4', //Custom text
    'Number of items in cart is 2' //More custom text
);

//Turn array into a delimited string using
//the implode function
//Add a newline onto the end.
//The name of your log file.
//Modify this and add a full path if you want to log it in 
//a specific directory.
$pathToFile = './mylogname.log';

//Log the data to your file using file_put_contents.
/**
 * Undocumented function
 *
 * @param [type] $getParam requested parameter
 * @param string $raw raw header content
 * @return void
 */
function setLog($method, $getParam){
    $data = implode(" - ", [date("Y-m-d H:i:s"),$_SERVER['REMOTE_ADDR'],$method,$getParam]);
    $data .= PHP_EOL;
    $pathToFile = './log.log';
    file_put_contents($pathToFile, $data, FILE_APPEND);
}
