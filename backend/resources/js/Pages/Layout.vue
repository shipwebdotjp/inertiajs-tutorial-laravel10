<script setup>
import { Link, Head } from '@inertiajs/vue3'
defineProps({ title: String })
</script>

<template>
    <Head :title="title" />
    <main>
        <header class="bg-gray-100">
            <Link href="/" class="text-blue-700 underline m-2">Home</Link>
            <Link href="/HelloWorld" class="text-blue-700 underline m-2">HelloWorld</Link>
            <Link :href="route('bookmark.index')" class="text-blue-700 underline m-2">ブックマーク一覧</Link>
        </header>
        <article>
            <slot />
        </article>
    </main>
</template>