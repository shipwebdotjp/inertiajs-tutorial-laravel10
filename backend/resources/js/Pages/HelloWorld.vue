<script>
import Layout from '@/Pages/Layout.vue'

export default {
    layout: Layout,
    mounted: function(){
        document.title = "Hello World";
    },
}
</script>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div>
        Hello world!
        <Link href="/HelloWorld" class="text-sm text-blue-700 underline">
                HelloWorld
        </Link>
    </div>
</template>