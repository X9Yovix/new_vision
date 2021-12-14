<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">
    var plugin_path = '{{ asset('assets/js') }}/'; >
</script>


<script src="{{ URL::asset('assets/js/bootstrap-datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

    $('.child-1').mouseover(function() {
        $('.child-2 .transbox').css({
            'background-color': 'rgba(0, 0, 0, 0.8)'
        });
        $('.child-2 .btn-to-login').css({
            'box-shadow': 'none',
            'opacity': '0.5'
        });
        $('.child-2 .header_item').css({
            'opacity': '0.5'
        });

        $('.child-3 .transbox').css({
            'background-color': 'rgba(0, 0, 0, 0.8)'
        });
        $('.child-3 .btn-to-login').css({
            'box-shadow': 'none',
            'opacity': '0.5'
        });
        $('.child-3 .header_item').css({
            'opacity': '0.5'
        });

    });

    $('.child-2').mouseover(function() {
        $('.child-1 .transbox').css({
            'background-color': 'rgba(0, 0, 0, 0.8)'
        });
        $('.child-1 .btn-to-login').css({
            'box-shadow': 'none',
            'opacity': '0.5'
        });
        $('.child-1 .header_item').css({
            'opacity': '0.5'
        });

        $('.child-3 .transbox').css({
            'background-color': 'rgba(0, 0, 0, 0.8)'
        });
        $('.child-3 .btn-to-login').css({
            'box-shadow': 'none',
            'opacity': '0.5'
        });
        $('.child-3 .header_item').css({
            'opacity': '0.5'
        });

    });

    $('.child-3').mouseover(function() {
        $('.child-1 .transbox').css({
            'background-color': 'rgba(0, 0, 0, 0.8)'
        });
        $('.child-1 .btn-to-login').css({
            'box-shadow': 'none',
            'opacity': '0.5'
        });
        $('.child-1 .header_item').css({
            'opacity': '0.5'
        });

        $('.child-2 .transbox').css({
            'background-color': 'rgba(0, 0, 0, 0.8)'
        });
        $('.child-2 .btn-to-login').css({
            'box-shadow': 'none',
            'opacity': '0.5'
        });
        $('.child-2 .header_item').css({
            'opacity': '0.5'
        });

    });

    $('.child-1').mouseout(function() {
        $('.child-2 .transbox').css({
            'background-color': 'rgba(0, 0, 0, 0.5)'
        });
        $('.child-2 .btn-to-login').css({
            'box-shadow': '0 0 20px #eee',
            'opacity': '1'
        });
        $('.child-2 .header_item').css({
            'opacity': '1'
        });

        $('.child-3 .transbox').css({
            'background-color': 'rgba(0, 0, 0, 0.5)'
        });
        $('.child-3 .btn-to-login').css({
            'box-shadow': '0 0 20px #eee',
            'opacity': '1'
        });
        $('.child-3 .header_item').css({
            'opacity': '1'
        });
    });

    $('.child-2').mouseout(function() {
        $('.child-1 .transbox').css({
            'background-color': 'rgba(0, 0, 0, 0.5)'
        });
        $('.child-1 .btn-to-login').css({
            'box-shadow': '0 0 20px #eee',
            'opacity': '1'
        });
        $('.child-1 .header_item').css({
            'opacity': '1'
        });

        $('.child-3 .transbox').css({
            'background-color': 'rgba(0, 0, 0, 0.5)'
        });
        $('.child-3 .btn-to-login').css({
            'box-shadow': '0 0 20px #eee',
            'opacity': '1'
        });
        $('.child-3 .header_item').css({
            'opacity': '1'
        });
    });

    $('.child-3').mouseout(function() {
        $('.child-1 .transbox').css({
            'background-color': 'rgba(0, 0, 0, 0.5)'
        });
        $('.child-1 .btn-to-login').css({
            'box-shadow': '0 0 20px #eee',
            'opacity': '1'
        });
        $('.child-1 .header_item').css({
            'opacity': '1'
        });

        $('.child-2 .transbox').css({
            'background-color': 'rgba(0, 0, 0, 0.5)'
        });
        $('.child-2 .btn-to-login').css({
            'box-shadow': '0 0 20px #eee',
            'opacity': '1'
        });
        $('.child-2 .header_item').css({
            'opacity': '1'
        });
    });
</script>
