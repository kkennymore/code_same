<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Exceptions
{

    protected static $fileHandle;

    //error logs=====
    public static function setErrorLogsToFile($exMessage): void
    {
        //=======get the time========
        $errorTime = date("d M Y h:i:sa", time());
        //=================compile the messages=========//
        $messageToWrite = "<p>\n=======================DATE: {$errorTime}===================================\n";
        $messageToWrite .= "Time: " . trim($errorTime) . "\n";
        $messageToWrite .= "File Name: " . trim($exMessage->getFile()) . "\n";
        $messageToWrite .= "Error occur in line: " . trim($exMessage->getLine()) . "\n";
        $messageToWrite .= "Error Message: " . trim($exMessage->getMessage()) . "\n";
        $messageToWrite .= "Error Message Trace: " . trim($exMessage->getTraceAsString()) . "\n";
        $messageToWrite .= "=============================END===========================================\n</p>\n";
        //=====check if the directory is already in place=========//
        $errorDirectory = Config::get("ERROR_DIRECTORY");
        $errorFileName = Config::get("ERROR_FILE_NAME") . ".txt";
        //===create the directory if its not a directory=====
        if (!is_dir($errorDirectory)) {
            @mkdir(ROOT . $errorDirectory);
        }

        //=check if the file exist already===
        if (file_exists(ROOT . $errorDirectory . DS . $errorFileName)) {
            //======append data to file==========
            self::$fileHandle = fopen(ROOT . $errorDirectory . DS . $errorFileName, "a");
        } else {
            //=======create the file if it does not exist=======//
            self::$fileHandle = fopen(ROOT . $errorDirectory . DS . $errorFileName, "w");
        }

        //===check if the file is writable===
        if (is_writable(ROOT . $errorDirectory . DS . $errorFileName)) {
            //=====write data to file===========//
            fwrite(self::$fileHandle, $messageToWrite);
            //========close file==========//
            fclose(self::$fileHandle);
        }
    }

    //===========this will return the array of error from the log file===
    public static function getErrorMessageFromLogFile(String $code, String $message): array
    {
        //======check if the file exist========
        return [
            "statusCode" => $code,
            "message" => $message,
        ];
    }
}
