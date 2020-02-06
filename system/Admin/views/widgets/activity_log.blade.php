<div class="card" id="showStatistic">
    <div class="card-header bg-dark header-elements-inline">
        <h6 class="card-title"><strong>THỐNG KÊ TRUY CẬP</strong></h6>
    </div>
    <div class="card-body"></div>
</div>
<script>
    $(document).ready(()=>{
        loading($('#showStatistic'));
        $('#showStatistic .card-body').load("{{ route('cms.admin.ajaxLoadStatistic') }}", () => {
            $('#showStatistic').unblock();
            var e = $("div[data-stats]").data("stats"),
                n = $("div[data-lang-pageviews]").data("lang-pageviews"),
                a = $("div[data-lang-visits]").data("lang-visits"),
                r = [];

            $.each(e, function(e, t) {
                r.push({
                    axis: t.axis,
                    visitors: t.visitors,
                    pageViews: t.pageViews
                })
            }), new Morris.Area({
                element: "stats-chart",
                resize: !0,
                data: r,
                xkey: "axis",
                ykeys: ["visitors", "pageViews"],
                labels: [a, n],
                lineColors: ["#DD4D37", "#3c8dbc"],
                hideHover: "auto",
                parseTime: !1
            });
        });
    });
</script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/admin/css/morris.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/jquery-jvectormap-1.2.2.css') }}">
<script src="{{ asset('assets/admin/js/morris.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/jquery-jvectormap-world-mill-en.js') }}"></script>
