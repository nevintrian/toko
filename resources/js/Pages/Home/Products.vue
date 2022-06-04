<template>

<BreezeIndex>
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
        <i class="fa-solid fa-chevron-right"></i>
      </span>
        <p class="text-gray-600 font-medium shop">Shop</p>
    </div>

    <div class="container">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
                </div>
                    <input type="text" name="keywords" placeholder="Search" v-model="keywords" @keyup="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5">
            </div>
    </div>

    <div class="container py-5">

        <form>
        <span class="mr-3">Kategori</span>
            <select v-model="filters" @change="filter" name="filter" class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                <option></option>
                <option :value="category.id"  v-for="category in categories.data" :key="category.id" >
                    {{category.name}}
                </option>
            </select>
            <button class="bg-blue-600 text-white rounded-lg p-2" type="submit" value="Submit">Submit</button>
        </form>
    </div>
    <!-- product -->
    <div class="container my-12 mx-auto px-4 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            <!-- Column -->
            <div v-for="product in products.data" :key="product.id" class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                <!-- Article -->
                <article class="overflow-hidden rounded-lg shadow-lg">
                    <a href="#">
                        <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/600/400/?random" />
                    </a>

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
export default {
    components: {
        BreezeIndex
    },

    props: {
            categories: Object,
            products: Object,
    },

    data(){
        return {
            keywords: '',
            filters: ''
        }
    },

    methods: {
        search() {
            this.$inertia.get("/home/products", { keywords: this.keywords }, { preserveState: true });
        },
        filter() {
            this.$inertia.get("/home/products", { filter: this.filters }, { preserveState: true });
        }
    },
};
</script>
