<!-------------------------------------- Edit Profile Container  ------------------------------------------------------>
<div class="row m-0 p-0 justify-content-between">
    <div class="col-lg-3 col-md-6 col-sm-12" style="margin: 50px auto;">
        <!---------------------------------- ***** Form ***** ----------------------------------------------------->
        <form style="margin:0%; border:1px solid rgb(0,0,0,0.2); border-radius:10px;">
          <ul style="list-style-type:none; padding:8% 6% 3% 6%; font-weight:bold">
              <li><h2>Edit Profile</h2></li>
              <li>
                <label class="mt-4" for="name">User Name</label>
                <input class="w-100 form-control" name="Username" id="Username" ></input>
              </li>
              <li>
                <label class="mt-4" for="name">Store Name</label>
                <input class="w-100 form-control" name="Storename" id="Storename" ></input>
              </li>
              <li>
                  <label class="mt-4" for="email">Email</label>
                  <input class="w-100 form-control" type="email" name="email" id="email" ></input>
              </li>
              <li>
                  <label class="mt-4" for="password">Password</label>
                  <input class="w-100 form-control" type="password" id="password" name="password" ></input>
              </li>
              <li>
                  <label class="mt-4" for="rePassword">Re-Enter Password</label>
                  <input class="w-100 form-control" type="password" id="rePassword" name="rePassword" ></input>
              </li>
              <li>
                <label class="mt-4" >Image</label>
                <input class="w-100 form-control"type="file" src="img_submit.gif" alt="Submit"name="image" id="image" ></input>
              </li>
              <li class="mt-4">
                <button type="submit" class="btn btn-warning w-100" style="border:1px solid rgb(0,0,0,0.2); border-radius:7px; font-weight:bold">
                    Update Profile
                </button>
              </li>
          </ul>
      </form>
    </div>
</div>
