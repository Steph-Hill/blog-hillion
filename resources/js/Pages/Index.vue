<template>
    <!-- Navbar du blog -->
    <NavBlog />
       
    <!-- Affiche une liste d'articles -->
    <div class="flex flex-col pt-8 justify-center items-center " v-for="article in articles.data" :key="article.id">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-lg w-full">

            <!-- Image de l'article avec condition si aucune image est enregistrer, affiche une image par defaut -->
            <img v-if="article.image" :src="article.image" alt="Mountain" class="w-full h-64 object-cover">
            <img v-else src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606" alt="Default Image"
                class="w-full h-64 object-cover">
            <div class="p-6">

                <h2 class="text-2xl text-center font-bold text-gray-800 mb-2">{{ article.title }}</h2>

                <p class="text-gray-700 leading-tight mb-4" v-if="article.content.length > 50">
                    {{ article.content.substring(0, 100) }}...
                </p>

                <p class="text-gray-700 leading-tight mb-4" v-else>
                    {{ article.content }}
                </p> 

                <!-- bouton pour modifier, voir plus et supprimer l'article -->
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <Link :href="`/article/edit/${article.id}`">
                        <button
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Modifier
                            </span>
                        </button></Link>
                    </div>
                    <div class="flex items-center">
                        <Link :href="`/article/${article.id}`"><button
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Voir plus
                            </span>
                        </button></Link>
                    </div>
                    <div class="flex items-center">
                        <button @click.prevent="deleteArticle(article.id)"
                            class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                            <span
                                class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Supprimer
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Composant pour la pagination -->
    <Paginator :links="articles.links" />
</template>

<script setup>
import { defineProps } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import NavBlog from '@/Layouts/NavBlog.vue';
import Paginator from '@/Layouts/Paginator.vue'
import Swal from 'sweetalert2';

/* propriété de l'article pour afficher toute les articles */
defineProps({
    articles: Object,
    
});

/* Alert par sweetalert2 pour avertir de la suppression */
const deleteArticle = (id) => {
    Swal.fire({
        title: "Êtes-vous sûre?",
        text: "Vous ne pourrez plus revenir en arrière!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Oui, le supprimer.",
        cancelButtonText: 'Annuler',
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('articles.destroy', { article: id }));
            Swal.fire({
                title: "Supprimer!",
                text: "Votre article à été supprimé avec succès.",
                icon: "success"
            });
        }
    });
}




</script>