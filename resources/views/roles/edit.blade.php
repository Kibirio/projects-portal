@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Edit Role</h2>
		</div>
		<div class="pull-right">
			<a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
		</div>
	</div>
</div>

@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops</strong>There was some problem with your input. <br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach	
		</ul>
	</div>
@endif

{!! Form::model($user, ['method' => 'PATCH', 'route' => 'roles.update', $role->id]) !!}
<div class="row">
	<div class="col-xs-12" col-sm-12 col-md-12>
		<div class="form-group">
			<strong>Name:</strong>
			{!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) !!}
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Permission:</strong>
            @foreach
                <label>
                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermission) ? true : false, array('class' => 'name')) }}
                    {{ $value->name }}
                </label>
                <br>
            @endforeach
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</div>

{!! Form::close() !!}

<p class="text-center text-primary"><small>copyright 2020 Harryx Software Inc</small></p>

@endsection