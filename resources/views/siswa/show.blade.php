@extends('template')

@section('main')
	<div id="siswa">
		<h2> Detail Siswa </h2>

		<table class="table table-stripped">
			<thead>
				<tr>
					<th>Nisn</th>
					<td>{{ $siswa->nisn }}</td>
				</tr>
				<tr>
					<th>Nama</th>
					<td>{{ $siswa->nama_siswa }}</td>
				</tr>
				<tr>
					<th>Kelas</th>
					<td>{{ $siswa->kelas->nama_kelas }}</td>
				</tr>
				<tr>
					<th>Tanggal Lahir</th>
					<td>{{ $siswa->tanggal_lahir }}</td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td>{{ $siswa->jenis_kelamin }}</td>
				</tr>
				<tr>
					<th>Telepon</th>
					<td>{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon : '-' }}</td>
				</tr>
				<tr>
					<th>Hobi</th>
					<td>
						@foreach($siswa->hobi as $item)
							<strong><span>{{ $item->nama_hobi }}</span></strong>,
						@endforeach
					</td>
				</tr>
				<tr>
					<th>
						@if(isset($siswa->foto))
							<img src="{{ asset('fotoupload/'. $siswa->foto)}}"></img>
						@else
							@if($siswa->jenis_kelamin == 'L')
								<img src="{{ asset('fotoupload/dummymale.png')}}"></img>
							@else
								<img src="{{ asset('fotoupload/dummyfemale.png')}}"></img>
							@endif
						@endif
					</th>
				</tr>
			</thead>
		</table>
	</div>
@stop

@section('footer')
	<div id="footer">
		<p>&copy; 2017 laravel.dev app</p>
	</div>
@stop