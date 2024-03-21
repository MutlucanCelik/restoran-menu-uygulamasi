@extends('admin.layouts.app')

@section('title')
    Mesajlar
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
                            <h4 class="card-title">Mesajlar</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th> Ad Soyad </th>
                                        <th> Email </th>
                                        <th> Konu </th>
                                        <th>Durum</th>
                                        <th>Tarih</th>
                                        <th> İşlemler </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($messages as $key => $message)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                <span class="pl-2">{{$message->user->name}}</span>
                                            </td>
                                            <td> {{$message->user->email}}</td>
                                            <td> {{$message->topic->name}} </td>
                                            <td><i class="mdi mdi-email icon-md {{!$message->read_at ? 'message-icon' : 'text-danger'}}"></i></td>
                                            <td> {{$message->created_at}} </td>
                                            <td>
                                                <a class="btn btn-outline-primary btn-fw mr-1">Göster</a>
                                                <a class="btn btn-outline-success btn-fw mr-1">Mesaj gönder</a>
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
