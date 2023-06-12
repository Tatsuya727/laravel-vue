<script setup>
import { ref, onMounted } from 'vue';
import Modal from '@/Components/Modal.vue';
import axios from 'axios';

onMounted(() => {
    axios.get('/api/user').then((res) => {
        console.log(res.data);
    });
});

const showModal = ref(false);
</script>

<template>
    <Modal :show="showModal" @close="showModal = false">
        <div>
            <h1>Modal Title</h1>
            <p>Modal content...</p>
            <button @click="showModal = false">Close Modal</button>
        </div>
    </Modal>

    <input name="customer" v-model="search" />
    <button type="button" @click="searchCustomers">検索する</button>
    <button @click="showModal = true">Open Modal</button>
</template>
