<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite('resources/css/app.css')
</head>
<body>
    <h1>Edit post</h1>
    <form method="POST" action="/edit-post/{{ $post->id }}"> @csrf
        @method('PUT')
        <input name="title" type="text" placeholder="title here" />
        <textarea name="body" cols="30" rows="10" placeholder="write something"></textarea>
        <button>Edit</button>
    </form>
</body>
</html>
