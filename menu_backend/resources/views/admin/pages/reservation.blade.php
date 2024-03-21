@extends('admin.layouts.app')

@section('title')
    Rezervasyonlar
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
                            <h4 class="card-title">Rezarvasyonlar</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th> Kullanıcı adı </th>
                                        <th> Email </th>
                                        <th> Siparişler </th>
                                        <th> Rezarvasyon tarihi </th>
                                        <th> İşlemler </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reservations as $key => $reservation)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                <span class="pl-2">{{$reservation->user->name}}</span>
                                            </td>
                                            <td>{{ $reservation->user->email}} </td>
                                            <td> {{$reservation->meal->name}}</td>
                                            <td> {{$reservation->created_at}} </td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-fw mr-1">Detay</a>
                                                <a class="btn btn-outline-danger btn-fw">İptal</a>
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
