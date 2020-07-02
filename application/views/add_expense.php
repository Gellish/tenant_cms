<div class="content-wrapper">
	<h3>Expense
	   <small>Add Expense</small>
	</h3>
	<!-- START DATATABLE 1 -->
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="panel panel-default">
                <div class="panel-heading" align="center">Add Expense | Form</div>
                <div class="panel-body">
					<?php echo form_open('expenses/add', array('method' => 'post', 'data-parsley-validate' => '')); ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input autofocus type="text" name="name" placeholder="Enter name of the expense" class="form-control" required>
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
                            <label>Description</label>
                            <textarea style="resize: none" type="text" name="description" placeholder="Enter description of the expense" class="form-control" required></textarea>
                        </div>
                        
                        <button type="submit" class="mb-sm btn btn-primary">Submit</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
		</div>
	</div>
</div>

