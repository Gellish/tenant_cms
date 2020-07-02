<div class="content-wrapper">
    <h3>Room
        <small>Add New Room</small>
    </h3>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Add New Room | Form</div>
                <div class="panel-body">
					<?php echo form_open('rooms/add', array('method' => 'post', 'data-parsley-validate' => '')); ?>
                        <div class="form-group">
                            <label>Room Number</label>
                            <input autofocus type="text" name="room_number" placeholder="Enter room number" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Floor Number</label>
                            <input type="text" name="floor" placeholder="Enter floor number" required class="form-control">
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
