@extends('layouts.user')

@section('title','Edit Kategori')

@section('contents')
<h1>Edit Kategori</h1>
<form class="w-full p-10" action="{{ route('admin/kategori/update', $kategori)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class=" px-3 mt-4 mb-6 -mx-3">
            <div class="w-[20rem]">
              <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="name">
                Nama*
              </label>
              <input name="name"
                     class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                     id="name" type="text" value="" placeholder="Nama" required>
            </div>
            <div class="mt-5">
                <label for="comment" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                    <div class="mt-2">
                        <textarea rows="4" name="description" id="description" class="block w-[20rem] rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-3">
                       
                        </textarea>
                    </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Photo</label>
            <div class="avatar-upload">
                <input type="file" id="photo" name="photo"  accept=".png, .jpg, .jpeg" onchange="previewImage(this)">
                <label for="photo"></label>
            </div>
            <div class="avatar-preview">
              <div id="imagePreview" style="background-image: url('{{ url('/img/fotoku.jpeg') }}')"></div>
            </div>
          </div>
          <div class="flex flex-wrap mb-6 -mx-3">
            <div class="w-full px-3 text-right">
              <button type="submit"
                      class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                Save Data
              </button>
            </div>
          </div>
</form>
@endsection