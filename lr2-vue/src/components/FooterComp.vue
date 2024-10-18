<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
    <div class="footer-container">
        <footer>
            <div>
                <p>BSTU 2024</p>
            </div>
        </footer>
    </div>
</template>

<style scoped>
footer {
    background-color: var(--color-background-darker);
    height: 60px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    bottom: 0;
    width: 100%;
    /* glue div to bottom of page */
    /* position: relative; */
    /* margin-top: auto;
    color: var(--color-text-light);
    border-radius: 16px; */


}

.footer-container {
    /* position: fixed; */
    bottom: 0;
    width: 100%;
    margin: 0 auto;
}
</style>