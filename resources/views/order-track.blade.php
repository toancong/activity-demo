<?
use Illuminate\Support\Arr;
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order feed</title>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <style>
        .activity-feed {
            padding: 15px;
        }

        .activity-feed .feed-item {
            position: relative;
            padding-bottom: 20px;
            padding-left: 30px;
            border-left: 2px solid #e4e8eb;
        }

        .activity-feed .feed-item:last-child {
            border-color: transparent;
        }

        .activity-feed .feed-item:after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: -6px;
            width: 10px;
            height: 10px;
            border-radius: 6px;
            background: #fff;
            border: 1px solid green;
        }

        .activity-feed .feed-item .date {
            position: relative;
            top: -5px;
            color: #8c96a3;
            text-transform: uppercase;
            font-size: 13px;
        }

        .activity-feed .feed-item.done:after {
            background: green;
            border: 1px solid green;
        }

        .activity-feed .feed-item .text {
            position: relative;
            top: -3px;
        }

    </style>
</head>

<body>
<?php
    $activities = app('activity')->browse([
        'target_id' => '1',
        'object_id' => '1',
        'type'      => 'order_track',
    ], [
        'page' => [
            'size' => 100
        ]
    ]);
?>
    <h2>Thông tin đơn hàng</h2>
    <div class="activity-feed">
        @foreach ($activities as $activity)
        <div class="feed-item">
            <div class="date">{{$activity->published}}</div>
            <div class="text">
                {!!substitute($activity->summary, [
                'meta.ma_van_don' => '<a href="#">'.Arr::get($activity, 'meta.ma_van_don').'</a>',
                'meta.seller.name' => '<a href="#">'.Arr::get($activity, 'meta.seller.name').'</a>',
                'object.code' => '<a href="#">'.Arr::get($activity, 'object.code').'</a>',
                ])!!}
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>
