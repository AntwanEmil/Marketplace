<x-Layout>

  @section('content')

  <!------------- Product Image and link ------------->
  <div class="row m-0" style="padding:0.5% 0% 3% 0%">
    <!------------- link to the homepage ------------->   
    <div class="col-12 m-0" ><a href="/">&#8592; Back to HomeScreen</a></div>
    <!-- Product Image -->
    <div class="col-lg-5 col-md-5 col-sm-12 col-12 mb-2"><img src="{{asset('upload/items/'. $item->image)}}"img-fluid w-100 style="width: 90%; height:90%;"></div>
    <!-- Dexcription Container -->
    <div class="col-lg-3 col-md-3 col-sm-12 col-12 mb-3">
        <!-- Product Name -->
        <div> <span style="font-size:140%; font-weight:bold">{{$item->name}}</span></div>
        <!-- Product Owner -->
        <div style="font-weight:bold" >{{$store->Storename}}</div>
        <!-- Product Price -->
        <div style="font-weight:bold" >Price: <span style="font-size:130%; color:red">${{$item->price}}</span></div>
        <!-- Avialable Quantity -->
        <div style="font-weight:bold" >Available quantity: <span style="font-size:130%; color:rgb(21, 0, 112)">{{$item->amount}}</span> Pieces</div>
        <!--Product description-->
        <div style="font-weight:bold">Description: {{$item->description}}</div>
        <div>Nice one,</div>
        <div>Awesome!!</div>
    </div>
  </div>

@endsection
</x-Layout>