<template>
    <div v-if="$page.props.flash.message" class="alert">
        <Notification :message="$page.props.flash.message"/>
      </div>
    
   <div class="container mx-auto flex  justify-around px-5 py-24 md:flex-row flex-col items-center">
    <div
        class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Bienvenu dans mon BLog
        </h1>
        <p class="mb-8 leading-relaxed">Connectez vous pour écrire du contenu</p>
        <div class="flex justify-center">
            <Link :href="route('login')"
                class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">Connexion</Link>
            <Link :href="route('register')"
                class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Inscription</Link>
        </div>
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
        <img class="object-cover object-center rounded" alt="hero" src="https://img.freepik.com/free-photo/blog-notes-concept-with-wooden-blocks-pen-black-notebook-top-view_176474-10347.jpg?w=740">
    </div>
</div>


</template>
<script setup>
import {Link} from '@inertiajs/vue3';
import Notification from '@/Components/Notification.vue';




</script>