<div class="nav_menu">
    <nav class="" role="navigation">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<?php echo $this->session->userdata['email']; ?>
					<span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
					<li><a href="javascript:;">  Profile</a></li>
					<!-- <li>
						<a href="javascript:;">
							<span class="badge bg-red pull-right">50%</span>
							<span>Settings</span>
						</a>
					</li> -->
					<li>
					<?php echo anchor('auth/logout', '<i class="fa fa-sign-out pull-right"></i> Log Out'); ?>
					</li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
