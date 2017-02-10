		@if(isset($siswa))
		{!! Form::hidden('id', $siswa->id) !!}
		@endif
		@if($errors->any())
			<div class="form-group {{ $errors->has('nisn') ? 'has-error' : 'has-success' }}"
		@else
			<div class="form-group">
		@endif
			{!! Form::label('nisn', 'NISN : ', ['class'=>'control-label'])!!}
			{!! Form::text('nisn', null, ['class'=>'form-control']) !!}
			@if($errors->has('nisn'))
				<span class="help-block">{{ $errors->first('nisn') }}</span>
			@endif
		</div>
		{{--
			<div class="form-group">
				<label for="nisn" class="control-label">NISN</label>
				<input type="text" name="nisn" id="nisn" class="form-control">
			</div>
		--}}
		@if($errors->any())
			<div class="form-group {{ $errors->has('nama_siswa') ? 'has-error' : 'has-success'}}">
		@else
			<div class="form-group">
		@endif
			{!! Form::label('nama_siswa', 'Nama Siswa : ', ['class'=>'control-label'])!!}
			{!! Form::text('nama_siswa', null, ['class'=>'form-control']) !!}
			@if($errors->has('nama_siswa'))
				<span class="help-block">{{ $errors->first('nama_siswa') }}</span>
			@endif
		</div>
		{{-- 
			<div class="form-group">
				<label for="nama_siswa" class="control-label">Nama Siswa</label>
				<input type="text" name="nama_siswa" id="nama_siswa" class="form-control">
			</div>
		--}}
		@if($errors->any())
			<div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : 'has-success' }}">
		@else
			<div class="form-group">
		@endif
		{{-- 
			<label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
			<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"> --}}
			{!! Form::label('tanngal_lahir', 'Tanggal Lahir ', ['class'=>'control-label']) !!}
			{!! Form::date('tanggal_lahir', null, ['class'=>'form-control']) !!}
			@if($errors->has('tanggal_lahir'))
				<span class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
			@endif
		</div>
		@if($errors->any())
			<div class="form-group {{ $errors->has('id_kelas') ? 'has-error' : 'has-success'}}">
		@else
			<div class="form-group">
		@endif
			{!! Form::label('id_kelas', 'Kelas : ', ['class'=>'control-label'])!!}
			@if(count($list_kelas) > 0)
				{!! Form::select('id_kelas', $list_kelas, null,[
					'class'=>'form-control' , 'id' => 'id_kelas', 'placeholder' => 'Pilih Kelas'
					]) !!}
			@else
				<p>Tidak Ada kelas buat dahulu...</p>
			@endif
			@if($errors->has('id_kelas'))
				<span class="help-block">{{ $errors->first('id_kelas') }}</span>
			@endif
		</div>

		@if($errors->any())
			<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : 'has-success' }}">
		@else
			<div class="form-group">
		@endif
			{!! Form::label('jenis_kelamin','Jenis Kelamin ',['class'=>'control-label']) !!}
			{{-- 	<label for="jenis_kelamin" class="control-label">Jenis Kelamin : </label>--}}
				<div class="radio">
				
					{{-- <label><input type="radio" name="jenis_kelamin" value="L" id="jenis_kelamin">Laki-laki</label>--}}
					<label>{!! Form::radio('jenis_kelamin', 'L') !!} Laki-laki</label>
				</div>
				<div class="radio">
					{{-- <label><input type="radio" name="jenis_kelamin" value="P" id="jenis_kelamin">Perempuan</label> --}}
					<label>{!! Form::radio('jenis_kelamin', 'P') !!} Perempuan</label>
				</div>
				@if($errors->has('jenis_kelamin'))
					<span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
				@endif
			</div>
		@if($errors->any())
			<div class="form-group {{ $errors->has('nomor_telepon') ? 'has-error' : 'has-success' }}">
		@else
			<div class="form-group">
		@endif
			{!! Form::label('nomor_telepon', 'Telepon : ', ['class'=>'control-label'])!!}
			{!! Form::text('nomor_telepon', null, ['class'=>'form-control']) !!}
			@if($errors->has('nomor_telepon'))
				<span class="help-block">{{ $errors->first('nomor_telepon') }}</span>
			@endif
		</div>

		@if($errors->any())
			<div class="form-group {{ $errors->has('hobi') ? 'has-error' : 'has-success' }}">
		@else
			<div class="form-group">
		@endif
			{!! Form::label('hobi', 'Hobi : ', ['class'=>'control-label'])!!}
			@if(count($list_hobi) > 0)
				@foreach($list_hobi as $key => $value)
					<div class="check-box">
						<label>{!! Form::checkbox('hobi[]', $key, null) !!} {{ $value }}</lable>
					</div>
				@endforeach
			@else
				<p>Tidak Ada pilihan hobi, buat dulu...</p>
			@endif
			</div>

			@if($errors->any())
				<div class="form-gruop {{ $errors->has('foto') ? 'has-error' : 'has-success'}}">
			@else
				<div class="form-group">
			@endif

				{!! Form::label('foto', 'Foto : ') !!}
				{!! Form::file('foto') !!}

				@if($errors->has('foto'))
					<span class="help-block">{{ $errors->first('foto') }}</span>
				@endif
			</div>
			<div class="form-group">
			{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
				{{-- <input type="submit" class="btn btn-primary form-control" value="Tambah Siswa">--}}
			</div>