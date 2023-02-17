@extends('layout.backend')
@section('title',$title)
@section('css')
@endsection
@section('content')
<main>
    <div class="container-fluid px-4">
       {{-- page title  --}}
       @include('partial.backend.page_title',['title' => $title, 'action'=> 'Thêm'])
       {{-- end page title  --}}

       {{-- content  --}}
       <form action="" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Tên</label>
                        <input type="text" placeholder="Nhập tên" class="form-control">
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" placeholder="Nhập email" class="form-control">
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Nhóm</label>
                        <select name="" class="form-select" id="">
                            <option value="">abc</option>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Ảnh đại diện</label>
                        <input type="file" placeholder="Nhập ảnh đại diện" class="form-control">
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Mật khẩu</label>
                        <input type="password" placeholder="Nhập mật khẩu" class="form-control">
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Nhập lại mật khẩu</label>
                        <input type="password" placeholder="Nhập mật khẩu" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 " ><a href="{{route("admin.user.index")}}" style="float: right;" class="btn btn-danger">Hủy</a></div>
                <div class="col-6"><a  class="btn btn-success">Thêm</a></div>
            </div>
       </form>
       {{-- end content --}}

    </div>
</main>
@endsection
@section('js')
@endsection
