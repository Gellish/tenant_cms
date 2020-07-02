<!-- START Scripts-->
<!-- Main vendor Scripts-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Plugins-->
<script src="<?php echo base_url(); ?>assets/vendor/chosen/chosen.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/slider/js/bootstrap-slider.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/filestyle/bootstrap-filestyle.min.js"></script>
<!-- Animo-->
<script src="<?php echo base_url(); ?>assets/vendor/animo/animo.min.js"></script>
<!-- Sparklines-->
<script src="<?php echo base_url(); ?>assets/vendor/sparklines/jquery.sparkline.min.js"></script>
<!-- Slimscroll-->
<script src="<?php echo base_url(); ?>assets/vendor/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Store + JSON-->
<script src="<?php echo base_url(); ?>assets/vendor/store/store+json2.min.js"></script>
<!-- ScreenFull-->
<script src="<?php echo base_url(); ?>assets/vendor/screenfull/screenfull.min.js"></script>

<!-- START Page Custom Script-->
<!-- Markdown Area Codemirror and dependencies -->
<script src="<?php echo base_url(); ?>assets/vendor/codemirror/lib/codemirror.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/codemirror/addon/mode/overlay.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/codemirror/mode/markdown/markdown.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/codemirror/mode/xml/xml.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/codemirror/mode/gfm/gfm.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/marked/marked.js"></script>
<!-- MomentJs and Datepicker-->
<script src="<?php echo base_url(); ?>assets/vendor/moment/min/moment-with-langs.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- Tags input-->
<script src="<?php echo base_url(); ?>assets/vendor/tagsinput/bootstrap-tagsinput.min.js"></script>
<!-- Input Mask-->
<script src="<?php echo base_url(); ?>assets/vendor/inputmask/jquery.inputmask.bundle.min.js"></script>
<!-- Form Validation-->
<script src="<?php echo base_url(); ?>assets/vendor/parsley/parsley.min.js"></script>
<!-- END Page Custom Script-->

<!-- START Page Custom Script-->
<!-- Data Table Scripts-->
<script src="<?php echo base_url(); ?>assets/vendor/DataTables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/DataTables/js/dataTables.rowReorder.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/DataTables/js/dataTables.responsive.min.js"></script>
<!-- END Page Custom Script-->

<!-- START Page Custom Script-->
<!--  Flot Charts-->
<!-- <script src="<?php echo base_url(); ?>assets/vendor/flot/jquery.flot.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/flot/jquery.flot.categories.min.js"></script> -->
<!--[if lt IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
<!-- END Page Custom Script-->


<!-- App Main-->
<script src="<?php echo base_url(); ?>assets/app/js/app.js"></script>
<!-- END Scripts-->

<script>
	$(document).ready(function() {
	    var table = $('datatable1').DataTable( {
	        rowReorder: {
	            selector: 'td:nth-child(2)'
	        },
	        responsive: true
	    } );
	} );
</script>
