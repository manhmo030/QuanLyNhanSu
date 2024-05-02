@extends('LayoutAdmin.index')
@section('admin_content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ route('admin.adddkcalam.submit') }}" method="POST">
                        @csrf

                        <h6 class="mb-4"><a href="{{ route('admin.dkcalam.form') }}">Back</a></h6>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingInput" name="date"
                                value="{{ $data->date }}" readonly>
                            <label for="floatingInput">Ngày</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="nhanvien"
                                value="{{ $data->nhanvien->Hoten }}" readonly>
                            <label for="floatingInput">Nhân Viên</label>

                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="nhanvien"
                                value="{{ $data->calam->TenCa }} {{ $data->calam->GioBatDau }}-{{ $data->calam->GioKetThuc }}" readonly>
                            <label for="floatingInput">Ca Làm</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1" checked >
                            <label class="form-check-label" for="inlineRadio1">Đi Làm</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Nghỉ Làm</label>
                        </div>
                        <br>
                       <div id="vaora">
                        <div class="form-floating mb-3">
                               <input type="time" class="form-control" id="floatingInput" name="nhanvien" style="width:150px" cursorshover="true">
                                <label for="floatingInput">Vào</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" id="floatingInput" name="nhanvien" style="width:150px">
                               <label for="floatingInput">Ra</label>
                            </div>
                       </div>

                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="{{ asset('assetAdmin/js/chamcong.js') }}"></script>
@endsection
