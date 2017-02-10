<div id="pencarian">
    {{-- form pembuka untuk kolom pencarian  --}}
    {!! Form::open(['url' => 'siswa/cari', 'method' => 'GET', 'id' => 'form-pencarian']) !!}
    {{--<div class="input-group">
        {!! Form::text('kata_kunci'), (!empty($kata_kunci)) ? $kata_kunci : null, ['class' => 'form-control', 
        'placeholder' => 'Cari dengan menggunakan Nama Siswa'] !!}
        <span class="input-group-btn">
            {!! Form::button('Cari', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
        </span>
    </div>
    --}} 
    <div class="row">
        <div class="col-md-2">
            {!! Form::select('id_kelas', $list_kelas, (! empty($id_kelas) ? $id_kelas : null), 
            ['id' => 'id_kelas', 'class' => 'form-control', 'placeholder' => ' - Kelas - ']) !!}
        </div>

        <div class="col-md-2">
            {!! Form::select('jenis_kelamin', ['L' => 'Laki-Laki', 'P' => 'Perempuan'], (! empty($jenis_kelamin) ? $jenis_kelamin : null), 
            ['id' => 'jenis_kelamin', 'class' => 'form-control', 'placeholder' => ' - Jenis Kelamin - ']) !!}
        </div>

        <div class="col-md-8">
            <div class="input-group">
                {!! Form::text('kata_kunci', (!empty($kata_kunci)) ? $kata_kunci : null, ['class' => 'form-control', 
                'placeholder' => 'Cari dengan menggunakan Nama Siswa']) !!}
                <span class="input-group-btn">
                    {!! Form::button('Cari', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
                </span>
            </div> {{-- input-group --}}
        </div> {{-- col-md-8 --}}
    </div> {{-- row --}}
    {{-- Form penutup --}}
    {!! Form::close() !!}
</div> {{-- pencarian --}}