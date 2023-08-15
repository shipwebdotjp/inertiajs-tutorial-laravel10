<script setup>
import { Link } from '@inertiajs/vue3'
import Layout from '@/Pages/Layout.vue'

defineProps({ bookmarks: Array })
</script>

<template>
    <Layout title="ブックマーク一覧">
        <h2 class="text-lg border-b p-2">
            <Link :href="route('bookmark.index')" class="text-blue-700 underline">
            ブックマーク一覧
            </Link>
        </h2>
        <ul class="list-disc list-inside p-2">
            <li v-for="bookmark in bookmarks">
                <a :href="bookmark.url" target=_blank class="text-blue-700" >{{ bookmark.title }}</a>
            </li>
        </ul>
    </Layout>
</template>