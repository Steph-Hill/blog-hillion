<template>
    <NavBlog />
    <div class=" flex justify-start ml-7">
     <Link :href="route('article-list')">   <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm
        font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500
        group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4
        focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
        <span
            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Retour
        </span>
        </button></Link>
    </div>
    <div class="relative max-w-xl mx-auto mt-20">
        <img  v-if="article.image" class="h-64 w-full object-cover rounded-md" :src="article.image" alt="Random image" />
        <img  v-else class="h-64 w-full object-cover rounded-md" src="https://images.unsplash.com/photo-1454496522488-7a8e488e8606" alt="Random image" />
        <div class="absolute inset-0 bg-gray-500 opacity-20 rounded-md"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <h2 class="text-white text-3xl font-bold">{{ article.title }}</h2>
        </div>
    </div>
    <div class="max-w-2xl mx-auto">
        <div
            class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">

            <div class="">

                <button type="button" href="#"
                    class="text-xs text-indigo-600 uppercase font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                    {{category.name}}
                </button>

                <p class="text-base leading-8 my-5">
                    {{article.content}}
                </p>



            </div>
        </div>
        
    </div>

    <!--  <div>
        <h1>{{ article.title }}</h1>
        <div>
            <span>{{ article.content }}</span>
        </div>

    </div> -->

</template>

<script setup>

import { defineProps } from 'vue';
import NavBlog from '@/Layouts/NavBlog.vue';
import { Link } from '@inertiajs/vue3';


defineProps({
    article: Object,
    category: Object,
});

</script>