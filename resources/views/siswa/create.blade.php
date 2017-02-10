@extends('template')

@section('main')
	{{-- expr  

	<div id="siswa">
		<h2>Edit Siswa</h2>
		{!! Form::model($siswa, ['method' => 'PATCH', 'action' => ['SiswaController@update', $siswa->id]] ) !!}
		{{-- <form action="{{ url('siswa') }}" method="POST">--}}
		{{-- 
		<div class="form-group">
			{!! Form::label('nisn', 'NISN : ', ['class'=>'control-label'])!!}
			{!! Form::text('nisn', null, ['class'=>'form-control']) !!}
		</div>
		--}}
		{{--
			<div class="form-group">
				<label for="nisn" class="control-label">NISN</label>
				<input type="text" name="nisn" id="nisn" class="form-control">
			</div>
		--}}
		{{-- 
		<div class="form-group">
			{!! Form::label('nama_siswa', 'Nama Siswa : ', ['class'=>'control-label'])!!}
			{!! Form::text('nama_siswa', null, ['class'=>'form-control']) !!}
		</div>
		--}}
		{{-- 
			<div class="form-group">
				<label for="nama_siswa" class="control-label">Nama Siswa</label>
				<input type="text" name="nama_siswa" id="nama_siswa" class="form-control">
			</div>
		--}}
		{{-- 
		<div class="form-group">
		--}}
		{{-- 
			<label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
			<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"> --}}
			{{-- 
			{!! Form::label('tanngal_lahir', 'Tanggal Lahir ', ['class'=>'control-label']) !!}
			{!! Form::date('tanggal_lahir', null, ['class'=>'form-control']) !!}
		</div>
			<div class="form-group">
			--}}
			{{-- 
			{!! Form::label('jenis_kelamin','Jenis Kelamin ',['class'=>'control-label']) !!}
			--}}
			{{-- 	<label for="jenis_kelamin" class="control-label">Jenis Kelamin : </label>--}}
				{{-- 
				<div class="radio">
				--}}
					{{-- <label><input type="radio" name="jenis_kelamin" value="L" id="jenis_kelamin">Laki-laki</label>--}}
					{{-- 
					<label>{!! Form::radio('jenis_kelamin', 'L') !!} Laki-laki</label>
				</div>
				<div class="radio">
				--}}
					{{-- <label><input type="radio" name="jenis_kelamin" value="P" id="jenis_kelamin">Perempuan</label> --}}
					{{--<label>{!! Form::radio('jenis_kelamin', 'P') !!} Perempuan</label>
				</div>
			</div>
			<div class="form-group">
			--}}
			{{--{!! Form::submit('Upddate Siswa', ['class'=>'btn btn-primary form-control']) !!} --}}
				{{-- <input type="submit" class="btn btn-primary form-control" value="Tambah Siswa">--}}
			{{--</div>--}}
		{{-- </form> --}}
		{{--{!! Form::close() !!}--}}
	{{--</div>--}}

	<div id="siswa">
		<h2>Tambah Siswa</h2>
		{{--@include('errors.form_error_list')--}}
		{!! Form::open(['url' => 'siswa', 'files' => true]) !!}
		@include('siswa.form', ['submitButtonText' => 'Tambah Siswa'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	<div id="footer">
		<p>&copy; 2017 laravel.dev app</p>
	</div>
@stop