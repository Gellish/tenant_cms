<aside class="aside">
    <nav class="sidebar">
        <ul class="nav">
            <li class="nav-heading">Main navigation</li>
            <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>" title="Dashboard" data-toggle="" class="no-submenu">
                    <em class="fa fa-home"></em>
                    <span class="item-text">Dashboard</span>
                </a>
            </li>
            <?php
				if (!in_array($this->db->get_where('page', array(
				    'page_name' => 'add_room'
				))->row()->page_id, $this->session->userdata('permissions')) && !in_array($this->db->get_where('page', array(
				    'page_name' => 'rooms'
				))->row()->page_id, $this->session->userdata('permissions'))):
			?>
            
            <?php else: ?>
            <li class="<?php if ($page_name == 'add_room' || $page_name == 'rooms') echo 'active'; ?>">
                <a href="#" title="Room" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-building"></em>
                    <span class="item-text">Room</span>
                </a>
                <ul class="nav collapse <?php if ($page_name == 'add_room' || $page_name == 'rooms') echo 'in'; ?>">
				<?php if (in_array($this->db->get_where('page', array('page_name' => 'add_room'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'add_room') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>add_room" title="Add New Room" data-toggle="" class="no-submenu">
                            <span class="item-text">Add New Room</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'rooms'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'rooms') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>rooms" title="View All Rooms" data-toggle="" class="no-submenu">
                            <span class="item-text">View All Rooms</span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>            
            <?php endif; ?>
			
			<?php
				if (!in_array($this->db->get_where('page', array(
				    'page_name' => 'add_bed'
				))->row()->page_id, $this->session->userdata('permissions')) && !in_array($this->db->get_where('page', array(
				    'page_name' => 'beds'
				))->row()->page_id, $this->session->userdata('permissions'))):
			?>
            
            <?php else: ?>
            <li class="<?php if ($page_name == 'add_bed' || $page_name == 'beds') echo 'active'; ?>">
                <a href="#" title="Bed" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-bed"></em>
                    <span class="item-text">Bed</span>
                </a>
                <ul class="nav collapse <?php if ($page_name == 'add_bed' || $page_name == 'beds') echo 'in'; ?>">
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'add_bed'))->row()->page_id, $this->session->userdata('permissions'))): ?>    
                    <li class="<?php if ($page_name == 'add_bed') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>add_bed" title="Add New Bed" data-toggle="" class="no-submenu">
                            <span class="item-text">Add New Bed</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'beds'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'beds') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>beds" title="View All Beds" data-toggle="" class="no-submenu">
                            <span class="item-text">View All Beds</span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            
            <?php
				if (!in_array($this->db->get_where('page', array(
				    'page_name' => 'add_tenant'
				))->row()->page_id, $this->session->userdata('permissions')) && !in_array($this->db->get_where('page', array(
				    'page_name' => 'tenants'
				))->row()->page_id, $this->session->userdata('permissions'))):
			?>
            
            <?php else: ?>
            <li class="<?php if ($page_name == 'add_tenant' || $page_name == 'tenants') echo 'active'; ?>">
                <a href="#" title="Tenant" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-users"></em>
                    <span class="item-text">Tenant</span>
                </a>
                <ul class="nav collapse <?php if ($page_name == 'add_tenant' || $page_name == 'tenants') echo 'in'; ?>">
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'add_tenant'))->row()->page_id, $this->session->userdata('permissions'))): ?>    
                    <li class="<?php if ($page_name == 'add_tenant') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>add_tenant" title="Add New Tenant" data-toggle="" class="no-submenu">
                            <span class="item-text">Add New Tenant</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'tenants'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'tenants') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>tenants" title="View All Tenants" data-toggle="" class="no-submenu">
                            <span class="item-text">View All Tenants</span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            
            <?php
				if (!in_array($this->db->get_where('page', array(
				    'page_name' => 'add_utility_bill'
				))->row()->page_id, $this->session->userdata('permissions')) && !in_array($this->db->get_where('page', array(
				    'page_name' => 'utility_bills'
				))->row()->page_id, $this->session->userdata('permissions')) && !in_array($this->db->get_where('page', array(
				    'page_name' => 'utility_bill_categories'
				))->row()->page_id, $this->session->userdata('permissions'))):
			?>
            
            <?php else: ?>
            <li class="<?php if ($page_name == 'add_utility_bill' || $page_name == 'utility_bills' || $page_name == 'utility_bill_categories') echo 'active'; ?>">
                <a href="#" title="Utility Bills" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-money"></em>
                    <span class="item-text">Utility Bills</span>
                </a>
                <ul class="nav collapse <?php if ($page_name == 'add_utility_bill' || $page_name == 'utility_bills' || $page_name == 'utility_bill_categories') echo 'in'; ?>">  
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'add_utility_bill'))->row()->page_id, $this->session->userdata('permissions'))): ?> 
                    <li class="<?php if ($page_name == 'add_utility_bill') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>add_utility_bill" title="Add New Utility Bill" data-toggle="" class="no-submenu">
                            <span class="item-text">Add New Utility Bill</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'utility_bills'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'utility_bills') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>utility_bills" title="View All Utility Bills" data-toggle="" class="no-submenu">
                            <span class="item-text">View All Utility Bills</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'utility_bill_categories'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'utility_bill_categories') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>utility_bill_categories" title="Utility Bill Categories" data-toggle="" class="no-submenu">
                            <span class="item-text">Utility Bill Categories</span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            
            <?php
				if (!in_array($this->db->get_where('page', array(
				    'page_name' => 'add_expense'
				))->row()->page_id, $this->session->userdata('permissions')) && !in_array($this->db->get_where('page', array(
				    'page_name' => 'expenses'
				))->row()->page_id, $this->session->userdata('permissions'))):
			?>
            
            <?php else: ?>
            <li class="<?php if ($page_name == 'add_expense' || $page_name == 'expenses') echo 'active'; ?>">
                <a href="#" title="Expense" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-credit-card-alt "></em>
                    <span class="item-text">Expense</span>
                </a>
                <ul class="nav collapse <?php if ($page_name == 'add_expense' || $page_name == 'expenses') echo 'in'; ?>">
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'add_expense'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'add_expense') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>add_expense" title="Add New Expense" data-toggle="" class="no-submenu">
                            <span class="item-text">Add New Expense</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'expenses'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'expenses') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>expenses" title="View All Expenses" data-toggle="" class="no-submenu">
                            <span class="item-text">View All Expenses</span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            
            <?php
				if (!in_array($this->db->get_where('page', array(
				    'page_name' => 'add_staff'
				))->row()->page_id, $this->session->userdata('permissions')) && !in_array($this->db->get_where('page', array(
				    'page_name' => 'staff'
				))->row()->page_id, $this->session->userdata('permissions')) && !in_array($this->db->get_where('page', array(
				    'page_name' => 'add_staff_payroll'
				))->row()->page_id, $this->session->userdata('permissions')) && !in_array($this->db->get_where('page', array(
				    'page_name' => 'staff_payroll'
				))->row()->page_id, $this->session->userdata('permissions'))):
			?>
            
            <?php else: ?>
            <li class="<?php if ($page_name == 'add_staff' || $page_name == 'staff' || $page_name == 'add_staff_payroll' || $page_name == 'staff_payroll') echo 'active'; ?>">
                <a href="#" title="Staff" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-user"></em>
                    <span class="item-text">Staff</span>
                </a>
                <ul class="nav collapse <?php if ($page_name == 'add_staff' || $page_name == 'staff' || $page_name == 'add_staff_payroll' || $page_name == 'staff_payroll') echo 'in'; ?>">
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'add_staff'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'add_staff') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>add_staff" title="Add New Staff" data-toggle="" class="no-submenu">
                            <span class="item-text">Add New Staff</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'staff'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'staff') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>staff" title="View All Staff" data-toggle="" class="no-submenu">
                            <span class="item-text">View All Staff</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'add_staff_payroll'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'add_staff_payroll') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>add_staff_payroll" title="Add New Staff Payroll" data-toggle="" class="no-submenu">
                            <span class="item-text">Add New Staff Payroll</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'staff_payroll'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'staff_payroll') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>staff_payroll" title="View Staff Payroll" data-toggle="" class="no-submenu">
                            <span class="item-text">View Staff Payroll</span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>
            
			<?php
				if (!in_array($this->db->get_where('page', array(
				    'page_name' => 'generate_rent'
				))->row()->page_id, $this->session->userdata('permissions')) && !in_array($this->db->get_where('page', array(
				    'page_name' => 'monthly_rent'
				))->row()->page_id, $this->session->userdata('permissions')) && !in_array($this->db->get_where('page', array(
				    'page_name' => 'rents'
				))->row()->page_id, $this->session->userdata('permissions'))):
			?>
            
            <?php else: ?>
            <li class="<?php if ($page_name == 'generate_rent' || $page_name == 'monthly_rent' || $page_name == 'single_month_rent' || $page_name == 'rents') echo 'active'; ?>">
                <a href="#" title="Rents" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-credit-card"></em>
                    <span class="item-text">Rents</span>
                </a>
                <ul class="nav collapse <?php if ($page_name == 'generate_rent' || $page_name == 'monthly_rent' || $page_name == 'single_month_rent' || $page_name == 'rents') echo 'in'; ?>">  
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'generate_rent'))->row()->page_id, $this->session->userdata('permissions'))): ?>    
                    <li class="<?php if ($page_name == 'generate_rent') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>generate_rent" title="Generate Rent" data-toggle="" class="no-submenu">
                            <span class="item-text">Generate Rent</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'monthly_rent'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'monthly_rent' || $page_name == 'single_month_rent') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>monthly_rent" title="View Monthly Rent" data-toggle="" class="no-submenu">
                            <span class="item-text">View Monthly Rent</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'rents'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'rents') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>rents" title="View All Rents" data-toggle="" class="no-submenu">
                            <span class="item-text">View All Rents</span>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>                
            </li>
            <?php endif; ?>
			
			<?php if (in_array($this->db->get_where('page', array('page_name' => 'account'))->row()->page_id, $this->session->userdata('permissions'))): ?>
            <li class="<?php if ($page_name == 'account') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>account" title="Account" data-toggle="" class="no-submenu">
                    <em class="fa fa-list-ol"></em>
                    <span class="item-text">Account</span>
                </a>
            </li>
			<?php endif; ?>
			
            <li class="<?php if ($page_name == 'website_settings' || $page_name == 'profession_settings' || $page_name == 'id_type_settings' || $page_name == 'profile_settings') echo 'active'; ?>">
                <a href="#" title="Settings" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-gear"></em>
                    <span class="item-text">Settings</span>
                </a>
                <ul class="nav collapse <?php if ($page_name == 'website_settings' || $page_name == 'profession_settings' || $page_name == 'id_type_settings' || $page_name == 'profile_settings') echo 'in'; ?>">
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'website_settings'))->row()->page_id, $this->session->userdata('permissions'))): ?>    
                    <li class="<?php if ($page_name == 'website_settings') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>website_settings" title="Website settings" data-toggle="" class="no-submenu">
                            <span class="item-text">Website</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'profession_settings'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'profession_settings') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>profession_settings" title="Profession settings" data-toggle="" class="no-submenu">
                            <span class="item-text">Professions</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if (in_array($this->db->get_where('page', array('page_name' => 'id_type_settings'))->row()->page_id, $this->session->userdata('permissions'))): ?>
                    <li class="<?php if ($page_name == 'id_type_settings') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>id_type_settings" title="ID Type settings" data-toggle="" class="no-submenu">
                            <span class="item-text">ID Types</span>
                        </a>
                    </li>
                <?php endif; ?>
                    <li class="<?php if ($page_name == 'profile_settings') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>profile_settings" title="Profile settings" data-toggle="" class="no-submenu">
                            <span class="item-text">Profile</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
