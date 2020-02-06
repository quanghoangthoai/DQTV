<div class="row">
    <div class="col-lg-12">
        <div class="chart" id="stats-chart"></div>
    </div>

    <div class="clearfix"></div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="fa fa-eye fa-3x text-warning-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">{{ $total['ga:sessions'] }}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Phiên</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="fa fa-users fa-3x text-primary-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">{{ $total['ga:users'] }}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Người truy cập</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="fa fa-traffic-light fa-3x text-teal-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">{{ $total['ga:pageviews'] }}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Lượt xem</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="fa fa-user-times fa-3x text-danger-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">{{ round($total['ga:bounceRate'], 2) }}%</h3>
                    <span class="text-uppercase font-size-sm text-muted">Tỉ lệ thoát</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="fas fa-chart-pie fa-3x text-yellow-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">{{ round($total['ga:percentNewSessions'], 2) }}%</h3>
                    <span class="text-uppercase font-size-sm text-muted">Tỉ lệ khách mới</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="fas fa-signal fa-3x text-purple-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">{{ round($total['ga:pageviewsPerVisit'], 2) }}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Trang/Phiên</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="fa fa-clock fa-3x text-warning-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">{{ gmdate('H:i:s', $total['ga:avgSessionDuration']) }}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Trung bình</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card card-body">
            <div class="media">
                <div class="mr-3 align-self-center">
                    <i class="fa fa-user-plus fa-3x text-success-400"></i>
                </div>

                <div class="media-body text-right">
                    <h3 class="font-weight-semibold mb-0">{{ $total['ga:newUsers'] }}</h3>
                    <span class="text-uppercase font-size-sm text-muted">Lượt khách mới</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div data-stats='{{ json_encode($stats, JSON_HEX_APOS) }}'></div>
<div data-country-stats='{{ json_encode($country_stats, JSON_HEX_APOS) }}'></div>
<div data-lang-pageviews='Xem trang'></div>
<div data-lang-visits='Khách truy cập'></div>
