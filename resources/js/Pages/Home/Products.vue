<template>
    <BreezeIndex>
        <h1 class="text-center text-2xl font-sans font-bold my-6">
                Semua Produk
        </h1>

        <div class="flex items-center justify-center leading-none p-2 md:px-10 ">
            <div>
                <div class="container py-5 ml-6">
                    <select
                        v-model="filters"
                        @change="filter"
                        name="filter"
                        class="rounded-md border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10 mr-2"
                    >
                        <option value="" disabled selected hidden>Pilih Kategori</option>
                        <option
                            :value="category.id"
                            v-for="category in categories.data"
                            :key="category.id"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div>
                <div class="container">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full ml-6">
                        <div
                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            name="keywords"
                            placeholder="Search"
                            v-model="keywords"
                            @keyup="search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                        />
                    </div>
                </div>
            </div>
        </div>



        <!-- product -->
        <div v-if="products.data.length">
            <div class="container my-12 mx-auto px-4 md:px-12">
                <div class="flex flex-wrap -mx-1 lg:-mx-4">
                    <!-- Column -->

                    <div
                        v-for="product in products.data"
                        :key="product.id"
                        class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3"
                    >
                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg">
                            <Link :href="route('home.product', product.id)">
                                <img
                                    alt="Placeholder"
                                    class="block h-auto w-full"
                                    :src="'/uploads/products/' + product.image"
                                />
                            </Link>

                            <header
                                class="flex items-center justify-between leading-tight p-2 md:p-4"
                            >
                                <h1 class="text-lg">
                                    <a class="font-sans text-black" href="#">
                                        {{ product.name }}
                                    </a>
                                </h1>
                            </header>
                            <p class="ml-4 font-sans font-bold text-lg">
                                Stok : {{ product.stock }}
                            </p>
                            <p
                                class="ml-4 mb-4 font-sans text-slate-800 font-bold text-lg"
                            >
                                Rp {{ product.price }}
                            </p>
                            <p class="ml-4 font-sans text-lg">
                                Terjual : {{ product.sold }}
                            </p>

                            <footer
                                class="flex items-center justify-between leading-none p-2 md:p-4"
                            >
                                <Link
                                    class="flex items-center text-black"
                                    :href="route('home.product', product.id)"
                                >
                                    <button
                                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                    >
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
        </div>
        <div v-else>
            <div class="container my-12 mx-auto px-4 md:px-12">
                <div class="text-center">
                    <h2>Produk tidak ditemukan</h2>
                </div>
            </div>
        </div>
    </BreezeIndex>
</template>
<script>
import BreezeIndex from "@/Layouts/Home/Index.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        BreezeIndex,
        Link,
    },

    props: {
        categories: Object,
        products: Object,
    },

    data() {
        return {
            keywords: "",
            filters: "",
        };
    },

    methods: {
        search() {
            this.$inertia.get(
                "/home/products",
                { keywords: this.keywords },
                { preserveState: true }
            );
        },
        filter() {
            this.$inertia.get(
                "/home/products",
                { filter: this.filters },
                { preserveState: true }
            );
        },
    },
};
</script>
