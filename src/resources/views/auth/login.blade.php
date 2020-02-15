<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>

        <form method="post" action="{{ route('admin.login.attempt') }}" autocomplete="off">
            @csrf
            <input type="text" name="email">
            <input type="text" name="password">
            <input type="submit" name="submit" value="Login">
        </form>

    </body>
</html>