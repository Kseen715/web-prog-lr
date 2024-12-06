<script setup>
import LeftNavComp from '@/components/LeftNavComp.vue'
import NewCardComp from '@/components/NewProductCardComp.vue';
import ProductCardComp from '@/components/ProductCardComp.vue'
import ShelfStatusComp from '@/components/ShelfStatusComp.vue';
import axios from 'axios';
import { ref, watch } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
const products = ref([]);
const isProductsLoading = ref(true);
const isInfoLoading = ref(true);

const shelf = ref({});
const warehouse = ref({});

const fetchProducts = async (shelfId) => {
  isProductsLoading.value = true;
  axios.get('shelf/' + shelfId + '/items/')
    .then((response) => {
      products.value = response.data.data;
    })
    .catch((error) => {
      console.error('API Error:', error);
      products.value = [];
    })
    .finally(() => {
      isProductsLoading.value = false;
      products.value.forEach((product) => {
        product.date = product.date.split('T')[0];
      });
    });
  isInfoLoading.value = true;
  axios.get('shelf/' + shelfId + '/')
    .then((response) => {
      shelf.value = response.data;
    })
    .catch((error) => {
      console.error('API Error:', error);
      shelf.value = {};
    })
    .finally(() => {
      axios.get('warehouse/' + shelf.value.warehouse_id + '/')
        .then((response) => {
          warehouse.value = response.data;
        })
        .catch((error) => {
          console.error('API Error:', error);
          warehouse.value = {};
        })
        .finally(() => {
          isInfoLoading.value = false;
        });
    });
}

// Initial fetch
fetchProducts(route.params.id);

// Watch for route changes
watch(
  () => route.params.id,
  (newId) => {
    if (newId) {
      fetchProducts(newId);
    }
  }
);


const postNewProduct = async () => {
  axios.post('item/', {
    name: 'Новый объект',
    description: 'Описание объекта',
    image_url: '/jar.svg',
    count: 1,
    date: new Date().toISOString().split('T')[0],
    shelf_id: route.params.id,
  })
    .then((response) => {
      products.value.push(response.data);
    })
    .catch((error) => {
      console.error('API Error:', error);
    })
    .finally(() => {
      fetchProducts(route.params.id);
    });
}

const updateProduct = (index, field, value) => {
  if (products.value[index]) {
    products.value[index][field] = value;
  }
}
</script>

<template>
  <main>
    <LeftNavComp />
    <div class="viewp">
      <ShelfStatusComp v-if="isInfoLoading" :warehouse="'Загрузка'" :shelf="'...'" />
      <ShelfStatusComp v-else :warehouse="warehouse.name" :shelf="shelf.name" />
      <div v-if="isProductsLoading" class="empty-viewport">
        <img src="/loading.svg" alt="loading" />
      </div>
      <div v-else class="shelf-viewport">
        <ProductCardComp v-for="(product, index) in products" :key="product.id" :id="product.id"
          :image="product.image_url" v-model:name="product.name" v-model:desc="product.description"
          v-model:date="product.date" v-model:quantity="product.count" @delete="fetchProducts(route.params.id)" />
        <NewCardComp @click="postNewProduct" />
      </div>
    </div>
  </main>
</template>

<style>
.viewp {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.shelf-viewport {
  border-radius: 16px;
  flex-grow: 1;
  padding: 20px;
  margin: 0 10px;
  background-color: var(--color-background-op);
  color: var(--color-text);
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-auto-rows: min-content;
  gap: 10px;
  align-items: start;
  justify-content: start;
  list-style-type: none;
  min-height: calc(60vh - 66px);
  max-height: fit-content;
}

.empty-viewport {
  border-radius: 16px;
  flex-grow: 1;
  padding: 20px;
  margin: 0 10px;
  background-color: var(--color-background-op);
  color: var(--color-text);
  min-height: calc(60vh - 66px);
  display: flex;
  font-size: x-large;
  align-items: center;
  justify-content: center;
}

.empty-viewport h2 {
  text-align: center;
}
</style>
