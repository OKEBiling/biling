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
}