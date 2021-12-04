<div class="admin-section p-16">
    <h1 class="text-3xl font-bold mb-4">User List Page</h1>
    <section class="w-full">
        <div class="bg-red-200 p-4 mb-6">
            <p class="font-bold">Faites bien attention à ne pas supprimer votre propre utilisateur !</p>
        </div>
        <ul class="admin-list">
            <li class="flex justify-between font-bold">
                <p class="flex-1">First Name</p>
                <p class="flex-1">Last Name</p>
                <p class="flex-1">Email</p>
                <p class="flex-1">Is Admin</p>
                <p class="flex-1">Action</p>
            </li>
            <?php foreach( $args["users"] as $user ) { ?>
            <li class="flex justify-between">
                <p class="w-1/5"><?= $user->getFirstName() ?></p>
                <p class="w-1/5"><?= $user->getLastName() ?></p>
                <p class="w-1/5"><?= $user->getMail() ?></p>
                <div class="w-1/5">
                    <input type="checkbox" id="isadmin" name="isadmin" disabled <?php if($user->getIsAdmin() == '1') { echo ('checked'); }  ?>>
                </div>
                <?php if($idUserConnected !== $user->getId()) { ?>
                    <a href="/delete-user/<?= $user->getId() ?>" class="w-1/5 underline">Delete user</a>
                <?php } else { ?>
                    <a class="w-1/5 underline opacity-30 cursor-default">Delete user</a>
                <?php  } ?>
            </li>
            <?php } ?>
        </ul>
    </section>
</div>
