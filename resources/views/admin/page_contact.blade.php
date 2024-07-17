@extends('admin.layout.app')

@section('heading', 'Contact Page Content')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Form untuk mengupdate konten halaman kontak -->
                    <form action="{{ route('admin_contact_page_update') }}" method="post">
                        @csrf <!-- Token keamanan untuk form -->

                        <!-- Input untuk heading halaman kontak -->
                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text" class="form-control" name="heading" value="{{ $page_contact_data->heading }}">
                        </div>

                        <!-- Textarea untuk kode peta -->
                        <div class="form-group mb-3">
                            <label>Map Code *</label>
                            <textarea name="map_code" class="form-control h_100" cols="30" rows="10">{{ $page_contact_data->map_code }}</textarea>
                        </div>

                        <!-- SEO Section -->
                        <h4 class="seo_section">SEO Section</h4>

                        <!-- Input untuk title SEO -->
                        <div class="form-group mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $page_contact_data->title }}">
                        </div>

                        <!-- Textarea untuk meta description SEO -->
                        <div class="form-group mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control h_100" cols="30" rows="10">{{ $page_contact_data->meta_description }}</textarea>
                        </div>

                        <!-- Tombol untuk submit form -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection