<x-Layout>

  @section('content')

<!-------------------------------------- Add Product Container  ------------------------------------------------------>
<div class="row m-0 p-0 justify-content-between">
  <div class="col-lg-3 col-md-6 col-sm-12" style="margin: 50px auto;">
      <!----------------------------------------------- ****** Form ******* --------------------------------------->
      <form style="margin:0%; border:1px solid rgb(0,0,0,0.2); border-radius:10px">
        <ul style="list-style-type:none; padding:8% 6% 3% 6%; font-weight:bold">
            <li><h2>Add Product</h2></li>
            <li>
                <label class="mt-4" for="name">Name</label>
                <!------------------- input of product name  ------------------>
                <input class="w-100 form-control" name="name" id="name" ></input>
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
                    <input class="w-100 form-control" type="number" min="0" id="CashMoney" name="CashMoney" placeholder="0.00$" ></input>
                </div>
            </li>
            <li class="row">
              <!------------------- Select a product quantity  ------------------>
              <label class="col-6 mt-4" for="CashMoney">Available Quantity:</label>
              <div class="col-6" style="margin-top:25px;">
                <select class="custom-select w-25 ">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                </select>
              </div>
            </li>
            <li class="row" style="margin:15px 0px;">
              <label >Description</label>
              <!------------------- input of product description  ------------------>
              <textarea class="w-100 form-control" id="description" rows="3"></textarea>
            </li>
            <li class="row">
              <div class=>
                <!------------------- add product button ------------------>
                <button class="btn btn-warning w-100" onclick="Buying_function()" style="border:1px solid rgb(0,0,0,0.4); font-weight:bold">
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