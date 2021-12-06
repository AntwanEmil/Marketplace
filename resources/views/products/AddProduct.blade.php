<x-Layout>

  @section('content')

<!-------------------------------------- Add Product Container  ------------------------------------------------------>
<div class="row m-0 p-0 justify-content-between">

  @if(session('fail'))
  <div class="alert alert-danger">{{session('fail')}}</div>

  @elseif(session('success'))
  <div class="alert alert-success">{{session('success')}}</div>

  @endif

  <div class="col-lg-3 col-md-6 col-sm-12" style="margin: 50px auto;">
      <!----------------------------------------------- ****** Form ******* --------------------------------------->
      <form style="margin:0%; border:1px solid rgb(0,0,0,0.2); border-radius:10px" action="{{url('addProduct')}}" method="POST" enctype="multipart/form-data">
       {{ csrf_field() }}
        <ul style="list-style-type:none; padding:8% 6% 3% 6%; font-weight:bold">
            <li><h2>Add Product</h2></li>
            <li>
                <label class="mt-4" for="name">Name</label>
                <!------------------- input of product name  ------------------>
                <input class="w-100 form-control" name="name" id="name" required>
            </li>
            <li>
                <label class="mt-4" for="image">Image</label>
                <!------------------- input of product image  ------------------>
                <input class="w-100 form-control"type="file" src="img_submit.gif" alt="Submit"name="image" id="image" required>
                
                <li class="row">
                <label class="col-12 mt-4" for="price">Price</label>
                <div class="col-12">
                  <!------------------- input of product price  ------------------>
                    <input class="w-100 form-control" type="number" min="0" id="price" name="price" placeholder="0.00$" required>
                </div>
            </li>
            <li class="row">
              <!------------------- Select a product quantity  ------------------>
              <label class="col-6 mt-4" for="amount">Available Quantity:</label>
              <div class="col-12">
                  <input class="w-100 form-control" type="number" min="0" id="price" name="amount" placeholder="0" required>
              </div>
            </li>
            <li class="row" style="margin:15px 0px;">
              <label for="description">Description</label>
              <!------------------- input of product description  ------------------>
              <textarea class="w-100 form-control" id="description" name="description" rows="3" required></textarea>
            </li>
            <li class="row">
              <div class=>
                <!------------------- add product button ------------------>
                <button class="btn btn-warning w-100" type="submit"  style="border:1px solid rgb(0,0,0,0.4); font-weight:bold">
                  Add Product
                </button>
              </div>
            </li>
        </ul>
    </form>
  </div> 
  </div>
</div>


@endsection
</x-Layout>