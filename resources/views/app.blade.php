<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite('resources/css/app.css')
</head>

<body class="relative h-screen gradient-background">

  @auth
  <header class="bg-blue-200 h-fit border-2 border-black border-solid">
    <form method="POST" action="/logout"> @csrf
      <button class="m-3 p-1 border-solid border-2 border-black rounded-sm">Logout</button>
    </form>
  </header>

  <!--
  <div class="relative h-fit">
    <h1 class="text-2xl text-center p-3">My name</h1>

    <div class="flex flex-col items-center justify-center">
      <div class="my-2 w-[50%] h-fit">
        <span>13-4-2019</span>
        <div class="h-20 my-3 p-4 border-1 border-black border-solid bg-gradient-to-r from-cyan-100 to-blue-100 overflow-clip" style="border-radius: 50px;">
          <span class="text-wrap">My literature story</span>
        </div>
      </div>
      <div class="my-2 w-[50%] h-fit">
        <span>20-5-2019</span>
        <div class="h-20 my-3 p-4 border-1 border-black border-solid bg-gradient-to-r from-cyan-100 to-blue-100 overflow-clip" style="border-radius: 50px;">
          <span class="text-wrap">My developer story</span>
        </div>
      </div>
      <div class="my-2 w-[50%] h-fit">
        <span></span>
        <div class="h-20 my-3 p-4 border-1 border-black border-solid bg-gradient-to-r from-cyan-100 to-blue-100 overflow-clip" style="border-radius: 50px;">
          <span class="text-wrap">Create a new branch..</span>
        </div>
      </div>
    </div>
  </div>
  -->

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
        <a href="/edit-post/{{ $post->id }}">Edit</a>
        <form method="POST" action="/delete-post/{{ $post->id }}"> @csrf
          @method('DELETE')
          <button>Delete</button>
        </form>
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

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;700&display=swap');
  </style>
</html>
