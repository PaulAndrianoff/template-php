<?php

$tables = getAllTablesName();
$currentTable = get_global('wantedPageParams', 0);
$columns = [];
$allValues = [];

if (isset($currentTable) && 'string' === gettype($currentTable)) {
    $columns = getAllColumnsFromTable($currentTable);
    $allValues = selectValueFromTable ($currentTable);
}

dd($currentTable, $columns, $allValues);