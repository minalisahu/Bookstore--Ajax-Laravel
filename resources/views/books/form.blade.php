<div class="form-group row">
    <label for="title"
        class="col-4 control-label required-label {{ $errors->has('title') ? 'has-error' : '' }}">{{__('Title')}}</label>
    <div class="col-8">
        <input class="form-control title-input" name="title" type="text" id="title"
            value="{{ old('title', optional($book)->title) }}" minlength="1" maxlength="255"
            placeholder="{{__('Enter title here...')}}">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row">
    <label for="author"
        class="col-4 control-label required-label {{ $errors->has('author') ? 'has-error' : '' }}">{{__('Author')}}</label>
    <div class="col-8">
        <input class="form-control title-input" name="author" type="text" id="author"
            value="{{ old('author', optional($book)->author) }}" minlength="1" maxlength="255"
            placeholder="{{__('Enter author here...')}}">
        {!! $errors->first('author', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row">
    <label for="genre"
        class="col-4 control-label required-label {{ $errors->has('genre') ? 'has-error' : '' }}">{{__('Genres')}}</label>
    <div class="col-8">
        <input class="form-control title-input" name="genre" type="text" id="title"
            value="{{ old('genre', optional($book)->genre) }}" minlength="1" maxlength="255"
            placeholder="{{__('Enter genre here...')}}">
        {!! $errors->first('genre', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row">
    <label for="isbn"
        class="col-4 control-label required-label {{ $errors->has('isbn') ? 'has-error' : '' }}">{{__('ISBN number')}}</label>
    <div class="col-8">
        <input class="form-control title-input" name="isbn" type="text" id="isbn"
            value="{{ old('isbn', optional($book)->isbn) }}" minlength="1" maxlength="255"
            placeholder="{{__('Enter isbn here...')}}">
        {!! $errors->first('isbn', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row">
    <label for="description"
        class="col-4 control-label  required-label {{ $errors->has('description') ? 'has-error' : '' }}">{{__('Description')}}</label>
    <div class="col-8">
        <textarea class="form-control" name="description" rows="6" type="text" id="description"
            placeholder="{{__('Enter description here...')}}">{{ old('description', optional($book)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row">
    <label for="published" class="col-4 control-label required-label {{ $errors->has('published') ? 'has-error' : '' }}">{{__('Published')}}</label>
    <div class="col-8">
    <input class="form-control datepicker  " name="published" type="text" value="{{old('published', optional($book)->publishededit)}}"   placeholder="__/__/____ __:__" autocomplete="off">
        {!! $errors->first('published', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group row">
    <label for="publisher"
        class="col-4 control-label required-label {{ $errors->has('publisher') ? 'has-error' : '' }}">{{__('Publisher')}}</label>
    <div class="col-8">
        <input class="form-control title-input" name="publisher" type="text" id="publisher"
            value="{{ old('publisher', optional($book)->publisher) }}" minlength="1" maxlength="255"
            placeholder="{{__('Enter publisher here...')}}">
        {!! $errors->first('publisher', '<p class="help-block">:message</p>') !!}
    </div>
</div>