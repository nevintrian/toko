<template>
    <Head title="Tambah Pembelian"/>

    <BreezeAuthenticatedLayout>
        <div class="px-4 w-full">
            <div
                class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-white xl:mb-0">

                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h6 class="text-xl font-bold text-blueGray-700 py-3">
                                Tambah Pembelian
                            </h6>
                        </div>
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
                                        id="code"
                                        type="text"
                                        v-model="form.code"
                                        required
                                        placeholder="Masukkan kode transaksi"
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="supplier_name" value="Nama Supplier"/>
                                    <BreezeInput
                                        id="supplier_name"
                                        type="text"
                                        v-model="form.supplier_name"
                                        required
                                        placeholder="Masukkan nama supplier"
                                    />
                                </div>
                            </div>
                        </div>

                        <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-3 rounded m-3" @click="increment()">Tambah Barang</button>

                        <h1 class="m-3">Total Harga : Rp{{ this.form.total_price ?? 0 }}</h1>
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse mt-5">
                                <thead>
                                <tr>
                                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        No
                                    </th>
                                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Kode Barang
                                    </th>
                                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Nama Barang
                                    </th>
                                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Stok
                                    </th>
                                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Qty
                                    </th>
                                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Harga
                                    </th>
                                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Sub Total
                                    </th>
                                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item, index) in form.cart_row" :key="index">
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ item }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <select id="product_id" v-model="form.product_id[index]" required @change="product(index)" class="w-full border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <option value="" disabled selected hidden>Pilih Product</option>
                                            <option v-for="product in products.data" :key="product.id" :value="product.id">
                                            <!-- <div v-if="item == 1"> -->
                                                {{product.code}}
                                            <!-- </div>
                                            <div v-else-if="!form.product_id.includes(product.id)">
                                                {{product.code}}
                                            </div> -->
                                            </option>
                                        </select>
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ form.product_name[index] || "" }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ form.stock[index] || "" }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <BreezeInput
                                            id="quantity"
                                            type="number"
                                            v-model="form.quantity[index]"
                                            v-on:input="quantity(index)"
                                            required
                                        />
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        Rp{{ form.price[index] || 0 }}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        Rp{{ form.subtotal[index] || 0}}
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-3 rounded m-3" @click="decrement(index)">Hapus</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <Link :href="route('purchase.index')" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-3 px-4 rounded mr-3">Kembali</Link>
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
        Link
    },

    data() {
        return {
            form: useForm({
                cart_row : 1,
                code : '',
                supplier_name : '',
                total_price : 0,
                product_id : [],
                product_name : [],
                stock : [],
                quantity : [],
                price : [],
                subtotal : []
            }),
        };
    },

    props: {
        products: Object,
    },

    methods: {
        submit() {
            this.form.post(this.route('purchase.store'), {

            })
        },

        increment(){
            this.form.cart_row++
        },

        decrement(index){
            this.form.cart_row--
            this.form.product_id.splice(index, 1)
            this.form.quantity.splice(index, 1)
            this.form.price.splice(index, 1)
            this.form.subtotal.splice(index, 1)
        },

        product(index){
            let id = this.form.product_id[index]
            this.products.data.forEach(e => {
                if(e.id == id){
                    this.form.product_name[index] = e.name
                    this.form.price[index] = e.price
                    this.form.stock[index] = e.stock
                }
            });


        },

        quantity(index){
           this.form.subtotal[index] = this.form.price[index] * this.form.quantity[index] || 0
           this.form.total_price = 0
           this.form.subtotal.forEach(e => {
                this.form.total_price += e
            });

        }
    },
};
</script>
