<script setup>
import {
    Head,
    Link,
} from "@inertiajs/vue3";

</script>

<template>
    <div>
        <Head title="Posts"/>
        <div class="w-96 mx-auto">
            <h1 class="text-lg">
                Posts
            </h1>
            <div>
                <Link
                    class="bg-sky-500 text-white rounded-full py-1.5 px-4 hover:opacity-80"
                    :href="route('post.create')"
                >
                    Add Post
                </Link>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
