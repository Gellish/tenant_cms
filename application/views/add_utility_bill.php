<div class="content-wrapper">
	<h3>Utility Bill
	   <small>Add Utility Bill</small>
	</h3>
	<!-- START DATATABLE 1 -->
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="panel panel-default">
                <div class="panel-heading" align="center">Add Utility Bill | Form</div>
                <div class="panel-body">
					<?php echo form_open('utility_bills/add', array('method' => 'post', 'data-parsley-validate' => '')); ?>
                        <div class="form-group">
                            <label>Name</label>
							<select class="chosen-select input-md" name="utility_bill_category_id" required>
								<option value="">Select Utility Bill Category</option>
							<?php
								$utility_bill_categories = $this->db->get('utility_bill_category')->result_array();
								foreach ($utility_bill_categories as $utility_bill_category):
							?>
								<option value="<?php echo html_escape($utility_bill_category['utility_bill_category_id']); ?>"><?php echo html_escape($utility_bill_category['name']); ?></option>
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

