@extends('admin.base')

@section('main-content')
    <div class="row mb-3">
        <h2 class="col-lg-12 adminh2">Новый продукт</h2>
    </div>
    <div class="row mb-3">
        <div class="col-lg-12" style="min-height: 1.5rem; color: red">
            {{$message}}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <form id="productForm" enctype="multipart/form-data" method="POST"  action="{{route('admin.products.create_post')}}">
                {{csrf_field()}}
                <div class="form-group">
                    {{-- <label for="inputTitle">Название</label> --}}
                    <input type="text" name="name" placeholder="Название" class="texsa" id="inputTitle" value="{{isset(Request::all()['name']) ? Request::all()['name'] : ''}}">
                </div>
            </form>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {{-- <label for="categories">Категория</label> --}}
                <select class="texsa" form="productForm" name="categorie_id" id="categories">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(isset(Request::all()['categorie_id']) && Request::all()['categorie_id'] == $category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                {{-- <label for="inputDesc">Описание</label> --}}
                <textarea form="productForm" name="description" id="inputDesc" placeholder="Описание" class="texsa" rows="10">{{isset(Request::all()['description']) ? Request::all()['description'] : ''}}</textarea>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product__thumbnail mb-3" style="height: 150px; background-color: #5a6268">
                <img src="" alt="картинка товара" style="display: none;">
            </div>
            <label for="file" class="adminh2">Картинка</label>
            <input form="productForm" name="pic" type="file" id="file" class="form-control-file mb-3">
            {{-- <label for="price" class="adminh2">Цена</label> --}}
            <input type="text" form="productForm" placeholder="Цена" class="texsa" name="price" id="price" value="{{isset(Request::all()['price']) ? Request::all()['price'] : ''}}">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 savePrevios">
            <button form="productForm" type="submit" class="btn_log_reg dn green">Сохранить</button>
            <a href="{{route('admin.products')}}" class="btn_log_reg dn admin3 blue">Назад</a>
        </div>
    </div>
@endsection
