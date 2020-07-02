<div class="content-wrapper">
    <h3>Staff Payroll
        <small>Add New Staff Payroll</small>
    </h3>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Add New Staff Payroll | Form</div>
                <div class="panel-body">
					<?php echo form_open('staff_payroll/add', array('method' => 'post', 'data-parsley-validate' => '')); ?>
                        <div class="form-group">
                            <label>Name</label>
							<select class="chosen-select input-md" name="staff_id" required>
								<option value="">Select Staff</option>
							<?php
								$staff = $this->db->get_where('staff', array('status' => 1))->result_array();
								foreach($staff as $row):
							?>
								<option value="<?php echo html_escape($row['staff_id']); ?>"><?php echo html_escape($row['name']); ?></option>
							<?php endforeach; ?>
							</select>
                        </div>
                        <div class="form-group">
                            <label>Year</label>
                            <select class="chosen-select input-md" name="year" required>
								<option value="">Select Year</option>
								<option value="<?php echo date('Y') - 4; ?>"><?php echo date('Y') - 4; ?></option>
								<option value="<?php echo date('Y') - 3; ?>"><?php echo date('Y') - 3; ?></option>
								<option value="<?php echo date('Y') - 2; ?>"><?php echo date('Y') - 2; ?></option>
								<option value="<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></option>
								<option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
								<option value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
								<option value="<?php echo date('Y') + 2; ?>"><?php echo date('Y') + 2; ?></option>
								<option value="<?php echo date('Y') + 3; ?>"><?php echo date('Y') + 3; ?></option>
								<option value="<?php echo date('Y') + 4; ?>"><?php echo date('Y') + 4; ?></option>
							</select>
                        </div>
                        <div class="form-group">
                            <label>Month</label>
                            <select class="chosen-select input-md" name="month" required>
								<option value="">Select Month</option>
								<option value="January">January</option>
								<option value="February">February</option>
								<option value="March">March</option>
								<option value="April">April</option>
								<option value="May">May</option>
								<option value="June">June</option>
								<option value="July">July</option>
								<option value="August">August</option>
								<option value="September">September</option>
								<option value="October">October</option>
								<option value="November">November</option>
								<option value="December">December</option>
							</select>
                        </div>
                        <div class="form-group">
                            <label>Amount (<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>)</label>
                            <input type="text" name="amount" placeholder="Enter amount" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="chosen-select input-md" name="status" required>
								<option value="">Select Status</option>
								<option value="0">Due</option>
								<option value="1">Paid</option>
							</select>
                        </div>
                        
                        <button type="submit" class="mb-sm btn btn-primary">Submit</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
