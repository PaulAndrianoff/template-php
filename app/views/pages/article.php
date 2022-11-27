<div class="container">
<?php 

    if (count(get_global('wantedPageParamsMap')) > count(get_global('wantedPageParams'))) {
        echo getContentValue();
    } else {
        $template = 12; // Template id
        $param = selectValueFromTable(get_global('wantedPageParams', 0), ['id', get_global('wantedPageParams', 2)], false);
        echo render($template, $param);
    }

?>
</div>