<script setup>
import { Link, Head } from '@inertiajs/vue3'
defineProps({ title: String })
</script>

<template>
    <Head :title="title" />
    <main>
        <header class="bg-gray-100">
            Layout2
            <Link href="/" class="text-blue-700 underline m-2">Home</Link>
            <Link href="/HelloWorld" class="text-blue-700 underline m-2">HelloWorld</Link>
            <Link :href="route('bookmark.index')" class="text-blue-700 underline m-2">ブックマーク一覧</Link>
            <input type=text name=search size=15 class="p-1 m-1 text-sm" />
            <button type=submit class="border border-gray-400 m-1 p-1 text-sm">ブックマーク検索</button>
        </header>
        <article>
            <slot />
        </article>
    </main>
</template>