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
                <a href="{{ route('admin.add_sub_category') }}" class="btn btn-primary">Add Sub Category</a>

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
                            <th>Série</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sub_categories as $key => $sub_category)
                        <tr>
                            <td>{{ $key +1 }}</td>
                            <td>{{ $sub_category->category->name }}</td>
                            <td>{{ $sub_category->name }}</td>
                            <td>
                                <a href="{{ route('admin.edit_sub_category',$sub_category->id) }}"
                                    class="btn btn-sm btn-primary">Modifier</a>
                                <a href="javascript:;" onclick="sure({{ $sub_category->id }})"
                                    class="btn btn-sm btn-danger">Supprimer</a>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Série</th>
                            <th>Catégorie</th>
                            <th>Sous-catégorie</th>
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
                    fetch("/admin/delete-sub-category/"+id).then(res=>{
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