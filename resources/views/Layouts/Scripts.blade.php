<script src="{{asset('atlantis/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/moment/moment.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/chart.js/chart.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/chart-circle/circles.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/datatables/datatables.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/gmaps/gmaps.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/dropzone/dropzone.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/jquery.validate/jquery.validate.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/select2/select2.full.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/atlantis.min.js')}}"></script>
<script src="{{asset('atlantis/assets/js/setting-demo.js')}}"></script>
<script src="{{asset('atlantis/assets/js/demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });

        $('#multi-filter-select').DataTable( {
            "pageLength": 5,
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                        column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
                ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>