<script setup>
import { watch } from 'vue';
import axios from 'axios';

// accept args: image path, product name, product description, expiration date, quantity
const props = defineProps(['id', 'image', 'name', 'desc', 'date', 'quantity']);
const emit = defineEmits(['update:name', 'update:desc', 'update:date', 'update:quantity', 'update']);

// Watch handlers for all fields
watch(() => props.name, (newVal) => {
    if (props.id) {
        axios.patch(`item/${props.id}/`, { name: newVal })
            .then(response => console.log('Name updated:', response.data))
            .catch(error => console.error('API Error:', error));
    }
});

watch(() => props.desc, (newVal) => {
    if (props.id) {
        axios.patch(`item/${props.id}/`, { description: newVal })
            .then(response => console.log('Description updated:', response.data))
            .catch(error => console.error('API Error:', error));
    }
});

watch(() => props.date, (oldVal, newVal) => {
    // if diff is less than 1 day, don't update
    if (Math.abs(new Date(oldVal) - new Date(newVal)) < 86400000) return;
    if (props.id) {
        axios.patch(`item/${props.id}/`, { date: newVal })
            .then(response => console.log('Date updated:', response.data))
            .catch(error => console.error('API Error:', error));
    }
});

watch(() => props.quantity, (newVal) => {
    if (props.id) {
        if (newVal <= 0) {
            axios.delete(`item/${props.id}/`)
                .then(response => console.log('Item deleted:', response.data))
                .catch(error => console.error('API Error:', error))
                .finally(() => emit('update'));
        } else {
            axios.patch(`item/${props.id}/`, { count: newVal })
                .then(response => console.log('Quantity updated:', response.data))
                .catch(error => console.error('API Error:', error));
        }
    }
});

// on click of edit button, ask new url in popup
const editImage = () => {
    const newUrl = prompt('Введите новый URL изображения:', props.image);
    if (newUrl) {
        axios.patch(`item/${props.id}/`, { image_url: newUrl })
            .then(response => console.log('Image updated:', response.data))
            .catch(error => console.error('API Error:', error))
            .finally(() => emit('update'));
    }
}

</script>

<template>
    <div class="product-card">
        <div class="image-wrapper">
            <img :src="props.image" alt="product">
            <button class="edit-btn" @click="editImage">
                <img :src="'/edit-picture.svg'" alt="edit">
            </button>
        </div>
        <!-- <img :src="props.image" alt="product"> -->
        <div>
            <input class="name" type="text" :value="props.name" @input="emit('update:name', $event.target.value)">
            <input class="desc" type="text" :value="props.desc" @input="emit('update:desc', $event.target.value)">
            <input class="date" type="date" name="dateInput" :value="props.date"
                @input="emit('update:date', $event.target.value)">
            <div class="product-card-bottom">
                <button @click="emit('update:quantity', props.quantity - 1)">-</button>
                <input type="number" :value="props.quantity"
                    @input="emit('update:quantity', parseInt($event.target.value))">
                <button @click="emit('update:quantity', props.quantity + 1)">+</button>
            </div>
        </div>
    </div>
</template>

<style scoped>
.product-card {
    background-color: var(--color-background-lighter);
    /* border: 0px solid var(--color-background-darker); */
    border-radius: 8px;
    /* box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); */
    padding: 10px;
    box-sizing: border-box;
    /* width: 200px; */
    height: 300px;
    color: var(--color-text);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.3s;
    cursor: pointer;
}

.product-card img {
    width: 100%;
    height: 100%;
    min-height: 100%;
    min-width: 100%;
    object-fit: cover;
    border-radius: 5px;
}

.product-card h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
    /* height: 2.5em; */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.product-card p {
    margin: 5px 0;
    /* height: 3em; */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.product-card-bottom {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin: 4px 0;
}

.product-card-bottom button {
    padding: 5px;
    text-decoration: none;
    display: block;
    width: 30%;
    height: 20%;
    background-color: var(--color-background-op);
    border: 0;
    border-radius: 8px;
    color: var(--white);
}

.product-card-bottom button:hover {
    color: var(--color-accent-blue);
    /* background-color: var(--color-background-lighter); */
    /* border: 3px solid var(--color-accent-blue); */
    cursor: pointer;
}

input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number] {
    -moz-appearance: textfield;
    appearance: textfield;
    /* Firefox */
    margin: 4px;
}

.product-card-bottom input {
    padding: 5px;
    text-decoration: none;
    display: block;
    width: 100%;
    background-color: var(--color-background-op);
    border: 0;
    border-radius: 8px;
    color: var(--white);
    margin: 0 4px;
}

.image-wrapper {
    width: 100%;
    width: 100%;
    height: 50%;
    min-height: 50%;
    min-width: 100%;
    object-fit: cover;
    border-radius: 5px;
}

.edit-btn {
    position: relative;
    object-fit: none;
    /* top: 10px; */
    /* right: 10px; */
    width: 30px;
    height: 30px;
    border-radius: 5px;
    /* background-color: rgba(255, 255, 255, 0.8); */
    background-color: var(--color-background-lighter);
    background-color: rgba(255, 255, 255, 0.4);
    border: none;
    padding: 0;
    margin: 0;
    cursor: pointer;
    color: #666;
    transition: all 0.2s;
    /* display: flex; */
    /* justify-content: center; */
    /* align-items: center; */
    /* move btn up right */
    transform: translate(185px, -38px);
}

.edit-btn img {
    width: 15px;
    height: 15px;
}

.edit-btn:hover {
    background-color: rgba(255, 0, 0, 0.8);
    color: white;
}

.name,
.desc {
    padding: 8px;
    margin: 4px 0;
    border-radius: 8px;
    background-color: var(--color-background-op);
    color: var(--white);
    width: 100%;
    box-sizing: border-box;
    border: 0;
}

.desc {
    height: 25%;
    padding-top: 0;
    line-height: normal;
    vertical-align: top;
}

.name {
    margin-top: 8px;
    height: 15%;
    font-weight: bold;
    font-size: medium;
}

.date {
    padding: 8px;
    margin: 4px 0;
    border-radius: 8px;
    background-color: var(--color-background-op);
    color: var(--color-text);
    width: 100%;
    height: 15%;
    box-sizing: border-box;
    border: 0;
}

.date:hover {
    cursor: pointer;
}
</style>