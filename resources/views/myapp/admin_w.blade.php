<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="{{ URL::asset('/layui/css/layui.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/fontawesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/index.css?v=44ecccd3') }}">
    </head>
    <body style="overflow-x: hidden">
    <div id="content-color" style="min-width: 800px;margin-top: 0;min-height: 480px;">
        <div id="content" style="max-width: 800px">

            {{--<div class="middle" >--}}


                <div class="article">
                    <div class="article-head">
                        <a href=""><img src="{{ URL::asset('/image/upload/'.$v->user->image['name']) }}"></a>
                        <div class="article-head-name">
                            <li>{{ $v->user['name'] }}</li>
                            <li>{{ date('Y-m-d H:i:s', $v['time']) }}</li>
                        </div>
                    </div>

                    <div class="article-content">
                        <span>
                           {{ $v['content'] }}
                        </span>
                        <div class="article-content-image">
                            {{--一张图片--}}
                            {{--@if (count($v->image) == 1)--}}
                            {{--<img src="{{ URL::asset('/image/upload/' . $v->image[0]['name']) }}" width="500" height="500">--}}
                            {{--二张图片--}}
                            {{--@elseif (count($v->image) == 2)--}}
                            {{--@foreach($v->image as $image)--}}
                            {{--<img src="{{ URL::asset('/image/upload/' . $image['name']) }}" width="340" height="340">--}}
                            {{--@endforeach--}}
                            {{--三张图片--}}
                            {{--@elseif (count($v->image) > 2)--}}
                            @foreach($v->image as $image)
                                @if($image['name'])
                                    <img src="{{ URL::asset('/image/upload/' . $image['name']) }}" width="225" height="226">
                                @endif
                            @endforeach
                            {{--@endif--}}
                        </div>
                    </div>

                    <div class="article-footer">
                        <div class="article-action">
                            <ul>
                                <li><span><i class="icon-comment-alt"></i>&nbsp;评论</span></li>

                                @if($v['iszandq'] == 1)
                                    <li><span id="tttz{{$v['id']}}"><i style="color:red" class="glyphicon glyphicon-thumbs-up"></i>&nbsp;取消赞</span></li>
                                @else
                                    <li><span id="tttz{{$v['id']}}" ><i class="glyphicon glyphicon-thumbs-up"></i> 赞</span></li>
                                @endif


                                <li><span><i class="icon-share"></i>&nbsp;转发</span></li>
                            </ul>
                        </div>
                        <div class="article-zan-icon imagezan{{$v['id']}}">
                            <a class="zan-icon"><i class="glyphicon glyphicon-thumbs-up"></i></a>
                            @foreach($v->wzan as $zan)
                                @if($zan['state'] == 0)
                                    <a id="imgzan{{$zan->user['id']}}" href="/home/show/{{$zan->user['id']}}">
                                        <img src="{{ URL::asset('/image/upload/'.$zan->user->image['name']) }}">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div class="comment comment{{$v['id']}}">
                            @foreach($v->comment as $comment)
                                @if($comment['parent'] == 0)
                                    <div class="comment-item">
                                        <a href=""><img src="{{ URL::asset('/image/upload/' . $comment->user->image['name']) }}"></a>
                                        <div class="comment-content">
                                            <ul>
                                                <li>{{ $comment->user['name'] }} &nbsp;{{ date('Y-m-d H:i', $comment['time']) }}</li>
                                                <li>{{ $comment['comment'] }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <div class="comment-item">
                                        <a href=""><img src="{{ URL::asset('/image/upload/' . $comment->user->image['name']) }}"></a>
                                        <div class="comment-content">
                                            <ul>
                                                <li>{{ $comment->user['name'] }} 回复 {{ $comment->recom->user['name'] }}&nbsp;{{ date('Y-m-d H:i', $comment['time']) }}</li>
                                                <li>{{ $comment['comment'] }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        {{--</div>--}}
    </div>
    </body>
    <script src="{{ URL::asset('/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/layui/layui.js') }}"></script>
    <script src="{{ URL::asset('/js/index.js?v=5cm1') }}"></script>

</html>



