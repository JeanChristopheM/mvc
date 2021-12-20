<?php require 'View/includes/header.php'?>
<section>
    <div class="limit">
        <form action="/signup/" method='post'>
            <input type="text" name="usernameSignup" placeholder="username"><br>
            <input type="password" name="passwordSignup" placeholder="pwd"><br>
            <input type="mail" name="mailSignup" placeholder="mail"><br>
            <button>Sign Up</button>
        </form>
    </div>
</section>
<?php require 'View/includes/footer.php'?>