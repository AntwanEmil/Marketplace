<x-Layout>

@section('content')
      

      @if(session('fail'))
      <div class="alert alert-danger">{{session('fail')}}</div>
    
      @elseif(session('success'))
      <div class="alert alert-success">{{session('success')}}</div>
    
      @endif

  <div class="row m-0" style="padding: 0 7% 4% 7%">

  @foreach ($orig_items as $item)


<div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12" style="height: 27rem; margin:2% 0%;">
  <a href="/buyProduct/{{$item->id}}">
    <div class="h-100 hvr-float-shadow" style="padding:2% 2%; width:80%; margin:0% 10%;">
      <div style="height:67%;">
      <!---------------- Image of the product ------------>
      <img src="{{asset('upload/items/'. $item->image)}}" class="img-fluid w-100 h-100 " style="object-fit:cover;"></img>
      </div> 
      <!---------------- Name of the product ------------>
      <div>{{$item->name}}</div>
      <!---------------- Name of the store ------------>
      <div style="font-size:95%; color:gray">owned by:<b> {{$item->Storename}} </b></div>
      <div style="font-size:120; font-weight:bold; color:red" ><span>$
        <!---------------- Price of the product ------------>
        </span>{{$item->price}}
      </div>
      <button type="button" class="btn btn-outline-secondary" style="width: 100%;">Product details</button>
      <hr style="border-top:1px solid rgba(0, 0, 0, 0.3)"></hr>
    </div>
  </a>
</div>

@endforeach
    <!---------------- Product 1 ------------------>
    
    

</div>
</div>   


  @endsection
</x-Layout>