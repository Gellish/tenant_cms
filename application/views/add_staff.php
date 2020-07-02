<div class="content-wrapper">
    <h3>Staff
        <small>Add New Staff</small>
    </h3>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Add New Staff | Form</div>
                <div class="panel-body">
					<?php echo form_open('staff/add', array('method' => 'post', 'data-parsley-validate' => '')); ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input autofocus type="text" name="name" placeholder="Enter name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" name="role" placeholder="Enter role i.e. Manager" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile_number" placeholder="Enter mobile number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="chosen-select input-md" name="status" required>
								<option value="">Select Status</option>
								<option value="0">Inactive</option>
								<option value="1">Active</option>
							</select>
                        </div>
                        <div class="form-group">
                            <label>Remarks</label>
                            <textarea style="resize: none" type="text" name="remarks" placeholder="Enter remarks" class="form-control"></textarea>
                        </div>
                        
                        <button type="submit" class="mb-sm btn btn-primary">Submit</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
