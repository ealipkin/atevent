<?php
require_once('bloks/root.php');
if ($landing == 1) {
    $class = 'landing-content p0 clearfix';
}

//Prevent cache new version of static
$json = file_get_contents('static/busters.json');
$json_data = json_decode($json, true);
$mainJsFile = 'dest/js/main.js';
$mainCssFile = 'dest/css/main.css';
$jsLastVersion = $json_data[$mainJsFile];
$cssLastVersion = $json_data[$mainCssFile];

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

        <?php if ($keywords) {
            echo $keywords;
        } else { ?>
            <meta name="Keywords"
                  content="свадебные, услуги, свадебный распорядитель, организация свадьбы, свадьба челябинск, свадебное агентство, свадебное агентство челябинск, услуги свадебного агентства, организация свадьбы, организация свадеб">
        <?php } ?>

        <?php if ($desctiption) {
            echo $desctiption;
        } else { ?>
            <meta name="Description"
                  content="Организация свадьбы от агенства «Академия Торжеств». Нет ничего невозможно - Ваши желания должны исполняться!">
        <?php } ?>


        <link href="/static/dest/css/main.css?<?= $cssLastVersion ?>" rel="stylesheet">
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
        <div class="content <?= $class ?> ">

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
    <script src="/static/dest/js/main.js?<?= $jsLastVersion ?>"></script>

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