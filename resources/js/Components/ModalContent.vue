<script setup>
import { ref } from 'vue';
const showModal = ref(false);
</script>

<template>
    <div>
        <h1>Modal Title</h1>
        <p>Modal content...</p>
        <button type="button" @click="showModal = false">Close Modal</button>
    </div>
</template>
