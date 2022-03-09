@extends('layouts.default')

@section('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="box-title">Daftar Transaksi Masuk</h4>
        </div>
        <div class="card-body--">
          <div class="table-stats order-table ov-h">
            <table class="table">
              <thead>
                <tr>
                  <th class="text-left">#</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Nomor</th>
                  <th class="text-center">Total Transaksi</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($items as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->number }}</td>
                  <td>Rp. {{ number_format($item->transaction_total, 0, ',', '.') }}</td>
                  <td>
                    @if($item->transaction_status == 'PENDING')
                      <span class="badge badge-info">
                    @elseif($item->transaction_status == 'SUCCESS')
                      <span class="badge badge-success">
                    @elseif($item->transaction_status == 'FAILED')
                      <span class="badge badge-warning">
                    @else
                      <span>
                    @endif
                      {{ $item->transaction_status }}
                    </span>
                  </td>
                  <td class="justify-content-center">
                    @if($item->transaction_status == 'PENDING')
                    <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-sm mx-1">
                      <i class="fa fa-check"></i>
                    </a>
                    <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-warning btn-sm mx-1">
                      <i class="fa fa-times"></i>
                    </a>
                    @endif
                    <a href="#ModalDetail" data-remote="{{ route('transactions.show', $item->id) }}" data-toggle="modal" data-target="#ModalDetail" data-title="Detail Transaksi {{ $item->uuid }}" class="btn btn-info btn-sm mx-1">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('transactions.edit', $item->id) }}" class="btn btn-primary btn-sm mx-1">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <form action="{{ route('transactions.destroy', $item->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger btn-sm mx-1">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="text-center p-5">
                    Data tidak tersedia
                  </td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal" id="ModalDetail" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
        <i class="fa fa-spinner fa-spin"></i>
      </div>
    </div>
  </div>
</div>
@endsection

@push('after-script')

<script>
  jQuery(document).ready(function($) {
    $('#ModalDetail').on('show.bs.modal', function(e) {
      var button = $(e.relatedTarget);
      var modal = $(this);

      modal.find('.modal-body').load(button.data("remote"));
      modal.find('.modal-title').html(button.data("title"));
    });
  });
</script>
@endpush