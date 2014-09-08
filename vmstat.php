<?php

function parserVmstat($lines = '') {
        function isEmpty($value) {
            return (strlen($value)) != 0;
        }
        if (strlen($lines) == 0) {
            exec('vmstat', $res);
        } else {
            $res = $lines;
        }
        $keys = explode(' ', $res[1]);
        $values = explode(' ', $res[2]);
        $keys = array_values(array_filter( $keys, 'isEmpty'));
        $values = array_values(array_filter( $values, 'isEmpty'));
        $parameters = array();
        foreach($keys as $key => $value) {
            $parameters[$value] = $values[$key];
        }
        return $parameters;
}

$data = parserVmstat();
print_r($data);