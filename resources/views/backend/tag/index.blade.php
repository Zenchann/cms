@extends('layouts.backend')
@section('css')
<link rel="stylesheet"
    href="{{  asset('assets/backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">

@endsection

@section('js')
<script src="{{ asset('assets/backend/assets/vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('assets/backend/assets/js/components/datatables-init.js')}}"></script>

@endsection

@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <h5 class="card-header"><i class="la la-desktop"></i> Tag Artikel</h5>
                <div class="card-body">
                    <center><button type="button" data-toggle="modal" data-target=".tag"
                            class="btn btn-info btn-sm btn-rounded btn-outline" title="Tambah"><i
                                class="zmdi zmdi-plus-circle-o zmdi-hc-fw"></i> </button>
                    </center>
                    @include('backend.tag.create')
                    <br>
                    <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tag</th>
                                <th>Slug</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($tag as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_tag }}</td>
                                <td>{{ $data->slug }}</td>
                                <td>
                                    <form action="{{ route('tag.destroy',$data->id) }}" method="post"
                                        id="confirm_delete">
                                        <input type="hidden" name="_method" value="delete">
                                        {{ csrf_field() }}
                                        <button type="button" data-toggle="modal" data-target=".tag-{{ $data->id }}"
                                            class="btn btn-rounded btn-outline-warning" title="Edit"><i
                                                class="la la-pencil"></i>
                                        </button>
                                        <button type="submit" title="Hapus" class="btn btn-rounded btn-outline-danger"><i
                                                class="zmdi zmdi-delete zmdi-hc-fw"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @include('backend.tag.edit')
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</section>
@endsection
