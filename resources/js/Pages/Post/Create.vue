<script setup>
import {
    Head,
    Link,
    useForm,
} from "@inertiajs/vue3";

const form = useForm({
    title: '',
    content: '',
});

const submit = () => {
    form.post(route('post.store'), {
        onFinish: () => form.reset('title', 'content'),
    });
};
</script>

<template>
    <div>
        <Head title="Create post"/>
        <div class="w-96 mx-auto">
            <h1 class="text-lg mb-4">
                Create post
            </h1>
            <div>
                <form class="space-y-3" @submit.prevent="submit">
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
                    <div>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="btn-default"
                        >
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
