<?php
class Helper {
    public static function reindexJsonArray($jsonArray) {
        $reindexedArray = [];
        foreach ($jsonArray as $key => $value) {
            $reindexedArray[] = $value;
        }
        return $reindexedArray;
    }
    
    
    public static function singlePing($host) {
        try {
            exec('/bin/ping -qc 1 '.$host['ip'].' | awk -F/ \'/^rtt/ { print $5 }\'', $result);
            if (!isset($result[0])) {
                $result[0] = 0;
            }
            $pingValue = round($result[0]);
            unset($result);
            echo $result;
            return $pingValue;
        } catch (Exception $e) {

            return 'tidak dapat melakukan ping';
        }
        }
        
    public static function  redirectLogin($argv){
            die(header('Location: '.URLController::getBaseUrl().'/login'));
            
        }
        
    
}

    function randstring($len = 6, $type = 1, $prefix = null) {
        $str = '';

        switch ($type) {
            case 1:
                $chars = str_repeat('0123456789', 3);
                break;
            case 2:
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 3:
                $chars = 'abcdefghijklmnopqrstuvwxyz';
                break;
            case 4:
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                break;
            case 5:
                $chars = 'ABCDEFGHIJKMNPQRSTUVWXYZ1234567890abcdefghijkmnpqrstuvwxyz_-';
                break;
            default:

                $chars = 'ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz1234567890';
                break;
        }

        if ($len > 10) {
            $chars = $type == 1 ? str_repeat($chars, $len) : str_repeat($chars, 5);
        }

        $chars = str_shuffle($chars);
        $str   = substr($chars, 0, $len);

        return $prefix . $str;
    }

    function badgelevel($number){
        
        switch ($number) {
            case '1':
                $output ='bg-primary';
                break;
            case '2':
                $output = 'bg-secondary';
                break;
            case '3':
                $output = 'bg-success';
                break;
            case '4':
                 $output ='bg-info';
                break;
            case '5':
                 $output ='bg-warning';
                break;
            case '6':
               $output ='bg-danger';
                break;
            case '7':
                 $output ='bg-dark';
                break;
            default:
                break;
        }
        
        return $output;
        
    }
    
    
        function to_fixed($number, $decimals) {
        return floatval(number_format($number, $decimals, '.', ""));
    }
    
    function reformatDate($inputDate) {
    // Mengubah format tanggal
    $newDate = date("d/m/Y", strtotime($inputDate));
    return $newDate;
}

function timeAgo($inputDate) {
    $currentTimestamp = time();
    $inputTimestamp = strtotime($inputDate);

    $difference = $currentTimestamp - $inputTimestamp;

    if ($difference < 60) {
        return $difference . " detik yang lalu";
    } elseif ($difference < 3600) {
        $minutes = floor($difference / 60);
        return $minutes . " menit yang lalu";
    } elseif ($difference < 86400) {
        $hours = floor($difference / 3600);
        return $hours . " jam yang lalu";
    } else {
        $days = floor($difference / 86400);
        return $days . " hari yang lalu";
    }
}

