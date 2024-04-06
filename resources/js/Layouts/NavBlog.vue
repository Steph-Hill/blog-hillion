<template>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Mon Blog</span>

            <div class="flex items-center md:order-2 space-x-1 md:space-x-2 rtl:space-x-reverse">
                <div v-if="$page.props.auth.user">
                    <Link :href="route('profile.edit')"
                    class="text-gray-800 dark:text-white hover:bg-blue-200 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                    {{ $page.props.auth.user.name }}
                </Link>
                <Link :href="route('logout')" method="post" as="button"
                    class="text-gray-800 dark:text-white hover:text-white hover:bg-red-500 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                    Deconnexion
                </Link>

                    <!-- Dropdown menu -->
                    <div id="dropdownInformation"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <Link :href="route('profile.edit')">
                            <div class="font-medium truncate">
                                {{ $page.props.auth.user.email }}
                            </div>
                            </Link>
                        </div>

                        <div class="py-2 text-center hover:bg-red-500 hover:text-gray-100 hover:rounded-lg">
                            <Link :href="route('logout')" method="post" as="button">Deconnexion</Link>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <Link :href="route('login')"
                        class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                    Connexion</Link>
                    <Link :href="route('register')"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Inscription</Link>
                </div>
            </div>
            <div id="mega-menu" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                <ul class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse">
                    <li>
                        <Link :href="route('article-list')"
                            class="block py-2 px-3 text-blue-600 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-blue-500 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700"
                            aria-current="page">Home</Link>
                    </li>
                    <li>
                        <Link :href="route('article-create')"
                            class="block py-2 px-3 text-gray-900 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                        Ajouter un article</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div v-if="$page.props.flash.message" class="alert">
        {{ $page.props.flash.message }}
      </div>
</template>

<script setup>
import { defineProps } from "vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    Login: {
        type: Boolean,
    },
});
</script>
