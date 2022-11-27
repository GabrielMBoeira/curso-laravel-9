@csrf
<textarea name="body" id="body" cols="30" rows="10">{{ $comment->body ?? old('body') }}</textarea>
<label for="visible">
    <input type="checkbox" name="visible" id="visible"
    @if (isset($comment) && $comment->visible)
        checked="checked"
    @endif
    >
    Visivel?
</label>
<button type="submit">Enviar</button>
