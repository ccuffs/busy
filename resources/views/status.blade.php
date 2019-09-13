<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="alternate" type="application/atom+xml" href="/atom" title="Cachet Demo - Atom Feed">
    <link rel="alternate" type="application/rss+xml" href="/rss" title="Cachet Demo - RSS Feed">

    <!-- Mobile friendliness -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="Stay up to date with the latest service updates from Cachet Demo.">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Cachet Demo">
    <meta property="og:image" content="/img/ogimage.png">
    <meta property="og:description" content="Stay up to date with the latest service updates from Cachet Demo.">

    <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
    <meta http-equiv="cleartype" content="on">

    <meta name="msapplication-TileColor" content="#7ED321" />
    <meta name="msapplication-TileImage" content="/img/favicon.png" />

    <link rel="icon" type="image/png" href="/img/favicon.ico">
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">

    <link rel="apple-touch-icon" href="/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-touch-icon-152x152.png">

    <title>Cachet Demo</title>

    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=latin" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body class="status-page ">

    <div class="container">
        <div class="section-messages"></div>

        <div class="section-status">
            <div class="alert alert-success">All systems are operational {{ $name }}</div>
        </div>

        <div class="about-app">
            <h2>About This Site</h2>
            <p>This is the demo instance of <a href="https://cachethq.io?ref=demo">Cachet</a>. The open source status
                page system, for everyone. An <a href="https://alt-three.com">Alt Three</a> product.</p>

        </div>

        <div class="section-components">
            <ul class="list-group components">
                <li class="list-group-item group-name">
                    <i class="ion-ios-minus-outline group-toggle"></i>
                    <strong>Websites</strong> <i class="icon ion-md-heart"></i>

                    <div class="pull-right">
                        <i class="ion ion-ios-circle-filled text-component-1 greens" data-toggle="tooltip"
                            title="Operational"></i>
                    </div>
                </li>

                <div class="group-items ">
                    <li class="list-group-item sub-component">
                        <a href="https://cachethq.io" target="_blank" class="links">Website</a>


                        <div class="pull-right">
                            <small class="text-component-1 greens" data-toggle="tooltip"
                                title="Last updated Thursday 12th September 2019 22:30:01">Operational</small>
                        </div>
                    </li>
                    <li class="list-group-item sub-component">
                        <a href="https://docs.cachethq.io" target="_blank" class="links">Documentation</a>

                        <i class="ion ion-ios-help-outline help-icon" data-toggle="tooltip"
                            data-title="Kindly powered by Readme.io" data-container="body"></i>

                        <div class="pull-right">
                            <small class="text-component-1 greens" data-toggle="tooltip"
                                title="Last updated Thursday 12th September 2019 22:30:01">Operational</small>
                        </div>
                    </li>
                </div>
            </ul>
            <ul class="list-group components">
                <li class="list-group-item group-name">
                    <i class="ion-ios-plus-outline group-toggle"></i>
                    <strong>Alt Three</strong>

                    <div class="pull-right">
                        <i class="ion ion-ios-circle-filled text-component-1 greens" data-toggle="tooltip"
                            title="Operational"></i>
                    </div>
                </li>

                <div class="group-items hide">
                    <li class="list-group-item sub-component">
                        <a href="https://blog.alt-three.com" target="_blank" class="links">Blog</a>

                        <i class="ion ion-ios-help-outline help-icon" data-toggle="tooltip"
                            data-title="The Alt Three Blog." data-container="body"></i>

                        <div class="pull-right">
                            <small class="text-component-1 greens" data-toggle="tooltip"
                                title="Last updated Thursday 12th September 2019 22:30:01">Operational</small>
                        </div>
                    </li>
                    <li class="list-group-item sub-component">
                        <a href="https://styleci.io" target="_blank" class="links">StyleCI</a>

                        <i class="ion ion-ios-help-outline help-icon" data-toggle="tooltip"
                            data-title="The PHP Coding Style Service." data-container="body"></i>

                        <div class="pull-right">
                            <small class="text-component-1 greens" data-toggle="tooltip"
                                title="Last updated Thursday 12th September 2019 22:30:01">Operational</small>
                        </div>
                    </li>
                </div>
            </ul>

            <ul class="list-group components">
                <li class="list-group-item group-name">
                    <strong>Other Components</strong>
                </li>
                <li class="list-group-item component">
                    API

                    <i class="ion ion-ios-help-outline help-icon" data-toggle="tooltip"
                        data-title="Used by third-parties to connect to us" data-container="body"></i>

                    <div class="pull-right">
                        <small class="text-component-1 greens" data-toggle="tooltip"
                            title="Last updated Thursday 12th September 2019 22:30:01">Operational</small>
                    </div>
                </li>
            </ul>
        </div>

        <div class="section-metrics">
            <ul class="list-group">
                <li class="list-group-item metric" data-metric-id="1">
                    <div class="row">
                        <div class="col-xs-10">
                            <strong>
                                Cups of coffee
                                <i class="ion ion-ios-help-outline" data-toggle="tooltip"
                                    data-title="How many cups of coffee we&#039;ve drank."></i>
                            </strong>
                        </div>
                        <div class="col-xs-2">
                            <div class="dropdown pull-right">
                                <a href="javascript: void(0);" class="btn btn-default dropdown-toggle"
                                    data-toggle="dropdown"><span class='filter'>Last 12 Hours</span> <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#" data-filter-type="last_hour">Last Hour</a></li>
                                    <li><a href="#" data-filter-type="today">Last 12 Hours</a></li>
                                    <li><a href="#" data-filter-type="week">Week</a></li>
                                    <li><a href="#" data-filter-type="month">Month</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <canvas id="metric-1" data-metric-name="Cups of coffee" data-metric-suffix="Cups"
                                data-metric-id="1" data-metric-group="today" data-metric-precision="2" height="160"
                                width="600"></canvas>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="section-timeline">
            <h1>Past Incidents</h1>
            <h4>12th September 2019</h4>
            <div class="timeline">
                <div class="content-wrapper">
                    <div class="moment first">
                        <div class="row event clearfix">
                            <div class="col-sm-1">
                                <div class="status-icon status-4" data-toggle="tooltip" title="Fixed"
                                    data-placement="left">
                                    <i class="icon ion-checkmark greens"></i>
                                </div>
                            </div>
                            <div class="col-xs-10 col-xs-offset-2 col-sm-11 col-sm-offset-0">
                                <div class="panel panel-message incident">
                                    <div class="panel-heading">
                                        <strong>Cachet supports Markdown!</strong>
                                        <br>
                                        <small class="date">
                                            <a href="https://demo.cachethq.io/incident/1" class="links"><abbr
                                                    class="timeago" data-toggle="tooltip" data-placement="right"
                                                    title="Thursday 12th September 2019 22:30:01"
                                                    data-timeago="2019-09-12T22:30:01+01:00"></abbr></a>
                                        </small>
                                    </div>
                                    <div class="panel-body markdown-body">
                                        <h1>Of course it does!</h1>
                                        <p>What kind of web application doesn't these days?</p>
                                        <h2>Headers are fun aren't they</h2>
                                        <p>It's <em>exactly</em> why we need Markdown. For <strong>emphasis</strong> and
                                            such.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="moment ">
                        <div class="row event clearfix">
                            <div class="col-sm-1">
                                <div class="status-icon status-4" data-toggle="tooltip" title="Fixed"
                                    data-placement="left">
                                    <i class="icon ion-checkmark greens"></i>
                                </div>
                            </div>
                            <div class="col-xs-10 col-xs-offset-2 col-sm-11 col-sm-offset-0">
                                <div class="panel panel-message incident">
                                    <div class="panel-heading">
                                        <strong>Awesome</strong>
                                        <br>
                                        <small class="date">
                                            <a href="https://demo.cachethq.io/incident/2" class="links"><abbr
                                                    class="timeago" data-toggle="tooltip" data-placement="right"
                                                    title="Thursday 12th September 2019 22:30:01"
                                                    data-timeago="2019-09-12T22:30:01+01:00"></abbr></a>
                                        </small>
                                    </div>
                                    <div class="panel-body markdown-body">
                                        <p>:+1: We totally nailed the fix.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="moment ">
                        <div class="row event clearfix">
                            <div class="col-sm-1">
                                <div class="status-icon status-3" data-toggle="tooltip" title="Watching"
                                    data-placement="left">
                                    <i class="icon ion-eye blues"></i>
                                </div>
                            </div>
                            <div class="col-xs-10 col-xs-offset-2 col-sm-11 col-sm-offset-0">
                                <div class="panel panel-message incident">
                                    <div class="panel-heading">
                                        <strong>Monitoring the fix</strong>
                                        <br>
                                        <small class="date">
                                            <a href="https://demo.cachethq.io/incident/3" class="links"><abbr
                                                    class="timeago" data-toggle="tooltip" data-placement="right"
                                                    title="Thursday 12th September 2019 22:30:01"
                                                    data-timeago="2019-09-12T22:30:01+01:00"></abbr></a>
                                        </small>
                                    </div>
                                    <div class="panel-body markdown-body">
                                        <p>:ship: We've deployed a fix.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="moment ">
                        <div class="row event clearfix">
                            <div class="col-sm-1">
                                <div class="status-icon status-2" data-toggle="tooltip" title="Identified"
                                    data-placement="left">
                                    <i class="icon ion-alert yellows"></i>
                                </div>
                            </div>
                            <div class="col-xs-10 col-xs-offset-2 col-sm-11 col-sm-offset-0">
                                <div class="panel panel-message incident">
                                    <div class="panel-heading">
                                        <strong>Update</strong>
                                        <br>
                                        <small class="date">
                                            <a href="https://demo.cachethq.io/incident/4" class="links"><abbr
                                                    class="timeago" data-toggle="tooltip" data-placement="right"
                                                    title="Thursday 12th September 2019 22:30:01"
                                                    data-timeago="2019-09-12T22:30:01+01:00"></abbr></a>
                                        </small>
                                    </div>
                                    <div class="panel-body markdown-body">
                                        <p>We've identified the problem. Our engineers are currently looking at it.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="moment ">
                        <div class="row event clearfix">
                            <div class="col-sm-1">
                                <div class="status-icon status-1" data-toggle="tooltip" title="Investigating"
                                    data-placement="left">
                                    <i class="icon ion-flag oranges"></i>
                                </div>
                            </div>
                            <div class="col-xs-10 col-xs-offset-2 col-sm-11 col-sm-offset-0">
                                <div class="panel panel-message incident">
                                    <div class="panel-heading">
                                        <strong>Test Incident</strong>
                                        <br>
                                        <small class="date">
                                            <a href="https://demo.cachethq.io/incident/5" class="links"><abbr
                                                    class="timeago" data-toggle="tooltip" data-placement="right"
                                                    title="Thursday 12th September 2019 22:30:01"
                                                    data-timeago="2019-09-12T22:30:01+01:00"></abbr></a>
                                        </small>
                                    </div>
                                    <div class="panel-body markdown-body">
                                        <p>Something went wrong, with something or another.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="moment ">
                        <div class="row event clearfix">
                            <div class="col-sm-1">
                                <div class="status-icon status-1" data-toggle="tooltip" title="Investigating"
                                    data-placement="left">
                                    <i class="icon ion-flag oranges"></i>
                                </div>
                            </div>
                            <div class="col-xs-10 col-xs-offset-2 col-sm-11 col-sm-offset-0">
                                <div class="panel panel-message incident">
                                    <div class="panel-heading">
                                        <span class="label label-default">API</span>
                                        <strong>Investigating the API</strong>
                                        <br>
                                        <small class="date">
                                            <a href="https://demo.cachethq.io/incident/6" class="links"><abbr
                                                    class="timeago" data-toggle="tooltip" data-placement="right"
                                                    title="Thursday 12th September 2019 22:30:01"
                                                    data-timeago="2019-09-12T22:30:01+01:00"></abbr></a>
                                        </small>
                                    </div>
                                    <div class="panel-body markdown-body">
                                        <p>:zap: We've seen high response times from our API. It looks to be fixing
                                            itself as time goes on.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4>11th September 2019</h4>
            <div class="timeline">
                <div class="content-wrapper">
                    <div class="panel panel-message incident">
                        <div class="panel-body">
                            <p>No incidents reported</p>
                        </div>
                    </div>
                </div>
            </div>
            <h4>10th September 2019</h4>
            <div class="timeline">
                <div class="content-wrapper">
                    <div class="panel panel-message incident">
                        <div class="panel-body">
                            <p>No incidents reported</p>
                        </div>
                    </div>
                </div>
            </div>
            <h4>9th September 2019</h4>
            <div class="timeline">
                <div class="content-wrapper">
                    <div class="panel panel-message incident">
                        <div class="panel-body">
                            <p>No incidents reported</p>
                        </div>
                    </div>
                </div>
            </div>
            <h4>8th September 2019</h4>
            <div class="timeline">
                <div class="content-wrapper">
                    <div class="panel panel-message incident">
                        <div class="panel-body">
                            <p>No incidents reported</p>
                        </div>
                    </div>
                </div>
            </div>
            <h4>7th September 2019</h4>
            <div class="timeline">
                <div class="content-wrapper">
                    <div class="panel panel-message incident">
                        <div class="panel-body">
                            <p>No incidents reported</p>
                        </div>
                    </div>
                </div>
            </div>
            <h4>6th September 2019</h4>
            <div class="timeline">
                <div class="content-wrapper">
                    <div class="panel panel-message incident">
                        <div class="panel-body">
                            <p>No incidents reported</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav>
            <ul class="pager">
            </ul>
        </nav>

    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <p>Powered by <a href="https://cachethq.io" class="links">Cachet</a>.</p>
                </div>
                <div class="col-sm-7">
                    <ul class="list-inline">
                        <li>
                            <a class="btn btn-link" href="/dashboard">Dashboard</a>
                        </li>
                        <li>
                            <a class="btn btn-link" href="https://demo.cachethq.io/rss">RSS</a>
                        </li>
                        <li>
                            <a class="btn btn-link" href="https://demo.cachethq.io/atom">Atom</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>