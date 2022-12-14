@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Crea il post:</h1>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="input-group mb-3">
                        <div class="cover__post">
                            <label for="cover" aria-describedby="inputGroupFileAddon02">Scegli
                                la cover</label>
                            <input type="file"  id="imgInp" name="cover" value="{{ old('cover') }}">
                            <img id="blah"  />
                        </div>
                    
                    </div>

                    {{-- <form >
                        <input  type='file' id="imgInp" />
                        <img id="blah"  />
                      </form> --}}

                    <p>
                        <label for="title">titolo</label>
                        <input type="text" name='title' id='title' value="{{ old('title') }}"
                            placeholder="titolo">
                    </p>
                    <p>
                        <label for="content">Contenuto</label>
                        <textarea name="content" id="content" cols="100" rows="20" placeholder="Contenuto del Post">{{ old('content') }}</textarea>
                    </p>
                    <label for="category">Categoria</label>
                    <select name="category_id" id="" required>
                        <option value=" ">--nessuna--</option>
                        @foreach ($categories as $category)
                            <option @if (old('category_id') == $category->id) selected @endif value="{{ $category->id }}">
                                {{ $category->name }}</option>
                        @endforeach
                    </select>

                    <div class="form-group">
                        <label for="tags"> Tags: </label>
                        @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                {{-- il name per il tag va scritto con le quadre,cos?? le salva come array  --}}
                                <input class="form-check-input" name="tags[]"
                                    @if (in_Array($tag->id, old('tags', []))) checked @endif type="checkbox"
                                    id="tag-{{ $tag->id }}" value="{{ $tag->id }}">
                                <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach

                    </div>
                    <button type="submit">Posta</button>
                </form>

            </div>
        </div>
    </div>

    {{-- STAMPA L'ERRORE  --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
