<script setup>
import {
    Head,
    Link, router, useForm,
} from "@inertiajs/vue3";


defineProps({ post: Object })

const deletePost = (index) => {
    router.delete(route('post.delete', index));
}
</script>

<template>
    <div v-if="post">
        <Head :title="`Post- ${post.id}`"/>
        <div class="w-96 mx-auto">
            <h1 class="text-lg">
                Post
            </h1>
            <div>
                <Link
                    class="bg-sky-500 text-white rounded-full py-1.5 px-4 hover:opacity-80"
                    :href="route('post.index')"
                >
                    Back
                </Link>

                <table class="mt-8">
                    <thead>
                    <tr>
                        <th>Пост тайтл</th>
                        <th>Пост контент</th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <td>{{ post.title }}</td>
                        <td>{{ post.content }}</td>
                        <td>
<!--                            <button @click="editPost(index)">Редагувати</button>-->
                            <button
                                @click="deletePost(post.id)"
                                class="select-none bg-red-500 hover:bg-red-600 text-white font-bold text-sm py-1 px-2 rounded"
                            >
                                Видалити
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
