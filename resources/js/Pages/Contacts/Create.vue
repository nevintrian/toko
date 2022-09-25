<template>
    <Head title="Tambah Kontak"/>

    <BreezeAuthenticatedLayout>
        <div class="px-4 w-full">
            <div
                class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-white xl:mb-0">

                <div class="px-6 py-6 mb-0 bg-white rounded-t">
                    <div class="flex justify-between text-center">
                        <h6 class="text-xl font-bold text-blueGray-700">
                            Tambah Kontak
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
                                    <BreezeLabel for="name" value="Nama"/>
                                    <BreezeInput
                                        placeholder="Masukkan nama"
                                        id="name"
                                        type="text"
                                        v-model="form.name"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="phone" value="Telepon"/>
                                    <BreezeInput
                                        placeholder="Masukkan nomor telepon"
                                        id="phone"
                                        type="number"
                                        v-model="form.phone"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="address" value="Alamat"/>
                                    <BreezeInput
                                        placeholder="Masukkan nomor alamat"
                                        id="address"
                                        type="text"
                                        v-model="form.address"
                                        required
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <Link :href="route('contact.index')" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-3 px-4 rounded mr-3">Kembali</Link>
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
                name : '',
                phone : '',
                address : ''
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route('contact.store'), {

            })
        },
    },
};
</script>
