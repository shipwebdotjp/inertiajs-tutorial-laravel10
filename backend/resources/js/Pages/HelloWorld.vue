<script setup>
import { Link } from '@inertiajs/vue3'
import Layout from '@/Pages/Layout.vue'
</script>

<template>
    <Layout title="HelloWorld">
        Hello world!
        <Link href="/HelloWorld" class="text-sm text-blue-700 underline">
                HelloWorld
        </Link>
    </Layout>
</template>