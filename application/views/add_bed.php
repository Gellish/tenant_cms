<div class="content-wrapper">
    <h3>Bed
        <small>Add New Bed</small>
    </h3>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Add New Bed | Form</div>
                <div class="panel-body">
					<?php echo form_open('beds/add', array('method' => 'post', 'data-parsley-validate' => '')); ?>
                        <div class="form-group">
                            <label>Bed Number</label>
                            <input autofocus type="text" name="bed_number" required placeholder="Enter bed number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Room Number</label>
                            <div>
                                <select class="chosen-select input-md" required name="room_id">
									<option value="">Select room</option>
								<?php
									$rooms = $this->db->get('room')->result_array();
									foreach ($rooms as $room):
								?>
                                    <option value="<?php echo html_escape($room['room_id']); ?>"><?php echo html_escape($room['room_number']); ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Rent (<?php echo $this->db->get_where('setting', array('name' => 'currency'))->row()->content; ?>)</label>
                            <input type="text" required name="rent" placeholder="Enter rent" class="form-control">
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
