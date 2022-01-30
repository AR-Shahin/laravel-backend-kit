
@extends('layouts.backend_master')
@section('title', 'Crud')
@section('master_content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-info">Manage Crud</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h2 class="text-info">Add Crud</h2>
            </div>
            <div class="card-body">
                <form id="addCrudForm">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Category Name">
                        <span class="text-danger" id="nameError"></span>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" id="image">
                        <span class="text-danger" id="imageError"></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block">Add New Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="editForm">
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" class="form-control" id="edit_name" placeholder="Enter Category Name">
                <input type="hidden" id="edit_cat_slug">
                <span class="text-danger" id="catEditError"></span>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block">Update Category</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('script')

<script>

</script>

<script>
    function getAllData(){
        axios.get("{{ route('admin.get-all-data') }}")
        .then((res) => {

            table_data_row(res.data)
        })
    }
    getAllData();

    function table_data_row(items) {
        let loop =  items.map((item,index) => {
            return `
            <tr>
                <td>${++index}</td>
                <td>${item.name}</td>
                <td><img src="{{ asset('${item.image}') }}" width="80px"></td>
                <td class="text-center">
                    <a href="" class="btn btn-sm btn-success" data-id="${item.slug}" data-toggle="modal" data-target="#viewModal" id="viewRow"><i class="fa fa-eye"></i></a>
                    <a href="" class="btn btn-sm btn-info" data-id="${item.slug}" data-toggle="modal" data-target="#editModal" id="editRow"><i class="fa fa-edit"></i></a>
                    <a href="" id="deleteRow" class="btn btn-sm btn-danger" data-id="${item.slug}"><i class="fa fa-trash-alt"></i></a>
                </td>
            </tr>
            `
        });
        loop = loop.join("")
        const tbody = $$('#tbody')
        tbody.innerHTML = loop
 }

 // store
 $('body').on('submit','#addCrudForm',function(e){
    e.preventDefault();
    let name = $('#name');
    let nameError = $('#nameError');
    let image = $('#image');
    let imageError = $('#imageError');
    nameError.text('');
    imageError.text('');
    if(name.val() === ''){
        nameError.text('Field Must not be Empty!')
        return null;
    }

    const data = new FormData();
    data.append('name',name.val());
    data.append('image', document.getElementById('image').files[0]);
    const config = { headers: { 'Content-Type': 'multipart/form-data' } };
    //  console.log(image.files[0]);
    //  return
    axios.post("{{ route('admin.crud.store') }}",data)
    .then((res) => {
        getAllData();
        setSuccessMessage();
        name.val('');
        image.val(null)
    })
    .catch((err)=>{
       if(err.response.data.errors.name){
           nameError.text(err.response.data.errors.name[0])
       }
       if(err.response.data.errors.image){
           imageError.text(err.response.data.errors.image[0])
       }
    })
 })

</script>
@endpush
