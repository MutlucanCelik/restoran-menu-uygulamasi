@extends('admin.layouts.app')

@section('title')
    Kullanıcılar
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
                            <h4 class="card-title">Kullanıcılar</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th> Ad Soyad</th>
                                        <th> Email </th>
                                        <th>Durum</th>
                                        <th> Rezervasyon Sayısı </th>

                                        <th> İşlemler </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                <span class="pl-2">{{$user->name}}</span>
                                            </td>
                                            <td> {{$user->email}} </td>
                                            <td><a class="btn btn-outline-{{$user->status ? 'success' : 'danger'}} btn-fw mr-1">{{$user->status ? 'Aktif' : 'Pasif'}}</a></td>
                                            <td> {{count($user->reservations)}} </td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-fw mr-1">Detay</a>
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
@endsection
