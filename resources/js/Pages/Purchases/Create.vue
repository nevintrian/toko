<template>
    <Head title="My profile"/>

    <BreezeAuthenticatedLayout>
        <div class="px-4 w-full">
            <div
                class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-white xl:mb-0">

                <div class="px-6 py-6 mb-0 bg-white rounded-t">
                    <div class="flex justify-between text-center">
                        <h6 class="text-xl font-bold text-blueGray-700">
                            Tambah Pembelian
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
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="total_harga" value="Total Harga"/>
                                    <BreezeInput
                                        id="total_harga"
                                        type="number"
                                        v-model="form.total_harga"
                                        required
                                        placeholder="Masukkan total harga"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
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

export default {
    components: {
        Divider,
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
    },

    data() {
        return {
            form: useForm({
                code : '',
                supplier_name : '',
                total_harga : '',
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route('product.store'), {

            })
        },
    },
};
</script>
