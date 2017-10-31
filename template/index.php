<?php
require_once('bloks/root.php');
if ($landing == 1) {
    $class = 'landing-content p0 clearfix';
}
/*
* HTML-минимизация
*/
ob_start();
?>
    <!DOCTYPE HTML>
    <html lang="en-US">
    <head>
        <?php
        //Подключение head
        require_once('bloks/head.php');
        ?>
        <?php if ($adaptive) { ?>
            <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
        <?php } else { ?>
            <meta name="viewport" content="width=device-width">
        <?php } ?>

        <?=$metatags ?>

        <link href="/static/dest/css/main.css?6" rel="stylesheet">
        <?
        //        require_once('bloks/style.php');
        ?>
    </head>
    <body class="<?= $adaptive ? '_adaptive' : '' ?>">
    <div class="container">

        <?php
        //Подключение шапки сайта
        require_once('bloks/header.php');
        ?>

        <?php
        if (!empty($slider)) {
            require_once($slider_path);
        }
        ?>
        <div class="content <?=$class ?> ">

            <?php
            if (isset($file)) {
                require_once($file);
            }
            ?>
        </div>

        <?php
        //Подключение подвала
        require_once('bloks/footer.php');
        ?>

    </div>
    <?php 
        //Счетчики для аналитики
        require_once('bloks/counters.php')
    ?>

    <link rel="shortcut icon" href="/favicon.ico">
    <script src="/static/dest/js/main.js?1"></script>
    <?php
    if (isset($scripts)) {
        echo $scripts;
    }
    ?>
    </body>
    </html>
<?php
/*
* HTML-минимизация
*/
$out = ob_get_clean();
$out = preg_replace('/(?![^<]*<\/pre>)[\n\r\t]+/', "\n", $out);
$out = preg_replace('/ {2,}/', ' ', $out);
$out = preg_replace('/>[\n]+/', '>', $out);
echo $out;
?>