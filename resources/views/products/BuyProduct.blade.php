<x-Layout>

  @section('content')

  <!------------- Product Image and link ------------->
  <div class="row m-0" style="padding:0.5% 0% 3% 0%">
    <!------------- link to the homepage ------------->   
    <div class="col-12 m-0" ><a href="/">&#8592; Back to HomeScreen</a></div>
    <!-- Product Image -->
    <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-2"><img src="images/shirt1.jpg"img-fluid w-100"></img></div>
    <!-- Dexcription Container -->
    <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-3">
        <!-- Product Name -->
        <div> <span style="font-size:140%; font-weight:bold">Shirt</span></div>
        <!-- Product Owner -->
        <div style="font-weight:bold" >Max Fashion</div>
        <!-- Product Price -->
        <div style="font-weight:bold" >Price: <span style="font-size:130%; color:red">$50</span></div>
        <!-- Avialable Quantity -->
        <div style="font-weight:bold" >Available quantity: <span style="font-size:130%; color:rgb(21, 0, 112)">20</span> Pieces</div>
        <!--Product description-->
        <div style="font-weight:bold">Description: long-sleeved shirts</div>
        <div>Nice one,</div>
        <div>Awesome!!</div>
    </div>
    <!-- Buying Cart -->
    <div class="col-lg-3 col-md-4 col-sm-12 col-12">
        <div style="border:1px solid rgb(0,0,0,0.2); border-radius:10px; padding:6% 4%; font-weight:bold">
            <div class="mb-2" >Price: $50</div>
            <div class="mb-2" >Status: in stock</div>
            <div class="mb-3">Qty:
            <select class="custom-select w-25 ml-2">
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
            <form>
                <submit class="btn btn-warning w-100 mb-3" onclick="Buying_function()" style="border:1px solid rgb(0,0,0,0.4); font-weight:bold">
                    Buy
                </submit>
                <submit class="btn btn-outline-success w-100 mb-3" style="border:1px solid rgb(0,0,0,0.4); font-weight:bold">
                    Add to my store
                </submit>
                <submit class="btn btn-outline-danger w-100 mb-3" style="border:1px solid rgb(0,0,0,0.4); font-weight:bold">
                    Delete from my store
                </submit>
            </form>   
        </div>
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
                <!-------------- Product Info ----------------->
                <div class="row justify-content-between m-0 p-0" style = "font-weight: bolder; font-size: large">
                    <!-- Product Name -->
                    <p class="col-3">Shirt</p>
                    <!-- 1 piece Price -->
                    <p class="col-2">$50.00</p>
                </div>
                <!-- Product Owner -->
                <p >MAX Fashion</p>
                <!-- Product quantity -->
                <p>Quantity: 1 Piece</p>
                <!-- Process valid time-->
                <p>Validity - 30 Days</p>
                <hr>
                <!-- Middle content -->
                <div style="text-align: center; margin-top: 25px;">
                    <p style="font-size: 20px;">Total Payable</p>
                    <!-- Total Payable -->
                    <p style="font-size: 35px; margin:10px 0px 25px 0px; color:#207DA0">$10.00</p>
                    <!-- Current Cash value -->
                    <p style="font-size: 20px;">Available Wallet Balance: <span style="color: rgb(248, 59, 106)">$220.02</span></p>
                </div>
                <!-- Buttons -->
                <div class="row justify-content-between p-0" style="margin:80px 0px 20px 0px;">
                    <div class="col-6">
                        <form>
                            <submit class="col-5b btn btn-outline-danger w-100" onclick="Cancel_Buying_function()">
                                Cancel
                            </submit>
                        </form> 
                    </div>
                    <div class="col-6">
                        <form>
                            <submit class="col-5 btn btn-primary w-100" onclick="Confirm_Buying_function()">
                                Confirm
                            </submit>
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