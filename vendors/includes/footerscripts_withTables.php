<script src="assets/js/app.min.js"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<script src="assets/bundles/datatables/datatables.min.js"></script>
<script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/page/form-wizard.js"></script>
<script src="assets/bundles/jquery-steps/jquery.steps.min.js"></script>
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>
<!-- Custom JS File -->
<script src="assets/js/stop_save.js"></script>
<script src="assets/bundles/sweetalert/sweetalert.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/sweetalert.js"></script>
<script src="assets/js/select2/dist/js/select2.min.js"></script>
  <script src="assets/js/select2/dist/js/select2.js"></script>
   <script src="assets/js/select2/dist/js/select2.full.js"></script>

    <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="assets/bundles/codemirror/lib/codemirror.js"></script>
  <script src="assets/bundles/codemirror/mode/javascript/javascript.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="assets/bundles/ckeditor/ckeditor.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/ckeditor.js"></script>
  <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="assets/bundles/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <script src="assets/bundles/dropzonejs/min/dropzone.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/multiple-upload.js"></script>

  
  <!-- Script for Search Select -->
  <script src="assets/select2/dist/js/select2.min.js"></script>
  <script src="assets/select2/dist/js/select2.js"></script>
   <script src="assets/select2/dist/js/select2.full.js"></script>
    <script src="assets/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/js/page/posts.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {
    $('#js-example-basic-single').select2();
});

  </script>
  <!-- Script for Search Select -->

  
  <!-- <script src="assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="assets/js/page/datatables.js"></script> -->

  <script>
    var textarea = document.getElementById("myTextarea");
    var charactersLeft = document.getElementById("charactersLeft");
    var maxLength = 100; // Maximum allowed characters

    textarea.addEventListener("input", function() {
        var remainingChars = maxLength - this.value.length;
        charactersLeft.textContent = remainingChars + " characters left";
    });
</script>