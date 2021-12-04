<x-Layout>

  @section('content')

  <!------------- Product Image and link ------------->
  <div class="row m-0" style="padding:0.5% 0% 3% 0%">
    <!------------- link to the homepage ------------->   
    <div class="col-12 m-0" ><a href="\">&#8592; Back to HomeScreen</a></div>
    <!-- Product Image -->
    <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-2"><img src="{{asset('upload/items/'. $item->image)}}"img-fluid w-100"></img></div>
    <!-- Dexcription Container -->
    <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-3">
        <!-- Product Name -->
        <div> <span style="font-size:140%; font-weight:bold">{{$item->name}}</span></div>
        <!-- Product Owner -->
        <div style="font-weight:bold" >{{$store->Storename}}</div>
        <!-- Product Price -->
        <div style="font-weight:bold" >Price: <span style="font-size:130%; color:red">{{$item->price}}</span></div>
        <!-- Avialable Quantity -->
        <div style="font-weight:bold" >Available quantity: <span style="font-size:130%; color:rgb(21, 0, 112)">{{$item->amount}}</span> Pieces</div>
        <!--Product description-->
        <div style="font-weight:bold">Description: {{$item->description}}</div>
        <div></div>
        <div></div>
    </div>
    <!-- Buying Cart -->
    <div class="col-lg-3 col-md-4 col-sm-12 col-12">
      <form action="{{route('updateProduct',$item->id)}}" method="POST" style="margin:0%; border:1px solid rgb(0,0,0,0.2); border-radius:10px">
      {{csrf_field() }}  
               
      <ul style="list-style-type:none; padding:8% 6% 3% 6%; font-weight:bold">
            <li><h2>Edit Product</h2></li>
            <li>
                <label class="mt-4" for="name">Name</label>
                <!------------------- input of product name  ------------------>
                <input class="w-100 form-control" name="name" id="name" value="{{$item->name}}"></input>
            </li>
            <li>
                <label class="mt-4" >Image</label>
                <!------------------- input of product image  ------------------>
                <input class="w-100 form-control"type="file" src="img_submit.gif" alt="Submit"name="image" id="image" ></input>
            </li>
            <li class="row">
                <label class="col-12 mt-4" for="CashMoney">Price</label>
                <div class="col-12">
                    <!------------------- input of product price  ------------------>
                    <input class="w-100 form-control" type="number" min="0" id="price" value="{{$item->price}}" name="price" placeholder="{{$item->price}}" ></input>
                </div>
            </li>
            <li class="row">
              <label class="col-6 mt-4" for="amount">Available Quantity:</label>
              <div class="col-6" style="margin-top:25px;">
                <!------------------- Select of product qunatity  ------------------>
                <input class="w-100 form-control" type="number" min="0" id="amoubt" value="{{$item->amount}}" name="amount" placeholder="{{$item->amount}}" ></input>
              </div>
            </li>
            <li class="row" style="margin:15px 0px;">
              <label >Description</label>
              <!------------------- input of product description  ------------------>
              <textarea class="w-100 form-control" id="description" name="description" rows="3">{{$item->description}}</textarea>
            </li>
            <li class="row">
              <div class="col-6">
                    
              <!------------------- Update button  ------------------>
                         
               <button class="btn btn-warning w-100" type="submit"  style="border:1px solid rgb(0,0,0,0.4); font-weight:bold">
                  Update Product
               </button>
              
              </div>
            </li>
        </ul>
    </form>
</div>

@endsection
</x-Layout>