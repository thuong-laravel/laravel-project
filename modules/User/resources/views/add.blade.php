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
       <form action="{{route("admin.user.store")}}" method="post">
        @csrf
        @method("post")
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Tên</label>
                        <input value="{{old("name")}}" name="name" type="text" placeholder="Nhập tên" class="form-control @error('name') is-invalid @enderror ">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input value="{{old("email")}}" name="email" type="text" placeholder="Nhập email" class="form-control @error('email')
                            is-invalid
                        @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="">Nhóm</label>
                        <select name="group_id" class="form-select @error('group_id')
                            is-invalid
                            @enderror" id="">
                            <option value="1">abc</option>
                        </select>
                        @error('group_id')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-6"></div>

                <div class="col-6">
                    <div class="mb-3">
                        <label  for="">Mật khẩu</label>
                        <input name="password" type="password" placeholder="Nhập mật khẩu" class="form-control @error('password')
                            is-invalid
                        @enderror">
                        @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                </div>

                <div class="col-6 ">
                    <div class="mb-3">
                        <label for="">Nhập lại mật khẩu</label>
                        <input value="{{old("confirm_password")}}" name="confirm_password" type="password" placeholder="Nhập mật khẩu" class="form-control @error('confirm_password')
                            is-invalid
                        @enderror">
                        @error('confirm_password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 " ><a href="{{route("admin.user.index")}}" style="float: right;" class="btn btn-danger">Hủy</a></div>
                <div class="col-6"><button type="submit" class="btn btn-success">Thêm</button></div>
            </div>
       </form>
       {{-- end content --}}

    </div>
</main>
@endsection
@section('js')
@endsection
