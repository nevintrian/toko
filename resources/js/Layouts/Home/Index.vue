<template>
    <head>
        <BreezeHead></BreezeHead>
    </head>
    <body>
        <BreezeHeader></BreezeHeader>
        <slot />
    </body>

    <footer>
        <BreezeFooter></BreezeFooter>
    </footer>
</template>

<script>
import BreezeHead from '@/Layouts/Home/Head.vue'
import BreezeHeader from '@/Layouts/Home/Header.vue'
import BreezeFooter from '@/Layouts/Home/Footer.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Head,
        BreezeHead,
        BreezeHeader,
        BreezeFooter
    },
};
</script>
