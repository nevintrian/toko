
<template>
<BreezeIndex>
   <section id="home" class="pt-16 pb-32">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="self-center w-full px-4 lg:w-1/2 text-center">
                    <h1 class="block m-4 text-4xl font-poppins font-semibold lead text-dark dark:text-white lg:text-4xl sm:text-center md:text-center xl:text-center">E-Commerce Toko Baju</h1>
                    <p class="mb-10 font-medium leading-relaxed text-slate-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem debitis tempora obcaecati magnam minus totam.</p>

                    <a href="#" class="px-8 py-3 text-base font-semibold text-white transition duration-300 ease-in-out rounded-full bg-primary hover:opacity-80 hover:shadow-lg">Hubungi Saya</a>
                </div>
                <div class="self-end w-full px-4 lg:w-1/2">
                    <div class="relative mt-10 lg:right-0 lg:mt-9">
                        <img src="assets/images/korone.png" alt="Brian Vidyanjaya" class="relative z-10 w-1/2 mx-auto" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Hero2 Section Start -->
    <section id="about" class="">
        <div class="bg-slate-100">
            <div class="flex flex-wrap">
                <div class="self-end w-full px-4 lg:w-1/2">
                    <div class="relative mt-10 lg:right-0 lg:mt-9">
                        <img src="assets/images/korone.png" alt="Brian Vidyanjaya" class="relative z-10 w-1/3 mx-auto" />
                    </div>
                </div>
                <div class="self-center w-full px-4 lg:w-1/2 text-center">
                    <h1 class="block m-4 text-4xl font-poppins font-semibold lead text-dark dark:text-white lg:text-3xl sm:text-center md:text-center xl:text-center">Kenapa Belanja disini?</h1>
                    <p class="mb-10 font-medium leading-relaxed text-slate-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem debitis tempora obcaecati magnam minus totam.</p>

                    <a href="#" class="px-8 py-3 text-base font-semibold text-white transition duration-300 ease-in-out rounded-full bg-primary hover:opacity-80 hover:shadow-lg">Hubungi Saya</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero2 Section End -->

    <!-- categories -->
    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Kategori Produk</h2>
        <div class="grid grid-cols-3 gap-3">
            <div v-for="category in categories.data" :key="category.id" class="relative rounded-sm overflow-hidden group">
                <img src="assets/images/category/category-1.jpg" alt="category 1" class="w-full" />
                <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">{{ category.name }}</a>
            </div>
        </div>
    </div>
    <!-- ./categories -->

    <!-- Search field -->
    <div class="container">
        <form class="flex items-center">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
                </div>
                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search" required />
            </div>
            <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </button>
        </form>
    </div>
    <!-- END Search field -->

    <!-- product -->
    <div class="container my-12 mx-auto px-4 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            <!-- Column -->
            <div v-for="product in products.data" :key="product.id" class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                <!-- Article -->
                <article class="overflow-hidden rounded-lg shadow-lg">
                    <Link :href="route('home.product')">
                        <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/600/400/?random" />
                    </Link>

                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-black" href="#"> {{ product.name }} </a>
                        </h1>
                        <p class="text-grey-darker text-sm">{{ product.price }}</p>
                    </header>

                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                        <a class="flex items-center text-black" href="#">
                            <button class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            BUY
                            </button>
                        </a>
                        <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                            <span class="hidden">Like</span>
                            <i class="fa fa-heart"></i>
                        </a>
                    </footer>
                </article>
                <!-- END Article -->
            </div>
            <!-- END Column -->
        </div>
    </div>
    <!-- ./product -->

</BreezeIndex>

</template>

<script>
import BreezeIndex from '@/Layouts/Home/Index.vue'
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        BreezeIndex,
        Link
    },

    props: {
        categories: Object,
        products: Object,
    },
    // data() {
    //     return {
    //         user_count: this.$page.props.user_count,
    //         category_count: this.$page.props.category_count,
    //         product_count: this.$page.props.product_count,
    //         order_count: this.$page.props.order_count,
    //         purchase_count: this.$page.props.purchase_count,
    //     };
    // },

    methods: {

    },
};
</script>
