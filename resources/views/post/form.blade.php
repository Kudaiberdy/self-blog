{{ Form::label('title', 'Title') }}
{{ Form::text('title') }}<br>
{{ Form::label('content', 'Content') }}
{{ Form::textarea('content') }}<br>
{{ Form::label('category_id', 'Category')}}
{{ Form::select('category_id', $postsCategories) }}<br>
