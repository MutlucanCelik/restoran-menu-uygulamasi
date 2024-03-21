@extends('admin.layouts.app')

@section('title')
    İçecekler
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
                                <h4 class="card-title">İçecekler</h4>
                                <a type="button" id="beverages_add" class="btn btn-outline-success btn-fw mr-1 btn-modal">İçeçek ekle</a>
                                <div data-id="beverages_add" id="myModal" class="modal">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="d-flex justify-content-between mb-4">
                                            <h4 class="mb-4">İçecek Ekle</h4>
                                            <span class="modal-close">&times;</span>
                                        </div>

                                        <form class="forms-sample" action="" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Kategori adı</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>

                                            <div class="d-flex justify-content-end mt-5">
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
                                        <th> Ad </th>
                                        <th> Ülke </th>
                                        <th> Durum </th>
                                        <th> İşlemler </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <span class="pl-2">Ayran</span>
                                        </td>
                                        <td> Türkiye </td>
                                        <td> <a class="btn btn-outline-danger btn-fw mr-1">Pasif</a> </td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-fw mr-1">Detay</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <span class="pl-2">Şalgam</span>
                                        </td>
                                        <td> Türkiye </td>
                                        <td> <a class="btn btn-outline-success btn-fw mr-1">Aktif</a> </td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-fw mr-1">Detay</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <span class="pl-2">Şerbet</span>
                                        </td>
                                        <td> Türkiye </td>
                                        <td> <a class="btn btn-outline-success btn-fw mr-1">Aktif</a> </td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-fw mr-1">Detay</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <span class="pl-2">Limonata</span>
                                        </td>
                                        <td> Türkiye </td>
                                        <td> <a class="btn btn-outline-success btn-fw mr-1">Aktif</a> </td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-fw mr-1">Detay</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <span class="pl-2">Kımız</span>
                                        </td>
                                        <td> Türkiye </td>
                                        <td> <a class="btn btn-outline-danger btn-fw mr-1">Pasif</a> </td>
                                        <td>
                                            <a id="beverage_detail" type="button" class="btn btn-outline-primary btn-fw mr-1 btn-modal">Detay</a>
                                            <div data-id='beverage_detail' id="myModal" class="modal">

                                                <!-- Modal content -->
                                                <div class="modal-content">
                                                    <span class="modal-close">&times;</span>
                                                    <form class="forms-sample">
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Username</label>
                                                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Password</label>
                                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                                            <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                                                        </div>
                                                        <div class="form-check form-check-flat form-check-primary">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"> Remember me <i class="input-helper"></i></label>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                        <button class="btn btn-dark">Cancel</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
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

@endsection
