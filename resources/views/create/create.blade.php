@extends('layouts.user')

@section('title','kategori')

@section('contents')
 <h1 class="font-bold text-2xl pl-10 pt-10">Add Kategori</h1>

<form class="w-full p-10" action="{{ route('admin/kategori/store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class=" px-3 mt-4 mb-6 -mx-3">
            <div class="w-[20rem]">
              <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="name">
                Nama
              </label>
              <input name="name"
                     class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                     id="name" value="{{ old('name') }}" type="text" placeholder="Nama" required>
                     @error('name')
                     <div class="text-red-600"> {{$message}} </div>
                     @enderror
            </div>
            <div class="mt-5">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="comment">
                Description
                </label>
                    <div class="mt-2">
                        <textarea rows="4" name="description" id="description" class="block w-[20rem] rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3">
                        {{ old('description') }}
                        </textarea>
                        @error('description')
                          <div class="text-red-600"> {{$message}} </div>
                        @enderror
                    </div>
            </div>
          </div>
            <div class="avatar-upload">
                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="photo">
                   Photo
                </label>
                <div class="w-[12rem]">
                  <img id="output" src="{{ url('/img/foto-profil.jpg') }}" class=""/>
                  <input type="file" name="photo" accept=".png, .jpg, .jpeg" onchange="loadFile(event)" class="mt-5">
                </div>
              </div>
           
            @error('photo')
               <div class="text-red-600"> {{$message}} </div>
             @enderror
          </div>
          <div class="flex flex-wrap mb-14 mr-20">
            <div class="w-full px-3 text-right">
              <a class="px-4 py-2 font-bold text-white bg-red-500 rounded shadow-lg hover:bg-red-700" href="{{route('kategori/index')}}">Cencel</a>
              <button type="submit"
                      class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                Save Data
              </button>
            </div>
          </div>
</form>
@endsection
@push('js')
<script type="text/javascript">
    
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
@endpush