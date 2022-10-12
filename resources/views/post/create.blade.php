<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post add</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div class="container">
    <div class="row">
      @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div> 
      @endif
      @if(session('error'))
                  <div class="alert alert-danger">
                    {{ session('error') }}
                  </div> 
      @endif
    <div class="col-md-8 m-4">

        <form method="POST" action="{{ $form_url }}" >
            @csrf
            <div class="col-12 mt-10">
              <h3> {{ $title ?? "" }}</h3>
              <input type="hidden" name="id" value="{{ $data->id ?? 0 }}">
              <hr/>
            </div>
            <div class="form-group">
              <label for="title">Post title</label>
              <input type="text" id="title" class="form-control" name="title" value="{{ old("title") ?? ($data->title ?? "") }}" placeholder="Post title">
              
            </div>
            <div class="form-group">
              <label for="body">Post title</label>
              <textarea type="text" id="body" class="form-control preserveLines" name="body" value="{{ old("body") ?? ($data->body ?? "") }}" placeholder="Post body"></textarea>
              
            </div>
            <button type="submit" class="mt-2 btn btn-primary">Submit</button>
            <a href="{{ route('home') }}" class="mt-2 text-white btn btn-warning">Back</a>
          </form>
               
        
    </div>
      
  </div>
  </div>

    <script src="{{ asset('js/app.js') }}"></script>
    
</body>
</html>


