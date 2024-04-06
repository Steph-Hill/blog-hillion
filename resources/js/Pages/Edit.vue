<template>
    <NavBlog />

    <form @submit.prevent="updateArticle" class="max-w-md mx-auto mt-20 p-6 bg-white border rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6">Modifier l'Article</h2>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="name">
                Titre :
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="name" type="text" placeholder="Entrer votre titre" v-model="form.title">
                <InputError class="mt-2" :message="form.errors.title" />

        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="feedback">
                Description :
            </label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="feedback" rows="5" placeholder="Ecriver votre description..." v-model="form.content"></textarea>
                <InputError class="mt-2" :message="form.errors.content" />

            </div>
        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-bold mb-2">Catégorie :</label>
            <select id="category_id" v-model="form.category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option v-for="category in categories" :key="category.id" :value="category.id">
                    {{ category.name }}
                </option>
            </select>
            <InputError class="mt-2" :message="form.errors.category_id" />

        </div>
        <div class="mb-4">
            <img :src="form.oldImage" class=" rounded-lg shadow"  />

            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Ajouter une image : </label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="file_input" type="file"
                @input="form.image = $event.target.files[0]">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG ou GIF</p>

        </div>
        <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit">
            Créer
        </button>
    </form>

</template>

<script setup>
import { useForm, router } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import NavBlog from '@/Layouts/NavBlog.vue';
import InputError from '@/Components/InputError.vue';

let props = defineProps({
    article: Object,
    categories: Object,
    image: String
});

const form = useForm({
    title: props.article.title,
    content: props.article.content,
    image: null,
    oldImage: props.article.image,
    category_id: props.article.category_id,
});

function updateArticle() {
    router.post(`/article/update/${props.article.id}`, {
        _method: 'put',
        title: form.title,
        content: form.content,
        image: form.image,
        category_id: form.category_id
    })
}



</script>