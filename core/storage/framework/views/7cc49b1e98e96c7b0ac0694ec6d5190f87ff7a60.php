<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo app('translator')->get('Easy Activator by ViserLab'); ?></title>
	<link rel="stylesheet" href="<?php echo e(asset('assets/global/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/global/css/all.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/global/css/installer.css')); ?>">
	<link rel="shortcut icon" href="<?php echo e(getImage('assets/images/logoIcon/favicon.png')); ?>" type="image/x-icon">
</head>
<body>
	<header class="py-3 border-bottom border-primary bg--dark">
		<div class="container">
			<div class="d-flex align-items-center justify-content-between header gap-3">
				<img class="logo" src="<?php echo e(getImage('assets/images/logoIcon/logo.png')); ?>" alt="ViserLab">
				<h3 class="title"><?php echo app('translator')->get('Easy Activation'); ?></h3>
			</div>
		</div>
	</header>
	<div class="installation-section padding-bottom padding-top">
		<div class="container">
			<div class="installation-wrapper">
				<div class="install-content-area">
                    <div class="install-item">
						<h3 class="title text-center">microlab License Activation</h3>
                        <div class="box-item">
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="alert-area alert alert-danger d-none">
                                        <h5 class="resp-msg"></h5>
                                        <p class="my-3">You can ask for support by creating a support ticket.</p>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="alert alert-success" role="alert">
                                        <p style="text-align: center;" class="fs-17 mb-0">For license activation, please get in touch with <a href="mail:support@websmartbd.com" target="_blank">support@websmartbd.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<footer class="py-3 text-center bg--dark border-top border-primary">
		<div class="container">
			<p class="m-0 font-weight-bold">&copy;<?php echo Date('Y') ?> - <?php echo app('translator')->get('All Right Reserved by'); ?> <a href="https://viserlab.com/"><?php echo app('translator')->get('ViserLab'); ?></a></p>
		</div>
	</footer>
	<script src="<?php echo e(asset('assets/global/js/bootstrap.bundle.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/global/js/jquery-3.6.0.min.js')); ?>"></script>
    <?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        (function($){
            "use strict"

            $('.verForm').submit(function (e) {
                e.preventDefault();
                $('.alert-area').addClass('d-none');
                $('.sbmBtn').text('Processing...');
                var url = '<?php echo e(route(Laramin\Utility\VugiChugi::acRouterSbm())); ?>';
                var data = {
                    "purchase_code":$(this).find('[name=purchase_code]').val(),
                    "email":$(this).find('[name=email]').val(),
                    "envato_username":$(this).find('[name=envato_username]').val()
                };

                $.post(url, data,function (response) {
                    if (response.type == 'error') {
                        $('.sbmBtn').text('Submit');
                        $('.verForm').trigger("reset");
                        $('.alert-area').removeClass('d-none');
                        $('.resp-msg').text(response.message);
                    }else{
                        location.reload();
                    }
                });

            });

            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip({
                    animated: 'fade',
                    trigger: 'click'
                })
            })

            $('[name=email]').on('input', function () {
                $('.email').text($(this).val());
            });

            $('[name=envato_username]').on('input', function () {
                $('.envato_username').text($(this).val());
            });

            $('[name=purchase_code]').on('input', function () {
                $('.purchase_code').text($(this).val());
            });

        })(jQuery);
    </script>
</body>

</html>
<?php /**PATH D:\php8.1\htdocs\job\core\vendor\laramin\utility\src/Views/laramin_start.blade.php ENDPATH**/ ?>