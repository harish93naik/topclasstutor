Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span><i class="fe fe-home"></i> Main</span>
							</li>
							<li class="<?php echo e(Request::is('admin/index') ? 'active' : ''); ?>"> 
								<a href="/admin/index"><span>Dashboard</span></a>
							</li>
							<li class="<?php echo e(Request::is('admin/mentor') ? 'active' : ''); ?>"> 
								<a href="/admin/mentor"><span>Mentor</span></a>
							</li>
							<li class="<?php echo e(Request::is('admin/mentee') ? 'active' : ''); ?>"> 
								<a href="/admin/mentee"><span>Mentee</span></a>
							</li>
							<li class="<?php echo e(Request::is('admin/booking-list') ? 'active' : ''); ?>"> 
								<a href="/admin/booking-list"><span>Booking List</span></a>
							</li>
							<!-- <li class="<?php echo e(Request::is('admin/categories') ? 'active' : ''); ?>"> 
								<a href="categories"><span>Categories</span></a>
							</li> -->
							<li class="<?php echo e(Request::is('admin/transactions-list') ? 'active' : ''); ?>"> 
								<a href="/admin/transactions-list"><span>Transactions</span></a>
							</li>
							<!-- <li class="<?php echo e(Request::is('admin/settings') ? 'active' : ''); ?>"> 
								<a href="settings"><span>Settings</span></a>
							</li> -->
							<li class="submenu">
								<a href="#"><span> Reports</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('admin/invoice-report') ? 'active' : ''); ?>" href="<?php echo e(url('/admin/invoice-report')); ?>">Invoice Reports</a></li>
								</ul>
							</li>
						<!-- 	<li class="menu-title"> 
								<span><i class="fe fe-document"></i> Pages</span>
							</li> -->
							<li class="<?php echo e(Request::is('admin/profile') ? 'active' : ''); ?>"> 
								<a href="/admin/profile"><span>My Profile</span></a>
							</li>
							<li class="submenu"> 
								<a href="#"><span>Blog</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('admin/blog') ? 'active' : ''); ?>" href="<?php echo e(url('/admin/blog')); ?>"> Blog </a></li>
									<!-- <li><a class="<?php echo e(Request::is('admin/blog-details') ? 'active' : ''); ?>" href="<?php echo e(url('admin/blog-details')); ?>"> Blog Details </a></li> -->
								<!-- 	<li><a class="<?php echo e(Request::is('admin/add-blog') ? 'active' : ''); ?>" href="<?php echo e(url('admin/add-blog')); ?>"> Add Blog </a></li>
									<li><a class="<?php echo e(Request::is('admin/edit-blog') ? 'active' : ''); ?>" href="<?php echo e(url('admin/edit-blog')); ?>"> Edit Blog </a></li> -->
								</ul>
							</li>
						<!-- 	<li class="submenu">
								<a href="#"><span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									 <li><a class="<?php echo e(Request::is('admin/login') ? 'active' : ''); ?>" href="<?php echo e(url('admin/login')); ?>"> Login </a></li> 
									<li class="<?php echo e(Request::is('admin/register') ? 'active' : ''); ?>"><a href="register"> Register </a></li>
									<li class="<?php echo e(Request::is('admin/forgot-password') ? 'active' : ''); ?>"><a href="forgot-password"> Forgot Password </a></li>
									 <li class="<?php echo e(Request::is('admin/lock-screen') ? 'active' : ''); ?>"><a href="lock-screen"> Lock Screen </a></li> 
								</ul>
							</li> -->
							<!-- <li class="submenu">
								<a href="#"><span> Error Pages </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li class="<?php echo e(Request::is('admin/error-404') ? 'active' : ''); ?>"><a href="error-404">404 Error </a></li>
									<li class="<?php echo e(Request::is('admin/error-500') ? 'active' : ''); ?>"><a href="error-500">500 Error </a></li>
								</ul>
							</li> -->
							<!-- <li class="<?php echo e(Request::is('admin/blank-page') ? 'active' : ''); ?>"> 
								<a href="blank-page"><span>Blank Page</span></a>
							</li>
							<li class="menu-title"> 
								<span><i class="fe fe-star-o"></i> UI Interface</span>
							</li>
							<li class="<?php echo e(Request::is('admin/components') ? 'active' : ''); ?>"> 
								<a href="components"><span>Components</span></a>
							</li>
							<li class="submenu">
								<a href="#"><span> Forms </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('admin/form-basic-inputs') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-basic-inputs')); ?>">Basic Inputs </a></li>
									<li><a class="<?php echo e(Request::is('admin/form-input-groups') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-input-groups')); ?>">Input Groups </a></li>
									<li><a class="<?php echo e(Request::is('admin/form-horizontal') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-horizontal')); ?>">Horizontal Form </a></li>
									<li><a class="<?php echo e(Request::is('admin/form-vertical') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-vertical')); ?>"> Vertical Form </a></li>
									<li><a class="<?php echo e(Request::is('admin/form-mask') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-mask')); ?>"> Form Mask </a></li>
									<li><a class="<?php echo e(Request::is('admin/form-validation') ? 'active' : ''); ?>" href="<?php echo e(url('admin/form-validation')); ?>"> Form Validation </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><span> Tables </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="<?php echo e(Request::is('admin/tables-basic') ? 'active' : ''); ?>" href="<?php echo e(url('admin/tables-basic')); ?>">Basic Tables </a></li>
									<li><a class="<?php echo e(Request::is('admin/data-tables') ? 'active' : ''); ?>" href="<?php echo e(url('admin/data-tables')); ?>">Data Table </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);"><span>Multi Level</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li class="submenu">
										<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
											<li class="submenu">
												<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
												<ul style="display: none;">
													<li><a href="javascript:void(0);">Level 3</a></li>
													<li><a href="javascript:void(0);">Level 3</a></li>
												</ul>
											</li>
											<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0);"> <span>Level 1</span></a>
									</li>
								</ul>
							</li> -->
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar<?php /**PATH G:\template\resources\views/layout/partials/nav_admin.blade.php ENDPATH**/ ?>