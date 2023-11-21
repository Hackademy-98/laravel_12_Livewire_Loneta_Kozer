<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="card" style="width: 18rem;">
                    <img src="{{Storage::url($product->img)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$product->name}}/h5>
                      <p class="card-text">{{$product->decsription}}</p>
                     
                    </div>
                  </div>

            </div>
        </div>
    </div>
</x-layout>