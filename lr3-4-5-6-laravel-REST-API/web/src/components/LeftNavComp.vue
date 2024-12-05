<script setup>
import { RouterLink, RouterView } from 'vue-router'
import axios from 'axios';
import { ref, watch } from 'vue';

const selectedWarehouse = ref('0');
const warehouses = ref([]);
const isWarehousesLoading = ref(true);

axios.get('warehouse')
    .then((response) => {
        warehouses.value = response.data;
    })
    .catch((error) => {
        console.error('API Error:', error);
        warehouses.value = [];
    })
    .finally(() => {
        isWarehousesLoading.value = false;
    });

const shelves = ref([]);
const isShelvesLoading = ref(true);

const fetchShelvesByWarehouse = async (warehouseId) => {
    try {
        isShelvesLoading.value = true;
        const response = await axios.get(`warehouse/${warehouseId}/shelves/`);
        return response.data.data;
    } catch (error) {
        console.error('API Error:', error);
        throw error;
    } finally {
        isShelvesLoading.value = false;
    }
};

watch(selectedWarehouse, async (newWarehouseId) => {
    if (newWarehouseId && newWarehouseId !== '0') {
        try {
            fetchShelvesByWarehouse(newWarehouseId)
                .then((sh) => {
                    console.log('Fetched shelves:', sh);
                    shelves.value = sh;
                    console.log('Fetched shelves.value:', shelves.value);
                })
                .catch((error) => {
                    console.error('Failed to fetch shelves:', error);
                })
                .finally((sh) => {
                    console.log('Fetch shelves completed');
                });
        } catch (error) {
            console.error('Failed to fetch shelves:', error);
        }
    } else {
        shelves.value = []; // Clear shelves if no warehouse selected
    }
});
</script>

<template>
    <div class="left-nav">
        <nav>
            <span>Склады</span>
            <select v-model="selectedWarehouse">
                <option v-if="isWarehousesLoading" value="0">Загрузка...</option>
                <option v-else v-for="warehouse in warehouses" :key="warehouse.id" :value="warehouse.id">
                    {{ warehouse.name }}
                </option>
            </select>
            <ul>
                <li v-if="selectedWarehouse === '0'" class="emt-wh">выберите склад для просмотра полок</li>
                <li v-else-if="isShelvesLoading">загрузка полок...</li>
                <li v-else-if="shelves.length === 0">нет доступных полок</li>
                <li v-else v-for="shelf in shelves" :key="shelf.id">
                    <RouterLink :to="`/shelf/${shelf.id}`">
                        <button>Полка {{ shelf.name }}</button>
                    </RouterLink>
                </li>
            </ul>
        </nav>
    </div>
</template>

<style scoped>
.left-nav {
    border-radius: 16px;
    max-width: 200px;
    width: 20%;
    position: sticky;
    top: 0;
    height: 100% - 20px;
    background-color: var(--color-background-op);
    margin: 0 0 0 10px;
    padding: 10px;
    /* min-height: 400px; */
    /* min-height: 80vh; */
}

.left-nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.left-nav li {
    margin: 5px;
}

.left-nav .emt-wh {
    text-align: center;
}

.left-nav button {
    padding: 5px;
    text-decoration: none;
    display: block;
    width: 100%;
    background-color: var(--color-background-op);
    border: 3px solid var(--color-background-darker);
    border-radius: 16px;
    color: var(--color-text);
    text-align: left;
}

.left-nav button:hover {
    color: var(--color-accent-blue);
    border-color: var(--color-accent-blue);
    background-color: var(--color-background-lighter);
    cursor: pointer;
}

.left-nav select {
    padding: 5px;
    text-decoration: none;
    display: block;
    width: 100%;
    background-color: var(--color-background-op);
    border: 3px solid var(--color-background-darker);
    border-radius: 8px;
    color: var(--color-text);
}

.left-nav select:focus {
    outline: none !important;
}

.left-nav select:hover,
.left-nav select:focus {
    color: var(--color-accent-blue);
    border-color: var(--color-accent-blue);
    background-color: var(--color-background-lighter);
    cursor: pointer;
}

.left-nav nav span {
    font-weight: bold;
    /* center */
    display: block;
    text-align: center;
    margin: 0 0 10px 0;
}

@media (max-width:961px) {

    /* up to 961 */

}

@media (max-width:641px) {

    /* up to 641 */
    .left-nav {
        display: none;
    }
}

@media (max-width:481px) {

    /* up to 481 */

}

@media (min-width:961px) {

    /* more than 961 */

}
</style>