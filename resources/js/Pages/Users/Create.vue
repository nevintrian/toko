<template>
    <Head title="Tambah User"/>

    <BreezeAuthenticatedLayout>
        <div class="px-4 w-full">
            <div
                class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-white xl:mb-0">
                <div class="rounded-t bg-white mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h6 class="text-xl font-bold text-blueGray-700 py-3">
                                Tambah User
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="flex-auto p-4">

                    <BreezeValidationErrors class="mb-4"/>

                    <form @submit.prevent="submit">
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="name" value="Nama"/>
                                    <BreezeInput
                                        placeholder="Masukkan nama user"
                                        id="name"
                                        type="text"
                                        v-model="form.name"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="email" value="Email"/>
                                    <BreezeInput
                                        placeholder="Masukkan email user"
                                        id="email"
                                        type="email"
                                        class="block mt-1 w-full"
                                        v-model="form.email"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="password" value="Password"/>
                                    <BreezeInput
                                        placeholder="Masukkan password user"
                                        id="password"
                                        type="password"
                                        class="block mt-1 w-full"
                                        v-model="form.password"
                                    />
                                </div>
                            </div>

                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <BreezeLabel for="password_confirmation" value="Konfirmasi Password"/>
                                    <BreezeInput
                                        placeholder="Masukkan konfirmasi password"
                                        id="password_confirmation"
                                        type="password"
                                        class="block mt-1 w-full"
                                        v-model="form.password_confirmation"
                                    />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <Link :href="route('user.index')" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-3 px-4 rounded mr-3">Kembali</Link>
                                    <BreezeButton
                                        :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing">
                                        Simpan
                                    </BreezeButton>
                                </div>
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
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(this.route('user.store'))
        },
    },
};
</script>
