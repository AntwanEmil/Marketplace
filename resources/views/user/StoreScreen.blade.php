<x-Layout>

  @section('content')
      

<!---------------------------------------------------- Store Page Container ------------------------------------------------->
<!-------- This div Contains two vertical divs of the page (Profile, Products) and PopUp window ------------------------->
<div class="row m-0 p-0 justify-content-center">

    <!-------------------------------------------- Store Verticle container ------------------------------------------------->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="row Product_container shadow" style="width:90%;">

            <!----------------------------------- Store Container Header --------------------------------->
            <div class="Profile_header_container shadow">
                <div class="row justify-content-between Product_header">
                    <div class="col-8" style="width:fit-content">
                        <img src="{{URL::asset('images/store-solid.svg')}}" style="width: 25px;"> Store </div>
                </div>
                <hr>
            </div>
            <!-----------------------------------End of Store Container Header --------------------------------->

            <!----------------------------------- Store Information --------------------------------->
            <div class="profile_contentBigContainer">
                <div class="product_contentSmallContainer row justify-content-center">
                    <!------------------------------- Store Image Container ------------------------->
                    <div class="row p-2 justify-content-center" style="align-items: center; width:90%;">
                        <div class="Profile_border imag_container sidenNavProfileborder">
                            <div class="inner_profile"> 
                            <!---------------- Store Image to be Changed ----------------->
                            <img class="profile_image" src="{{asset('uploads/users/'. $info->userImage)}}">
                            </div>
                        </div>
                    </div>
                    <!----------------------------End of Profile Image Container ----------------------->

                    <!------------------------------- Store Info Container ------------------------->
                    <div class="ProileContainer p-2 justify-content-center" style="width: 90%;">
                        <!------------------ Store Name to be changed ------------->
                        <span style="font-size: 37px;">{{$info->Storename}}</span>
                        <!------------------ User Name to be changed ------------->
                        <span style="font-size: 20px; color: gray; font-weight:lighter; display: block;">{{$info->userName}}</span>
                        <!------------------ Email to be changed ------------->
                        <span style="font-size: 18px; color: gray; font-weight:lighter;">{{$info->email}}</span>
                        <!------------------ Current Cash to be changed ------------->
                       
                        <!-------------------------- Transfer Money Button -------------------->
                        <div style="padding:0px 5px;">
                          <form>
                            <button type="submit" onclick="Buying_function()" class="btn btn-warning w-100" style="border:1px solid rgb(0,0,0,0.2);border-radius:7px;font-weight:bold">
                                Transfer Money
                            </button>
                          <form>
                        </div>
                    </div>
                    <!------------------------------- End of Store Info Container ------------------------->
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------------- End of Profile Verticle container ------------------------------------------------->

    <!-------------------------------------------- Product Verticle container -------------------------------------------------------->
    <div class="col-lg-9 col-md-6 col-sm-12">
        <div class="row Product_container shadow">
            <!--------------------------- Product Container Header --------------------------------------->
            <div class="Product_header_container shadow">
                <div class="row justify-content-between Product_header">
                    <div class="col-lg-2 col-md-5 col-sm-6" style="width:fit-content"><i class="fa fa-shopping-cart"></i> Products</div>
                </div>
                <hr style="margin-top:3px">
            </div>
            <!---------------------------End of Product Container Header ---------------------------------->

            <div class="product_contentBigContainer">
                <div class="product_contentSmallContainer row justify-content-center">
                  <!--------------- The folloing are repeated blocks of different products ------------->

                    <!------------------------------ Product 1 ------------------------------------->
                   @foreach ($items as $item)
                       
                   
                    <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12" style="height: 17rem; margin:2% 0%;">
                      <a href="buyProduct">
                        <div class="h-100 hvr-float-shadow" style="padding:2% 2%; width:80%; margin:0% 10%;">
                          <div style="height:67%;">
                          <!------------- Image of the product to be changed ------------------>
                            <img src="{{asset('upload/items/'. $item->image)}}" class="img-fluid w-100 h-100 " style="object-fit:cover;"></img>
                          </div> 
                          <!------------- Name of the product to be changed ------------------>
                          <div>Slim T-shirt</div>
                          <!------------- Name of the store to be changed ------------------>
                          <div style="font-size:95%; color:gray">{{$info->Storename}}</div>
                          <div style="font-size:120; font-weight:bold; color:red" ><span>$
                          <!------------- Price of the product to be changed ------------------>
                          </span>{{$item->price}}</div>
                          <!------------- Edit Product Button ------------------>
                          <a href="/buyProduct/{{$item->id}}" class="btn btn-outline-secondary" style="width: 100%;">Product Details</a>
                          <hr style="border-top:1px solid rgba(0, 0, 0, 0.3)">
                        </div>
                      </a>
                    </div>    
                    @endforeach
                    <!---------------------------------------- End of repeated blocks of different products ------------------------------------->
                </div>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------- End of the Two Vertical Blocks (Profile, Product), End of the page ------------------------------------>

