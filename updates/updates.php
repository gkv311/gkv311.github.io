<?php
header('Content-type: application/xhtml+xml');

echo '<?xml version="1.0" encoding="UTF-8"?>';

// request sample:
// www.sview.ru/updates/?appl=sView&year=9&month=9&rStatus=0&rSubVer=0

class StVersion {

    // enum
    public static $DEV                 = 0;
    public static $DEVELOPMENT_RELEASE = 0;
    public static $ALPHA               = 1;
    public static $BETA                = 2;
    public static $RC                  = 3;
    public static $RELEASE_CANDIDATE   = 3;
    public static $RELEASE             = 4;

    // variables
    public $year    = 2009;
    public $month   = 9;
    public $rStatus = 0;
    public $rSubVer = 0;

    function StVersion($inYear, $inMonth, $inRStatus, $inSubVer) {
        $this->year = $inYear;
        if($inYear < 2000) {
            $this->year = $inYear + 2000;
        }
        $this->month = $inMonth;
        $this->rStatus = $inRStatus;
        $this->rSubVer = $inSubVer;
    }

    function isGreaterThan($compareVer) {
        return ( $this->year > $compareVer->year
            || ( $this->year == $compareVer->year && $this->month > $compareVer->month)
            || ( $this->year == $compareVer->year && $this->month == $compareVer->month
                        && $this->rStatus > $compareVer->rStatus)
            || ( $this->year == $compareVer->year && $this->month == $compareVer->month
                        && $this->rStatus == $compareVer->rStatus
                        && $this->rSubVer > $compareVer->rSubVer) );
    }

    function toString() {
        $subVersion = '';
        switch($this->rStatus) {
            case self::$RELEASE:
                break;
            case self::$RELEASE_CANDIDATE:
                $subVersion = 'RC'.$this->rSubVer; break;
            case self::$BETA:
                $subVersion = 'beta'.$this->rSubVer; break;
            case self::$ALPHA:
                $subVersion = 'alpha'.$this->rSubVer; break;
            default:
                $subVersion = 'dev'.$this->rSubVer;
        }
        return sprintf("%d.%02d%s", ($this->year - 2000), $this->month, $subVersion);
    }

}

///print('Welcome to test update script<br/>');

// known applications to send update information
$appl_sView = 'sView';
$appl_sView_2009 = 'sView 2009';

// latest version
$lastVersion = new StVersion(2020, 8, 4, 1);
///echo $lastVersion->toString().'<br/>';

// received values
$reqApplicationName = $_GET['appl'];
$reqVersion = new StVersion($_GET['year'], $_GET['month'], $_GET['rStatus'], $_GET['rSubVer']);
///echo $reqVersion->toString().'<br/>';

/// ?
///echo 'HTTP_USER_AGENT='.$HTTP_USER_AGENT;

if(strcmp($appl_sView, $reqApplicationName) == 0 or strcmp($appl_sView_2009, $reqApplicationName) == 0) {
    ///printf("You request check updates for '%s'.<br/>", $reqApplicationName);
    echo "<stupdates>";
        echo "<appl name='".$reqApplicationName."'>";
            if($lastVersion->isGreaterThan($reqVersion)) {
                // updated version available
                echo "<year>";
                    echo $lastVersion->year;
                echo "</year>";
                echo "<month>";
                    echo $lastVersion->month;
                echo "</month>";
                echo "<rStatus>";
                    echo $lastVersion->rStatus;
                echo "</rStatus>";
                echo "<rSubVer>";
                    echo $lastVersion->rSubVer;
                echo "</rSubVer>";
                echo "<update>";
                    echo 'yes';
                echo "</update>";
                // if requested - history log
            } else {
                // nothing to update
                echo "<update>";
                    echo 'no';
                echo "</update>";
            }
        echo "</appl>";
    echo "</stupdates>";
} else {
    echo "<stupdates>";
        echo "<error>";
            echo "Application '".$reqApplicationName."' not supported";
        echo "</error>";
    echo "</stupdates>";
}

?>
