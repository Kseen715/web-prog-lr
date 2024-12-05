<script setup>
// accept args: image path, product name, product description, expiration date, quantity
const props = defineProps(['image', 'name', 'desc', 'date', 'quantity']);

</script>

<template>
    <div class="product-card">
        <img :src="props.image" alt="product">
        <div>
            <input class="name" type="text" :value="props.name">
            <input class="desc" type="text" :value="props.desc">
            <input class="date" type="date" name="dateInput" :value="props.date">
            <div class="product-card-buttons">
                <button>-</button>
                <input type="number" :value="props.quantity">
                <button>+</button>
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
    height: 50%;
    min-height: 50%;
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

.product-card-buttons {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin: 4px 0;
}

.product-card-buttons button {
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

.product-card-buttons button:hover {
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
    /* Firefox */
    margin: 4px;
}

.product-card-buttons input {
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