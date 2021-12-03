
@section('content')





<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<html>
    <head>
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
        <link rel="icon" href="{{URL::asset('images/logo.PNG')}}" />
        <title>Capitalstore</title>
    </head>
    <body>

      <!------------------------------------------- horizontal Nav Bar -----------------------------------------------> 
      <header>
        <nav class="row navbar text-light m-0" style="background-color:#000913; height:4rem; padding:0 20px; z-index: 1; overflow: hidden;">
          <!---------------- Left items in Nav Bar ------------------->
          <div class="row col-xl-3 col-lg-4 col-md-5 col-sm-6">
            <div class="col-2 navItem leftNavItem" onclick="openNav()">
              <i class="fa fa-bars"></i>
            </div>
            <div class="col-9" style="padding: 0 30px; margin-left:-20px">
              <a href= "register" class="navbar-brand text-light"  style="font-size:170%; font-weight:bold; line-height:70%; height:3rem">
                <img src="images/logo.PNG" alt="logo" class="ml-2" style="object-fit:contain; height:3rem;" />
                <span class="ml-2">Capital 
                <span style="background:-webkit-linear-gradient(#1AC29C, #207DA0); -Webkit-background-clip:text; -Webkit-text-fill-color:transparent">store</span>
                </span>
              </a>
            </div>
          </div>
          <!-------------------------- Right items in Nav Bar ------------------------------------------->
          <div class="col col-xl-3 col-lg-3 col-md-1 col-sm-5 d-flex flex-row-reverse RightItems" style="display:flex; overflow:hidden; max-height: 4rem;">
            <!------------------- SignIn item --------------------------------->
            <a href="login" class="row text-light p-2 navItem justify-content-center" style="text-decoration: none; align-items: center;" >Sign-In</a>
          </div>         
        </nav>
      </header>
      <!------------------------------------------ End of horizontal Nav Bar --------------------------------> 


      <!------------------------------------------------------ All page Content ------------------------------------------------>
      <div id="main" class="p-0">

        <!--------------------------------------Side Nav Bar Content-------------------------------------->
        <div id="mySidenav" class="row sidenav">
            <!------------ Logo of the Side Nav Bar ------------->
            <div style="margin-bottom: 45px; padding:0px;" >
                <a href= "register" class="navbar-brand editedAnchor text-light"  style="font-size:170%; font-weight:bold; line-height:70%; height:3rem">
                <img src="images/logo.PNG" alt="logo" class="ml-2" style="object-fit:contain; height:3rem;" />
                <span class="ml-2" style="color: #000913;">Capital 
                <span style="background:-webkit-linear-gradient(#1AC29C, #207DA0); -Webkit-background-clip:text; -Webkit-text-fill-color:transparent">store</span>
                </span>
                </a>
            </div>
            <!---------------- Close button of side Nav Bar ----------------->  
            <a href="javascript:void(0)" class="closebtn editedAnchor" onclick="closeNav()">&times;</a>
        </div>
        <!--------------------------------------End of side Nav Bar Content-------------------------------------->

        <!------------------------ Loading div ---------------------------->
        <div id="loading" class="row m-0 p-o justify-content-center" style="min-height: 86.3vh; align-items: center;">
          <div class="row m-0 p-0 justify-content-center col-12" style="justify-content: center;">
              <img src="images/Loading.gif" style="display:block; padding:0px; height: 28%; width: 28%;">
            </div>
        </div>
        <!------------------------ End of loading div ---------------------------->


        <!-------------------------- Page content after loading ------------------------------------------------>
        <main id="page" class="row m-0 p-0 justify-content-center" style="min-height: 86.5vh; align-items: center; display: none;">    
            <div class="col col-10 col-sm-8 col-md-7 col-lg-3 m-auto" style="padding:2% 0%;">
            <!------------------------------- Regiteration Form --------------------------------------------->
                <form style="margin:0%; border:1px solid rgb(0,0,0,0.2); border-radius:10px" method="POST" action="{{ route('register') }}">
                                           @csrf

                  <ul style="list-style-type:none; padding:8% 6% 3% 6%; font-weight:bold">
                        <li><h2>Create Account</h2></li>
                        <li>
                            <label class="mt-4" for="name">User Name</label>
                            <!------------------ Input of user name ---------------->
                            <input class="w-100 form-control" name="name" id="name" ></input>
                        </li>
                        <li>
                          <label class="mt-4" for="Storename">Store Name</label>
                          <!------------------ Input of store name ---------------->
                          <input class="w-100 form-control" name="Storename" id="Storename" ></input>
                        </li>
                        <li>
                            <label class="mt-4" for="email">Email</label>
                            <!------------------ Input of user email ---------------->
                            <input class="w-100 form-control" type="email" name="email" id="email" ></input>
                        </li>
                        <li>
                            <label class="mt-4" for="password">Password</label>
                            <!------------------ Input of password ---------------->
                            <input class="w-100 form-control" type="password" id="password" name="password" ></input>
                        </li>

                      

                        <li>
                            <label class="mt-4" for="password-confirm">Re-Enter Password</label>
                            <!------------------ Input of password confirmation ---------------->
                            <input class="w-100 form-control" type="password" id="password-confirm" name="password_confirmation" ></input>
                        </li>
                        











                        <li class="row">
                            <label class="col-12 mt-4" for="balance">Initial Cash</label>
                            <div class="col-11">
                                <!------------------ Input of initial cash ---------------->
                                <input class="w-100 form-control" type="number" min="0" id="balance" name="balance" placeholder="0.00$" ></input>
                            </div>
                            <span class="col-1 input-group-text">$</span>
                        </li>
                        <li class="mt-4">
                            <!------------------ Register button ---------------->
                            <button type="submit" class="btn btn-warning w-100" style="border:1px solid rgb(0,0,0,0.2); border-radius:7px; font-weight:bold">
                                Register
                            </button>
                        </li>
                        <li class="mt-4">
                        Already have an account?
                        </li>
                        <li>
                            <a href ="login" class="btn btn btn-outline-primary w-100">
                                Sign-In
                            </a>
                        </li>
                    </ul>
                </form>
            </div> 
        </main>
        </div>

        <!--------------------------- Footer ----------------------------------> 
        <footer class="fixed-bottom" style="position: relative; z-index: 1;">
          <div class="navbar text-light justify-content-center w-100" style="background-color: #000913;">
            <span class ="mt-1">All rights reserved.</span>
          </div>
        </footer>
        <!----------------------------- End of Footer ------------------------------------> 
        
        <script src="{{URL::asset('js/script.js')}}">
  </script>

</body>
</html>




