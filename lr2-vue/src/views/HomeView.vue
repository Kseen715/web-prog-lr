<script setup>
import LeftNavComp from '@/components/LeftNavComp.vue'
</script>

<template>
    <main>
        <LeftNavComp />
        <div class="empty-viewport">
            <h2>выберите полку</h2>
        </div>
    </main>
</template>

<style>
.empty-viewport {
    border-radius: 16px;
    flex-grow: 1;
    padding: 20px;
    margin: 0 10px;
    background-color: var(--color-background-op);
    color: var(--color-text-light);
    min-height: 60vh;
    display: flex;
    font-size: x-large;
    align-items: center;
    justify-content: center;
}
</style>