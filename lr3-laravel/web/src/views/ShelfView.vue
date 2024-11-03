<script setup>
import LeftNavComp from '@/components/LeftNavComp.vue'
import ProductCardComp from '@/components/ProductCardComp.vue'
import { ref } from 'vue';

const products = ref([
  {
    image: 'https://www.domitalia.ru/wp-content/uploads/D752001.jpg',
    name: 'Малиновое варенье',
    desc: 'Состав: малина, сахар',
    date: '2023-12-31',
    quantity: 10
  },
  {
    image: 'https://i.pinimg.com/originals/80/f7/36/80f736c9e475b8baaf0a254add77a3f7.jpg',
    name: 'Помидоры маринованые',
    desc: 'Состав: томаты, уксус, сахар, соль, перец черный, лавровый лист',
    date: '2023-08-20',
    quantity: 5
  },
  {
    image: 'https://i.pinimg.com/originals/80/f7/36/80f736c9e475b8baaf0a254add77a3f7.jpg',
    name: 'Помидоры маринованые',
    desc: 'Состав: томаты, уксус, сахар, соль, перец черный, лавровый лист',
    date: '2077-11-12',
    quantity: 43
  },
  {
    image: 'https://www.domitalia.ru/wp-content/uploads/D752001.jpg',
    name: 'Малиновое варенье',
    desc: 'Состав: малина, сахар',
    date: '2023-12-31',
    quantity: 567
  },
  {
    image: 'https://www.domitalia.ru/wp-content/uploads/D752001.jpg',
    name: 'Малиновое варенье',
    desc: 'Состав: малина, сахар',
    date: '2023-12-31',
    quantity: 10
  },
  {
    image: 'https://www.domitalia.ru/wp-content/uploads/D752001.jpg',
    name: 'Малиновое варенье',
    desc: 'Состав: малина, сахар',
    date: '2023-12-31',
    quantity: 5
  },
  {
    image: 'https://www.domitalia.ru/wp-content/uploads/D752001.jpg',
    name: 'Малиновое варенье',
    desc: 'Состав: малина, сахар',
    date: '2023-12-31',
    quantity: 567
  },
  {
    image: 'https://www.domitalia.ru/wp-content/uploads/D752001.jpg',
    name: 'Малиновое варенье',
    desc: 'Состав: малина, сахар',
    date: '2023-12-31',
    quantity: 10
  },
  {
    image: 'https://www.domitalia.ru/wp-content/uploads/D752001.jpg',
    name: 'Малиновое варенье',
    desc: 'Состав: малина, сахар',
    date: '2023-12-31',
    quantity: 5
  },
  {
    image: 'https://www.domitalia.ru/wp-content/uploads/D752001.jpg',
    name: 'Малиновое варенье',
    desc: 'Состав: малина, сахар',
    date: '2023-12-31',
    quantity: 567
  },
  {
    image: 'https://www.domitalia.ru/wp-content/uploads/D752001.jpg',
    name: 'Малиновое варенье',
    desc: 'Состав: малина, сахар',
    date: '2023-12-31',
    quantity: 10
  },
  {
    image: 'https://www.domitalia.ru/wp-content/uploads/D752001.jpg',
    name: 'Малиновое варенье',
    desc: 'Состав: малина, сахар',
    date: '2023-12-31',
    quantity: 5
  },
  {
    image: 'https://www.domitalia.ru/wp-content/uploads/D752001.jpg',
    name: 'Малиновое варенье',
    desc: 'Состав: малина, сахар',
    date: '2023-12-31',
    quantity: 567
  },
]);
</script>

<template>
  <main>
    <LeftNavComp />
    <div class="shelf-viewport">
      <ProductCardComp v-for="(product, index) in products" :key="index" :image="product.image" :name="product.name"
        :desc="product.desc" :date="product.date" :quantity="product.quantity" />
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
</style>
