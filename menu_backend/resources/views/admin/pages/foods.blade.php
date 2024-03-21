@extends('admin.layouts.app')

@section('title')
    {{ucfirst($category->name)}} Listesi
@endsection

@section('css')
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title">{{ucfirst($category->name)}} Listesi</h4>
                                <a type="button" id="beverages_add" class="btn btn-outline-success btn-fw mr-1 btn-modal">{{ucfirst($category->name)}} ekle</a>
                                <div data-id="beverages_add" id="myModal" class="modal">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="d-flex justify-content-between mb-4">
                                            <h4 class="mb-4">{{ucfirst($category->name)}} Ekle</h4>
                                            <span class="modal-close">&times;</span>
                                        </div>

                                        <form class="forms-sample" enctype="multipart/form-data" action="{{route('add_food')}}" method="POST" >
                                            @csrf
                                            <input type="text" class="d-none" value="{{$category->id}}" name="category_id">
                                            <div class="form-group">
                                                <label for="name">{{ucfirst($category->name)}} adı</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="country_id">Ülke</label>
                                                <select class="form-control" id="country_id" name="country_id">
                                                    <option value="">Seçim yapın</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{ucfirst($country->name)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Resim yükle</label>
                                                <div class="input-group col-xs-12">
                                                    <input type="file" class="form-control" name="image" id="image" accept="image/png, image/jpeg, image/jpg">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Ürün bilgisi</label>
                                                <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Fiyat</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text text-primary">₺</span>
                                                    </div>
                                                    <input type="number" step="0.01" class="form-control" name="price" id="price">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="status" id="status"> Gıdayı pasifle <i class="input-helper"></i></label>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end mt-4 mb-2">
                                                <button type="submit" class="btn btn-success  btm-md">Kaydet</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>Resim</th>
                                        <th> Ad </th>
                                        <th>Fiyat</th>
                                        <th> Ülke </th>
                                        <th> Durum </th>
                                        <th> İşlemler </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($meals as $key => $meal)

                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td><img style="width: 50px;height: 50px;border-radius: 5px" src="{{asset($meal->image)}}" alt="food"></td>
                                            <td>
                                                <span class="pl-2">{{$meal->name}}</span>
                                            </td>
                                            <td> ₺ {{$meal->price}} </td>
                                            <td> {{$meal->getCountry->name}} </td>
                                            <td> <a onclick="changeStatus({{$meal->id}})" class="btn btn-outline-{{$meal->status ? 'success' : 'danger'}} btn-fw mr-1">{{$meal->status ? 'Aktif' : 'Pasif'}}</a> </td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-fw mr-1">Detay</a>
                                                <a class="btn btn-outline-danger btn-fw">Sil</a>
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
{{--<script>
    function changeStatus(id) {
        console.log(id)
        Swal.fire({
            icon: "question",
            title: "Emin misiniz?",
            html: "{{$meal->name}} gıdasının durumunu değiştirmek istediğine eminmisiniz?",
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: "Evet",
            cancelButtonText: "Hayır",
            cancelButtonColor: "#e30d0d"
        }).then((result) => {
            var token = $('meta[name="csrf-token"]').attr('content');
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '{!! route('change_status') !!}',
                    data: {
                        id: id,
                        _token: token
                    },
                    dataType: "json",
                    success: function (data) {
                        Swal.fire({
                            icon: "success",
                            title: "Başarılı",
                            text: "Form silindi.",
                            showConfirmButton: true,
                            confirmButtonText: "Tamam"
                        });
                    },
                    error: function (data) {
                        Swal.fire({
                            icon: "error",
                            title: 'Hata',
                            html: "<div id=\"validation-errors\"></div>",
                            showConfirmButton: true,
                            confirmButtonText: "Tamam"
                        });
                        $.each(data.responseJSON.errors, function (key, value) {
                            $('#validation-errors').append('<div class="alert alert-danger">' + value + '</div>');
                        });
                    }
                });
            }
        });
    }
</script>--}}
@endsection
