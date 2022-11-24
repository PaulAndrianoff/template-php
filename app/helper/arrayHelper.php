<?php

/**
 * Transform array assiossiative array
 * 
 * @param array<object> $array
 * @param string $wantedKey
 * 
 * @return array $newArray
 */
function arrayToAssociative ($array, $wantedKey) {
    $newArray = [];
    for ($i=0; $i < count($array); $i++) {
        $newArray[$array[$i]->$wantedKey] = $array[$i];
    }

    return $newArray;
}