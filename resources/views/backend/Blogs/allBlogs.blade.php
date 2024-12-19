@extends('backend.layout')
@section('backend_contains')
    <section id="blogs">
        <div class="container table-responsive">
            <table class="table table-hover  table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Title</th>
                        <th style="text-align: center;">Image</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($blogs as $key => $blog )
                        <tr class="">
                            <td valign="middle" align="center">{{ ++$key }}</td>
                            <td valign="middle" width="30%">{{ Str::limit($blog->blog_title, 50, '...') }}</td>
                            <td valign="middle" align="center">
                                <img style="width:80px; height:80px; object-fit:cover; border-radius:50%;" src="{{ $blog->blog_preview_image }}" alt="">
                            </td>
                            <td valign="middle" class="text-center">
                                <a href="#" >
                                    <span>
                                        @if ($blog->status == 1 )
                                        <iconify-icon icon="nrk:check-active" width="24" height="24"></iconify-icon>
                                        @else
                                        <iconify-icon icon="nrk:close-active" width="24" height="24"></iconify-icon>
                                        @endif
                                    </span>
                                </a>
                            </td>
                            <td valign="middle" class="text-center"> 
                                <a style="width:50%; display:inline-block;" href="{{ route('backend.blog.edit', $blog->blog_slug) }}">
                                    <span><iconify-icon icon="flowbite:edit-outline" width="24" height="24"></iconify-icon></span>
                                </a>
                                <a href="#" >
                                    <span class="text-danger"><iconify-icon icon="material-symbols:delete-outline-sharp" width="24" height="24"></iconify-icon></span>
                                </a>
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
    <script src="{{ asset('assets/js/iconify-icon.min.js') }}"></script>
    @endpush
@endsection