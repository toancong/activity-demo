<?
use Illuminate\Support\Arr;
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
    <title>Bootstrap Twitter Feed</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        /*=======================================
        TWEET FEED STYLES
        ==================================================*/
        .twt-wrapper .panel-body {
            max-height:650px;
            overflow:auto;
        }
        .twt-wrapper .media-list .media img {
            width:64px;
            height:64px;
            border:2px solid #e5e7e8;
        }
        .twt-wrapper .media-list .media {
            border-bottom:1px dashed #efefef;
            margin-bottom:25px;
        }
        </style>
</head>

<body>
    <?php
        $activities = app('activity')->browse([
            'target_id' => '1',
            'type'      => 'feed',
        ], [
            'page' => [
                'size' => 100
            ]
        ]);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Bootstrap Twitter Feed</h2>
                <h6>Crafted by <a href="http://www.designbootstrap.com/">DesignBootstrap.com</a> </h6>
                <br />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
                <!-- TWEET WRAPPER START -->
                <div class="twt-wrapper">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Twitter Feed Example
                        </div>
                        <div class="panel-body">
                            <textarea class="form-control" placeholder="Enter here for tweet..." rows="3"></textarea>
                            <br />
                            <a href="#" class="btn btn-primary btn-sm pull-right">Tweet</a>
                            <div class="clearfix"></div>
                            <hr />
                            <ul class="media-list">
                                @foreach ($activities as $activity)
                                <li class="media">
                                    <a href="#" class="pull-left">
                                        <img src="{{Arr::get($activity, 'actor.avatar_url')}}" alt="" class="img-circle">
                                    </a>
                                    <div class="media-body">
                                        <span class="text-muted pull-right">
                                            <small class="text-muted">{{\Carbon\Carbon::now()->diffForHumans($activity->published)}}</small>
                                        </span>
                                        <strong class="text-success">@ {{Arr::get($activity, 'actor.name')}}</strong>
                                        <p>
                                            {!!Arr::get($activity, 'object.content')!!}
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <span class="text-danger">237K users active</span>
                        </div>
                    </div>
                </div>
                 <!-- TWEET WRAPPER END -->
            </div>
        </div>
    </div>
</body>
</html>
