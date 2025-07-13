@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Table de données</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('admin.add_product') }}" class="btn btn-primary">Ajouter un produit</a>

            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Exemple de table de données</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Marque</th>
                            <th>Prix</th>
                            <th>Statut</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                        <tr>
                            <td>{{ $product->product_id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="recent-product-img">
                                        <img src="{{ file_exists(public_path('uploaded/product/'.$product->thumbnail)) ? asset('uploaded/product/'.$product->thumbnail) : asset('uploaded/no_image.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-1 font-14">{{ $product->product_name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $product->brand_id }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->status }}</td>
                            <td>
                                <a href="{{ route('admin.edit_product', $product->id) }}" class="btn btn-sm btn-primary">Modifier</a>

                                <a href="javascript:;" onclick="sure({{ $product->id }})"
                                    class="btn btn-sm btn-danger">Supprimer</a>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID de commande</th>
                            <th>Produit</th>
                            <th>Marque</th>
                            <th>Prix</th>
                            <th>Statut</th>
                            <th>Action</th>


                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


</div>


<script>
    function sure(id){
                swal({
                title: "Êtes-vous sûr ?",
                text: "Une fois supprimé, vous ne pourrez pas récupérer ce fichier imaginaire !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    fetch("/admin/delete-product/"+id).then(res=>{
                        if(res.status=== 200){
                            swal("Brand Deleted Successfully!", {
                            icon: "success",
                            });
                            location.reload();
                        }else{
                            swal("Not Deleted");
                        }
                    })

                });
            }
</script>

@endsection