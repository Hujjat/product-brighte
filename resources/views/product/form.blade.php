    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name', 'Product Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>

    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
        {!! Form::label('price', 'Product Price') !!}
        {!! Form::number('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('price') }}</small>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        {!! Form::label('description', 'Product Description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('description') }}</small>
    </div>

    <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
        <p>{!! Form::label('picture', 'Product Image') !!}</p>
        {!! Form::file('picture') !!}
        <small class="text-danger">{{ $errors->first('picture') }}</small>
    </div>
