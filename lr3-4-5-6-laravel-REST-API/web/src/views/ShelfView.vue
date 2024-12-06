<script setup>
import LeftNavComp from '@/components/LeftNavComp.vue'
import NewCardComp from '@/components/NewCardComp.vue';
import ProductCardComp from '@/components/ProductCardComp.vue'
import axios from 'axios';
import { ref, watch } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
const products = ref([]);
const isLoading = ref(true);

const fetchProducts = async (shelfId) => {
  isLoading.value = true;
  axios.get('shelf/' + shelfId + '/items/')
    .then((response) => {
      products.value = response.data.data;
    })
    .catch((error) => {
      // console.error('API Error:', error);
      products.value = [];
    })
    .finally(() => {
      isLoading.value = false;
      products.value.forEach((product) => {
        product.date = product.date.split('T')[0];
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
</script>

<template>
  <main>
    <LeftNavComp />
    <div v-if="isLoading" class="empty-viewport">
      <img src="/loading.svg" alt="loading" />
    </div>
    <div v-else-if="products.length < 1" class="empty-viewport">
      <h2>нет предметов на этой полке</h2>
    </div>
    <div v-else class="shelf-viewport">
      <ProductCardComp v-for="(product, index) in products" :key="index" :image="product.image_url"
        :name="product.name" :desc="product.description" :date="product.date" :quantity="product.count" />
      <NewCardComp />
    </div>
  </main>
</template>

<style>
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
  min-height: 60vh;
  max-height: fit-content;
}

.empty-viewport {
    border-radius: 16px;
    flex-grow: 1;
    padding: 20px;
    margin: 0 10px;
    background-color: var(--color-background-op);
    color: var(--color-text);
    min-height: 60vh;
    display: flex;
    font-size: x-large;
    align-items: center;
    justify-content: center;
}

.empty-viewport h2 {
    text-align: center;
}

</style>
