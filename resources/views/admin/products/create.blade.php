@extends('layouts.app')

@section('title', 'Registrar nuevo producto')
@section('body-class', 'product-page')

@section('content')   <!-- url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450') -->
<div class="header header-filter" style="background-image: url('{{ asset('img/insumos_varios5.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2 class="title text-center">Registrar nuevo producto</h2>
            <form method="post" action="{{ url('/admin/products') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del producto</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio del producto</label>
                            <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                         <div class="form-group label-floating">
                            <label class="control-label">Descripción corta</label>
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}"> 
                        </div>
                    </div>

                    {{--
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Categoría del producto</label>
                            <select class="form-control" name="category_id">
                                <option value="0">General</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    --}}
                </div>

                <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_description">{{ old('long_description') }}</textarea>

                <button class="btn btn-primary">Registrar producto</button>
                <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
            </form>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection
