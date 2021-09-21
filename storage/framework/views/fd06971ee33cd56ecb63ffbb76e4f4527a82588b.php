<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <?php if(!Route::is(['mentor','mentee','booking-list','categories','transactions-list','settings','invoice-report','profile','blog','blog-details','add-blog','edit-blog','login','register','forgot-password',
        'lock-screen','error-404','error-500','blank-page','components','form-basic-inputs','form-input-groups','form-horizontal','form-vertical','form-mask','form-validation','tables-basic','data-tables'])): ?>
        <title>Mentoring - Dashboard</title>
        <?php endif; ?>
        <?php if(Route::is(['mentor','mentee'])): ?>
        <title>Mentoring - Mentor List Page</title>
        <?php endif; ?>
        <?php if(Route::is(['booking-list'])): ?>
        <title>Mentoring - Booking List Page</title>
        <?php endif; ?>
        <?php if(Route::is(['categories'])): ?>
        <title>Mentoring - Categories Page</title>
        <?php endif; ?>
        <?php if(Route::is(['transactions-list'])): ?>
        <title>Mentoring - Transactions List Page</title>
        <?php endif; ?>
        <?php if(Route::is(['settings'])): ?>
        <title>Mentoring - Settings Page</title>
        <?php endif; ?>
        <?php if(Route::is(['invoice-report'])): ?>
        <title>Doccure - Invoice Report Page</title>
        <?php endif; ?>
        <?php if(Route::is(['profile'])): ?>
        <title>Mentoring - Profile</title>
        <?php endif; ?>
        <?php if(Route::is(['blog'])): ?>
        <title>Mentoring - Blog Page</title>
        <?php endif; ?>
        <?php if(Route::is(['blog-details'])): ?>
        <title>Mentoring - Blog Details Page</title>
        <?php endif; ?>
        <?php if(Route::is(['add-blog'])): ?>
        <title>Mentoring - Add Blog Page</title>
        <?php endif; ?>
        <?php if(Route::is(['edit-blog'])): ?>
        <title>Mentoring - Edit Blog Page</title>
        <?php endif; ?>
        <?php if(Route::is(['login'])): ?>
        <title>Mentoring - Login</title>
        <?php endif; ?>
        <?php if(Route::is(['register'])): ?>
        <title>Mentoring - Register</title>
        <?php endif; ?>
        <?php if(Route::is(['forgot-password'])): ?>
        <title>Mentoring - Forgot Password</title>
        <?php endif; ?>
        <?php if(Route::is(['lock-screen'])): ?>
        <title>Mentoring - Lock Screen</title>
        <?php endif; ?>
        <?php if(Route::is(['error-404'])): ?>
        <title>Doccure - Error 404</title>
        <?php endif; ?>
        <?php if(Route::is(['error-500'])): ?>
        <title>Doccure - Error 500</title>
        <?php endif; ?>
        <?php if(Route::is(['blank-page'])): ?>
        <title>Mentoring - Blank Page</title>
        <?php endif; ?>
        <?php if(Route::is(['components'])): ?>
        <title>Mentoring - Components</title>
		<?php endif; ?>
        <?php if(Route::is(['form-basic-inputs'])): ?>
        <title>Mentoring - Basic Inputs</title>
        <?php endif; ?>
        <?php if(Route::is(['form-input-groups'])): ?>
        <title>Mentoring - Form Input Groups</title>
        <?php endif; ?>
        <?php if(Route::is(['form-horizontal'])): ?>
        <title>Mentoring - Horizontal Form</title>
        <?php endif; ?>
        <?php if(Route::is(['form-vertical'])): ?>
        <title>Mentoring - Vertical Form</title>
        <?php endif; ?>
        <?php if(Route::is(['form-mask'])): ?>
        <title>Mentoring - Form Mask</title>
        <?php endif; ?>
        <?php if(Route::is(['form-validation'])): ?>
        <title>Mentoring - Form Validation</title>
        <?php endif; ?>
        <?php if(Route::is(['tables-basic'])): ?>
        <title>Mentoring - Tables Basic</title>
        <?php endif; ?>
        <?php if(Route::is(['data-tables'])): ?>
        <title>Mentoring - Data Tables</title>
        <?php endif; ?>
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets_admin/img/favicon.png')); ?>">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('assets_admin/css/bootstrap.min.css')); ?>">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('assets_admin/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets_admin/plugins/fontawesome/css/all.min.css')); ?>">
        <?php if(Route::is(['add-blog','blog-details','blog','edit-blog'])): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets_admin/plugins/fontawesome/css/fontawesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets_admin/plugins/fontawesome/css/all.min.css')); ?>">
        <?php endif; ?>
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('assets_admin/css/feathericon.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets_admin/plugins/morris/morris.css')); ?>">	
         <!-- Select2 CSS -->
         <link rel="stylesheet" href="<?php echo e(asset('assets_admin/plugins/select2/css/select2.min.css')); ?>">	
        <!-- Datatables CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('assets_admin/plugins/datatables/datatables.min.css')); ?>">	
		<!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('assets_admin/css/style.css')); ?>"><?php /**PATH G:\topclasstutor\resources\views/layout/partials/head_admin.blade.php ENDPATH**/ ?>