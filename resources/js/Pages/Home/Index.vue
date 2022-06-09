
<template>
<BreezeIndex>
   <section id="home" class="pt-16 pb-32">
        <div class="container">

            <div class="flex flex-wrap">
                <div class="self-center w-full px-4 lg:w-1/2 text-center">
                    <h1 class="block m-4 text-4xl font-poppins font-semibold lead text-dark dark:text-white lg:text-4xl sm:text-center md:text-center xl:text-center">{{ homes?.data[0]?.title }}</h1>
                    <p class="mb-10 font-medium leading-relaxed text-slate-600">{{ homes?.data[0]?.content }}</p>
                    <a :href="'https://wa.me/62' + homes?.data[0]?.contact.phone" class="px-8 py-3 text-base font-semibold text-white transition duration-300 ease-in-out rounded-full bg-primary hover:opacity-80 hover:shadow-lg">Hubungi Saya</a>
                </div>
                <div class="self-end w-full px-4 lg:w-1/2">
                    <div class="relative mt-10 lg:right-0 lg:mt-9">
                        <img :src="'/uploads/homes/'+homes?.data[0]?.image" alt="Brian Vidyanjaya" class="relative z-10 w-1/2 mx-auto" />
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
                        <img :src="'/uploads/homes/'+homes?.data[1]?.image" alt="Brian Vidyanjaya" class="relative z-10 w-1/3 mx-auto" />
                    </div>
                </div>
                <div class="self-center w-full px-4 lg:w-1/2 text-center">
                    <h1 class="block m-4 text-4xl font-poppins font-semibold lead text-dark dark:text-white lg:text-3xl sm:text-center md:text-center xl:text-center">{{ homes?.data[1]?.title }}</h1>
                    <p class="mb-10 font-medium leading-relaxed text-slate-500">{{ homes?.data[1]?.content }}</p>
                    <a :href="'https://wa.me/62' + homes?.data[1]?.contact.phone" class="px-8 py-3 text-base font-semibold text-white transition duration-300 ease-in-out rounded-full bg-primary hover:opacity-80 hover:shadow-lg">Hubungi Saya</a>
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
                <a :href="'/home/products?' + category.id" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">{{ category.name }}</a>
            </div>
        </div>
    </div>
    <!-- ./categories -->


    <!-- product -->
    <div class="container my-12 mx-auto px-4 md:px-12">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Produk Terlaris</h2>
        <div class="flex flex-wrap -mx-1 lg:-mx-4">

            <!-- Column -->
            <div v-for="product in products.data" :key="product.id" class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                <!-- Article -->
                <article class="overflow-hidden rounded-lg shadow-lg">
                    <Link :href="route('home.product', product.id)">
                        <img alt="Placeholder" class="block h-auto w-full" :src="'/uploads/products/'+product.image" />
                    </Link>

                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-black" href="#"> {{ product.name }} </a>
                        </h1>

                    </header>
                    <p>Stok : {{product.stock}}</p>
                    <p>Harga : {{product.price}}</p>
                    <p>Terjual : {{product.sold}}</p>

                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">

                        <Link class="flex items-center text-black" :href="route('home.product', product.id)">
                            <button class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            Lihat
                            </button>
                        </Link>

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
        homes: Object,
    },

    methods: {
        search() {
            this.$inertia.get("/home/index", { keywords: this.keywords }, { preserveState: true });
        },

    },
};
</script>
