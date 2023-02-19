@extends('layout.backend')
@section('title', $title)
@section('css')
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            {{-- page title  --}}
            @include('partial.backend.page_title', ['title' => $title, 'action' => 'Danh sách'])
            {{-- end page title  --}}
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            {{-- content  --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        Danh sách người dùng
                    </div>
                    <div>
                        <a class="btn btn-success" href="{{ route('admin.user.create') }}">Thêm</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Nhóm</th>
                                <th>Thời gian</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Nhóm</th>
                                <th>Thời gian</th>
                                <th>Hành động</th>
                            </tr>
                        </tfoot>
                        {{-- <tbody>
                            <tr>
                                <td>Donna Snider</td>
                                <td>Customer Support</td>
                                <td>New York</td>
                                <td>27</td>
                                <td>
                                    <a class="btn btn-warning" href="">Sửa</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="">Xóa</a>
                                </td>
                            </tr>

                            <tr>
                                <td>Donna Snider</td>
                                <td>Customer Support</td>
                                <td>New York</td>
                                <td>27</td>
                                <td>
                                    <a class="btn btn-warning" href="">Sửa</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="">Xóa</a>
                                </td>
                            </tr>

                            <tr>
                                <td>Donna Snider</td>
                                <td>Customer Support</td>
                                <td>New York</td>
                                <td>27</td>
                                <td>
                                    <a class="btn btn-warning" href="">Sửa</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="">Xóa</a>
                                </td>
                            </tr>


                        </tbody> --}}
                    </table>
                </div>
            </div>
            {{-- end content --}}

        </div>
    </main>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.user.index') }}',
                columns: [
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'group_id',
                        name: 'group_id'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endsection
