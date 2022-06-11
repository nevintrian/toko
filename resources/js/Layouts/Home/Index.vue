<template>
    <head>
        <BreezeHead></BreezeHead>
    </head>
    <body>
        <div>
            <BreezeHeader></BreezeHeader>
            <slot />
            <footer>
                <BreezeFooter></BreezeFooter>
            </footer>
        </div>
    </body>


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
