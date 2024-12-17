@extends('backend.layout')
@section('backend_contains')
    <section id="blogs">
        <div class="container table-responsive">
            <table class="table table-hover  table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($blogs as $key => $blog )
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ Str::limit($blog->blog_title, 50, '...') }}</td>
                            <td>{!! Str::limit($blog->blog_details,100, '...') !!}</td>
                            <td>
                                <img style="width:100px;" class="img-fluid" src="{{ $blog->blog_preview_image }}" alt="">
                            </td>
                            <td>0</td>
                            <td>
                                <a href="{{ route('backend.blog.edit', $blog->blog_slug) }}">Edit</a>
                                <a href="#">Delete</a>
                            </td>
                        </tr>
                    @empty

                      <tr>
                        <td class="text-danger">No data found!</td>
                      </tr>
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    @push('backend_js')
    <script src="https://cdn.jsdelivr.net/npm/@iconify/iconify@3.1.1/dist/iconify.min.js"></script>
    @endpush
@endsection