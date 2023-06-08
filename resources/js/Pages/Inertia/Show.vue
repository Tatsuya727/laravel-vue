<script setup>
import { Inertia } from "@inertiajs/inertia";

defineProps({
    id: String,
    blog: Object,
});

const deleteComfirm = id => {
    Inertia.delete(`/inertia/${id}`, {
        onBefore: () => {
            confirm('削除しますか？');
        },
    });
}
</script>

<template>
    {{ id }} <br>
    {{ blog.title }} <br>
    {{ blog.content }} <br> 
    <button @click="deleteComfirm(blog.id)">削除</button>
</template>
