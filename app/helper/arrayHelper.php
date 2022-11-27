<?php

/**
 * Transform array assiossiative array
 * 
 * @param array<object> $array
 * @param string $wantedKey
 * 
 * @return array $newArray
 */
function arrayToAssociative (array $array, string $wantedKey):array
{
    $newArray = [];
    for ($i=0; $i < count($array); $i++) {
        $newArray[$array[$i]->$wantedKey] = $array[$i];
    }

    return $newArray;
}

/**
 * Transform object assiossiative array
 * 
 * @param object $yourObject
 * 
 * @return array $newArray
 */
function objectoAssociative (object $yourObject):array
{
    $array = (array) $yourObject;

    return $array;
}