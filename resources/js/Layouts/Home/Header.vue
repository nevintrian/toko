<template>
    <nav class="flex flex-wrap items-center justify-between w-full py-4 md:py-0 px-4 text-lg text-gray-700 bg-white shadow-md">
        <div>
            <Link :href="route('home')">
                <h1 class="ml-10">Macnifique Collection</h1>
            </Link>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" @click="hide" class="h-6 w-6 cursor-pointer md:hidden block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <div class="hidden w-full md:flex md:items-center md:w-auto" id="menu">
            <ul class="pt-4 text-base text-gray-700 md:flex md:justify-between md:pt-0">
                <li>
                    <Link :href="route('home.products')"  class="md:p-4 py-2 block hover:text-purple-400" href="pages/shop.html">Produk</Link>
                </li>
                <li>
                    <Link :href="route('home.about')"  class="md:p-4 py-2 block hover:text-purple-400" href="#">Tentang</Link>
                </li>
                <li>
                    <Link :href="route('home.contact')"  class="md:p-4 py-2 block hover:text-purple-400" href="#">Kerja Sama</Link>
                </li>
                <li>
                    <Link :href="route('home.faq')" class="md:p-4 py-2 block hover:text-purple-400" href="#">Faq</Link>
                </li>
                <li>
                    <Link :href="route('login')" class="md:p-4 py-2 block hover:text-amber-700 text-amber-800 font-semibold" href="pages/login.html">{{this.$page?.props?.auth?.user?.name ?? 'LOGIN'}}</Link>
                </li>
            </ul>
        </div>
    </nav>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        Link
    },
    methods: {
        hide() {
            const menu = document.querySelector("#menu");
             menu.classList.toggle("hidden");
        },

        submit() {
            this.form.post(this.route('product.store'), {

            })
        },
    },
};
</script>
