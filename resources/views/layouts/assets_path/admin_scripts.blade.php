<livewire:scripts />
<script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('/assets/admin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('/assets/admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('/assets/admin/js/dataTables.select.min.js') }}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('/assets/admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('/assets/admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('/assets/admin/js/template.js') }}"></script>
<script src="{{ asset('/assets/admin/js/settings.js') }}"></script>
<script src="{{ asset('/assets/admin/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('/assets/admin/js/dashboard.js') }}"></script>
<script src="{{ asset('/assets/admin/js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->

<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>