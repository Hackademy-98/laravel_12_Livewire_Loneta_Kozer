<div class="container">
    <div class="row">
        @if(session('success'))
        <div class="col-12 alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <div class="col-12">
            <h1 class="text-center my-5">Creation</h1>
        </div>
        {{-- @if ($editMode) wire:submit.prevent="update" @else wire:submit.prevent="store" @endif --}}
        
            <form wire:submit.prevent="{{ $editMode ? 'update' : 'store'}}" >
                <div class="mb-3">
                  <label for="name" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="name" wire:model="name" >
                  @error('name') <span class="text-danger">{{ $message}}</span> @enderror
       
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea type="text" class="form-control" id="description"wire:model="description" ></textarea>
                  @error('description') <span class="text-danger">{{ $message}}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Image</label>
                    <input type="file" class="form-control" id="img"wire:model="img">
                    @error('img') <span class="text-danger">{{ $message}}</span> @enderror
                  </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

    </div>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-12">
            <div class="card" style="width: 18rem;">
                <img src="{{Storage::url($product->img)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$product->name}}</h5>
                  <p class="card-text">{{$product->description}}</p>
                  <a class="btn btn-primary" href="{{ route('product.show' ,compact('product'))}}">Detail</a>
                 <button class="btn btn-warning"wire:click="edit({{ $product->id}})">Edit</button>
                 <button class="btn btn-danger"wire:click="destroy({{ $product->id}})">Delete</button>

                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
