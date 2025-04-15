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

  @else
  <div class="border-2 border-black border-solid">
   <h2>Sign Up</h2>
    <form method="POST" action="/register"> @csrf
      <input name="register_name" type="text" placeholder="name" />
      <input name="register_email" type="email" placeholder="email" />
      <input name="register_password" type="password" placeholder="password" />
      <button>Register</button>
    </form> 
  </div>
  <div class="border-2 border-black border-solid">
    <h2>Login</h2>
     <form method="POST" action="/login"> @csrf
       <input name="login_name" type="text" placeholder="name" />
       <input name="login_password" type="password" placeholder="password" />
       <button>Continue</button>
     </form> 
   </div>

   @endauth

  </body>
</html>
