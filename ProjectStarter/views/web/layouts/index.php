<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php defineblock('title'); ?>
    </title>
    <link href="<?php echo asset('assets/web/css/bootstrap.css') ?>" rel="stylesheet" type="text/css" media="all" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo asset('assets/web/js/jquery.min.js') ?>"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="<?php echo asset('assets/web/css/style.css') ?>" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Fashion Mania Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- start menu -->
    <link href="<?php echo asset('assets/web/css/memenu.css') ?>" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="<?php echo asset('assets/web/js/memenu.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $(".memenu").memenu();
        });
    </script>
    <!-- slide -->
    <script src="<?php echo asset('assets/web/js/responsiveslides.min.js') ?>"></script>
    <script>
        $(function() {
            $("#slider").responsiveSlides({
                auto: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
</head>

<body>
    <?php defineblock('content'); ?>
</body>

</html>
