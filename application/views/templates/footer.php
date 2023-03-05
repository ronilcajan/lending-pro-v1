<?php $current_page = $this->uri->segment(1); ?>
<script>
var SITE_URL = "<?= site_url() ?>";
</script>
<script src="<?= site_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= site_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= site_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="<?= site_url() ?>assets/js/core/popper.min.js"></script>
<script src="<?= site_url() ?>assets/js/core/bootstrap.min.js"></script>
<script>
var $window = $(window);
$window.on("load", function() {
    $(".preloader").fadeOut(500);
});
</script>
<!-- jQuery Scrollbar -->
<script src="<?= site_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Moment JS -->
<script src="<?= site_url() ?>assets/js/plugin/moment/moment.min.js"></script>
<!-- Bootstrap Notify -->
<script src="<?= site_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<!-- Datatables -->
<script src="<?= site_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Bootstrap Wizard -->
<script src="<?= site_url() ?>assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>
<!-- jQuery Validation -->
<script src="<?= site_url() ?>assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>
<!-- Select2 -->
<script src="<?= site_url() ?>assets/js/plugin/select2/select2.full.min.js"></script>
<script src="<?= site_url() ?>assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>


<script src="<?= site_url() ?>assets/js/plugin/chart.js/chart.min.js"></script>

<script src="<?= site_url() ?>assets/js/plugin/dataTables.dateTime.min.js"></script>
<script src="<?= site_url() ?>assets/js/plugin/datatables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
<script src="<?= site_url() ?>assets/js/plugin/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="<?= site_url() ?>assets/js/plugin/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?= site_url() ?>assets/js/plugin/datatables/Buttons-1.6.1/js/buttons.html5.min.js"></script>
<script src="<?= site_url() ?>assets/js/plugin/datatables/Buttons-1.6.1/js/buttons.print.min.js"></script>

<script src="<?= site_url() ?>assets/js/atlantis.js"></script>
<script src="<?= site_url() ?>assets/webcamjs/webcam.min.js"></script>
<script src="<?= site_url() ?>assets/js/mydatatables.js"></script>
<script src="<?= site_url() ?>assets/js/customScript.js"></script>
<script src="<?= site_url() ?>assets/js/formvalidation.js"></script>
<script src="<?= site_url() ?>assets/js/loan.js"></script>
<?php if($current_page == 'dashboard'): ?>
<script src="<?= site_url() ?>assets/js/chart.js"></script>
<?php endif ?>
<script>
// Code for the Validator
var $validator = $('.wizard-container form').validate({
    validClass: "success",
    highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    }
});
</script>