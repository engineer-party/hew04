<!DOCTYPE html>
<html lang="ja">

<head>
    @yield('admin_head')
</head>

<body>
    <section id="container">
        @yield('admin_header')
            <section id="main-content">
            <section class="wrapper">
        @yield('content')
            </section>
        @yield('admin_footer')
            </section>
        <!-- JavaScript -->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->

    <script src="{{ asset('lib/jquery/jquery.min.js',$is_production) }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js',$is_production) }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js',$is_production) }}"></script>
    <script src="{{ asset('lib/jquery.scrollTo.min.js',$is_production) }}"></script>
    <script src="{{ asset('lib/jquery.nicescroll.js',$is_production) }}" type="text/javascript"></script>
    <script src="{{ asset('lib/jquery.sparkline.js',$is_production) }}"></script>
    <!--common script for all pages-->
    <script src="{{ asset('lib/common-scripts.js',$is_production) }}"></script>
    <script type="text/javascript" src="{{ asset('lib/gritter/js/jquery.gritter.js',$is_production) }}"></script>
    <script type="text/javascript" src="{{ asset('lib/gritter-conf.js',$is_production) }}"></script>
    <!--script for this page-->
    <script src="{{ asset('lib/sparkline-chart.js',$is_production) }}"></script>
    <script src="{{ asset('lib/zabuto_calendar.js',$is_production) }}"></script>

    {{-- <script src="{{ asset('lib/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('lib/flotchart-conf.js') }}"></script> --}}

    <script type="application/javascript">
    $(document).ready(function() {
        $("#date-popover").popover({
        html: true,
        trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
        $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
        action: function() {
            return myDateFunction(this.id, false);
        },
        action_nav: function() {
            return myNavFunction(this.id);
        },
        ajax: {
            url: "show_data.php?action=1",
            modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
            },
            {
            type: "block",
            label: "Regular event",
            }
        ]
        });
    });

    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
    </script>
</body>

</html>