@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">eCommerce</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier le produit</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Modifier le produit</h5>
            <hr />

            <div class="form-body mt-4">
                <form action="{{ route('admin.update_product', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label class="form-label">Titre du produit</label>
                                    <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description courte</label>
                                    <textarea name="short_desc" class="form-control" rows="3">{{ $product->short_desc }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description longue</label>
                                    <textarea id="mytextarea" name="long_desc">{{ $product->long_desc }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tailles</label>
                                    <input name="product_sizes" type="text" class="form-control visually-hidden" data-role="tagsinput" value="{{ implode(',', unserialize($product->product_sizes)) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tags</label>
                                    <input name="product_tags" type="text" class="form-control visually-hidden" data-role="tagsinput" value="{{ implode(',', unserialize($product->product_tags)) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Couleurs</label>
                                    <input name="product_colors" type="text" class="form-control visually-hidden" data-role="tagsinput" value="{{ implode(',', unserialize($product->product_colors)) }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image principale</label>
                                    <input class="form-control" type="file" name="photo">
                                    <img src="{{ asset('uploaded/product/' . $product->thumbnail) }}" width="100">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Images multiples</label>
                                    <input class="form-control" name="multi_images[]" type="file" multiple>
                                    @foreach($product->multiple_images as $img)
                                        <img src="{{ asset('uploaded/product/' . $img->image) }}" width="100">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Prix</label>
                                        <input name="selling_price" type="text" class="form-control" value="{{ $product->selling_price }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Prix remisé</label>
                                        <input name="discount" type="text" class="form-control" value="{{ $product->discount }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Quantité</label>
                                        <input name="product_quantity" type="text" class="form-control" value="{{ $product->product_quantity }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Marque</label>
                                        <select name="brand_id" class="form-select">
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Catégorie</label>
                                        <select name="category_id" class="form-select">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Sous-catégorie</label>
                                        <select class="form-select" name="sub_category_id">
                                            @foreach ($product->category->sub_categories as $sub)
                                            <option value="{{ $sub->id }}" {{ $sub->id == $product->sub_category_id ? 'selected' : '' }}>{{ $sub->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
