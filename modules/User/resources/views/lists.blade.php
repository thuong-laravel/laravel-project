@extends('layout.backend')
@section('title',$title)
@section('css')
@endsection
@section('content')
<main>
    <div class="container-fluid px-4">
       {{-- page title  --}}
       @include('partial.backend.page_title',['title' => $title, 'action'=> 'Danh sách'])
       {{-- end page title  --}}

       {{-- content  --}}
       <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Danh sách người dùng
            </div>
            <div>
                <a class="btn btn-success" href="{{route("admin.user.create")}}">Thêm</a>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Nhóm</th>
                        <th>Thời gian</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Nhóm</th>
                        <th>Thời gian</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </tfoot>
                <tbody>
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


                </tbody>
            </table>
        </div>
    </div>
       {{-- end content --}}

    </div>
</main>
@endsection
@section('js')
@endsection
