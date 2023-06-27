<style>section {padding: 0!important;}</style>
<div class="py-10">
    <div class="lg:w-6/12 rounded-2xl m-auto bg-blue-600 py-10">
        <h1 class="text-4xl text-center font-bold py-5 text-white">Login</h1>
        <form action="?controller=user&action=signIn" method="POST" class="w-6/12 m-auto">
            <label class="text-2xl text-white">Email</label>
            <input class="w-full px-3 text-black bg-white rounded-xl my-5 py-3" name="email" type="email">
            <label class="text-2xl text-white">Wachtwoord</label>
            <input class="w-full px-3 text-black bg-white rounded-xl my-5 py-3" name="password" type="text">
            <input class="text-white px-10 py-2 bg-green-800 rounded-full" value="Login" type="submit">
        </form>
    </div>
</div>
