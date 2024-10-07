<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('backend/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Admin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('admin.dashboard') }}" class="">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				
				<li class="menu-label">Students Manage</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Students</div>
					</a>
					<ul>
						<li> <a href="{{ route('student.manage') }}"><i class="bx bx-right-arrow-alt"></i>All Students</a>
						</li>
						<li> <a href="{{ route('student.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New Student</a>
						</li>
						<li> <a href="{{ route('student.trashManage') }}"><i class="bx bx-right-arrow-alt"></i>Trash</a>
						</li>
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->