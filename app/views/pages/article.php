<div class="container">
<?php if (count(get_global('wantedPageParamsMap')) > count(get_global('wantedPageParams'))): ?>
    <h2 class="title">Articles</h2>
    <?= getContentValue(); ?>
<?php else: ?>
    <?php 
        $template = 12; // Template id
        $param = selectValueFromTable(get_global('wantedPageParams', 0), ['id', get_global('wantedPageParams', 2)], false);
        echo render($template, $param);
    ?>
<?php endif ?>
</div>