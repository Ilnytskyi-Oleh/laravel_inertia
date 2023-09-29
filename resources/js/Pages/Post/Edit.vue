<script setup>
import {
    Head,
    useForm, usePage,
} from "@inertiajs/vue3";

const { post, flash } = defineProps({post:Object, flash: Object})

const form = useForm({
    title: post.title,
    content: post.content,
});

const submit = () => {
    form.patch(route('post.update', post.id), {
        // onSuccess: (res) => form.reset('title', 'content'),
    });
};
</script>

<template>
    <div>
        <Head title="Create post"/>
        <div class="w-96 mx-auto">
            <h1 class="text-lg mb-4">
                Update post
            </h1>
            <div v-if="flash.message">{{flash.message}}</div>
            <div>
                <form class="space-y-3 max-w-min" @submit.prevent="submit">
                    <input
                        type="text"
                        placeholder="Title"
                        v-model="form.title"
                    >
                    <p
                        class="text-sm text-red-600"
                        v-if="form.errors.title">{{form.errors.title}}
                    </p>
                    <textarea
                        placeholder="Content"
                        v-model="form.content"
                    ></textarea>
                    <p
                        class="text-sm text-red-600"
                        v-if="form.errors.content">{{form.errors.content}}
                    </p>
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="btn-default"
                        >
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
