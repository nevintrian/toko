<template>
    <Head title="Produk"/>

    <BreezeAuthenticatedLayout>
        <div class="px-4 w-full">
            <div
                class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-white xl:mb-0">

                <div class="px-6 py-6 mb-0 bg-white rounded-t">
                    <div class="flex justify-between text-center">
                        <h6 class="text-xl font-bold text-blueGray-700">
                            Tambah Produk
                        </h6>
                    </div>
                </div>

                <div class="flex-auto p-4">

                    <div v-show="$page.props.flash.success"
                         class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-emerald-500">
                        <span class="text-xl inline-block mr-5 align-middle">
                            <i class="fas fa-bell"></i>
                        </span>
                        <span class="inline-block align-middle">
                            <b class="capitalize">Success!</b> {{ $page.props.flash.success }}
                        </span>
                    </div>

                    <BreezeValidationErrors class="mb-4"/>

                    <form @submit.prevent="submit">
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="code" value="Kode"/>
                                    <BreezeInput
                                        placeholder="Masukkan kode produk"
                                        id="code"
                                        type="text"
                                        v-model="form.code"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="name" value="Nama"/>
                                    <BreezeInput
                                        placeholder="Masukkan nama produk"
                                        id="name"
                                        type="text"
                                        v-model="form.name"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="category_id" value="Kategori"/>
                                      <select id="category_id" v-model="form.category_id" required  class="w-full border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="" disabled selected hidden>Pilih Kategori</option>
                                        <option :value="category.id"  v-for="category in categories.data" :key="category.id" >
                                            {{category.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="brand" value="Brand"/>
                                    <BreezeInput
                                        placeholder="Masukkan nama brand"
                                        id="brand"
                                        type="text"
                                        v-model="form.brand"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="stock" value="Stok"/>
                                    <BreezeInput
                                        placeholder="Masukkan jumlah stok"
                                        id="stock"
                                        type="number"
                                        v-model="form.stock"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="price" value="Harga"/>
                                    <BreezeInput
                                        placeholder="Masukkan harga produk"
                                        id="price"
                                        type="number"
                                        v-model="form.price"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="description" value="Deskripsi"/>
                                        <textarea
                                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            id="description"
                                            rows="3"
                                            placeholder="Masukkan deskripsi produk"
                                            v-model="form.description"
                                            required
                                        ></textarea>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="sold" value="Terjual"/>
                                    <BreezeInput
                                        placeholder="Masukkan jumlah produk terjual"
                                        id="sold"
                                        type="number"
                                        v-model="form.sold"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="image" value="Gambar"/>
                                    <BreezeInput
                                        id="image"
                                        type="file"
                                        required
                                        @input="form.image = $event.target.files[0]"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <Link :href="route('product.index')" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-3 px-4 rounded mr-3">Kembali</Link>
                                <BreezeButton
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Simpan
                                </BreezeButton>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Divider from "@/Components/Divider";
import BreezeDropdown from '@/Components/Dropdown.vue'
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Divider,
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        BreezeDropdown,
        Link
    },

    data() {
        return {
            form: useForm({
                code : '',
                name : '',
                category_id : '',
                brand : '',
                description : '',
                stock : '',
                price : '',
                sold : '',
                image : ''
            }),
        };
    },
    props: {
        categories: Object,
    },

    methods: {
        submit() {
            this.form.post(this.route('product.store'), {

            })
        },
    },


};
</script>
