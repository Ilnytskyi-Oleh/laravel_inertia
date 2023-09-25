<script setup>
import {
    Head,
    Link,
    useForm,
} from "@inertiajs/vue3";

const form = useForm({
    title: '',
    content: false,
});

const submit = () => {
    form.post(route('login'), {
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
                <form class="space-y-3">
                    <input
                        type="text"
                        placeholder="Title"
                        v-model="form.title"
                    >
                    <textarea
                        placeholder="Content"
                        v-model="form.content"
                    ></textarea>
                    <div>
                        <button
                            type="submit"
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
