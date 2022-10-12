@extends('admin.master.masterAdmin')

@section('allpost')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-striped table-bordered table-lg table-hover">
                <thead class="table text-white" style="background-color: #0ac282">
                  <tr class="text-center">
                    <th scope="col">#</th>
                    <th>Post title</th>
                    <th>Post body</th>
                    <th >Post created by</th>
                    <th >Post created at</th>
                    <th >Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                @forelse ($posts as $post)
                  <tr class="text-center">
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->body,20) }}</td>
                    <td>{{ $post->users->name ?? "N/A"}}</td>
                    <td>{{ $post->created_at ?? "N/A"}}</td>
                    <td class="d-flex gap-2 ml-2 mt-4">
                      <a href="{{ route('post.hide', $post->id ) }}" class="btn btn-sm btn-info">Hide</a> 
                      
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="12" style="text-align:center"><h3>No data found</h3></td>
                  </tr> 
                @endforelse
                </tbody>
              </table>
              <div class="d-flex justify-content-start">
                {!! $posts->links() !!}
              </div>
        </div>
    </div>
</div>
@endsection
