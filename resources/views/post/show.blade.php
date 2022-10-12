<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show post</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


</head>
<body>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-10">
                <h4>{{ $title }}</h4>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->body }}</p>
                    </div>
                  
                </div>
            </div>
            @if (($post->user_id == Session::get('id')) || (Session::has('adminname')))
                <div class="col-md-2">
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success">Edit</a>
                </div>
            @endif
            
            
            <div class="col-md-10 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h5>Add a comment</h5>
                        <form action="{{ route('comment.store', $post->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="comment"></label>
                                <textarea type="text" id="comment" class="form-control" name="comment" placeholder="Comment"></textarea>
                                
                            </div>
                            <br>
                            <button class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
                <br>
            </div>
           
            
           

           
            
            @foreach ($comments as $comment)
            <form action="{{ route('comment.hide',$comment->id) }}" method="GET">
                @csrf
               <div class="card mt-2">
                   <div class="card-body">
                        <h5 class="card-title">{{ $comment->users->name }}</h5>
                        <h6 class="card-title">{{ $comment->created_at->format('d M, Y') }}</h6>
                        <p>{{ $comment->comment }}</p>
                        @if(($post->user_id == Session::get('id')) || (Session::has('adminname')))
                        <span class="my-2 d-flex align-items-end justify-content-end"><button class="btn btn-success">Hide</button></span>
                        @else
                        @endif       
                    </div>
                      
                </div>
            </form>
                    
                
            
                
            @endforeach
            
            
            
        </div>
        <div class="mb-3">

        </div>
    </div>
    
    
   
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>