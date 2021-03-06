<?php

/**
 * Configure logging common
 *
 * @package App\Common
 * @author Rikkei.Quangpm
 * @date 2018/06/19
*/

namespace App\Common;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

/**
 * Configure logging common
 */
class LoggingCommon
{
    /**
     * Create a new LoggingCommon instance.
     *
     * @access public
     * @return void
     */
    public function __construct ()
    {
       $this->_initBBA0005Log();
    }

    /**
     * Init Log function: BBA0005 Batch billing usage
     * 
     * @access private
     * @return object
     */
    public static function BBA0005Log()
    {
        $logFileName = 'Billing_Usage.log';
        $logFilePath = storage_path() . '/logs/BBA0005/' . $logFileName;

        // the default date format is "Y-m-d H:i:s"
        $dateFormat = "Y-m-d H:i:s";
        // the default output format is "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
        $output = "%datetime% [%level_name%] %message%\n";
        // finally, create a formatter
        $formatter = new LineFormatter($output, $dateFormat);

        // Create a handler
        $streamInfo = new StreamHandler($logFilePath, Logger::INFO);
        $streamError = new StreamHandler($logFilePath, Logger::ERROR);
        $streamInfo->setFormatter($formatter);
        $streamError->setFormatter($formatter);

        // Create the logger
        $BBA0005Log = new Logger('BBA0005_Billing_Usage_Log');
        $BBA0005Log->pushHandler($streamInfo);
        $BBA0005Log->pushHandler($streamError);

        return $BBA0005Log;
    }

    /**
     * Init Log function: BBA0005 Batch billing usage
     * 
     * @access private
     * @return object
     */
    public static function logWrite($logFileName = 'BBA0005_Billing_Usage.log', $logFilePath = '/storage', $output = "%datetime% [%level_name%] %message% \n")
    {
        $logFilePath = $logFilePath .'/'. $logFileName;

        // the default date format is "Y-m-d H:i:s"
        $dateFormat = "Y-m-d H:i:s";
        // the default output format is "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
        if (isset($output) && is_null($output)) {
            $output = "%datetime% [%level_name%] %message% \n";
        }
        // finally, create a formatter
        $formatter = new LineFormatter($output, $dateFormat);

        // Create a handler
        $streamInfo = new StreamHandler($logFilePath, Logger::INFO);
        $streamError = new StreamHandler($logFilePath, Logger::ERROR);
        $streamInfo->setFormatter($formatter);
        $streamError->setFormatter($formatter);

        // Create the logger
        $BBA0005Log = new Logger('BBA0005_Billing_Usage_Log');
        $BBA0005Log->pushHandler($streamInfo);
        $BBA0005Log->pushHandler($streamError);

        return $BBA0005Log;
    }

    /**
     * Init Log function: Billing paper
     * 
     * @access private
     * @return object
     */
    public static function BillingLog()
    {
        $logFileName = date('Y-m') . '.log';
        $logFilePath = storage_path() . '/logs/billing/' . $logFileName;

        // the default date format is "Y-m-d H:i:s"
        $dateFormat = "Y-m-d H:i:s";
        // the default output format is "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
        $output = "%datetime% [%level_name%] %message%\n";
        // finally, create a formatter
        $formatter = new LineFormatter($output, $dateFormat);

        // Create a handler
        $streamInfo = new StreamHandler($logFilePath, Logger::INFO);
        $streamError = new StreamHandler($logFilePath, Logger::ERROR);
        $streamInfo->setFormatter($formatter);
        $streamError->setFormatter($formatter);

        // Create the logger
        $BBA0005Log = new Logger('Billing_Log');
        $BBA0005Log->pushHandler($streamInfo);
        $BBA0005Log->pushHandler($streamError);

        return $BBA0005Log;
    }
}
