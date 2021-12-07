<x-Layout>

  @section('content')
  @if(session('fail'))
  <div class="alert alert-danger">{{session('fail')}}</div>

  @elseif(session('success'))
  <div class="alert alert-success">{{session('success')}}</div>

@endif
  <!------------- Product Image and link ------------->
  <div class="row m-0" style="padding:0.5% 0% 3% 0%">
    <!------------- link to the homepage ------------->   
    <div class="col-12 m-0" ><a href="/">&#8592; Back to HomeScreen</a></div>
    <!-- Product Image -->
    <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-2"><img src="{{asset('upload/items/'. $item->image)}}"img-fluid w-100 style="width: 50%; height:90%;" ></div>
    <!-- Dexcription Container -->
    <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-3">
        <!-- Product Name -->
        <div> <span style="font-size:140%; font-weight:bold">{{$item->name}}</span></div>
        <!-- Product Owner -->
        <div style="font-weight:bold" >{{$item->Storename}}</div>
        <!-- Product Price -->
        <div style="font-weight:bold" >Price: <span style="font-size:130%; color:red">${{$item->price}}</span></div>
        <!-- Avialable Quantity -->
        <div style="font-weight:bold" >Available quantity: <span style="font-size:130%; color:rgb(21, 0, 112)">{{$item->amount}}</span> Pieces</div>
        <!--Product description-->
        <div style="font-weight:bold">Description: {{$item->description}}</div>
        <div></div>
        <div></div>
    </div>
    <!-- Buying Cart -->
    
    <div class="col-lg-3 col-md-4 col-sm-12 col-12">
      
        <div style="border:1px solid rgb(0,0,0,0.2); border-radius:10px; padding:6% 4%; font-weight:bold">
          
            <div class="mb-2" >Price: {{$item->price}}</div>
            <div class="mb-2" >Status: 
                @if ($item->amount != 0)
                    in stock
                </div>
                <div class="mb-3">
                <label for="amount">Qty:</label>
                <input type="number" max="{{$item->amount}}" name="qty" id="qty" required>
               
           
                </div>
            
                <button class="btn btn-warning w-100 mb-3" onclick="Buying_function()" style="border:1px solid rgb(0,0,0,0.4); font-weight:bold">
                    Buy
                </button>
                <!-------------------------------------------------->
            <!--FOR BACK END: This button must be in a separate form , with all data needed are inside 
                the form to send it to back, you could type the needed data in hidden input,
                 as [[[[[[[[[[[[[[[[in line 97 and 98 ]]]]]]]]]]]]]]]]]]] -->
            <!-------------------------------------------------->
            @if (! $is_sold )
            <form action="{{route('AddProduct')}}" method="POST">
                    @csrf
                    <input type="hidden" name="item_id" id="" value="{{$item->id}}">
                <button class="btn btn-outline-success w-100 mb-3"  style="border:1px solid rgb(0,0,0,0.4); font-weight:bold">
                    Add to my store for sale
                </button>
                </form>
            @else

                @if( $is_owned == true )
                <p>you own this item</p>

                @elseif(! $is_owned )
                <form action="{{route('removeSoldItem')}}" method="POST">
                    @csrf
                    <input type="hidden" name="item_id" id="" value="{{$item->id}}">
                <button class="btn btn-outline-success w-100 mb-3"  style="border:1px solid rgb(0,0,0,0.4); font-weight:bold">
                    Remove Item from your shop
                </button>
                </form>

                @endif


            @endif
        </div>
         
            @else 
            <div style="border:1px solid rgb(0,0,0,0.2); border-radius:10px; padding:6% 4%; font-weight:bold">
                <div class="mb-2" >Price: {{$item->price}}</div>
                <div class="mb-2" >Status: 
                   
                        out of stock
                    </div>
            </div> 
            @endif
      
    </div>       
</div>

<!-- PopUp window buying Confirmation -->
<div class="darkest_div" id="darkest_div">
    <div class="Buyying_setting_container" id="Buyying_setting_container">
        <div style="border:1px solid rgb(0,0,0,0.2);background-color: white; border-radius:10px; padding:10px 15px; font-weight:bold; height: 100%;">
            <div style="font-size: 23px; margin-bottom: 40px;">
                <span><i class="fa fa-shopping-cart"></i> Your Order</span>
            </div>
            <!-- Conent Div -->
            <div  id="PopUpContent" class="PopUpContent">
                <form action="{{route('BuyProduct')}}" method="POST">
                    @csrf
                <!-------------- Product Info ----------------->
                <div class="row justify-content-between m-0 p-0" style = "font-weight: bolder; font-size: large">
                    <!-- Product Name -->
                    <p class="col-3">{{$item->name}}</p>
                    <!-- 1 piece Price -->
                    <p class="col-2">${{$item->price}}</p>
                </div>
                <!-- Product Owner -->
                <p >{{$item->Storename}}</p>
                <!-- Product quantity -->
                <p id="p_qty"></p>
                <input type="hidden" name="amount" id = "hidden">
                <input type="hidden" name="item_id" id="" value="{{$item->id}}">
                
                <hr>
                <!-- Middle content -->
                <div style="text-align: center; margin-top: 25px;">
                    <!-- Current Cash value -->
                    <p style="font-size: 20px;">Available Wallet Balance: <span style="color: rgb(248, 59, 106)">${{$balance->balance}}</span></p>
                </div>
                <!-- Buttons -->
                <div class="row justify-content-between p-0" style="margin:80px 0px 20px 0px;">
                    <div class="col-6">
                       
                            <button class="col-5b btn btn-outline-danger w-100" type = "button" onclick="Cancel_Buying_function()">
                                Cancel
                            </button>
                         
                    </div>
                    <div class="col-6">
                       
                            <button class="col-5 btn btn-primary w-100" type="submit">
                                Confirm
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!--Confirmation GIF-->
            <div id="ConfirmationGIF" class="ConfirmationGIF">
                <img src="./images/checkmark.gif" style="width: 100%;">
            </div>

        </div>
    </div>       
</div>


@endsection


</x-Layout>

