<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HeaderComp from '@/components/HeaderComp.vue'
import FooterComp from '@/components/FooterComp.vue'
</script>

<template>
  <div class="app">
    <HeaderComp />
    <RouterView />
  </div>
  <FooterComp />
</template>

<style scoped></style>
