@extends('template')

@section('main')
	<div id="siswa">
		<h2>Siswa</h2>
		@include('_partial.flash_message')
		@include('siswa.form_pencarian')
		@if (count($siswa_list) > 0)
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nisn</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>Tgl Lahir</th>
						<th>Jenis kelamin</th>
						<th>Telepon</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($siswa_list as $siswa): ?>
					<tr>
						<td>{{ $siswa->nisn }}</td>
						<td>{{ $siswa->nama_siswa }}</td>
						<td>{{ $siswa->kelas->nama_kelas }}</td>
						<td>{{ $siswa->tanngal_lahir }}</td>
						<td>{{ $siswa->jenis_kelamin }}</td>
						<td>{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon : '-'}}</td>
						<td>
							<div class="box-button">
								{{ link_to('siswa/' . $siswa->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
						</td>
						<td>
							<div class="box-button">
								{{ link_to('siswa/'. $siswa->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
						</td>
						<td>
							{!! Form::open(['method' => 'DELETE', 'action' =>['SiswaController@destroy', $siswa->id]]) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		@else
			<p>Tidak Ada data <strong>Siswa</strong></p>
		@endif
		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Siswa : {{ $jumlah_siswa }}</strong>
			</div>
			<div class="paging">
				{{ $siswa_list->links() }}
			</div>
		</div>
		<div class="tombol-nav">
			<a href="siswa/create" class="btn btn-primary"> Tambah Siswa </a>
		</div>
	</div>
@stop

@section('footer')
<footer>
	<div id="footer">
		<p>Copy &copy; 2017 laravel.dev</p>
	</div>
</footer>
@stop