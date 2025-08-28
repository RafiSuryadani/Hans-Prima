<div class="sidebar-menu">
	<ul class="menu">
		<li class="sidebar-title">Menu</li>

		<li
			class="sidebar-item <?= $page == "Dashboard Admin" ? 'active' : '' ?> ">
			<a href="<?= base_url() ?>admin" class='sidebar-link'>
				<i class="bi bi-grid-fill"></i>
				<span>Dashboard</span>
			</a>
		</li>

		<li
			class="sidebar-item <?= $page == "Kelompok Kategori" ? 'active' : '' ?> ">
			<a href="<?= base_url() ?>admin/group_category" class='sidebar-link'>
				<i class="bi bi-grid-fill"></i>
				<span>Kelompok Kategori</span>
			</a>
		</li>

		<li class="sidebar-title">Forms &amp; Tables</li>

		<li
			class="sidebar-item  <?= $page == "Form Admin" ? 'active' : '' ?> ">
			<a href="<?= base_url() ?>admin/form" class='sidebar-link'>
				<i class="bi bi-file-earmark-medical-fill"></i>
				<span>Form Layout</span>
			</a>


		</li>


		<li
			class="sidebar-item <?= $page == "Table Admin" ? "active" : "" ?> has-sub">
			<a href="#" class='sidebar-link'>
				<i class="bi bi-file-earmark-spreadsheet-fill"></i>
				<span>Datatables</span>
			</a>

			<ul class="submenu <?= $page == "Table Admin" ? 'submenu-open' : '' ?> ">

				<li class="submenu-item <?= $page == "Table Admin" ? "active" : "" ?>  ">
					<a href="<?= base_url() ?>admin/table" class="submenu-link">Datatable</a>

				</li>

				<li class="submenu-item  ">
					<a href="#" class="submenu-link">Datatable (jQuery)</a>

				</li>

			</ul>


		</li>

	</ul>
</div>