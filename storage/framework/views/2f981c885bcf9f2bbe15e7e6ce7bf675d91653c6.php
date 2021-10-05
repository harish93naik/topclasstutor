


<?php $__env->startSection('content'); ?>

    <!-- start: page -->

               
    <div class="page-wrapper">

                <div class="content container-fluid">


            <div class="row">
                <div class="col-lg-12">

                    <p>We're sorry, but you don't have permission to access this area.</p>
                    <!-- <div class="main-error mb-3">
                        <h2 class="error-code text-dark text-center font-weight-semibold m-0">Oops! <i class="fas fa-hand-paper"></i></h2>
                        <p class="error-explanation text-center">We're sorry, but you don't have permission to access this area.</p>
                    </div> -->
                </div>
               <!--  <div class="col-lg-4">
                    <h4 class="text">Here are some useful links</h4>
                    <ul class="nav nav-list flex-column primary">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard"><i class="fas fa-caret-right text-dark"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/show/<?php echo e(auth()->user()->id); ?>"><i class="fas fa-caret-right text-dark"></i> User Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout"><i class="fas fa-caret-right text-dark"></i> Logout</a>
                        </li>
                    </ul>
                </div> -->
            
        </div>
    </div>
</div>
    <!-- end: page -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\topclasstutor\resources\views/security.blade.php ENDPATH**/ ?>