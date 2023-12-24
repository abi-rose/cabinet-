@extends('layout')
@section('nav')
    <div class="h-screen bg-indigo-100 flex justify-center items-center">
        <div class="lg:w-2/5 md:w-1/2 w-2/3">
            <form class="bg-white p-10 rounded-lg shadow-lg min-w-full" method="POST" action="/inscription">
                @csrf

                <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Form Register</h1>

                <div class="my-3">
                    <label class="text-gray-800 font-semibold block text-md" for="nom">Nom</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="nom"
                        id="nom" placeholder="Nom" />
                </div>

                <div class="my-3">
                    <label class="text-gray-800 font-semibold block text-md" for="prenom">Prénom</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="prenom"
                        id="prenom" placeholder="Prénom" />
                </div>

                <div class="my-3">
                    <label class="text-gray-800 font-semibold block text-md" for="dob">Date de naissance</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="date"
                        name="date_de_naissance" id="dob" placeholder="Date de naissance" />
                </div>

                <div class="my-3">
                    <label class="text-gray-800 font-semibold block text-md" for="adresse">Adresse</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="adresse"
                        id="adresse" placeholder="Adresse" />
                </div>

                <div class="my-3">
                    <label class="text-gray-800 font-semibold block text-md" for="email">Email</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="email"
                        id="email" placeholder="Email" />
                </div>

                <div class="my-3">
                    <label class="text-gray-800 font-semibold block text-md" for="telephone">Telephone</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                        name="telephone" id="telephone" placeholder="Telephone" />
                </div>

                <div class="my-3">
                    <label class="text-gray-800 font-semibold block text-md" for="genre">Genre</label>
                    <select class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" name="genre"
                        id="genre">
                        <option value="masculin">Masculin</option>
                        <option value="feminin">Feminin</option>
                    </select>
                </div>

                <div class="my-3">
                    <label class="text-gray-800 font-semibold block text-md" for="password">Password</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password"
                        name="password" id="password" placeholder="Password" />
                </div>



                <button type="submit"
                    class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Register</button>

                <button type="submit"
                    class="w-full mt-6 mb-3 bg-indigo-100 rounded-lg px-4 py-2 text-lg text-gray-800 tracking-wide font-semibold font-sans">Login</button>
            </form>
        </div>
    </div>
@endsection
