@extends('admin.layouts.app')

@section('title')
    Ayarlar
@endsection

@section('css')
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row h-100">
                <div class="col-12 grid-margin">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">Ayarlar</h4>
                            <form class="forms-sample" enctype="multipart/form-data" action="{{route('settings')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Admin adı</label>
                                    <input type="text" class="form-control" value="{{$setting->user->name ?? ''}}" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="company_name">Şirket adı</label>
                                    <input type="text" class="form-control" value="{{$setting->company_name ?? ''}}" id="company_name" name="company_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Email</label>
                                    <input type="email" class="form-control" value="{{$setting->user->email ?? ''}}"  id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="image">Logo</label>
                                    <div class="input-group col-xs-12">
                                        <input type="file" class="form-control" name="image"  id="image" accept="image/png, image/jpeg, image/jpg">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="info">Şirket bilgisi</label>
                                    <textarea class="form-control" id="info" name="info" rows="5">{{$setting->info ?? ''}} </textarea>
                                </div>
                                <div class="d-flex justify-content-end align-items-center">
                                    <button type="submit" class="btn btn-success mr-2">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
