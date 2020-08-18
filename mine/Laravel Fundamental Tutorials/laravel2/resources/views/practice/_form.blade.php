{{-- Form input fields:::::: Form::type('name', 'value', ['attributes' => 'attributes value']) --}}
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' =>'form-control', 'placeholder' => 'Article Title']) !!}
    </div><br><br>

    <div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' =>'form-control', 'placeholder' => 'Article Content']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('published_at', 'Publish On:') !!}
    {!! Form::date('published_at', $article->published_at, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tags_list', 'Tags:') !!}
        {!! Form::select('tags_list[]', $tags, $article->tags, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
    </div>

    {{-- Form input fields:::::: Form::submit('value', ['attributes' => 'attributes value']) --}}
    <div class="form-group">
    {!! Form::submit($buttontext, ['class' =>'btn btn-primary form-control']) !!}
    </div>

    @section('footer_script')
<script>
$('#tag_list').select2(
    {placeholder: 'Choose the Tags for Article'
    }
);
</script>
    @stop