<!------------------------------------------------------ PopUp window Transfer Money ----------------------------------------------------->
<div class="darkest_div" id="darkest_div">
  <div class="Buyying_setting_container" id="Buyying_setting_container">
      <div style="border:1px solid rgb(0,0,0,0.2);background-color: white; border-radius:10px; padding:10px 15px; font-weight:bold; height: 100%;">
          <div style="font-size: 23px; margin-bottom: 40px;">
            <img src="../../images/hand-holding-usd-solid.svg" style="width: 30px;"> Transfer Money
          </div>
          <!------------------------------------------------------------ Content Div --------------------------------------------------->
          <div  id="PopUpContent" class="PopUpContent">
              <!------------------------------------------------- Product Info ------------------------------------------------->
              <div class="row justify-content-between m-0 p-0" style = "font-weight: bolder; font-size: large">
                <p style="font-size: 17px; margin-bottom: 10px;">Available Cash: 
                  <!----------------------------------- Current Cash value to be changed ---------------------------------->
                  <span style="color: rgb(248, 59, 106)">$220.02</span>
                </p>
              <hr>
              </div>
              <!----------------------------------------------------- Middle content --------------------------------------->
              <div style="margin-top: 5px;">
                <!-------------------------------------------------****** Form ********-------------------------->
                <form style="margin:0%;border:1px solid rgb(0,0,0,0.2);border-radius:10px" >
                  <ul style="list-style-type:none;padding:8% 6%;font-weight:bold">
                    <!--------------------- Transfer Money button -------------------------------->
                    <li class="row">
                      <label class="col-12 mt-1">Money</label>
                      <div class="col-11">
                          <!-------------------- Money Input tag ----------------------->
                          <input class="w-100 form-control" type="number" min="0" placeholder="0.00$" ></input>
                      </div>
                      <span class="col-1 input-group-text">$</span>
                    </li>
                    <!-------------------------------- Store Select -------------------->
                    <div class="mt-3"> Store :
                      <select class="ml-2 form-control" style="width:100%;"> 
                          <option>Max Fashion</option>
                          <option>Dejavu</option>
                          <option>Zara</option>
                          <option>Nike</option>
                          <option>Timberland</option>
                          <option>LC Waikiki</option>
                          <option>Splash</option>
                      </select>
                    </div>
                  </ul>
                </form>
              </div>
              <!--------------------------------------------- Buttons ------------------------------------->
              <div class="row justify-content-between p-0" style="margin:80px 0px 20px 0px;">
                  <div class="col-6"> 
                      <!----------------------- Cancel Button ----------------------->
                      <form>
                        <submit class="col-5b btn btn-outline-danger w-100" onclick="Cancel_Buying_function()">
                            Cancel
                        </submit>
                      </form>
                  </div>
                  <div class="col-6">
                      <!----------------------- Send Money Button ----------------------->
                      <form>
                        <submit class="col-5 btn btn-primary w-100" onclick="Confirm_Buying_function()">
                            Send Money
                        </submit>
                      </form>
                  </div>
              </div>
          </div>
          <!--Confirmation GIF-->
          <div id="ConfirmationGIF" class="ConfirmationGIF">
              <img src="{{URL::asset('images/checkmark.gif')}}" style="width: 100%;">
          </div>
      </div>
  </div>       
</div>
<!----------------------------------------------------------------------- End of PopUp Window ----------------------------------------------------------->
@endsection
</x-Layout>