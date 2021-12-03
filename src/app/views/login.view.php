<?php
$database_connection = new \App\Database\Database();

$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['mail'];
$isAdmin = $_POST['is_admin'];
$password = $_POST['password'];

if ($isAdmin == 'on') {
    $_POST['is_admin'] = 1;
}

$userManager = new \App\Manager\UserManager($database_connection->connection);
$userManager->create($_POST)
?>
<div class="login-section p-16 flex flex-col items-center">
    <section class="bg-gray-100 p-6 w-1/2">
        <div class="bg-white border-solid border-black p-4">
            <h2 class="text-xl font-bold mb-4">Inscription</h2>
            <form action="index.php" method="POST" class="bg-white p-4">
                <div class="flex flex-col mb-4">
                    <label for="firstname" class="mb-2">First Name</label>
                    <input required="required" type="text" id="firstname" name="first_name" />
                </div>
                <div class="flex flex-col mb-4">
                    <label for="lastname" class="mb-2">Last Name</label>
                    <input required="required" type="text" id="lastname" name="last_name" />
                </div>
                <div class="flex flex-col mb-4">
                    <label for="email" class="mb-2">Email</label>
                    <input required="required" type="text" id="email" name="mail" />
                </div>
                <div class="flex flex-col mb-4">
                    <label for="isadmin" class="mb-2">Is Admin ?</label>
                    <input type="checkbox" id="isadmin" name="is_admin">
                </div>
                <div class="flex flex-col mb-4">
                    <label for="password" class="mb-2">Password</label>
                    <input required="required" type="password" id="password" name="password" />
                </div>
                <div class="flex flex-col mb-4">
                    <label for="passwordverified" class="mb-2">Verify Password</label>
                    <input required="required" type="password" id="passwordverified" name="passwordverified" />
                </div>
                <button class="px-4 py-2 bg-blue-200 mt-6" type="submit">
                    S'inscrire
                </button>
            </form>
        </div>
    </section>

    <section class="login bg-gray-100 p-6 w-1/2 mt-6">
        <div class="bg-white border-solid border-black p-4">
            <h2 class="text-xl font-bold mb-4">Connexion</h2>
            <form action="" class="bg-white p-4">
                <div class="flex flex-col mb-4">
                    <label for="email" class="mb-2">Email</label>
                    <input required="required" type="text" id="email" name="email" />
                </div>
                <div class="flex flex-col mb-4">
                    <label for="password" class="mb-2">Password</label>
                    <input required="required" type="password" id="password" name="password" />
                </div>
                <button class="px-4 py-2 bg-blue-200 mt-6" type="button">
                    Se connecter
                </button>
            </form>
        </div>
    </section>
</div>