@extends('layouts.user')

@section('title','kategori')

@section('contents')
<div class="">
    <h1 class="font-bold text-2xl ml-3 text-gray-900">kategori</h1>
</div>
<div class="p-10">
<a href="{{ url('/create') }}" class="text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Add Data</a> 
</div>
@if (session('secces'))
<div class="alert alert-red-200">
    {{session('success')}}
</div>
@endif
@if (session('error'))
<div class="alert alert-red-600">
    {{session('error')}}
</div>
@endif
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-center text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    id
                </th>
                <th scope="col" class="px-6 py-3">
                    nama
                </th>
                <th scope="col" class="px-6 py-3">
                    deskripsi
                </th>
                <th scope="col" class="px-6 py-3">
                    img_url
                </th>
                <th scope="col" class="px-6 py-3 ">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if($kategori->count() > 0)
            @foreach($kategori as $rs)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $rs->id }}
                </th>
                <td class="px-6 py-3">
                    {{ $rs->name }}
                </td>
                <td class="px-6 py-3">
                    {{ $rs->description }}
                </td>
                <td class="px-6 py-3 ">
                    <a href="{{ asset('uploads/'. $rs->photo) }}" target="_blank"><img src="{{ asset('uploads/'. $rs->photo) }}" alt="" class="w-[6rem] h-[4rem]"></a>
                </td>
                <td class="px-6 py-3 flex">
                    <a href="{{ route('admin/kategori/edit', $rs->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Edit</a>
                    <form action="{{ route('admin/kategori/destroy', $rs->id) }}" method="post" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-lg font-normal text-center">kategori not found</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection