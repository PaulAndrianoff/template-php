<?php

function function_get_output($fn)
{
    $args = func_get_args();
    unset($args[0]);
    ob_start();
    call_user_func_array($fn, $args);
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

function display($template, $params = array())
{
    extract($params);

    include $template;
}

function render($template_name, $item)
{
    $template = PATH_VIEW . getTemplateBy($template_name);
    $params = objectoAssociative($item);

    return function_get_output('display', $template, $params);
}

function getArticleContent (object $item):string
{
    $contentHtml = '';
    $contentValue = selectValueFromTable($item->content);
    foreach ($contentValue as $article) {
        $contentHtml .= render($item->template_item_list, $article);
    }

    return $contentHtml;
}

function getContentValue ():string
{
    $contentValue = getContentByTemplateId($_SESSION['wantedPage']->id);
    $contentHtml = '<div div class="list">';

    foreach ($contentValue as $item) {
        if (isset($item->template_item_list)) {
            switch ($item->content_type) {
                case 'article':
                    $contentHtml .= getArticleContent ($item);
                    break;

                case 'pdf':
                    $contentHtml .= render($item->template_item_list, $item);
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

    $contentHtml .= '</div>';

    return $contentHtml;
}