<script setup>
import {
    Head,
    Link, router, useForm,
} from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";


defineProps({ posts: Object })

const deletePost = (index) => {
    router.delete(route('post.delete', index));
}


const showPost = (index) => {
    router.get(route('post.show', index))
}

const editPost = (index) => {
    router.get(route('post.edit', index))
}

</script>

<template>
    <div>
        <Head title="Posts"/>
        <MainLayout>
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

                <table v-if="posts" class="mt-8">
                    <thead>
                    <tr>
                        <th>Пост тайтл</th>
                        <th>Пост контент</th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- В цьому місці ми будемо виводити дані постів з використанням v-for -->
                    <tr v-for="post in posts" :key="post.id">
                        <td>{{ post.title }}</td>
                        <td>{{ post.content }}</td>
                        <td>

                            <button
                                @click="showPost(post.id)"
                                class="select-none bg-sky-500 hover:bg-sky-600 text-white font-bold text-sm py-1 px-2 rounded"
                            >
                                Show
                            </button>
                            <button
                                @click="deletePost(post.id)"
                                class="select-none bg-red-500 hover:bg-red-600 text-white font-bold text-sm py-1 px-2 rounded"
                            >
                                Видалити
                            </button>
                            <button
                                @click="editPost(post.id)"
                                class="select-none bg-yellow-500 hover:bg-yellow-600 text-white font-bold text-sm py-1 px-2 rounded"
                            >
                                Edit
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </MainLayout>
    </div>
</template>

<style scoped>

</style>
