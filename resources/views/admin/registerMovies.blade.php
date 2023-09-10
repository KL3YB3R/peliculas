@extends('admin.layouts.admin')

@section('form')
    <form action="/movies/register" method="POST" enctype="multipart/form-data" class="d-flex row justify-content-start align-items-start">
        @csrf
        <aside>
            <label for="name">Name Movie</label>
            <input type="text" id="name" name="name">
        </aside>
        <aside>
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
        </aside>
        <aside>
            <label for="date_published">Date Published</label>
            <input type="date" id="date_published" name="date_published">
        </aside>
        <aside>
            <label for="genders">Genders Movie</label>
            <input type="text" id="genders" name="genders">
        </aside>
        <aside>
            <label for="image">Image Movie</label>
            <input type="file" id="image" name="image">
        </aside>

        <button type="submit">register movie</button>
    </form>
@endsection
