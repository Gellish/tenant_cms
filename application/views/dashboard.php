<div class="content-wrapper">
    <h3>Dashboard
        <small><?php echo date('d F, Y'); ?></small>
    </h3>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel bg-purple">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-bed fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-lg">
                                <?php echo html_escape($this->db->get('bed')->num_rows()); ?>
                            </div>
                            <p class="m0">Total Beds</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>beds" class="panel-footer bg-dark bt0 clearfix btn-block">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right">
                        <em class="fa fa-chevron-circle-right"></em>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-users fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-lg">
								<?php echo html_escape($this->db->get('tenant')->num_rows()); ?>
                            </div>
                            <p class="m0">Total Tenants</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>tenants" class="panel-footer bg-dark bt0 clearfix btn-block">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right">
                        <em class="fa fa-chevron-circle-right"></em>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-money fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-lg">
								<?php echo html_escape($this->db->get_where('bed', array('status' => 1))->num_rows()); ?>
                            </div>
                            <p class="m0">Occupied Beds</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>beds" class="panel-footer bg-dark bt0 clearfix btn-block">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right">
                        <em class="fa fa-chevron-circle-right"></em>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <em class="fa fa-credit-card fa-5x"></em>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="text-lg">
								<?php echo html_escape($this->db->get_where('tenant', array('status' => 1))->num_rows()); ?>
                            </div>
                            <p class="m0">Active Tenants</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>tenants" class="panel-footer bg-dark bt0 clearfix btn-block">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right">
                        <em class="fa fa-chevron-circle-right"></em>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel widget">
                <div class="panel-body">
                    <h3 class="mt10nhalf">
						<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
                        <?php
							$this->db->select_sum('amount');
							$this->db->from('tenant_rent');
							$this->db->where('status', 0);
							$this->db->where('month', date('F'));
							$this->db->where('year', date('Y'));
							$query = $this->db->get();
							
							$due_amount = $query->row()->amount;
							
							$this->db->select_sum('advance');
							$this->db->from('tenant_rent');
							$this->db->where('status', 0);
							$this->db->where('month', date('F'));
							$this->db->where('year', date('Y'));
							$query = $this->db->get();
							
							$due_advance = $query->row()->advance;
							
							if (($due_amount + $due_advance) > 1000000) {
								echo ($due_amount + $due_advance) / 1000000 . ' M';
							} else {
								echo $due_amount + $due_advance;
							}
						?>
                    </h3>
                    <p class="text-muted">Due Rents of <?php echo date('M, Y'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel widget">
                <div class="panel-body">
                    <h3 class="mt10nhalf">
                        <?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
                        <?php
							$this->db->select_sum('amount');
							$this->db->from('tenant_rent');
							$this->db->where('month', date('F'));
							$this->db->where('year', date('Y'));
							$query = $this->db->get();
							
							$total_amount = $query->row()->amount;
							
							$this->db->select_sum('advance');
							$this->db->from('tenant_rent');
							$this->db->where('month', date('F'));
							$this->db->where('year', date('Y'));
							$query = $this->db->get();
							
							$total_advance = $query->row()->advance;
							
							if (($total_amount + $total_advance) > 1000000) {
								echo ($total_amount + $total_advance) / 1000000 . ' M';
							} else {
								echo $total_amount + $total_advance;
							}							
						?>
                    </h3>
                    <p class="text-muted">Total Rents of <?php echo date('M, Y'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel widget">
                <div class="panel-body">
                    <h3 class="mt10nhalf">
						<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
                        <?php
							$this->db->select_sum('amount');
							$this->db->from('tenant_rent');
							$this->db->where('status', 0);
							$this->db->where('month', date('F', strtotime("-1 months")));
							$this->db->where('year', date('Y'));
							$query = $this->db->get();
							
							$last_due_amount = $query->row()->amount;
							
							$this->db->select_sum('advance');
							$this->db->from('tenant_rent');
							$this->db->where('status', 0);
							$this->db->where('month', date('F', strtotime("-1 months")));
							$this->db->where('year', date('Y'));
							$query = $this->db->get();
							
							$last_due_advance = $query->row()->advance;
							
							if (($last_due_amount + $last_due_advance) > 1000000) {
								echo ($last_due_amount + $last_due_advance) / 1000000 . ' M';
							} else {
								echo $last_due_amount + $last_due_advance;
							}
						?>
                    </h3>
                    <p class="text-muted">Total Due Rents of <?php echo date('F, Y', strtotime("-1 months")); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel widget">
                <div class="panel-body">
                    <h3 class="mt10nhalf">
						<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
                        <?php
							$this->db->select_sum('amount');
							$this->db->from('tenant_rent');
							$this->db->where('month', date('F', strtotime("-1 months")));
							$this->db->where('year', date('Y'));
							$query = $this->db->get();
							
							$last_total_amount = $query->row()->amount;
							
							$this->db->select_sum('advance');
							$this->db->from('tenant_rent');
							$this->db->where('month', date('F', strtotime("-1 months")));
							$this->db->where('year', date('Y'));
							$query = $this->db->get();
							
							$last_total_advance = $query->row()->advance;
							
							if (($last_total_amount + $last_total_advance) > 1000000) {
								echo ($last_total_amount + $last_total_advance) / 1000000 . ' M';
							} else {
								echo $last_total_amount + $last_total_advance;
							}
						?>
                    </h3>
                    <p class="text-muted">Total Rents of <?php echo date('F, Y', strtotime("-1 months")); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel widget">
                <div class="panel-body">
                    <h3 class="mt10nhalf">
						<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
                        <?php
							$this->db->select_sum('amount');
							$this->db->from('utility_bill');
							$query = $this->db->get();
							
							$overall_utility_bill = $query->row()->amount;
							
							if ($overall_utility_bill > 1000000) {
								echo $overall_utility_bill / 1000000 . ' M';
							} else {
								echo $overall_utility_bill;
							}
						?>
                    </h3>
                    <p class="text-muted">Total Utility Bills Overall</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel widget">
                <div class="panel-body">
                    <h3 class="mt10nhalf">
                        <?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
                        <?php
							$this->db->select_sum('amount');
							$this->db->from('expense');
							$query = $this->db->get();
							
							$overall_expense = $query->row()->amount;
							
							if ($overall_expense > 1000000) {
								echo $overall_expense / 1000000 . ' M';
							} else {
								echo $overall_expense;
							}
						?>
                    </h3>
                    <p class="text-muted">Total Expenses Overall</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel widget">
                <div class="panel-body">
                    <h3 class="mt10nhalf">
						<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
                        <?php
							$this->db->select_sum('amount');
							$this->db->from('tenant_rent');
							$this->db->where('status', 0);
							$query = $this->db->get();
							
							$overall_due_amount = $query->row()->amount;
							
							$this->db->select_sum('advance');
							$this->db->from('tenant_rent');
							$this->db->where('status', 0);
							$query = $this->db->get();
							
							$overall_due_advance = $query->row()->advance;
							
							if (($overall_due_amount + $overall_due_advance) > 1000000) {
								echo ($overall_due_amount + $overall_due_advance) / 1000000 . ' M';
							} else {
								echo $overall_due_amount + $overall_due_advance;
							}
						?>
                    </h3>
                    <p class="text-muted">Total Due Rents Overall</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel widget">
                <div class="panel-body">
                    <h3 class="mt10nhalf">
						<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>
                        <?php
							$this->db->select_sum('amount');
							$this->db->from('tenant_rent');
							$query = $this->db->get();
							
							$overall_amount = $query->row()->amount;
							
							$this->db->select_sum('advance');
							$this->db->from('tenant_rent');
							$query = $this->db->get();
							
							$overall_advance = $query->row()->advance;
							
							if (($overall_amount + $overall_advance) > 1000000) {
								echo ($overall_amount + $overall_advance) / 1000000 . ' M';
							} else {
								echo $overall_amount + $overall_advance;
							}
						?>
                    </h3>
                    <p class="text-muted">Total Rents Overall</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
	.mt10nhalf {
		margin-top: 10.5px;
	}
</style>




