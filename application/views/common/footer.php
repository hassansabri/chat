

<!-- IMPORTANT: APP CONFIG -->
<script src="<?php echo base_url(); ?>assets/template/js/app.config.js"></script>

<!-- browser msie issue fix -->
<script src="<?php echo base_url(); ?>assets/template/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="<?php echo base_url(); ?>assets/template/js/smartwidgets/jarvis.widget.min.js"></script>
<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->


<!-- MAIN APP JS FILE -->
<script src="<?php echo base_url(); ?>assets/template/js/app.min.js"></script>




<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo base_url(); ?>assets/template/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/js/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/loadingoverlay.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/loadingoverlay_progress.min.js"></script>




<div class="page-footer">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <span class="txt-color-white"><?php echo $this->lang->line("AllRights"); ?> <?php echo date('Y'); ?>.</span>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        pageSetUp();
    });
</script>
</body>
</html>