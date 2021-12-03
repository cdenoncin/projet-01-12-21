<div class="account-section p-16 flex flex-col items-center">
    <h1 class="text-3xl font-bold mb-4">Admin Page</h1>
    <section class="account bg-gray-100 p-6 w-1/2">
        <form action="" class="bg-white p-4">
            <div class="add-comments-item flex flex-col mb-4">
                <label for="firstname" class="mb-2">First Name</label>
                <input required="required" type="text" id="firstname" name="firstname" />
            </div>
            <div class="add-comments-item flex flex-col mb-4">
                <label for="lastname" class="mb-2">Last Name</label>
                <input required="required" type="text" id="lastname" name="lastname" />
            </div>
            <div class="add-comments-item flex flex-col mb-4">
                <label for="email" class="mb-2">Email</label>
                <input required="required" type="text" id="email" name="email" />
            </div>
            <div class="add-comments-item flex flex-col mb-4">
                <label for="isadmin" class="mb-2">Is Admin ?</label>
                <input type="checkbox" id="isadmin" name="isadmin">
            </div>
            <div class="add-comments-item flex flex-col mb-4">
                <label for="password" class="mb-2">Password</label>
                <input required="required" type="password" id="password" name="password" />
            </div>
            <div class="add-comments-item flex flex-col mb-4">
                <label for="passwordverified" class="mb-2">Verify Password</label>
                <input required="required" type="password" id="passwordverified" name="passwordverified" />
            </div>
        </form>
        <button class="px-4 py-2 bg-blue-200 mt-6" type="submit">
            Update infos
        </button>
    </section>
</div>