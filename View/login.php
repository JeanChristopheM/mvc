<?php require 'View/includes/header.php'?>
<section>
    <div class="limit">
        <form action="/home/" method='post'>
            <input type="text" name="usernameInput" placeholder="username"><br>
            <input type="text" name="passwordInput" placeholder="pwd"><br>
            <button>Sign In</button>
        </form>
    </div>
</section>
<?php require 'View/includes/footer.php'?>