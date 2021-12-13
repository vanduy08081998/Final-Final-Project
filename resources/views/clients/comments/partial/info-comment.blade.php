<div class="commentask {{ $line ?? '' }} {{ $className ?? '' }} load-show-{{ $id ?? '' }}">
    @if ($value->user->position == 'admin')
        {{-- Bên admin --}}
        @include('clients.comments.partial.admin-info-comment')
    @else
        {{-- Bên người dùng --}}
        @include('clients.comments.partial.user-info-comment')
    @endif
</div>

@include('clients.comments.partial.reply-comment-form', ['form' => $form, 'class' => $class, 'parent_id' =>
$parent_id, 'reply_id' => $value->id])
