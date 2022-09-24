{{ Form::textarea('body',null, ['id' => 'comment', 'class' => 'form-control', 'rows' => '10']) }}<br>
{{ Form::hidden('post_id', $post->id) }}
{{ Form::file('image') }}<br>

