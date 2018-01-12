<li class="am-comment">
    <img src="{{$comment->user->avatar()}}" alt="" class="am-comment-avatar" width="48" height="48">

    <div class="am-comment-main">
        <header class="am-comment-hd">
            <div class="am-comment-meta">
                <span class="am-comment-author">{{$comment->user->name}}</span>
                {{$comment->created_at->diffForHumans()}}
            </div>
        </header>
        <div class="am-comment-bd"><p>{!! markdown($comment->content) !!}</p></div>
    </div>
</li>