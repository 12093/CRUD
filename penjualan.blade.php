@extends('template')
@section('content')
<section class="main-section">
  <div class="content">
    <h1>Data penjualan</h1>
    @if(Session::has('alert_message'))
    <div class="alert alert_success">
      <strong>{{ Session::get('alert_message') }}</strong>
    </div>
    @endif
    <hr>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>id</th>
          <th>Kode barang</th>
          <th>Jumlah</th>
          <th>Total harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @php $no = 1; @endphp
        @foreach($data as $datas)
        <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $datas->id }}</td>
          <td>{{ $datas->kode_barang }}</td>
          <td>{{ $datas->jumlah }}</td>
          <td>{{ $datas->total_harga }}</td>
          <td>
            <form action="{{ route('penjualan.destroy', $datas->id) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <a href="{{ route('penjualan.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
              <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection
