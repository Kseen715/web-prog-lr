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
    color: var(--color-text);
    border-radius: 16px; */

    /* top shadow  */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

@media (prefers-color-scheme: dark) {
    footer {
        box-shadow: 0 2px 7px rgba(222, 222, 222, 0.1);
    }
}

.footer-container {
    /* position: fixed; */
    bottom: 0;
    width: 100%;
    margin: 0 auto;
}
</style>