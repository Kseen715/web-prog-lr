<script setup>
// accept args: image path, product name, product description, expiration date, quantity
const props = defineProps(['image', 'name', 'desc', 'date', 'quantity']);

</script>

<template>
    <div class="plus-card">
        <button><img src="/plus-circle.svg" 
             alt="product"></button>
    </div>
</template>

<style scoped>
.plus-card {
    /* background-color: var(--color-background-lighter); */
    /* border: 0px solid var(--color-background-darker); */
    border-radius: 8px;
    /* box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); */
    border: 5px solid var(--color-background-darker);
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

.plus-card button {
    width: 100%;
    height: 100%;
    background-color: transparent;
    border: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s;
}

.plus-card button:hover img {
    transform: scale(1.1);
    transition: all 0.3s;
}   

.plus-card img {
    width: 50%;
    height: 50%;
    min-height: 50%;
    min-width: 100%;
    /* object-fit: cover; */
    border-radius: 5px;
    /* color tone image to lighter grey */
    transition: all 0.3s;
}

.plus-card h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
    /* height: 2.5em; */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.plus-card p {
    margin: 5px 0;
    /* height: 3em; */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number] {
    appearance: textfield;
    -moz-appearance: textfield;
    /* Firefox */
    margin: 4px;
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