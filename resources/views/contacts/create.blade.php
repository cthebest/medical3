@extends('layouts.web')

@section('content')
    <div class="flex flex-wrap py-10 bg-white">
        <div class="w-full md:w-1/4 p-4 ">
            <h3 class="text-xl text-[#006699]">Información de contacto</h3>
            <ul class="py-6">
                <li><i class="fa-solid fa-envelope"></i> correo@mail.com</li>
                <li><i class="fa-solid fa-phone"></i> número de teléfono</li>
                <li><i class="fa-solid fa-globe"></i> <a href="">dirección web</a></li>
            </ul>
        </div>
        <div class="w-full md:w-3/4 p-4">
            <h3 class="text-xl text-[#006699]">Formulario de contacto</h3>
            <form>
                <div class="md:flex md:items-center mb-6 sm:space-y-3 md:space-x-3 md:space-y-0 pt-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-medium mb-2" for="name">
                            Nombre
                        </label>
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="name" type="text" placeholder="Ingresa tu nombre">
                    </div>
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-medium mb-2" for="email">
                            Correo electrónico
                        </label>
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="email" type="email" placeholder="Ingresa tu correo electrónico">
                    </div>
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-medium mb-2" for="phone">
                            Teléfono
                        </label>
                        <input
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="phone" type="tel" placeholder="Ingresa tu teléfono">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-2">
                    <div class="md:w-full">
                        <label class="block text-gray-500 font-medium mb-2" for="message">
                            Mensaje
                        </label>
                        <textarea
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="message" rows="3" placeholder="Ingresa tu mensaje"></textarea>
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-full">
                        <button
                            class="bg-[#bffc45] hover:bg-[#b8f53f] text-white font-medium py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
                            type="submit">
                            Enviar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <section class="space-y-4">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d120689.12363162886!2d-98.26300596649035!3d19.04019627469931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sco!4v1673910984785!5m2!1ses-419!2sco"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="w-full"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
@endsection
