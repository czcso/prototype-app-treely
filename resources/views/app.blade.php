<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite('resources/css/app.css')
</head>
<body>

  @auth
  <h1>Congrats you're logged in </h1>
  <form method="POST" action="/logout"> @csrf
    <button>Logout</button>
  </form>

  <div class="border-2 border-black border-solid">
    <h2>Create a new post</h2>
    <form method="POST" action="/create-post"> @csrf
      <input name="title" type="text" placeholder="title here" />
      <textarea name="body" cols="30" rows="10" placeholder="write something"></textarea>
      <button>Create</button>
    </form>
  </div>

  <div class="border-2 border-black border-solid">
    <h2>All Posts</h2>
    @foreach($posts as $post)
      <div class="bg-gray-200 p-2 my-2">
        <h2>{{ $post['title'] }}</h2>
        <p>{{ $post['body'] }}</p>
      </div>
    @endforeach
  </div>

  @else
  <div class="flex flex-row">
    <div class="border-2 border-black border-solid">
    <h2>Sign Up</h2>
      <form method="POST" action="/register"> @csrf
        <input name="register_name" type="text" placeholder="name" />
        <input name="register_email" type="email" placeholder="email" />
        <input name="register_password" type="password" placeholder="password" />
        <button class="block border-2 border-black border-solid rounded-sm">Register</button>
      </form> 
    </div>
    <div class="border-2 border-black border-solid">
      <h2>Login</h2>
      <form method="POST" action="/login"> @csrf
        <input name="login_name" type="text" placeholder="name" />
        <input name="login_password" type="password" placeholder="password" />
        <button class="block border-2 border-black border-solid rounded-sm">Continue</button>
      </form> 
    </div>
  </div>

   @endauth

  </body>
</html>
