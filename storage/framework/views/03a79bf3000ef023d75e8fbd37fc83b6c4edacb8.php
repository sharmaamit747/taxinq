
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(config('app.name', 'Laravel')); ?></title>
        <link href="<?php echo e(asset("assets/css/pace.min.css")); ?>" rel="stylesheet" />
        <script src="<?php echo e(asset("assets/js/pace.min.js")); ?>"></script>
        <link rel="stylesheet" href="<?php echo e(asset("assets/css/bootstrap.min.css")); ?>" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&amp;family=Roboto&amp;display=swap" />
        <link rel="stylesheet" href="<?php echo e(asset("assets/css/icons.css")); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset("assets/css/app.css")); ?>" />
    </head>
    <body class="bg-register">
        <?php echo $__env->yieldContent('content'); ?>
        <script src="<?php echo e(asset("assets/js/jquery.min.js")); ?>"></script>
        <script>
            $(document).ready(function () {
                $("#show_hide_password a").on('click', function (event) {
                    event.preventDefault();
                    if ($('#show_hide_password input').attr("type") == "text") {
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass("bx-hide");
                        $('#show_hide_password i').removeClass("bx-show");
                    } else if ($('#show_hide_password input').attr("type") == "password") {
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass("bx-hide");
                        $('#show_hide_password i').addClass("bx-show");
                    }
                });
            });
        </script>
    </body>
</html>
<?php /**PATH E:\xampp\htdocs\pharma\resources\views/layouts/app.blade.php ENDPATH**/ ?>
