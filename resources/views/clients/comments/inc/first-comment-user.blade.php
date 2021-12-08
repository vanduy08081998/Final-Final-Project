@foreach ($commentAll as $key => $comment)

    @if ($comment->comment_id_user == $idUser)

        @include('clients.comments.inc.comment-body', ['comment' => $comment])

    @endif

@endforeach

@foreach ($commentAll as $key => $comment)

    @if ($comment->comment_id_user != $idUser)

        @include('clients.comments.inc.comment-body', ['comment' => $comment])

    @endif

@endforeach
