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

      <!-------------------------------------------------------------- horizontal Nav Bar -------------------------------------------------------------------> 
      <header>
        <nav class="row navbar text-light m-0" style="background-color:#000913; height:4rem; padding:0 20px; z-index: 1; overflow: hidden;">

          <!----------------------------- Left items in Nav Bar -------------------------------------->
          <div class="row col-xl-3 col-lg-4 col-md-5 col-sm-6">
            <!------------------ Side Bar Button ------------------------------->
            <div class="col-2 navItem leftNavItem" onclick="openNav()">
              <i class="fa fa-bars"></i>
            </div>
            <!-------------- Capital Store (Logo of the Site) ----------------->
            <div class="col-9" style="padding: 0 30px; margin-left:-20px">
              <a href= "/" class="navbar-brand text-light"  style="font-size:170%; font-weight:bold; line-height:70%; height:3rem">
                <img src="{{URL::asset('images/logo.PNG')}}" alt="logo" class="ml-2" style="object-fit:contain; height:3rem;" />
                <span class="ml-2">Capital 
                <span style="background:-webkit-linear-gradient(#1AC29C, #207DA0); -Webkit-background-clip:text; -Webkit-text-fill-color:transparent">store</span>
                </span>
              </a>
            </div>
          </div>
          <!----------------------------- End of Left items in Nav Bar -------------------------------------->

          <!-------------------------------------- Search Nav Bar ------------------------------------>
          <div class="row col-xl-3 col-lg-3 col-md-5 searchNaveBar">
            <div class="col-9">
              <input type="text" class="form-control" placeholder="Search" name="search">
            </div>
            <button class="col-2 btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
          </div>
          <!-------------------------------------- End of Search Nav Bar ------------------------------------>

          <!-------------------------- Right items in Nav Bar ------------------------------------------->
          <div class="col col-xl-3 col-lg-3 col-md-1 col-sm-5 d-flex flex-row-reverse RightItems" style="display:flex; overflow:hidden; max-height: 4rem;">


            @auth



                            <a class="row text-light p-2 justify-content-center" style="text-decoration: none; align-items: center;width:100%" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            @endauth



            <!------------------- Log out item --------------------------------->
            
            <!-------------------------- Profile item -------------------------->
            <a href="profile" class="row text-light p-2 justify-content-center" style="text-decoration: none; align-items: center;" >
              <!------------ Profile circular Image ---------------------->
              <div class="row text-light p-2 navItem justify-content-center navProfile" style="align-items: center;width:90%">
                  <div class="col Profile_border" style="width: 10%;">
                    <div class="inner_profile" style="width: 100%;">  
                      <!---------------- Image to be changed ------------------>
                      <img class="profile_image" src="{{URL::asset('images/addidas.png')}}">
                    </div>
                  </div>
                  <!------------ Store Name to be changed ------------------->
                  <span class="col">Addidas</span>
                  
              </div>
            </a>

            <!------------------- Home item --------------------------------->
            <a href="/" class="row text-light p-2 navItem justify-content-center" style="text-decoration: none; align-items: center; font-size: 30px;" >
              <i class="fa fa-home"></i>
            </a>
          </div>   
          <!-------------------------- End of Right items in Nav Bar ------------------------------------------->      
        </nav>
      </header>
      <!------------------------------------------------------- End of horizontal Nav Bar --------------------------------------------------------------------> 


      <div id="main" class="p-0">
                  <!--------------------------------------------- Side Nav Bar Content ----------------------------------------------------------------->
                  <div id="mySidenav" class="row sidenav">

                    <!---------------------------- Logo of the Side Nav Bar ------------------------------------------>
                      <div style="margin-bottom: 45px; padding:0px;" >
                        <a href= "/" class="navbar-brand editedAnchor text-light"  style="font-size:170%; font-weight:bold; line-height:70%; height:3rem">
                          <img src="{{URL::asset('images/logo.PNG')}}" alt="logo" class="ml-2" style="object-fit:contain; height:3rem;" />
                          <span class="ml-2" style="color: #000913;">Capital 
                          <span style="background:-webkit-linear-gradient(#1AC29C, #207DA0); -Webkit-background-clip:text; -Webkit-text-fill-color:transparent">store</span>
                          </span>
                        </a>
                      </div>
                      <!----------------------------End of the Logo in Side navbar ------------------------------------------>

                    <!--------------------------------- Close button of side Nav Bar --------------------------------->  
                    <a href="javascript:void(0)" class="closebtn editedAnchor" onclick="closeNav()">&times;</a>

                    <!--------------------------------------- Nav Bar Profile ---------------------------------------->
                    <div>
                      <div class="row Product_container shadow" style="width:90%; margin: 0 0px 0px 20px; height: fit-content;">
                          <!------------------------------- Profile Title ---------------------------------->
                          <div class="Profile_header_container shadow" style="height: 50px;">
                              <div class="row justify-content-between Product_header" style="padding-top:5px;">
                                  <div class="col-8" style="width:fit-content">
                                      <img src="{{URL::asset('images/store-solid.svg')}}" style="width: 25px;"> Profile </div>
                              </div>
                          </div>

                          <!--------------------------------- Profile ------------------------------>
                          <a href="profile">
                          <div class="profile_contentBigContainer" style="padding:0; margin: 0;">
                              <div class="product_contentSmallContainer sideNavHover row justify-content-center m-2">
                                  <!----------------------- Profile Image ----------------->
                                  <div class="col-6 justify-content-center" style="align-items: center;">
                                      <div class="Profile_border imag_container sidenNavProfileborder" style="padding:4px;">
                                          <div class="inner_profile"> 
                                          <!---------------- Profile Image to be changed----------------->
                                          <img class="profile_image" src="{{URL::asset('images/addidas.png')}}">
                                          </div>
                                      </div>
                                  </div>
                                  <!--------------- Profile Info ------------------------>
                                  <div class="col-6 ProileContainer p-2 m-0 justify-content-center">
                                      <!-- Profile Name to be changed -->
                                      <span>Addidas</span>
                                  </div>
                              </div>
                          </div>
                        </a>
                      </div>
                  </div>
                  <!----------------------------End of the Profile in Side navbar ------------------------------------------>
          
                  <!----------------------------------------- Generate Report -------------------------------------------->
                  <div>
                    <div class="row Product_container shadow" style="width:90%; margin: 0 0px 0px 20px; height: fit-content;">
                        <div class="Profile_header_container shadow" style="height: 60px;">
                            <div class="row justify-content-between Product_header" style="padding-top:0px;">
                              <div class="col-8" style="width:fit-content; font-size: 20px; padding-top:13px">Generate Report </div>
                              <div class="col-3 p-2 m-0 justify-content-center">
                                <!------------------------------- Generate Report button ----------------------------->
                              <form action="report" method="post"> 
                               @csrf
                                <button class="btn sideNavHover" style="width: 50px;" type="submit">
                                  <img src="{{URL::asset('images/file-export-solid.svg')}}" style="width: 100%; height: 100%;">
                                </button>
                                              </form>
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <!----------------------------------------- End of Generate Report -------------------------------------------->
        
                    <!------------------------------------------------ Stores --------------------------------------------------->
                    <div>
                      <div class="row Product_container shadow" style="width:90%; margin: 0 0px 30px 20px; height: fit-content;">
                          <!--------------------------------- Stores header ---------------------------------->
                          <div class="Profile_header_container shadow" style="height: 50px;">
                              <div class="row justify-content-between Product_header" style="padding-top:5px;">
                                  <div class="col-8" style="width:fit-content">
                                      <img src="{{URL::asset('images/store-solid.svg')}}" style="width: 25px;"> Stores </div>
                              </div>
                          </div>
                          <!--------------------------- End of Stores header ---------------------------------->

                          <!----------------------------- Stores Container ------------------------------------>
                          <div class="profile_contentBigContainer" style="padding:0; margin: 0;">
                              <div class="product_contentSmallContainer row justify-content-center m-2">
                                <div class="scroller" style="height: 300px;">
                                  <!---------------------- Repeated Blocks of different stores  -------------------->

                                  <!---------------------------- Store 1 -------------------------------->
                                  <a href="profile">
                                    <div class="row sideNavHover p-2 justify-content-center" style="align-items: center; color: black;">
                                      <div class="col-5 Profile_border StoreProfileborder" style="width: 40px; height: 40px; margin-left: 15px;">
                                        <div class="inner_profile"> 
                                          <!------ Store Image to be chaned --------->
                                          <img class="profile_image" src="{{URL::asset('images/max.png')}}">
                                        </div>
                                      </div>
                                      <div class="col-7">
                                        <!---------- Store Name to be changed ------>
                                        <span style="font-size: 17px;">Max</span>
                                      </div>
                                    </div>
                                  </a>
                                  
                                  <!---------------------------- Store 2 -------------------------------->
                                  <a href="profile">
                                    <div class="row sideNavHover p-2 justify-content-center" style="align-items: center; color: black;">
                                      <div class="col-5 Profile_border StoreProfileborder" style="width: 40px; height: 40px; margin-left: 15px;">
                                        <div class="inner_profile"> 
                                          <!------ Store Image to be chaned --------->
                                          <img class="profile_image" src="{{URL::asset('images/LC Waikiki.jpg')}}">
                                        </div>
                                      </div>
                                      <div class="col-7">
                                        <!---------- Store Name to be changed ------>
                                        <span style="font-size: 17px;">LC Wikiki</span>
                                      </div>
                                    </div>
                                  </a>

                                  <!---------------------------- Store 3 -------------------------------->
                                  <a href="profile">
                                    <div class="row sideNavHover p-2 justify-content-center" style="align-items: center; color: black;">
                                      <div class="col-5 Profile_border StoreProfileborder" style="width: 40px; height: 40px; margin-left: 15px;">
                                        <div class="inner_profile"> 
                                          <!------ Store Image to be chaned --------->
                                          <img class="profile_image" src="{{URL::asset('images/Nike.png')}}">
                                        </div>
                                      </div>
                                      <div class="col-7">
                                        <!---------- Store Name to be changed ------>
                                        <span style="font-size: 17px;">Nike</span>
                                      </div>
                                    </div>
                                  </a>

                                  <!---------------------------- Store 4 -------------------------------->
                                  <a href="profile">
                                    <div class="row sideNavHover p-2 justify-content-center" style="align-items: center; color: black;">
                                      <div class="col-5 Profile_border StoreProfileborder" style="width: 40px; height: 40px; margin-left: 15px;">
                                        <div class="inner_profile"> 
                                          <!------ Store Image to be chaned --------->
                                          <img class="profile_image" src="../../images/reebok.png">
                                        </div>
                                      </div>
                                      <div class="col-7">
                                        <!---------- Store Name to be changed ------>
                                        <span style="font-size: 17px;">Reebok</span>
                                      </div>
                                    </div>
                                  </a>

                                  <!---------------------------- Store 5 -------------------------------->
                                  <a href="profile">
                                    <div class="row sideNavHover p-2 justify-content-center" style="align-items: center; color: black;">
                                      <div class="col-5 Profile_border StoreProfileborder" style="width: 40px; height: 40px; margin-left: 15px;">
                                        <div class="inner_profile"> 
                                          <!------ Store Image to be chaned --------->
                                          <img class="profile_image" src="../../images/Splash.png">
                                        </div>
                                      </div>
                                      <div class="col-7">
                                        <!---------- Store Name to be changed ------>
                                        <span style="font-size: 17px;">Splash</span>
                                      </div>
                                    </div>
                                  </a>

                                  <!---------------------------- Store 6 -------------------------------->
                                  <a href="profile">
                                    <div class="row sideNavHover p-2 justify-content-center" style="align-items: center; color: black;">
                                      <div class="col-5 Profile_border StoreProfileborder" style="width: 40px; height: 40px; margin-left: 15px;">
                                        <div class="inner_profile"> 
                                          <!------ Store Image to be chaned --------->
                                          <img class="profile_image" src="../../images/timberland.png">
                                        </div>
                                      </div>
                                      <div class="col-7">
                                        <!---------- Store Name to be changed ------>
                                        <span style="font-size: 17px;">Timberland</span>
                                      </div>
                                    </div>
                                  </a>

                                  <!---------------------------- Store 7 -------------------------------->
                                  <a href="profile">
                                    <div class="row sideNavHover p-2 justify-content-center" style="align-items: center; color: black;">
                                      <div class="col-5 Profile_border StoreProfileborder" style="width: 40px; height: 40px; margin-left: 15px;">
                                        <div class="inner_profile"> 
                                          <!------ Store Image to be chaned --------->
                                          <img class="profile_image" src="../../images/Zara.png">
                                        </div>
                                      </div>
                                      <div class="col-7">
                                        <!---------- Store Name to be changed ------>
                                        <span style="font-size: 17px;">Zara</span>
                                      </div>
                                    </div>
                                  </a>
                                  <!---------------------- End of Repeated Blocks of different stores  -------------------->
                                  <!------------------------------------------ End of Stores --------------------------------------------------->  
                              </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------- End of side Nav Bar Content------------------------------------------------------------>

        <!--------------------------------------------------------------- Loading div animation ---------------------------------------------------------------->
        <div id="loading" class="row m-0 p-o justify-content-center" style="min-height: 86.3vh; align-items: center;">
          <div class="row m-0 p-0 justify-content-center col-12" style="justify-content: center;">
              <img src="../../images/Loading.gif" style="display:block; padding:0px; height: 28%; width: 28%;">
            </div>
        </div>
        <!----------------------------------------------------------End of Loading div animation ---------------------------------------------------------------->

        <!------------------------------------------------------- Page content after loading ---------------------------------------------------------------->
          <main id="page" class="row m-0 p-0 justify-content-center" style="min-height: 86.3vh; align-items: center; display: none;">    

            @yield('content')  

          </main>
        </div>

        <!------------------------------------------------ Footer ---------------------------------------------------------------> 
        <footer class="fixed-bottom" style="position: relative; z-index: 1;">
          <div class="navbar text-light justify-content-center w-100" style="background-color: #000913;">
            <span class ="mt-1">All rights reserved.</span>
          </div>
        </footer>
        <!------------------------------------------------ End of Footer -------------------------------------------------------> 
        
  <script src="{{URL::asset('js/script.js')}}">
  </script>

</body>
</html>