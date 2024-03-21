@extends('admin.layouts.app')

@section('title')
    Yemekler
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
                            <h4 class="card-title">Yemekler</h4>
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
                                            <span class="pl-2">Sarma</span>
                                        </td>
                                        <td> Türkiye </td>
                                        <td> <a class="btn btn-outline-success btn-fw mr-1">Aktif</a> </td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-fw mr-1">Detay</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <span class="pl-2">Beyran</span>
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
                                            <span class="pl-2">Çiğ köfte</span>
                                        </td>
                                        <td> Türkiye </td>
                                        <td> <a class="btn btn-outline-danger btn-fw mr-1">Pasif</a> </td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-fw mr-1">Detay</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <span class="pl-2">Karışık kızartma</span>
                                        </td>
                                        <td> Türkiye </td>
                                        <td> <a class="btn btn-outline-danger btn-fw mr-1">Pasif</a> </td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-fw mr-1">Detay</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <span class="pl-2">Dana haşlama</span>
                                        </td>
                                        <td> Türkiye </td>
                                        <td> <a class="btn btn-outline-danger btn-fw mr-1">Pasif</a> </td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-fw mr-1">Detay</a>
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
